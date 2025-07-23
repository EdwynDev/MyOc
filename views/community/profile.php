<?php 
$title = 'Profil de ' . htmlspecialchars($user['username']) . ' - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-6xl mx-auto">
        <!-- Header du profil -->
        <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between space-y-8 lg:space-y-0">
                <div class="flex items-center space-x-8">
                    <div class="w-32 h-32 bg-gradient-to-br from-purple-500 to-pink-600 rounded-3xl flex items-center justify-center text-white font-bold text-4xl shadow-2xl neon-glow">
                        <?= strtoupper(substr($user['username'], 0, 1)) ?>
                    </div>
                    <div>
                        <h1 class="text-5xl font-bold text-white neon-text mb-4"><?= htmlspecialchars($user['username']) ?></h1>
                        <div class="flex items-center space-x-6 text-lg text-gray-400 mb-6">
                            <span>Membre depuis <?= date('M Y', strtotime($user['created_at'])) ?></span>
                            <?php if ($user['last_login']): ?>
                                <span>•</span>
                                <span>Dernière connexion : <?= date('d/m/Y', strtotime($user['last_login'])) ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ($user['bio']): ?>
                            <div class="glass rounded-2xl p-6 max-w-2xl">
                                <p class="text-gray-300 text-lg leading-relaxed"><?= nl2br(htmlspecialchars($user['bio'])) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php if (isset($_SESSION['community_user_id']) && $_SESSION['community_user_id'] != $user['id']): ?>
                    <button class="follow-btn px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-2xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-xl font-bold hover-lift" 
                            data-user-id="<?= $user['id'] ?>">
                        Suivre
                    </button>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div class="glass-dark rounded-3xl p-8 text-center hover-lift border border-gray-800">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-blue-400 neon-text mb-2"><?= count($ocs) ?></div>
                <div class="text-gray-400 font-medium">OCs partagés</div>
            </div>
            <div class="glass-dark rounded-3xl p-8 text-center hover-lift border border-gray-800">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-green-400 neon-text mb-2"><?= count($races) ?></div>
                <div class="text-gray-400 font-medium">Races créées</div>
            </div>
            <div class="glass-dark rounded-3xl p-8 text-center hover-lift border border-gray-800">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-purple-400 neon-text mb-2 followers-count">0</div>
                <div class="text-gray-400 font-medium">Abonnés</div>
            </div>
            <div class="glass-dark rounded-3xl p-8 text-center hover-lift border border-gray-800">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-pink-400 neon-text mb-2"><?= count($collections) ?></div>
                <div class="text-gray-400 font-medium">Collections</div>
            </div>
        </div>
        
        <!-- Navigation des onglets -->
        <div class="glass-dark rounded-3xl border border-gray-800 mb-12">
            <div class="border-b border-gray-700">
                <nav class="flex space-x-12 px-12" aria-label="Tabs">
                    <button id="tab-ocs" class="tab-button active py-6 px-2 border-b-4 border-blue-500 font-bold text-lg text-blue-400 transition-all duration-300">
                        OCs (<?= count($ocs) ?>)
                    </button>
                    <button id="tab-races" class="tab-button py-6 px-2 border-b-4 border-transparent font-bold text-lg text-gray-500 hover:text-gray-300 hover:border-gray-500 transition-all duration-300">
                        Races (<?= count($races) ?>)
                    </button>
                    <button id="tab-collections" class="tab-button py-6 px-2 border-b-4 border-transparent font-bold text-lg text-gray-500 hover:text-gray-300 hover:border-gray-500 transition-all duration-300">
                        Collections (<?= count($collections) ?>)
                    </button>
                </nav>
            </div>
            
            <!-- Contenu OCs -->
            <div id="content-ocs" class="tab-content p-12">
                <?php if (empty($ocs)): ?>
                    <div class="text-center py-20">
                        <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl flex items-center justify-center mx-auto mb-8">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Aucun OC partagé</h3>
                        <p class="text-gray-400">Ce créateur n'a pas encore partagé d'OC</p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php foreach ($ocs as $oc): ?>
                            <div class="glass rounded-2xl hover-lift transition-all duration-300 border border-gray-800 hover:border-blue-500/50 overflow-hidden group">
                                <div class="p-8">
                                    <div class="flex items-center mb-6">
                                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-xl">
                                            <?= strtoupper(substr($oc['name'], 0, 1)) ?>
                                        </div>
                                        <div class="ml-6">
                                            <h3 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors"><?= htmlspecialchars($oc['name']) ?></h3>
                                            <p class="text-gray-400"><?= htmlspecialchars($oc['race'] ?? 'Race non définie') ?></p>
                                        </div>
                                    </div>
                                    
                                    <?php if ($oc['description']): ?>
                                        <p class="text-gray-300 mb-6 line-clamp-3 leading-relaxed"><?= htmlspecialchars($oc['description']) ?></p>
                                    <?php endif; ?>
                                    
                                    <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                        <span><?= date('d/m/Y', strtotime($oc['created_at'])) ?></span>
                                        <div class="flex items-center space-x-4">
                                            <span>❤️ <?= $oc['likes_count'] ?? 0 ?></span>
                                            <span>👁️ <?= $oc['views_count'] ?? 0 ?></span>
                                        </div>
                                    </div>
                                    
                                    <a href="/community/oc/<?= $oc['id'] ?>" class="block w-full text-center py-4 px-6 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl font-bold">
                                        Voir l'OC
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Contenu Races -->
            <div id="content-races" class="tab-content hidden p-12">
                <?php if (empty($races)): ?>
                    <div class="text-center py-20">
                        <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl flex items-center justify-center mx-auto mb-8">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Aucune race partagée</h3>
                        <p class="text-gray-400">Ce créateur n'a pas encore partagé de race</p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php foreach ($races as $race): ?>
                            <div class="glass rounded-2xl hover-lift transition-all duration-300 border border-gray-800 hover:border-green-500/50 overflow-hidden group">
                                <div class="p-8">
                                    <div class="flex items-center mb-6">
                                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-xl">
                                            <?= strtoupper(substr($race['name'], 0, 1)) ?>
                                        </div>
                                        <div class="ml-6">
                                            <h3 class="text-xl font-bold text-white group-hover:text-green-400 transition-colors"><?= htmlspecialchars($race['name']) ?></h3>
                                            <p class="text-gray-400"><?= htmlspecialchars($race['type'] ?? 'Type non défini') ?></p>
                                        </div>
                                    </div>
                                    
                                    <?php if ($race['description']): ?>
                                        <p class="text-gray-300 mb-6 line-clamp-3 leading-relaxed"><?= htmlspecialchars($race['description']) ?></p>
                                    <?php endif; ?>
                                    
                                    <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                        <span><?= date('d/m/Y', strtotime($race['created_at'])) ?></span>
                                        <div class="flex items-center space-x-4">
                                            <span>❤️ <?= $race['likes_count'] ?? 0 ?></span>
                                            <span>👁️ <?= $race['views_count'] ?? 0 ?></span>
                                        </div>
                                    </div>
                                    
                                    <a href="/community/race/<?= $race['id'] ?>" class="block w-full text-center py-4 px-6 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl font-bold">
                                        Voir la race
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Contenu Collections -->
            <div id="content-collections" class="tab-content hidden p-12">
                <?php if (empty($collections)): ?>
                    <div class="text-center py-20">
                        <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl flex items-center justify-center mx-auto mb-8">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Aucune collection publique</h3>
                        <p class="text-gray-400">Ce créateur n'a pas encore de collection publique</p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <?php foreach ($collections as $collection): ?>
                            <div class="glass rounded-2xl p-8 hover-lift border border-gray-800">
                                <h3 class="text-xl font-bold text-white mb-4"><?= htmlspecialchars($collection['name']) ?></h3>
                                <?php if ($collection['description']): ?>
                                    <p class="text-gray-300 mb-6 leading-relaxed"><?= htmlspecialchars($collection['description']) ?></p>
                                <?php endif; ?>
                                <div class="text-sm text-gray-500">
                                    Créée le <?= date('d/m/Y', strtotime($collection['created_at'])) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        setupTabs();
    });
    
    function setupTabs() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.id.replace('tab-', '');
                
                // Mettre à jour les boutons
                tabButtons.forEach(btn => {
                    btn.classList.remove('active', 'border-blue-500', 'text-blue-400');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });
                button.classList.add('active', 'border-blue-500', 'text-blue-400');
                button.classList.remove('border-transparent', 'text-gray-500');
                
                // Mettre à jour le contenu
                tabContents.forEach(content => content.classList.add('hidden'));
                document.getElementById(`content-${targetTab}`).classList.remove('hidden');
            });
        });
    }
</script>

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.neon-glow {
    box-shadow: 0 0 30px rgba(59, 130, 246, 0.3);
}
</style>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/community.php';
?>