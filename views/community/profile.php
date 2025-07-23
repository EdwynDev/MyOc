<?php 
$title = 'Profil de ' . htmlspecialchars($user['username']) . ' - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-4xl mx-auto">
        <!-- Header du profil -->
        <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
            <div class="flex items-start justify-between">
                <div class="flex items-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mr-6">
                        <?= strtoupper(substr($user['username'], 0, 1)) ?>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($user['username']) ?></h1>
                        <div class="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                            <span>Membre depuis <?= date('M Y', strtotime($user['created_at'])) ?></span>
                            <?php if ($user['last_login']): ?>
                                <span>•</span>
                                <span>Dernière connexion : <?= date('d/m/Y', strtotime($user['last_login'])) ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ($user['bio']): ?>
                            <p class="text-gray-700 leading-relaxed max-w-2xl"><?= nl2br(htmlspecialchars($user['bio'])) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php if (isset($_SESSION['community_user_id']) && $_SESSION['community_user_id'] != $user['id']): ?>
                    <button class="follow-btn px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors" 
                            data-user-id="<?= $user['id'] ?>">
                        Suivre
                    </button>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-indigo-600 mb-2"><?= count($ocs) ?></div>
                <div class="text-gray-600">OCs partagés</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-green-600 mb-2"><?= count($races) ?></div>
                <div class="text-gray-600">Races créées</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-purple-600 mb-2 followers-count">0</div>
                <div class="text-gray-600">Abonnés</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-pink-600 mb-2"><?= count($collections) ?></div>
                <div class="text-gray-600">Collections</div>
            </div>
        </div>
        
        <!-- Navigation des onglets -->
        <div class="bg-white rounded-lg shadow-lg border mb-8">
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8 px-6" aria-label="Tabs">
                    <button id="tab-ocs" class="tab-button active py-4 px-1 border-b-2 border-indigo-500 font-medium text-sm text-indigo-600">
                        OCs (<?= count($ocs) ?>)
                    </button>
                    <button id="tab-races" class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">
                        Races (<?= count($races) ?>)
                    </button>
                    <button id="tab-collections" class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">
                        Collections (<?= count($collections) ?>)
                    </button>
                </nav>
            </div>
            
            <!-- Contenu OCs -->
            <div id="content-ocs" class="tab-content p-6">
                <?php if (empty($ocs)): ?>
                    <div class="text-center py-12 text-gray-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <p>Aucun OC partagé</p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($ocs as $oc): ?>
                            <div class="bg-gray-50 rounded-lg hover:bg-gray-100 transition-all duration-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex items-center mb-4">
                                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                            <?= strtoupper(substr($oc['name'], 0, 1)) ?>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="font-bold text-gray-900"><?= htmlspecialchars($oc['name']) ?></h3>
                                            <p class="text-sm text-gray-500"><?= htmlspecialchars($oc['race'] ?? 'Race non définie') ?></p>
                                        </div>
                                    </div>
                                    
                                    <?php if ($oc['description']): ?>
                                        <p class="text-sm text-gray-600 mb-4 line-clamp-3"><?= htmlspecialchars($oc['description']) ?></p>
                                    <?php endif; ?>
                                    
                                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                        <span><?= date('d/m/Y', strtotime($oc['created_at'])) ?></span>
                                        <div class="flex items-center space-x-4">
                                            <span>❤️ <?= $oc['likes_count'] ?? 0 ?></span>
                                            <span>👁️ <?= $oc['views_count'] ?? 0 ?></span>
                                        </div>
                                    </div>
                                    
                                    <a href="/community/oc/<?= $oc['id'] ?>" class="block w-full text-center py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors">
                                        Voir l'OC
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Contenu Races -->
            <div id="content-races" class="tab-content hidden p-6">
                <?php if (empty($races)): ?>
                    <div class="text-center py-12 text-gray-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <p>Aucune race partagée</p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($races as $race): ?>
                            <div class="bg-gray-50 rounded-lg hover:bg-gray-100 transition-all duration-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex items-center mb-4">
                                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold">
                                            <?= strtoupper(substr($race['name'], 0, 1)) ?>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="font-bold text-gray-900"><?= htmlspecialchars($race['name']) ?></h3>
                                            <p class="text-sm text-gray-500"><?= htmlspecialchars($race['type'] ?? 'Type non défini') ?></p>
                                        </div>
                                    </div>
                                    
                                    <?php if ($race['description']): ?>
                                        <p class="text-sm text-gray-600 mb-4 line-clamp-3"><?= htmlspecialchars($race['description']) ?></p>
                                    <?php endif; ?>
                                    
                                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                        <span><?= date('d/m/Y', strtotime($race['created_at'])) ?></span>
                                        <div class="flex items-center space-x-4">
                                            <span>❤️ <?= $race['likes_count'] ?? 0 ?></span>
                                            <span>👁️ <?= $race['views_count'] ?? 0 ?></span>
                                        </div>
                                    </div>
                                    
                                    <a href="/community/race/<?= $race['id'] ?>" class="block w-full text-center py-2 px-4 bg-green-600 text-white rounded hover:bg-green-700 transition-colors">
                                        Voir la race
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Contenu Collections -->
            <div id="content-collections" class="tab-content hidden p-6">
                <?php if (empty($collections)): ?>
                    <div class="text-center py-12 text-gray-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <p>Aucune collection publique</p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($collections as $collection): ?>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h3 class="font-bold text-gray-900 mb-2"><?= htmlspecialchars($collection['name']) ?></h3>
                                <?php if ($collection['description']): ?>
                                    <p class="text-sm text-gray-600 mb-4"><?= htmlspecialchars($collection['description']) ?></p>
                                <?php endif; ?>
                                <div class="text-xs text-gray-500">
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
                    btn.classList.remove('active', 'border-indigo-500', 'text-indigo-600');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });
                button.classList.add('active', 'border-indigo-500', 'text-indigo-600');
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
</style>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/community.php';
?>