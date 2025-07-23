<?php 
$title = htmlspecialchars($race['name']) . ' - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-4xl mx-auto">
        <!-- Header de la race -->
        <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-6">
                        <?= strtoupper(substr($race['name'], 0, 1)) ?>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($race['name']) ?></h1>
                        <div class="flex items-center space-x-4 text-sm text-gray-600">
                            <span>par <a href="/community/profile/<?= htmlspecialchars($race['username']) ?>" class="text-green-600 hover:text-green-800 font-medium"><?= htmlspecialchars($race['username']) ?></a></span>
                            <span>•</span>
                            <span><?= date('d/m/Y', strtotime($race['created_at'])) ?></span>
                            <span>•</span>
                            <span>👁️ <?= $race['views_count'] ?? 0 ?> vues</span>
                        </div>
                    </div>
                </div>
                
                <?php if (isset($_SESSION['community_user_id'])): ?>
                    <button class="like-btn flex items-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" 
                            data-type="race" data-id="<?= $race['id'] ?>">
                        <span class="like-icon mr-2">🤍</span>
                        <span class="like-count"><?= $race['likes_count'] ?? 0 ?></span>
                    </button>
                <?php endif; ?>
            </div>
            
            <!-- Informations de base -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <?php if ($race['type']): ?>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Type</h3>
                        <p class="text-gray-700"><?= htmlspecialchars($race['type']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($race['origin']): ?>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Origine</h3>
                        <p class="text-gray-700"><?= htmlspecialchars($race['origin']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($race['lifespan']): ?>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Espérance de vie</h3>
                        <p class="text-gray-700"><?= htmlspecialchars($race['lifespan']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($race['language']): ?>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Langue</h3>
                        <p class="text-gray-700"><?= htmlspecialchars($race['language']) ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Description -->
            <?php if ($race['description']): ?>
                <div class="mb-6">
                    <h3 class="font-medium text-gray-900 mb-2">Description</h3>
                    <p class="text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($race['description'])) ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Images -->
        <?php if (!empty($race['images'])): ?>
            <?php $images = json_decode($race['images'], true) ?: []; ?>
            <?php if (!empty($images)): ?>
                <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Images</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($images as $image): ?>
                            <div class="space-y-2">
                                <img src="<?= htmlspecialchars($image['data']) ?>" 
                                     alt="<?= htmlspecialchars($image['title'] ?? 'Image de ' . $race['name']) ?>" 
                                     class="w-full h-48 object-cover rounded-lg border border-gray-200"
                                     onerror="this.parentElement.style.display='none'">
                                <?php if (!empty($image['title'])): ?>
                                    <h4 class="font-medium text-gray-900"><?= htmlspecialchars($image['title']) ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($image['description'])): ?>
                                    <p class="text-sm text-gray-600"><?= htmlspecialchars($image['description']) ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <!-- Détails -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Apparence et caractéristiques -->
            <?php if ($race['appearance'] || $race['height'] || $race['weight']): ?>
                <div class="bg-white rounded-lg shadow-lg border p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Caractéristiques physiques</h2>
                    
                    <?php if ($race['appearance']): ?>
                        <div class="mb-4">
                            <h3 class="font-medium text-gray-900 mb-2">Apparence</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($race['appearance'])) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <?php if ($race['height']): ?>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Taille</h3>
                                <p class="text-gray-700 text-sm"><?= htmlspecialchars($race['height']) ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($race['weight']): ?>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Poids</h3>
                                <p class="text-gray-700 text-sm"><?= htmlspecialchars($race['weight']) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Capacités -->
            <?php if ($race['abilities'] || $race['strengths'] || $race['weaknesses']): ?>
                <div class="bg-white rounded-lg shadow-lg border p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Capacités raciales</h2>
                    
                    <?php if ($race['abilities']): ?>
                        <div class="mb-4">
                            <h3 class="font-medium text-gray-900 mb-2">Capacités spéciales</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($race['abilities'])) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <div class="grid grid-cols-1 gap-4">
                        <?php if ($race['strengths']): ?>
                            <div>
                                <h3 class="font-medium text-green-700 mb-2">Forces raciales</h3>
                                <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($race['strengths'])) ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($race['weaknesses']): ?>
                            <div>
                                <h3 class="font-medium text-red-700 mb-2">Faiblesses raciales</h3>
                                <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($race['weaknesses'])) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Culture et société -->
        <?php if ($race['culture'] || $race['society'] || $race['religion'] || $race['habitat']): ?>
            <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Culture et société</h2>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <?php if ($race['culture']): ?>
                        <div>
                            <h3 class="font-medium text-gray-900 mb-2">Culture</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($race['culture'])) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($race['society']): ?>
                        <div>
                            <h3 class="font-medium text-gray-900 mb-2">Organisation sociale</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($race['society'])) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($race['religion']): ?>
                        <div>
                            <h3 class="font-medium text-gray-900 mb-2">Religion</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($race['religion'])) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($race['habitat']): ?>
                        <div>
                            <h3 class="font-medium text-gray-900 mb-2">Habitat</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($race['habitat'])) ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Commentaires -->
        <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Commentaires (<?= count($comments) ?>)</h2>
            
            <?php if (isset($_SESSION['community_user_id'])): ?>
                <form class="comment-form mb-8" data-type="race" data-item-id="<?= $race['id'] ?>">
                    <div class="flex space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                            <?= strtoupper(substr($_SESSION['community_username'], 0, 1)) ?>
                        </div>
                        <div class="flex-1">
                            <textarea name="content" rows="3" placeholder="Ajoutez un commentaire..." 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required></textarea>
                            <input type="hidden" name="type" value="race">
                            <input type="hidden" name="item_id" value="<?= $race['id'] ?>">
                            <div class="mt-2 flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                    Commenter
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
            
            <div class="comments-list space-y-4">
                <?php if (empty($comments)): ?>
                    <p class="text-gray-500 text-center py-8">Aucun commentaire pour le moment. Soyez le premier à commenter !</p>
                <?php else: ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                    <?= strtoupper(substr($comment['username'], 0, 1)) ?>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-1">
                                        <span class="font-medium text-gray-900"><?= htmlspecialchars($comment['username']) ?></span>
                                        <span class="text-xs text-gray-500"><?= date('d/m/Y à H:i', strtotime($comment['created_at'])) ?></span>
                                    </div>
                                    <p class="text-gray-700 text-sm"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- OCs de cette race -->
        <?php if (!empty($ocs_of_race)): ?>
            <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">OCs de race <?= htmlspecialchars($race['name']) ?></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($ocs_of_race as $oc): ?>
                        <a href="/community/oc/<?= $oc['id'] ?>" class="block bg-gray-50 rounded-lg hover:bg-gray-100 transition-all duration-200 p-4">
                            <div class="flex items-center mb-2">
                                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xs mr-3">
                                    <?= strtoupper(substr($oc['name'], 0, 1)) ?>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900 text-sm"><?= htmlspecialchars($oc['name']) ?></h3>
                                    <p class="text-xs text-gray-500">par <?= htmlspecialchars($oc['username']) ?></p>
                                </div>
                            </div>
                            <div class="flex items-center text-xs text-gray-500">
                                <span>❤️ <?= $oc['likes_count'] ?? 0 ?></span>
                                <span class="ml-4">👁️ <?= $oc['views_count'] ?? 0 ?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Navigation -->
        <div class="text-center">
            <a href="/community/races" class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour à la galerie
            </a>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/community.php';
?>