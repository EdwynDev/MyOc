<?php

namespace Core;

class Router {
    private $routes = [];
    private $middleware = [];
    
    public function get($path, $callback) {
        $this->addRoute('GET', $path, $callback);
    }
    
    public function post($path, $callback) {
        $this->addRoute('POST', $path, $callback);
    }
    
    public function group($options, $callback) {
        $oldMiddleware = $this->middleware;
        if (isset($options['middleware'])) {
            $this->middleware[] = $options['middleware'];
        }
        
        $callback($this);
        
        $this->middleware = $oldMiddleware;
    }
    
    private function addRoute($method, $path, $callback) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback,
            'middleware' => $this->middleware
        ];
    }
    
    public function dispatch() {
        // Debug : vérifier que dispatch est appelé
        // error_log('Router dispatch called');
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $this->matchPath($route['path'], $path)) {
                // Exécuter les middleware
                foreach ($route['middleware'] as $middlewareClass) {
                    $middleware = new $middlewareClass();
                    if (!$middleware->handle()) {
                        return;
                    }
                }
                
                // Extraire les paramètres
                $params = $this->extractParams($route['path'], $path);
                
                // Exécuter le callback
                if (is_array($route['callback'])) {
                    $controller = new $route['callback'][0]();
                    $method = $route['callback'][1];
                    return $controller->$method(...array_values($params));
                }
                
                return $route['callback'](...array_values($params));
            }
        }
        
        http_response_code(404);
        include 'views/errors/404.php';
    }
    
    private function matchPath($routePath, $requestPath) {
        $routePattern = preg_replace('/\{([^}]+)\}/', '([^/]+)', $routePath);
        $routePattern = '#^' . $routePattern . '$#';
        return preg_match($routePattern, $requestPath);
    }
    
    private function extractParams($routePath, $requestPath) {
        $params = [];
        $routeSegments = explode('/', trim($routePath, '/'));
        $requestSegments = explode('/', trim($requestPath, '/'));
        
        foreach ($routeSegments as $index => $segment) {
            if (preg_match('/\{([^}]+)\}/', $segment, $matches)) {
                $params[$matches[1]] = $requestSegments[$index] ?? null;
            }
        }
        
        return $params;
    }
}