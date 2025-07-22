<?php 
$title = 'Connexion Communauté - YOC';
ob_start(); 
?>

<div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full space-y-8 fade-in">
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full flex items-center justify-center mb-6">
                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Connexion à la communauté</h2>
            <p class="text-gray-600 mb-8">Connectez-vous pour partager et découvrir des créations</p>
        </div>
        
        <form method="POST" action="/community/login" class="mt-8 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-lg border">
                <div class="mb-6">
                    <label for="login" class="block text-sm font-medium text-gray-700 mb-2">
                        Nom d'utilisateur ou email
                    </label>
                    <input 
                        type="text" 
                        id="login" 
                        name="login" 
                        required 
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="Votre nom d'utilisateur ou email..."
                        autocomplete="username"
                    >
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Mot de passe
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="Votre mot de passe..."
                        autocomplete="current-password"
                    >
                </div>
                
                <button 
                    type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200"
                >
                    Se connecter
                </button>
            </div>
        </form>
        
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Pas encore de compte ? 
                <a href="/community/register" class="text-indigo-600 hover:text-indigo-800 font-medium">
                    Créer un compte
                </a>
            </p>
            <a href="/community" class="block mt-4 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                ← Retour à la communauté
            </a>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../../layouts/community.php';
?>