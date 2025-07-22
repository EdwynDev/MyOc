<?php 
$title = 'Inscription Communauté - YOC';
ob_start(); 
?>

<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full space-y-8 fade-in">
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full flex items-center justify-center mb-6">
                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Rejoindre la communauté</h2>
            <p class="text-gray-600 mb-8">Créez votre compte pour partager vos créations</p>
        </div>
        
        <?php if (isset($_SESSION['errors'])): ?>
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <ul class="text-sm text-red-700 space-y-1">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <li>• <?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>
        
        <form method="POST" action="/community/register" class="mt-8 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-lg border space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                        Nom d'utilisateur *
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        required 
                        minlength="3"
                        value="<?= htmlspecialchars($_SESSION['form_data']['username'] ?? '') ?>"
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="Votre nom d'utilisateur..."
                        autocomplete="username"
                    >
                    <p class="text-xs text-gray-500 mt-1">Au moins 3 caractères, sera visible publiquement</p>
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Adresse email *
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required 
                        value="<?= htmlspecialchars($_SESSION['form_data']['email'] ?? '') ?>"
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="votre@email.com"
                        autocomplete="email"
                    >
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Mot de passe *
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        minlength="6"
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="Au moins 6 caractères..."
                        autocomplete="new-password"
                    >
                </div>
                
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">
                        Confirmer le mot de passe *
                    </label>
                    <input 
                        type="password" 
                        id="confirm_password" 
                        name="confirm_password" 
                        required 
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="Répétez votre mot de passe..."
                        autocomplete="new-password"
                    >
                </div>
                
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">
                        Bio (optionnel)
                    </label>
                    <textarea 
                        id="bio" 
                        name="bio" 
                        rows="3"
                        maxlength="500"
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="Parlez-nous de vous et de vos créations..."
                    ><?= htmlspecialchars($_SESSION['form_data']['bio'] ?? '') ?></textarea>
                    <p class="text-xs text-gray-500 mt-1">Maximum 500 caractères</p>
                </div>
                
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-blue-800">Communauté respectueuse</h3>
                            <p class="text-xs text-blue-700 mt-1">
                                En créant un compte, vous acceptez de respecter les autres membres et de partager du contenu approprié.
                            </p>
                        </div>
                    </div>
                </div>
                
                <button 
                    type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200"
                >
                    Créer mon compte
                </button>
            </div>
        </form>
        
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Déjà un compte ? 
                <a href="/community/login" class="text-indigo-600 hover:text-indigo-800 font-medium">
                    Se connecter
                </a>
            </p>
            <a href="/community" class="block mt-4 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                ← Retour à la communauté
            </a>
        </div>
    </div>
</div>

<script>
    // Validation en temps réel
    document.addEventListener('DOMContentLoaded', function() {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        
        function validatePasswords() {
            if (confirmPassword.value && password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity('Les mots de passe ne correspondent pas');
            } else {
                confirmPassword.setCustomValidity('');
            }
        }
        
        password.addEventListener('input', validatePasswords);
        confirmPassword.addEventListener('input', validatePasswords);
    });
</script>

<?php 
unset($_SESSION['form_data']);
$content = ob_get_clean();
include __DIR__ . '/../../layouts/community.php';
?>