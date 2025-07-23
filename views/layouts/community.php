<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Communauté YOC' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Electrolize:wght@400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Electrolize', sans-serif; }
        .fade-in { animation: fadeIn 0.5s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .slide-in { animation: slideIn 0.3s ease-out; }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
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
<body class="h-full bg-gradient-to-br from-indigo-50 via-white to-cyan-50 font-electrolize">
    <div class="min-h-screen">
        <!-- Header communautaire -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <a href="/community" class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-sm mr-3">
                                YOC
                            </div>
                            <span class="text-xl font-bold text-gray-900">Communauté</span>
                        </a>
                        
                        <nav class="hidden md:flex ml-8 space-x-8">
                            <a href="/community" class="text-gray-700 hover:text-indigo-600 transition-colors">Accueil</a>
                            <a href="/community/ocs" class="text-gray-700 hover:text-indigo-600 transition-colors">OCs</a>
                            <a href="/community/races" class="text-gray-700 hover:text-indigo-600 transition-colors">Races</a>
                            <a href="/dashboard" class="text-gray-700 hover:text-indigo-600 transition-colors">Mon espace</a>
                        </nav>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <?php if (isset($_SESSION['community_user_id'])): ?>
                            <div class="flex items-center space-x-3">
                                <span class="text-sm text-gray-700">Bonjour, <?= $_SESSION['community_username'] ?></span>
                                <a href="/community/profile" class="text-sm text-indigo-600 hover:text-indigo-800">Profil</a>
                                <a href="/community/logout" class="text-sm text-red-600 hover:text-red-800">Déconnexion</a>
                            </div>
                        <?php else: ?>
                            <a href="/community/login" class="text-sm text-gray-700 hover:text-indigo-600">Connexion</a>
                            <a href="/community/register" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition-colors">
                                S'inscrire
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Contenu principal -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <?php include __DIR__ . '/../partials/alerts.php'; ?>
            <?= $content ?>
        </main>
        
        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8 mt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-bold mb-4">YOC Communauté</h3>
                        <p class="text-gray-300 text-sm">
                            Partagez vos Original Characters et découvrez les créations d'autres passionnés.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Liens utiles</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="/dashboard" class="text-gray-300 hover:text-white">Mon espace personnel</a></li>
                            <li><a href="/legal" class="text-gray-300 hover:text-white">Mentions légales</a></li>
                            <li><a href="/community" class="text-gray-300 hover:text-white">Accueil communauté</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Statistiques</h3>
                        <div class="text-sm text-gray-300">
                            <p>Créateurs actifs dans la communauté</p>
                            <p>Partage sécurisé et respectueux</p>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-400">
                    <p>&copy; 2025 YOC - Your Original Character. Plateforme de gestion et partage d'OCs.</p>
                </div>
            </div>
        </footer>
    </div>
    
    <script src="assets/js/app.js"></script>
    <script src="assets/js/community.js"></script>
</body>
</html>