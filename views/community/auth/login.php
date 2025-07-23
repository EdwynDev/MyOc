<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Communauté - YOC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Electrolize:wght@400&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <style>
        body { 
            font-family: 'Electrolize', monospace; 
            background: #0f0f0f;
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        
        .glass-dark {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .fade-in { 
            animation: fadeIn 0.8s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(40px); } 
            to { opacity: 1; transform: translateY(0); } 
        }
        
        .hover-lift {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6);
        }
        
        .neon-text {
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }
        
        .neon-glow {
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.3);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #1f2937, #374151);
            border: 1px solid rgba(255, 255, 255, 0.1);
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }
        .btn-primary:hover::before {
            left: 100%;
        }
        .btn-primary:hover {
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        
        #particles-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.4;
        }
        
        input:focus, textarea:focus, select:focus {
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.1);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'electrolize': ['Electrolize', 'monospace'],
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full bg-black text-white font-electrolize overflow-x-hidden">
    <!-- Particle background -->
    <canvas id="particles-canvas"></canvas>
    
    <!-- Particules animées -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white/3 rounded-full blur-3xl animate-pulse"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center px-6 py-12 relative z-10">
        <div class="max-w-md w-full space-y-8 fade-in">
            <!-- Header -->
            <div class="text-center">
                <div class="relative inline-block mb-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl flex items-center justify-center shadow-2xl border border-white/10 neon-glow hover-lift">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-white/20 to-white/10 rounded-3xl blur opacity-30 animate-pulse"></div>
                </div>
                <h2 class="text-4xl font-bold text-white mb-4 neon-text tracking-wide">Connexion Communauté</h2>
                <p class="text-gray-400 mb-12 text-lg">Connectez-vous pour partager et découvrir des créations</p>
            </div>
            
            <!-- Formulaire -->
            <form method="POST" action="/community/login" class="space-y-8">
                <div class="glass-dark rounded-3xl p-10 border border-white/10 hover-lift">
                    <div class="space-y-8">
                        <div>
                            <label for="login" class="block text-sm font-medium text-gray-300 mb-4 tracking-wider uppercase">
                                Nom d'utilisateur ou email
                            </label>
                            <input 
                                type="text" 
                                id="login" 
                                name="login" 
                                required 
                                class="w-full px-6 py-4 bg-black/50 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-white/20 transition-all duration-300 backdrop-blur-sm"
                                placeholder="Votre nom d'utilisateur ou email..."
                                autocomplete="username"
                            >
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-4 tracking-wider uppercase">
                                Mot de passe
                            </label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required 
                                class="w-full px-6 py-4 bg-black/50 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-white/20 transition-all duration-300 backdrop-blur-sm"
                                placeholder="Votre mot de passe..."
                                autocomplete="current-password"
                            >
                        </div>
                        
                        <button 
                            type="submit" 
                            class="w-full py-4 px-6 btn-primary text-white rounded-2xl font-bold text-lg tracking-wide hover-lift"
                        >
                            <span class="relative z-10">SE CONNECTER</span>
                        </button>
                    </div>
                </div>
            </form>
            
            <!-- Info sécurité -->
            <div class="glass rounded-2xl p-8 border border-blue-500/20">
                <div class="flex items-start space-x-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-800 rounded-xl flex items-center justify-center flex-shrink-0 border border-white/10">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-white font-medium mb-2 tracking-wide">Données sécurisées</h4>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            Votre connexion est sécurisée. Partagez vos créations en toute confiance.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="text-center space-y-6">
                <p class="text-sm text-gray-400">
                    Pas encore de compte ? 
                    <a href="/community/register" class="text-white hover:text-gray-300 font-medium transition-colors underline decoration-white/30 hover:decoration-white/60">
                        Créer un compte
                    </a>
                </p>
                <a href="/community" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-400 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour à la communauté
                </a>
            </div>
        </div>
    </div>

    <!-- Particle animation script -->
    <script>
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
            const particlesCount = 150;
            const posArray = new Float32Array(particlesCount * 3);
            
            for (let i = 0; i < particlesCount * 3; i++) {
                posArray[i] = (Math.random() - 0.5) * 15;
            }
            
            particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
            
            const particlesMaterial = new THREE.PointsMaterial({
                size: 0.015,
                color: 0xffffff,
                transparent: true,
                opacity: 0.8
            });
            
            const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
            scene.add(particlesMesh);
            
            camera.position.z = 3;
            
            // Animation
            function animate() {
                requestAnimationFrame(animate);
                particlesMesh.rotation.y += 0.0008;
                particlesMesh.rotation.x += 0.0004;
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
</body>
</html>