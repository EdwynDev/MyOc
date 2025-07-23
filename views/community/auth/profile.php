<?php 
$title = 'Mon profil - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Mon profil communautaire</h1>
            <p class="text-gray-600">Gérez vos informations publiques</p>
        </div>
        
        <form method="POST" class="bg-white rounded-lg shadow-lg border p-8">
            <div class="space-y-6">
                <!-- Avatar et nom d'utilisateur -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4">
                        <?= strtoupper(substr($user['username'], 0, 1)) ?>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900"><?= htmlspecialchars($user['username']) ?></h2>
                    <p class="text-sm text-gray-500">Membre depuis <?= date('d/m/Y', strtotime($user['created_at'])) ?></p>
                </div>
                
                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">
                        Bio publique
                    </label>
                    <textarea 
                        id="bio" 
                        name="bio" 
                        rows="4"
                        maxlength="500"
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="Parlez-nous de vous et de vos créations..."
                    ><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
                    <p class="text-xs text-gray-500 mt-1">Maximum 500 caractères - Visible par tous les membres</p>
                </div>
                
                <!-- Avatar URL -->
                <div>
                    <label for="avatar" class="block text-sm font-medium text-gray-700 mb-2">
                        URL de l'avatar (optionnel)
                    </label>
                    <input 
                        type="url" 
                        id="avatar" 
                        name="avatar" 
                        value="<?= htmlspecialchars($user['avatar'] ?? '') ?>"
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="https://exemple.com/mon-avatar.jpg"
                    >
                    <p class="text-xs text-gray-500 mt-1">Laissez vide pour utiliser l'avatar par défaut avec vos initiales</p>
                </div>
                
                <!-- Informations de compte -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                    <h3 class="font-medium text-gray-900 mb-3">Informations de compte</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nom d'utilisateur :</span>
                            <span class="font-medium"><?= htmlspecialchars($user['username']) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Email :</span>
                            <span class="font-medium"><?= htmlspecialchars($user['email']) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Statut :</span>
                            <span class="font-medium text-green-600">Actif</span>
                        </div>
                        <?php if ($user['last_login']): ?>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Dernière connexion :</span>
                                <span class="font-medium"><?= date('d/m/Y à H:i', strtotime($user['last_login'])) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Statistiques -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h3 class="font-medium text-blue-900 mb-3">Vos contributions</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-indigo-600" id="user-ocs-count">0</div>
                            <div class="text-gray-600">OCs partagés</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600" id="user-races-count">0</div>
                            <div class="text-gray-600">Races partagées</div>
                        </div>
                    </div>
                </div>
                
                <!-- Boutons d'action -->
                <div class="flex justify-between pt-6">
                    <a href="/community" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                        Retour à la communauté
                    </a>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg">
                        Sauvegarder
                    </button>
                </div>
            </div>
        </form>
        
        <!-- Actions de compte -->
        <div class="mt-8 bg-white rounded-lg shadow-lg border p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Actions de compte</h2>
            
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                    <div>
                        <h3 class="font-medium text-gray-900">Changer de mot de passe</h3>
                        <p class="text-sm text-gray-600">Modifiez votre mot de passe de connexion</p>
                    </div>
                    <button class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        Modifier
                    </button>
                </div>
                
                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                    <div>
                        <h3 class="font-medium text-gray-900">Voir mon profil public</h3>
                        <p class="text-sm text-gray-600">Voir votre profil tel que les autres le voient</p>
                    </div>
                    <a href="/community/profile/<?= htmlspecialchars($user['username']) ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                        Voir
                    </a>
                </div>
                
                <div class="flex items-center justify-between p-4 border border-red-200 rounded-lg">
                    <div>
                        <h3 class="font-medium text-red-900">Supprimer le compte</h3>
                        <p class="text-sm text-red-600">Action irréversible - supprime toutes vos données</p>
                    </div>
                    <button onclick="confirmDeleteAccount()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        loadUserStats();
    });
    
    function loadUserStats() {
        // Simuler le chargement des statistiques utilisateur
        // En production, cela viendrait d'une API
        document.getElementById('user-ocs-count').textContent = '0';
        document.getElementById('user-races-count').textContent = '0';
    }
    
    function confirmDeleteAccount() {
        if (confirm('⚠️ ATTENTION ⚠️\n\nÊtes-vous sûr de vouloir supprimer votre compte communautaire ?\n\nCette action supprimera :\n- Votre profil\n- Tous vos OCs partagés\n- Toutes vos races partagées\n- Vos commentaires et likes\n\nCette action est IRRÉVERSIBLE.\n\nTapez "SUPPRIMER" pour confirmer :')) {
            const confirmation = prompt('Tapez "SUPPRIMER" en majuscules pour confirmer :');
            if (confirmation === 'SUPPRIMER') {
                // Ici on ajouterait l'appel API pour supprimer le compte
                alert('Fonctionnalité de suppression à implémenter côté serveur');
            }
        }
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/community.php';
?>