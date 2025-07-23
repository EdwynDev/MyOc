<?php 
$title = 'Mon Profil Communautaire - Gestion compte | YOC Studio';
$description = 'Gérez votre profil communautaire YOC. Modifiez vos informations, consultez vos statistiques et configurez vos préférences de partage.';
$keywords = 'mon profil, gestion compte, paramètres communauté, profil utilisateur, YOC account';
$robots = 'noindex, nofollow';
ob_start(); 
?>

<div class="min-h-screen bg-black text-white font-electrolize">
    <!-- Particules animées -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-500/5 rounded-full blur-3xl animate-pulse"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 py-12">
        <!-- Header du profil -->
        <div class="bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl rounded-3xl border border-gray-700/50 p-12 mb-12 hover:border-gray-600/50 transition-all duration-500">
            <div class="text-center mb-12">
                <div class="relative inline-block mb-8">
                    <?php if (!empty($user['avatar'])): ?>
                        <img src="<?= htmlspecialchars($user['avatar']) ?>" 
                             alt="Avatar de <?= htmlspecialchars($user['username']) ?>" 
                             class="w-32 h-32 rounded-full object-cover shadow-2xl border-4 border-white/10"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-4xl shadow-2xl border-4 border-white/10" style="display: none;">
                            <?= strtoupper(substr($user['username'], 0, 1)) ?>
                        </div>
                    <?php else: ?>
                        <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-4xl shadow-2xl border-4 border-white/10">
                            <?= strtoupper(substr($user['username'], 0, 1)) ?>
                        </div>
                    <?php endif; ?>
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full blur opacity-30 animate-pulse"></div>
                </div>
                <h1 class="text-4xl font-bold text-white mb-4 tracking-wide"><?= htmlspecialchars($user['username']) ?></h1>
                <p class="text-gray-400 text-lg">Membre depuis <?= date('d/m/Y', strtotime($user['created_at'])) ?></p>
                <?php if ($user['last_login']): ?>
                    <p class="text-gray-500 text-sm mt-2">Dernière connexion : <?= date('d/m/Y à H:i', strtotime($user['last_login'])) ?></p>
                <?php endif; ?>
            </div>

            <!-- Statistiques -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 text-center border border-gray-700/30 hover:border-blue-500/30 transition-all duration-300">
                    <div class="text-3xl font-bold text-blue-400 mb-2" id="user-ocs-count">0</div>
                    <div class="text-gray-400 text-sm">OCs partagés</div>
                </div>
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 text-center border border-gray-700/30 hover:border-green-500/30 transition-all duration-300">
                    <div class="text-3xl font-bold text-green-400 mb-2" id="user-races-count">0</div>
                    <div class="text-gray-400 text-sm">Races partagées</div>
                </div>
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 text-center border border-gray-700/30 hover:border-purple-500/30 transition-all duration-300">
                    <div class="text-3xl font-bold text-purple-400 mb-2" id="user-likes-count">0</div>
                    <div class="text-gray-400 text-sm">Likes reçus</div>
                </div>
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 text-center border border-gray-700/30 hover:border-pink-500/30 transition-all duration-300">
                    <div class="text-3xl font-bold text-pink-400 mb-2" id="user-views-count">0</div>
                    <div class="text-gray-400 text-sm">Vues totales</div>
                </div>
            </div>
        </div>

        <!-- Formulaire de profil -->
        <form method="POST" class="bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl rounded-3xl border border-gray-700/50 p-12 hover:border-gray-600/50 transition-all duration-500">
            <h2 class="text-3xl font-bold text-white mb-8 flex items-center">
                <svg class="w-8 h-8 mr-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Modifier mon profil
            </h2>

            <div class="space-y-8">
                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-lg font-medium text-white mb-4">
                        Bio publique
                    </label>
                    <textarea 
                        id="bio" 
                        name="bio" 
                        rows="6"
                        maxlength="500"
                        class="w-full px-6 py-4 bg-gray-800/50 border border-gray-600/50 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm resize-none"
                        placeholder="Parlez-nous de vous et de vos créations..."
                    ><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
                    <p class="text-gray-500 text-sm mt-2">Maximum 500 caractères - Visible par tous les membres</p>
                </div>

                <!-- Avatar URL -->
                <div>
                    <label for="avatar" class="block text-lg font-medium text-white mb-4">
                        URL de l'avatar (optionnel)
                    </label>
                    <input 
                        type="url" 
                        id="avatar" 
                        name="avatar" 
                        value="<?= htmlspecialchars($user['avatar'] ?? '') ?>"
                        class="w-full px-6 py-4 bg-gray-800/50 border border-gray-600/50 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm"
                        placeholder="https://exemple.com/mon-avatar.jpg"
                    >
                    <p class="text-gray-500 text-sm mt-2">Laissez vide pour utiliser l'avatar par défaut avec vos initiales</p>
                </div>

                <!-- Informations de compte -->
                <div class="bg-gray-800/30 backdrop-blur-sm rounded-2xl p-8 border border-gray-700/30">
                    <h3 class="text-xl font-bold text-white mb-6">Informations de compte</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Nom d'utilisateur :</span>
                            <span class="font-medium text-white"><?= htmlspecialchars($user['username']) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Email :</span>
                            <span class="font-medium text-white"><?= htmlspecialchars($user['email']) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Statut :</span>
                            <span class="font-medium text-green-400">Actif</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Membre depuis :</span>
                            <span class="font-medium text-white"><?= date('d/m/Y', strtotime($user['created_at'])) ?></span>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row justify-between gap-6 pt-8">
                    <a href="/community" class="px-8 py-4 bg-gray-700/50 border border-gray-600/50 text-white rounded-2xl hover:bg-gray-600/50 hover:border-gray-500/50 transition-all duration-300 text-center font-medium backdrop-blur-sm">
                        Retour à la communauté
                    </a>
                    <button type="submit" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl font-bold relative overflow-hidden group">
                        <span class="relative z-10">Sauvegarder les modifications</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </button>
                </div>
            </div>
        </form>

        <!-- Actions de compte -->
        <div class="mt-12 bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl rounded-3xl border border-gray-700/50 p-12 hover:border-gray-600/50 transition-all duration-500">
            <h2 class="text-3xl font-bold text-white mb-8 flex items-center">
                <svg class="w-8 h-8 mr-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                Actions de compte
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-800/30 backdrop-blur-sm rounded-2xl p-8 border border-gray-700/30 hover:border-blue-500/30 transition-all duration-300">
                    <h3 class="text-xl font-bold text-white mb-4">Voir mon profil public</h3>
                    <p class="text-gray-400 mb-6">Voir votre profil tel que les autres le voient</p>
                    <a href="/community/profile/<?= htmlspecialchars($user['username']) ?>" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-300 font-medium">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Voir mon profil
                    </a>
                </div>

                <div class="bg-gray-800/30 backdrop-blur-sm rounded-2xl p-8 border border-red-700/30 hover:border-red-500/30 transition-all duration-300">
                    <h3 class="text-xl font-bold text-red-400 mb-4">Supprimer le compte</h3>
                    <p class="text-gray-400 mb-6">Action irréversible - supprime toutes vos données</p>
                    <button onclick="confirmDeleteAccount()" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all duration-300 font-medium">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal d'affichage d'image -->
<div id="image-modal" class="fixed inset-0 bg-black/90 backdrop-blur-sm z-50 hidden flex items-center justify-center p-6">
    <div class="relative max-w-4xl max-h-full">
        <button onclick="closeImageModal()" class="absolute -top-4 -right-4 w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300 z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modal-image" src="" alt="" class="max-w-full max-h-full object-contain rounded-2xl shadow-2xl">
        <div id="modal-caption" class="absolute bottom-0 left-0 right-0 bg-black/70 backdrop-blur-sm text-white p-6 rounded-b-2xl"></div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        loadUserStats();
        setupImageModal();
    });
    
    function loadUserStats() {
        // Simuler le chargement des statistiques utilisateur
        // En production, cela viendrait d'une API
        animateCounter('user-ocs-count', 0);
        animateCounter('user-races-count', 0);
        animateCounter('user-likes-count', 0);
        animateCounter('user-views-count', 0);
    }
    
    function animateCounter(elementId, targetValue) {
        const element = document.getElementById(elementId);
        const duration = 2000;
        const startTime = performance.now();
        
        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const currentValue = Math.floor(progress * targetValue);
            
            element.textContent = currentValue;
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        }
        
        requestAnimationFrame(updateCounter);
    }
    
    function setupImageModal() {
        document.addEventListener('click', function(e) {
            if (e.target.matches('.modal-image')) {
                openImageModal(e.target.src, e.target.alt, e.target.dataset.caption || '');
            }
        });
    }
    
    function openImageModal(src, alt, caption) {
        const modal = document.getElementById('image-modal');
        const image = document.getElementById('modal-image');
        const captionEl = document.getElementById('modal-caption');
        
        image.src = src;
        image.alt = alt;
        captionEl.textContent = caption;
        
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeImageModal() {
        const modal = document.getElementById('image-modal');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
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
    
    // Fermer le modal avec Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../../layouts/community.php';
?>