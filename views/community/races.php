<?php 
$title = 'Galerie de Races - Communauté YOC';
ob_start(); 
?>

<div class="fade-in space-y-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-white neon-text mb-3">Galerie de Races</h1>
        <p class="text-gray-400 text-lg">Explorez les races créées par la communauté</p>
    </div>
    
    <!-- Filtres et recherche -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <form method="GET" class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-6 lg:space-y-0 lg:space-x-6">
            <div class="flex-1 max-w-md">
                <label for="search" class="sr-only">Rechercher</label>
                <div class="relative">
                    <input type="text" id="search" name="search" value="<?= htmlspecialchars($search ?? '') ?>" placeholder="Rechercher une race..." class="w-full pl-12 pr-4 py-4 bg-gray-900/50 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                    <svg class="absolute left-4 top-4 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <select name="sort" class="px-4 py-4 bg-gray-900/50 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                    <option value="recent" <?= ($sort ?? 'recent') === 'recent' ? 'selected' : '' ?>>Plus récentes</option>
                    <option value="popular" <?= ($sort ?? '') === 'popular' ? 'selected' : '' ?>>Plus populaires</option>
                    <option value="views" <?= ($sort ?? '') === 'views' ? 'selected' : '' ?>>Plus vues</option>
                    <option value="name" <?= ($sort ?? '') === 'name' ? 'selected' : '' ?>>Nom A-Z</option>
                </select>
                <button type="submit" class="px-6 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 btn-primary font-medium">
                    Filtrer
                </button>
            </div>
        </form>
    </div>
    
    <!-- Galerie de races -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="races-gallery">
        <?php if (empty($races)): ?>
            <div class="col-span-full text-center py-20">
                <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-2xl">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4 neon-text">Aucune race trouvée</h3>
                <p class="text-gray-400 mb-8 text-lg">
                    <?php if ($search ?? ''): ?>
                        Aucun résultat pour "<?= htmlspecialchars($search) ?>"
                    <?php else: ?>
                        Soyez le premier à partager votre création !
                    <?php endif; ?>
                </p>
                <?php if (isset($_SESSION['community_user_id'])): ?>
                    <a href="/community/publish-race" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl btn-primary text-lg font-medium">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Publier une race
                    </a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <?php foreach ($races as $race): ?>
                <div class="glass-dark rounded-2xl border border-gray-800 hover-lift card-hover overflow-hidden group">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-xl">
                                <?= strtoupper(substr($race['name'], 0, 1)) ?>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-xl font-bold text-white group-hover:text-green-400 transition-colors"><?= htmlspecialchars($race['name']) ?></h3>
                                <p class="text-gray-400">par <?= htmlspecialchars($race['username']) ?></p>
                            </div>
                        </div>
                        
                        <?php if ($race['type']): ?>
                            <p class="text-sm text-gray-300 mb-3">
                                <span class="text-gray-400">Type:</span> <?= htmlspecialchars($race['type']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php if ($race['origin']): ?>
                            <p class="text-sm text-gray-300 mb-3">
                                <span class="text-gray-400">Origine:</span> <?= htmlspecialchars($race['origin']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php if ($race['description']): ?>
                            <p class="text-sm text-gray-300 mb-6 line-clamp-3 leading-relaxed">
                                <?= htmlspecialchars($race['description']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php if (!empty($race['images'])): ?>
                            <?php $images = json_decode($race['images'], true) ?: []; ?>
                            <?php if (!empty($images)): ?>
                                <div class="mb-6">
                                    <div class="flex space-x-3 overflow-x-auto pb-2">
                                        <?php foreach (array_slice($images, 0, 3) as $image): ?>
                                            <img src="<?= htmlspecialchars($image['data']) ?>" 
                                                 alt="<?= htmlspecialchars($image['title'] ?? 'Image race') ?>" 
                                                 class="w-20 h-20 object-cover rounded-xl flex-shrink-0 border border-gray-700 hover:border-green-500 transition-colors"
                                                 onerror="this.style.display='none'" loading="lazy">
                                        <?php endforeach; ?>
                                        <?php if (count($images) > 3): ?>
                                            <div class="w-20 h-20 bg-gray-800 rounded-xl flex items-center justify-center text-xs text-gray-400 flex-shrink-0 border border-gray-700">
                                                +<?= count($images) - 3 ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-6 pt-4 border-t border-gray-800">
                            <span><?= date('d/m/Y', strtotime($race['created_at'])) ?></span>
                            <div class="flex items-center space-x-4">
                                <span>❤️ <?= $race['likes_count'] ?? 0 ?></span>
                                <span>👁️ <?= $race['views_count'] ?? 0 ?></span>
                            </div>
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="/community/race/<?= $race['id'] ?>" class="flex-1 text-center py-3 px-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 btn-primary font-medium">
                                Voir la race
                            </a>
                            <?php if (isset($_SESSION['community_user_id'])): ?>
                                <button class="like-btn px-4 py-3 glass border border-gray-700 text-gray-300 rounded-xl hover:border-green-500 hover:text-green-400 transition-all duration-300" 
                                        data-type="race" data-id="<?= $race['id'] ?>">
                                    <span class="like-icon">🤍</span>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <!-- Pagination -->
    <?php if (!empty($races) && count($races) >= 12): ?>
        <div class="flex justify-center">
            <div class="flex space-x-3">
                <?php if (($current_page ?? 1) > 1): ?>
                    <a href="?page=<?= ($current_page ?? 1) - 1 ?>&search=<?= urlencode($search ?? '') ?>&sort=<?= urlencode($sort ?? 'recent') ?>" 
                       class="px-6 py-3 glass border border-gray-700 text-white rounded-xl hover:border-green-500 transition-all duration-300">
                        Précédent
                    </a>
                <?php endif; ?>
                
                <span class="px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl font-medium">
                    Page <?= $current_page ?? 1 ?>
                </span>
                
                <a href="?page=<?= ($current_page ?? 1) + 1 ?>&search=<?= urlencode($search ?? '') ?>&sort=<?= urlencode($sort ?? 'recent') ?>" 
                   class="px-6 py-3 glass border border-gray-700 text-white rounded-xl hover:border-green-500 transition-all duration-300">
                    Suivant
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/community.php';
?>