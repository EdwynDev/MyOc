<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Communauté - YOC</title>
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
        
        .error-list {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
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
        <div class="max-w-lg w-full space-y-8 fade-in">
            <!-- Header -->
            <div class="text-center">
                <div class="relative inline-block mb-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl flex items-center justify-center shadow-2xl border border-white/10 neon-glow hover-lift">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-white/20 to-white/10 rounded-3xl blur opacity-30 animate-pulse"></div>
                </div>
                <h2 class="text-4xl font-bold text-white mb-4 neon-text tracking-wide">Rejoindre la Communauté</h2>
                <p class="text-gray-400 mb-12 text-lg">Créez votre compte pour partager vos créations</p>
            </div>
            
            <!-- Erreurs -->
            <?php if (isset($_SESSION['errors'])): ?>
                <div class="error-list rounded-2xl p-6 mb-8 backdrop-blur-sm">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-red-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-red-400 font-medium mb-3">Erreurs de validation</h4>
                            <ul class="text-sm text-red-300 space-y-2">
                                <?php foreach ($_SESSION['errors'] as $error): ?>
                                    <li class="flex items-start">
                                        <span class="text-red-400 mr-2">•</span>
                                        <?= htmlspecialchars($error) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>
            
            <!-- Formulaire -->
            <form method="POST" action="/community/register" class="space-y-8">
                <div class="glass-dark rounded-3xl p-10 border border-white/10 hover-lift">
                    <div class="space-y-8">
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-300 mb-4 tracking-wider uppercase">
                                Nom d'utilisateur *
                            </label>
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                required 
                                minlength="3"
                                value="<?= htmlspecialchars($_SESSION['form_data']['username'] ?? '') ?>"
                                class="w-full px-6 py-4 bg-black/50 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-white/20 transition-all duration-300 backdrop-blur-sm"
                                placeholder="Votre nom d'utilisateur..."
                                autocomplete="username"
                            >
                            <p class="text-xs text-gray-500 mt-2">Au moins 3 caractères, sera visible publiquement</p>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-4 tracking-wider uppercase">
                                Adresse email *
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required 
                                value="<?= htmlspecialchars($_SESSION['form_data']['email'] ?? '') ?>"
                                class="w-full px-6 py-4 bg-black/50 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-white/20 transition-all duration-300 backdrop-blur-sm"
                                placeholder="votre@email.com"
                                autocomplete="email"
                            >
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-4 tracking-wider uppercase">
                                Mot de passe *
                            </label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required 
                                minlength="6"
                                class="w-full px-6 py-4 bg-black/50 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-white/20 transition-all duration-300 backdrop-blur-sm"
                                placeholder="Au moins 6 caractères..."
                                autocomplete="new-password"
                            >
                        </div>
                        
                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-gray-300 mb-4 tracking-wider uppercase">
                                Confirmer le mot de passe *
                            </label>
                            <input 
                                type="password" 
                                id="confirm_password" 
                                name="confirm_password" 
                                required 
                                class="w-full px-6 py-4 bg-black/50 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-white/20 transition-all duration-300 backdrop-blur-sm"
                                placeholder="Répétez votre mot de passe..."
                                autocomplete="new-password"
                            >
                        </div>
                        
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-300 mb-4 tracking-wider uppercase">
                                Bio (optionnel)
                            </label>
                            <textarea 
                                id="bio" 
                                name="bio" 
                                rows="4"
                                maxlength="500"
                                class="w-full px-6 py-4 bg-black/50 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-white/20 transition-all duration-300 backdrop-blur-sm resize-none"
                                placeholder="Parlez-nous de vous et de vos créations..."
                            ><?= htmlspecialchars($_SESSION['form_data']['bio'] ?? '') ?></textarea>
                            <p class="text-xs text-gray-500 mt-2">Maximum 500 caractères</p>
                        </div>
                        
                        <button 
                            type="submit" 
                            class="w-full py-4 px-6 btn-primary text-white rounded-2xl font-bold text-lg tracking-wide hover-lift"
                        >
                            <span class="relative z-10">CRÉER MON COMPTE</span>
                        </button>
                    </div>
                </div>
            </form>
            
            <!-- Info communauté -->
            <div class="glass rounded-2xl p-8 border border-green-500/20">
                <div class="flex items-start space-x-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-800 rounded-xl flex items-center justify-center flex-shrink-0 border border-white/10">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-white font-medium mb-2 tracking-wide">Communauté respectueuse</h4>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            En créant un compte, vous acceptez de respecter les autres membres et de partager du contenu approprié.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="text-center space-y-6">
                <p class="text-sm text-gray-400">
                    Déjà un compte ? 
                    <a href="/community/login" class="text-white hover:text-gray-300 font-medium transition-colors underline decoration-white/30 hover:decoration-white/60">
                        Se connecter
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
        
        // Validation en temps réel
        function setupValidation() {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');
            
            function validatePasswords() {
                if (confirmPassword.value && password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity('Les mots de passe ne correspondent pas');
                    confirmPassword.style.borderColor = 'rgba(239, 68, 68, 0.5)';
                } else {
                    confirmPassword.setCustomValidity('');
                    confirmPassword.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                }
            }
            
            password.addEventListener('input', validatePasswords);
            confirmPassword.addEventListener('input', validatePasswords);
        }
        
        // Initialize everything
        window.addEventListener('DOMContentLoaded', function() {
            initParticles();
            setupValidation();
        });
    </script>
</body>
</html>