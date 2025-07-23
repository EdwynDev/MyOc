<?php 
$title = 'Galerie de Races - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Galerie de Races</h1>
        <p class="text-gray-600">Explorez les races créées par la communauté</p>
    </div>
    
    <!-- Filtres et recherche -->
    <div class="bg-white p-6 rounded-lg shadow-lg border mb-8">
        <form method="GET" class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0 md:space-x-4">
            <div class="flex-1 max-w-md">
                <label for="search" class="sr-only">Rechercher</label>
                <div class="relative">
                    <input type="text" id="search" name="search" value="<?= htmlspecialchars($search ?? '') ?>" placeholder="Rechercher une race..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <select name="sort" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <option value="recent" <?= ($sort ?? 'recent') === 'recent' ? 'selected' : '' ?>>Plus récentes</option>
                    <option value="popular" <?= ($sort ?? '') === 'popular' ? 'selected' : '' ?>>Plus populaires</option>
                    <option value="views" <?= ($sort ?? '') === 'views' ? 'selected' : '' ?>>Plus vues</option>
                    <option value="name" <?= ($sort ?? '') === 'name' ? 'selected' : '' ?>>Nom A-Z</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    Filtrer
                </button>
            </div>
        </form>
    </div>
    
    <!-- Galerie de races -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="races-gallery">
        <?php if (empty($races)): ?>
            <div class="col-span-full text-center py-12">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune race trouvée</h3>
                <p class="text-gray-500 mb-6">
                    <?php if ($search ?? ''): ?>
                        Aucun résultat pour "<?= htmlspecialchars($search) ?>"
                    <?php else: ?>
                        Soyez le premier à partager votre création !
                    <?php endif; ?>
                </p>
                <?php if (isset($_SESSION['community_user_id'])): ?>
                    <a href="/community/publish-race" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Publier une race
                    </a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <?php foreach ($races as $race): ?>
                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold">
                                <?= strtoupper(substr($race['name'], 0, 1)) ?>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-bold text-gray-900"><?= htmlspecialchars($race['name']) ?></h3>
                                <p class="text-sm text-gray-500">par <?= htmlspecialchars($race['username']) ?></p>
                            </div>
                        </div>
                        
                        <?php if ($race['type']): ?>
                            <p class="text-sm text-gray-600 mb-2">
                                <span class="font-medium">Type:</span> <?= htmlspecialchars($race['type']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php if ($race['origin']): ?>
                            <p class="text-sm text-gray-600 mb-2">
                                <span class="font-medium">Origine:</span> <?= htmlspecialchars($race['origin']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php if ($race['description']): ?>
                            <p class="text-sm text-gray-600 mb-4 line-clamp-3">
                                <?= htmlspecialchars($race['description']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php if (!empty($race['images'])): ?>
                            <?php $images = json_decode($race['images'], true) ?: []; ?>
                            <?php if (!empty($images)): ?>
                                <div class="mb-4">
                                    <div class="flex space-x-2 overflow-x-auto">
                                        <?php foreach (array_slice($images, 0, 3) as $image): ?>
                                            <img src="<?= htmlspecialchars($image['data']) ?>" 
                                                 alt="<?= htmlspecialchars($image['title'] ?? 'Image race') ?>" 
                                                 class="w-16 h-16 object-cover rounded-lg flex-shrink-0 border border-gray-200"
                                                 onerror="this.style.display='none'" loading="lazy">
                                        <?php endforeach; ?>
                                        <?php if (count($images) > 3): ?>
                                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-xs text-gray-500 flex-shrink-0">
                                                +<?= count($images) - 3 ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                            <span><?= date('d/m/Y', strtotime($race['created_at'])) ?></span>
                            <div class="flex items-center space-x-4">
                                <span>❤️ <?= $race['likes_count'] ?? 0 ?></span>
                                <span>👁️ <?= $race['views_count'] ?? 0 ?></span>
                            </div>
                        </div>
                        
                        <div class="flex space-x-2">
                            <a href="/community/race/<?= $race['id'] ?>" class="flex-1 text-center py-2 px-3 bg-green-600 text-white text-sm rounded hover:bg-green-700 transition-colors">
                                Voir la race
                            </a>
                            <?php if (isset($_SESSION['community_user_id'])): ?>
                                <button class="like-btn px-3 py-2 border border-gray-300 text-gray-700 text-sm rounded hover:bg-gray-50 transition-colors" 
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
        <div class="mt-8 flex justify-center">
            <div class="flex space-x-2">
                <?php if (($current_page ?? 1) > 1): ?>
                    <a href="?page=<?= ($current_page ?? 1) - 1 ?>&search=<?= urlencode($search ?? '') ?>&sort=<?= urlencode($sort ?? 'recent') ?>" 
                       class="px-3 py-2 bg-white border border-gray-300 text-gray-700 rounded hover:bg-gray-50">
                        Précédent
                    </a>
                <?php endif; ?>
                
                <span class="px-3 py-2 bg-green-600 text-white rounded">
                    Page <?= $current_page ?? 1 ?>
                </span>
                
                <a href="?page=<?= ($current_page ?? 1) + 1 ?>&search=<?= urlencode($search ?? '') ?>&sort=<?= urlencode($sort ?? 'recent') ?>" 
                   class="px-3 py-2 bg-white border border-gray-300 text-gray-700 rounded hover:bg-gray-50">
                    Suivant
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>

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