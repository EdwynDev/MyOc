<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'YOC - Gestionnaire d\'Original Characters' ?></title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?= $description ?? 'YOC - Studio de création et gestion d\'Original Characters. Créez, organisez et partagez vos personnages originaux avec une interface moderne et intuitive.' ?>">
    <meta name="keywords" content="<?= $keywords ?? 'original character, OC, personnage, création, fantasy, roleplay, character design, gestionnaire, studio' ?>">
    <meta name="author" content="YOC Studio">
    <meta name="robots" content="<?= $robots ?? 'index, follow' ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $canonical ?? 'https://yoc.studio' . $_SERVER['REQUEST_URI'] ?>">
    <meta property="og:title" content="<?= $og_title ?? $title ?? 'YOC - Studio de création d\'Original Characters' ?>">
    <meta property="og:description" content="<?= $og_description ?? $description ?? 'Créez et gérez vos Original Characters avec YOC Studio. Interface moderne, outils avancés, communauté créative.' ?>">
    <meta property="og:image" content="<?= $og_image ?? 'https://yoc.studio/assets/images/og-image.jpg' ?>">
    <meta property="og:site_name" content="YOC Studio">
    <meta property="og:locale" content="fr_FR">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= $canonical ?? 'https://yoc.studio' . $_SERVER['REQUEST_URI'] ?>">
    <meta property="twitter:title" content="<?= $twitter_title ?? $og_title ?? $title ?? 'YOC - Studio de création d\'Original Characters' ?>">
    <meta property="twitter:description" content="<?= $twitter_description ?? $og_description ?? $description ?? 'Créez et gérez vos Original Characters avec YOC Studio.' ?>">
    <meta property="twitter:image" content="<?= $twitter_image ?? $og_image ?? 'https://yoc.studio/assets/images/og-image.jpg' ?>">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= $canonical ?? 'https://yoc.studio' . $_SERVER['REQUEST_URI'] ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- DNS Prefetch -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdn.tailwindcss.com">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Electrolize:wght@400&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "YOC Studio",
        "description": "Studio de création et gestion d'Original Characters",
        "url": "https://yoc.studio",
        "applicationCategory": "CreativeWork",
        "operatingSystem": "Web",
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "EUR"
        },
        "creator": {
            "@type": "Organization",
            "name": "YOC Studio"
        }
    }
    </script>
    <style>
        body { 
            font-family: 'Electrolize', monospace; 
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #0f0f0f 100%);
        }
        
        /* Animations */
        .fade-in { 
            animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(30px); } 
            to { opacity: 1; transform: translateY(0); } 
        }
        
        .slide-in { 
            animation: slideIn 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        @keyframes slideIn { 
            from { opacity: 0; transform: translateX(-30px); } 
            to { opacity: 1; transform: translateX(0); } 
        }
        
        .scale-in {
            animation: scaleIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        
        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .glass-dark {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Hover effects */
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        /* Neon effects */
        .neon-border {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            border: 1px solid rgba(59, 130, 246, 0.5);
        }
        
        .neon-text {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        ::-webkit-scrollbar-thumb {
            background: #404040;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #525252;
        }
        
        /* Particle background */
        #particles-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }
        
        /* Mobile menu animation */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .mobile-menu.open {
            transform: translateX(0);
        }
        
        /* Button animations */
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .btn-primary:hover::before {
            left: 100%;
        }
        
        /* Card hover effects */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'electrolize': ['Electrolize', 'monospace'],
                    },
                    colors: {
                        'dark': {
                            50: '#f8f9fa',
                            100: '#e9ecef',
                            200: '#dee2e6',
                            300: '#ced4da',
                            400: '#adb5bd',
                            500: '#6c757d',
                            600: '#495057',
                            700: '#343a40',
                            800: '#212529',
                            900: '#0f0f0f',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full bg-dark-900 text-white font-electrolize overflow-x-hidden">
    <!-- Particle background -->
    <canvas id="particles-canvas"></canvas>
    
    <!-- Préchargement d'ocManager -->
    <script src="../../assets/js/app.js"></script>
    
    <div class="min-h-screen relative">
        <?php if (isset($_SESSION['user_name'])): ?>
            <?php include __DIR__ . '/../partials/header.php'; ?>
            <?php include __DIR__ . '/../partials/sidebar.php'; ?>
            <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-70 z-40 hidden lg:hidden backdrop-blur-sm"></div>
            <main class="ml-0 lg:ml-80 transition-all duration-500 ease-in-out">
                <div class="p-6 lg:p-12">
                    <?php include __DIR__ . '/../partials/alerts.php'; ?>
                    <?= $content ?>
                </div>
            </main>
        <?php else: ?>
            <?php include __DIR__ . '/../partials/alerts.php'; ?>
            <?= $content ?>
        <?php endif; ?>
    </div>
    
    <!-- Particle animation script -->
    <script>
        // Particle system with Three.js
        function initParticles() {
            const canvas = document.getElementById('particles-canvas');
            if (!canvas) return;
            
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true });
            
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setClearColor(0x000000, 0);
            
            // Create particles
            const particlesGeometry = new THREE.BufferGeometry();
            const particlesCount = 100;
            const posArray = new Float32Array(particlesCount * 3);
            
            for (let i = 0; i < particlesCount * 3; i++) {
                posArray[i] = (Math.random() - 0.5) * 10;
            }
            
            particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
            
            const particlesMaterial = new THREE.PointsMaterial({
                size: 0.02,
                color: 0x3b82f6,
                transparent: true,
                opacity: 0.6
            });
            
            const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
            scene.add(particlesMesh);
            
            camera.position.z = 3;
            
            // Animation
            function animate() {
                requestAnimationFrame(animate);
                particlesMesh.rotation.y += 0.001;
                particlesMesh.rotation.x += 0.0005;
                renderer.render(scene, camera);
            }
            
            animate();
            
            // Resize handler
            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });
        }
        
        // Initialize particles when page loads
        window.addEventListener('DOMContentLoaded', initParticles);
    </script>
    
    <script>
        // Fonctions globales définies immédiatement après le chargement d'app.js
        window.exportData = function() {
            if (window.ocManager) {
                window.ocManager.exportData();
            } else {
                console.error('ocManager not available for export');
            }
        };
        
        window.confirmDelete = function(message = 'Êtes-vous sûr de vouloir supprimer cet élément ?') {
            return confirm(message);
        };
        
        window.createOC = function(ocData) {
            if (window.ocManager) {
                return window.ocManager.createOC(ocData);
            }
            console.error('ocManager not available for createOC');
            return null;
        };
        
        window.createRace = function(raceData) {
            if (window.ocManager) {
                return window.ocManager.createRace(raceData);
            }
            console.error('ocManager not available for createRace');
            return null;
        };
        
        window.updateOC = function(id, updates) {
            if (window.ocManager) {
                return window.ocManager.updateOC(id, updates);
            }
            console.error('ocManager not available for updateOC');
            return null;
        };
        
        window.updateRace = function(id, updates) {
            if (window.ocManager) {
                return window.ocManager.updateRace(id, updates);
            }
            console.error('ocManager not available for updateRace');
            return null;
        };
        
        window.deleteOC = function(id) {
            if (window.ocManager) {
                return window.ocManager.deleteOC(id);
            }
            console.error('ocManager not available for deleteOC');
            return null;
        };
        
        window.deleteRace = function(id) {
            if (window.ocManager) {
                return window.ocManager.deleteRace(id);
            }
            console.error('ocManager not available for deleteRace');
            return null;
        };
        
        window.getOC = function(id) {
            if (window.ocManager) {
                return window.ocManager.getOC(id);
            }
            console.error('ocManager not available for getOC');
            return null;
        };
        
        window.getRace = function(id) {
            if (window.ocManager) {
                return window.ocManager.getRace(id);
            }
            console.error('ocManager not available for getRace');
            return null;
        };
        
        window.showNotification = function(message, type = 'info') {
            if (window.ocManager) {
                return window.ocManager.showNotification(message, type);
            } else {
                alert(message);
            }
        };
    </script>
    <?php if (isset($scripts)): ?>
        <?php foreach ($scripts as $script): ?>
            <script src="<?= $script ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>