<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Communauté YOC - Partagez vos Original Characters' ?></title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?= $description ?? 'Rejoignez la communauté YOC ! Partagez vos Original Characters, découvrez les créations d\'autres artistes, échangez et inspirez-vous mutuellement.' ?>">
    <meta name="keywords" content="<?= $keywords ?? 'communauté OC, partage personnages, galerie OC, original characters community, character sharing, fantasy community' ?>">
    <meta name="author" content="YOC Studio">
    <meta name="robots" content="<?= $robots ?? 'index, follow' ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $canonical ?? 'https://myocverse.neopolyworks.fr' . $_SERVER['REQUEST_URI'] ?>">
    <meta property="og:title" content="<?= $og_title ?? $title ?? 'Communauté YOC - Partagez vos Original Characters' ?>">
    <meta property="og:description" content="<?= $og_description ?? $description ?? 'Découvrez et partagez des Original Characters incroyables dans la communauté YOC.' ?>">
    <meta property="og:image" content="<?= $og_image ?? 'https://myocverse.neopolyworks.fr/assets/images/community-og.jpg' ?>">
    <meta property="og:site_name" content="YOC Studio">
    <meta property="og:locale" content="fr_FR">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= $canonical ?? 'https://myocverse.neopolyworks.fr' . $_SERVER['REQUEST_URI'] ?>">
    <meta property="twitter:title" content="<?= $twitter_title ?? $og_title ?? $title ?>">
    <meta property="twitter:description" content="<?= $twitter_description ?? $og_description ?? $description ?>">
    <meta property="twitter:image" content="<?= $twitter_image ?? $og_image ?? 'https://myocverse.neopolyworks.fr/assets/images/community-og.jpg' ?>">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= $canonical ?? 'https://myocverse.neopolyworks.fr' . $_SERVER['REQUEST_URI'] ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Electrolize:wght@400&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
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
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Mobile menu */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .mobile-menu.open {
            transform: translateX(0);
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
    
    <!-- Préchargement des scripts -->
    <script src="../../assets/js/app.js"></script>
    
    <div class="min-h-screen relative">
        <!-- Header communautaire -->
        <header class="glass-dark backdrop-blur-xl border-b border-gray-800 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <div class="flex items-center">
                        <button id="mobile-menu-toggle" class="md:hidden mr-4 p-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-xl transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/community" class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold shadow-xl mr-4">
                                <span class="text-lg neon-text">YOC</span>
                            </div>
                            <div>
                                <span class="text-2xl font-bold text-white neon-text">Communauté</span>
                                <p class="text-xs text-gray-400">Partagez & Découvrez</p>
                            </div>
                        </a>
                        
                        <nav class="hidden md:flex ml-12 space-x-8">
                            <a href="/community" class="text-gray-300 hover:text-white transition-colors px-4 py-2 rounded-xl hover:bg-gray-800/50">Accueil</a>
                            <a href="/community/ocs" class="text-gray-300 hover:text-white transition-colors px-4 py-2 rounded-xl hover:bg-gray-800/50">OCs</a>
                            <a href="/community/races" class="text-gray-300 hover:text-white transition-colors px-4 py-2 rounded-xl hover:bg-gray-800/50">Races</a>
                            <a href="/dashboard" class="text-gray-300 hover:text-white transition-colors px-4 py-2 rounded-xl hover:bg-gray-800/50">Mon espace</a>
                        </nav>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <?php if (isset($_SESSION['community_user_id'])): ?>
                            <div class="hidden sm:flex items-center space-x-4 glass px-4 py-2 rounded-xl">
                                <?php if (!empty($user['avatar'])): ?>
                                    <img src="<?= htmlspecialchars($user['avatar']) ?>" 
                                         alt="Avatar" 
                                         class="w-8 h-8 rounded-lg object-cover shadow-lg border border-white/10"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center text-white font-bold text-sm" style="display: none;">
                                        <?= strtoupper(substr($_SESSION['community_username'], 0, 1)) ?>
                                    </div>
                                <?php else: ?>
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">
                                        <?= strtoupper(substr($_SESSION['community_username'], 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                                <span class="text-sm font-medium text-white"><?= $_SESSION['community_username'] ?></span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <a href="/community/profile" class="text-sm text-blue-400 hover:text-blue-300 transition-colors">Profil</a>
                                <a href="/community/logout" class="text-sm text-red-400 hover:text-red-300 transition-colors">Déconnexion</a>
                            </div>
                        <?php else: ?>
                            <a href="/community/login" class="text-sm text-gray-300 hover:text-white transition-colors">Connexion</a>
                            <a href="/community/register" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 btn-primary font-medium">
                                S'inscrire
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="md:hidden mobile-menu fixed inset-y-0 left-0 z-50 w-80 glass-dark backdrop-blur-xl border-r border-gray-800">
                <div class="flex flex-col h-full">
                    <div class="flex items-center justify-between p-6 border-b border-gray-800">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold mr-3">
                                YOC
                            </div>
                            <span class="text-lg font-bold text-white">Communauté</span>
                        </div>
                        <button id="mobile-menu-close" class="p-2 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <nav class="flex-1 p-6 space-y-3">
                        <a href="/community" class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-gray-800/50 rounded-xl transition-all duration-300">Accueil</a>
                        <a href="/community/ocs" class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-gray-800/50 rounded-xl transition-all duration-300">OCs</a>
                        <a href="/community/races" class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-gray-800/50 rounded-xl transition-all duration-300">Races</a>
                        <a href="/dashboard" class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-gray-800/50 rounded-xl transition-all duration-300">Mon espace</a>
                    </nav>
                </div>
            </div>
            <div id="mobile-menu-overlay" class="hidden fixed inset-0 bg-black bg-opacity-70 z-40 backdrop-blur-sm"></div>
        </header>
        
        <!-- Contenu principal -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <?php include __DIR__ . '/../partials/alerts.php'; ?>
            <?= $content ?>
        </main>
        
        <!-- Footer -->
        <footer class="glass-dark border-t border-gray-800 mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold mr-3">
                                YOC
                            </div>
                            <span class="text-xl font-bold text-white neon-text">Communauté</span>
                        </div>
                        <p class="text-gray-400 leading-relaxed">
                            Partagez vos Original Characters et découvrez les créations d'autres passionnés.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white mb-6">Liens utiles</h3>
                        <ul class="space-y-3">
                            <li><a href="/dashboard" class="text-gray-400 hover:text-white transition-colors">Mon espace personnel</a></li>
                            <li><a href="/legal" class="text-gray-400 hover:text-white transition-colors">Mentions légales</a></li>
                            <li><a href="/community" class="text-gray-400 hover:text-white transition-colors">Accueil communauté</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white mb-6">Statistiques</h3>
                        <div class="text-gray-400 space-y-2">
                            <p>Créateurs actifs dans la communauté</p>
                            <p>Partage sécurisé et respectueux</p>
                            <p>Interface moderne et responsive</p>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                    <p class="text-gray-500">&copy; 2025 YOC - Your Original Character. Plateforme de gestion et partage d'OCs.</p>
                </div>
            </div>
        </footer>
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
        
        // Mobile menu functionality
        function initMobileMenu() {
            const toggle = document.getElementById('mobile-menu-toggle');
            const close = document.getElementById('mobile-menu-close');
            const menu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-menu-overlay');
            
            function openMenu() {
                menu.classList.add('open');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
            
            function closeMenu() {
                menu.classList.remove('open');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
            
            toggle?.addEventListener('click', openMenu);
            close?.addEventListener('click', closeMenu);
            overlay?.addEventListener('click', closeMenu);
            
            // Close on escape
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && menu.classList.contains('open')) {
                    closeMenu();
                }
            });
        }
        
        // Initialize everything
        window.addEventListener('DOMContentLoaded', function() {
            initParticles();
            initMobileMenu();
        });
    </script>
    
    <script src="../../assets/js/community.js"></script>
</body>
</html>