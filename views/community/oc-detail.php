<?php 
$title = htmlspecialchars($oc['name']) . ' - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-4xl mx-auto">
        <!-- Header de l'OC -->
        <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-6">
                        <?= strtoupper(substr($oc['name'], 0, 1)) ?>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($oc['name']) ?></h1>
                        <div class="flex items-center space-x-4 text-sm text-gray-600">
                            <span>par <a href="/community/profile/<?= htmlspecialchars($oc['username']) ?>" class="text-indigo-600 hover:text-indigo-800 font-medium"><?= htmlspecialchars($oc['username']) ?></a></span>
                            <span>•</span>
                            <span><?= date('d/m/Y', strtotime($oc['created_at'])) ?></span>
                            <span>•</span>
                            <span>👁️ <?= $oc['views_count'] ?? 0 ?> vues</span>
                        </div>
                    </div>
                </div>
                
                <?php if (isset($_SESSION['community_user_id'])): ?>
                    <button class="like-btn flex items-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" 
                            data-type="oc" data-id="<?= $oc['id'] ?>">
                        <span class="like-icon mr-2">🤍</span>
                        <span class="like-count"><?= $oc['likes_count'] ?? 0 ?></span>
                    </button>
                <?php endif; ?>
            </div>
            
            <!-- Informations de base -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <?php if ($oc['race']): ?>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Race</h3>
                        <p class="text-gray-700"><?= htmlspecialchars($oc['race']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($oc['age']): ?>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Âge</h3>
                        <p class="text-gray-700"><?= htmlspecialchars($oc['age']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($oc['gender']): ?>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Genre</h3>
                        <p class="text-gray-700"><?= htmlspecialchars($oc['gender']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($oc['occupation']): ?>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Profession</h3>
                        <p class="text-gray-700"><?= htmlspecialchars($oc['occupation']) ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Description -->
            <?php if ($oc['description']): ?>
                <div class="mb-6">
                    <h3 class="font-medium text-gray-900 mb-2">Description</h3>
                    <p class="text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($oc['description'])) ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Images -->
        <?php if (!empty($oc['images'])): ?>
            <?php $images = json_decode($oc['images'], true) ?: []; ?>
            <?php if (!empty($images)): ?>
                <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Images</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($images as $image): ?>
                            <div class="space-y-2">
                                <img src="<?= htmlspecialchars($image['data']) ?>" 
                                     alt="<?= htmlspecialchars($image['title'] ?? 'Image de ' . $oc['name']) ?>" 
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
        
        <!-- Détails supplémentaires -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Apparence et personnalité -->
            <?php if ($oc['appearance'] || $oc['personality']): ?>
                <div class="bg-white rounded-lg shadow-lg border p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Caractéristiques</h2>
                    
                    <?php if ($oc['appearance']): ?>
                        <div class="mb-4">
                            <h3 class="font-medium text-gray-900 mb-2">Apparence</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($oc['appearance'])) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($oc['personality']): ?>
                        <div>
                            <h3 class="font-medium text-gray-900 mb-2">Personnalité</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($oc['personality'])) ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <!-- Capacités -->
            <?php if ($oc['abilities'] || $oc['skills'] || $oc['strengths'] || $oc['weaknesses']): ?>
                <div class="bg-white rounded-lg shadow-lg border p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Capacités</h2>
                    
                    <?php if ($oc['abilities']): ?>
                        <div class="mb-4">
                            <h3 class="font-medium text-gray-900 mb-2">Pouvoirs</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($oc['abilities'])) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($oc['skills']): ?>
                        <div class="mb-4">
                            <h3 class="font-medium text-gray-900 mb-2">Compétences</h3>
                            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($oc['skills'])) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php if ($oc['strengths']): ?>
                            <div>
                                <h3 class="font-medium text-green-700 mb-2">Forces</h3>
                                <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($oc['strengths'])) ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($oc['weaknesses']): ?>
                            <div>
                                <h3 class="font-medium text-red-700 mb-2">Faiblesses</h3>
                                <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($oc['weaknesses'])) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Histoire et relations -->
        <?php if ($oc['backstory'] || $oc['relationships']): ?>
            <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Histoire</h2>
                
                <?php if ($oc['backstory']): ?>
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-900 mb-2">Histoire personnelle</h3>
                        <p class="text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($oc['backstory'])) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($oc['relationships']): ?>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-2">Relations</h3>
                        <p class="text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($oc['relationships'])) ?></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <!-- Commentaires -->
        <div class="bg-white rounded-lg shadow-lg border p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Commentaires (<?= count($comments) ?>)</h2>
            
            <?php if (isset($_SESSION['community_user_id'])): ?>
                <form class="comment-form mb-8" data-type="oc" data-item-id="<?= $oc['id'] ?>">
                    <div class="flex space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                            <?= strtoupper(substr($_SESSION['community_username'], 0, 1)) ?>
                        </div>
                        <div class="flex-1">
                            <textarea name="content" rows="3" placeholder="Ajoutez un commentaire..." 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
                            <input type="hidden" name="type" value="oc">
                            <input type="hidden" name="item_id" value="<?= $oc['id'] ?>">
                            <div class="mt-2 flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
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
                                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
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
        
        <!-- OCs liés -->
        <?php if (!empty($related_ocs)): ?>
            <div class="mt-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Autres OCs de race <?= htmlspecialchars($oc['race']) ?></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php foreach ($related_ocs as $related): ?>
                        <a href="/community/oc/<?= $related['id'] ?>" class="block bg-white rounded-lg shadow border hover:shadow-lg transition-all duration-200 p-4">
                            <div class="flex items-center mb-2">
                                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xs mr-3">
                                    <?= strtoupper(substr($related['name'], 0, 1)) ?>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900 text-sm"><?= htmlspecialchars($related['name']) ?></h3>
                                    <p class="text-xs text-gray-500">par <?= htmlspecialchars($related['username']) ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Navigation -->
        <div class="mt-8 text-center">
            <a href="/community/ocs" class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
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