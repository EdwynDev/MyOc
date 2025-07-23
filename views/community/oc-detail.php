<?php 
$title = htmlspecialchars($oc['name']) . ' - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-6xl mx-auto">
        <!-- Header de l'OC -->
        <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between space-y-8 lg:space-y-0">
                <div class="flex items-center space-x-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl flex items-center justify-center text-white font-bold text-3xl shadow-2xl neon-glow">
                        <?= strtoupper(substr($oc['name'], 0, 1)) ?>
                    </div>
                    <div>
                        <h1 class="text-5xl font-bold text-white neon-text mb-4"><?= htmlspecialchars($oc['name']) ?></h1>
                        <div class="flex items-center space-x-6 text-lg text-gray-400">
                            <span>par <a href="/community/profile/<?= htmlspecialchars($oc['username']) ?>" class="text-blue-400 hover:text-blue-300 font-medium transition-colors"><?= htmlspecialchars($oc['username']) ?></a></span>
                            <span>•</span>
                            <span><?= date('d/m/Y', strtotime($oc['created_at'])) ?></span>
                            <span>•</span>
                            <span class="flex items-center"><svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg><?= $oc['views_count'] ?? 0 ?> vues</span>
                        </div>
                    </div>
                </div>
                
                <?php if (isset($_SESSION['community_user_id'])): ?>
                    <button class="like-btn glass rounded-2xl px-8 py-4 border border-gray-700 hover:border-blue-500 transition-all duration-300 hover-lift" 
                            data-type="oc" data-id="<?= $oc['id'] ?>">
                        <div class="flex items-center space-x-3">
                            <span class="like-icon text-2xl">🤍</span>
                            <span class="like-count text-xl font-bold text-white"><?= $oc['likes_count'] ?? 0 ?></span>
                        </div>
                    </button>
                <?php endif; ?>
            </div>
            
            <!-- Informations de base -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
                <?php if ($oc['race']): ?>
                    <div class="glass rounded-2xl p-6 text-center hover-lift">
                        <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Race</h3>
                        <p class="text-white text-xl font-bold"><?= htmlspecialchars($oc['race']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($oc['age']): ?>
                    <div class="glass rounded-2xl p-6 text-center hover-lift">
                        <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Âge</h3>
                        <p class="text-white text-xl font-bold"><?= htmlspecialchars($oc['age']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($oc['gender']): ?>
                    <div class="glass rounded-2xl p-6 text-center hover-lift">
                        <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Genre</h3>
                        <p class="text-white text-xl font-bold"><?= htmlspecialchars($oc['gender']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($oc['occupation']): ?>
                    <div class="glass rounded-2xl p-6 text-center hover-lift">
                        <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Profession</h3>
                        <p class="text-white text-xl font-bold"><?= htmlspecialchars($oc['occupation']) ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Description -->
            <?php if ($oc['description']): ?>
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-white mb-6 neon-text">Description</h3>
                    <div class="glass rounded-2xl p-8">
                        <p class="text-gray-300 text-lg leading-relaxed"><?= nl2br(htmlspecialchars($oc['description'])) ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Images -->
        <?php if (!empty($oc['images'])): ?>
            <?php $images = json_decode($oc['images'], true) ?: []; ?>
            <?php if (!empty($images)): ?>
                <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
                    <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                        <svg class="w-8 h-8 mr-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Galerie
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php foreach ($images as $image): ?>
                            <div class="glass rounded-2xl overflow-hidden hover-lift group">
                                <div class="aspect-w-16 aspect-h-12">
                                    <img src="<?= htmlspecialchars($image['data']) ?>" 
                                         alt="<?= htmlspecialchars($image['title'] ?? 'Image de ' . $oc['name']) ?>" 
                                         class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500"
                                         onerror="this.parentElement.parentElement.style.display='none'">
                                </div>
                                <?php if (!empty($image['title']) || !empty($image['description'])): ?>
                                    <div class="p-6">
                                        <?php if (!empty($image['title'])): ?>
                                            <h4 class="font-bold text-white mb-2 text-lg"><?= htmlspecialchars($image['title']) ?></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($image['description'])): ?>
                                            <p class="text-gray-400 text-sm"><?= htmlspecialchars($image['description']) ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <!-- Détails supplémentaires -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
            <!-- Apparence et personnalité -->
            <?php if ($oc['appearance'] || $oc['personality']): ?>
                <div class="glass-dark rounded-3xl p-12 border border-gray-800">
                    <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                        <svg class="w-8 h-8 mr-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Caractéristiques
                    </h2>
                    
                    <?php if ($oc['appearance']): ?>
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-white mb-4">Apparence</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($oc['appearance'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($oc['personality']): ?>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Personnalité</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($oc['personality'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <!-- Capacités -->
            <?php if ($oc['abilities'] || $oc['skills'] || $oc['strengths'] || $oc['weaknesses']): ?>
                <div class="glass-dark rounded-3xl p-12 border border-gray-800">
                    <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                        <svg class="w-8 h-8 mr-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Capacités
                    </h2>
                    
                    <?php if ($oc['abilities']): ?>
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-white mb-4">Pouvoirs</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($oc['abilities'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($oc['skills']): ?>
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-white mb-4">Compétences</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($oc['skills'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php if ($oc['strengths']): ?>
                            <div>
                                <h3 class="text-lg font-bold text-green-400 mb-4">Forces</h3>
                                <div class="glass rounded-2xl p-6 border border-green-500/20">
                                    <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($oc['strengths'])) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($oc['weaknesses']): ?>
                            <div>
                                <h3 class="text-lg font-bold text-red-400 mb-4">Faiblesses</h3>
                                <div class="glass rounded-2xl p-6 border border-red-500/20">
                                    <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($oc['weaknesses'])) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Histoire et relations -->
        <?php if ($oc['backstory'] || $oc['relationships']): ?>
            <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
                <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                    <svg class="w-8 h-8 mr-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Histoire
                </h2>
                
                <?php if ($oc['backstory']): ?>
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-white mb-4">Histoire personnelle</h3>
                        <div class="glass rounded-2xl p-8">
                            <p class="text-gray-300 text-lg leading-relaxed"><?= nl2br(htmlspecialchars($oc['backstory'])) ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($oc['relationships']): ?>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Relations</h3>
                        <div class="glass rounded-2xl p-8">
                            <p class="text-gray-300 text-lg leading-relaxed"><?= nl2br(htmlspecialchars($oc['relationships'])) ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <!-- Commentaires -->
        <div class="glass-dark rounded-3xl p-12 border border-gray-800">
            <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                <svg class="w-8 h-8 mr-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                Commentaires (<?= count($comments) ?>)
            </h2>
            
            <?php if (isset($_SESSION['community_user_id'])): ?>
                <form class="comment-form mb-12" data-type="oc" data-item-id="<?= $oc['id'] ?>">
                    <div class="flex space-x-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-xl">
                            <?= strtoupper(substr($_SESSION['community_username'], 0, 1)) ?>
                        </div>
                        <div class="flex-1">
                            <textarea name="content" rows="4" placeholder="Ajoutez un commentaire..." 
                                      class="w-full px-6 py-4 bg-gray-900/50 border border-gray-700 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm resize-none" required></textarea>
                            <input type="hidden" name="type" value="oc">
                            <input type="hidden" name="item_id" value="<?= $oc['id'] ?>">
                            <div class="mt-4 flex justify-end">
                                <button type="submit" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl font-bold">
                                    Publier le commentaire
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
            
            <div class="comments-list space-y-6">
                <?php if (empty($comments)): ?>
                    <div class="text-center py-16">
                        <div class="w-20 h-20 bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Aucun commentaire</h3>
                        <p class="text-gray-400">Soyez le premier à commenter cet OC !</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="glass rounded-2xl p-8 hover-lift">
                            <div class="flex items-start space-x-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold shadow-lg">
                                    <?= strtoupper(substr($comment['username'], 0, 1)) ?>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center space-x-4 mb-3">
                                        <span class="font-bold text-white text-lg"><?= htmlspecialchars($comment['username']) ?></span>
                                        <span class="text-gray-400 text-sm"><?= date('d/m/Y à H:i', strtotime($comment['created_at'])) ?></span>
                                    </div>
                                    <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- OCs liés -->
        <?php if (!empty($related_ocs)): ?>
            <div class="mt-12">
                <h2 class="text-3xl font-bold text-white mb-8 neon-text">Autres OCs de race <?= htmlspecialchars($oc['race']) ?></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($related_ocs as $related): ?>
                        <a href="/community/oc/<?= $related['id'] ?>" class="glass rounded-2xl p-6 hover-lift transition-all duration-300 border border-gray-800 hover:border-blue-500/50 group">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold shadow-lg mr-4">
                                    <?= strtoupper(substr($related['name'], 0, 1)) ?>
                                </div>
                                <div>
                                    <h3 class="font-bold text-white group-hover:text-blue-400 transition-colors"><?= htmlspecialchars($related['name']) ?></h3>
                                    <p class="text-gray-400 text-sm">par <?= htmlspecialchars($related['username']) ?></p>
                                </div>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 space-x-4">
                                <span>❤️ <?= $related['likes_count'] ?? 0 ?></span>
                                <span>👁️ <?= $related['views_count'] ?? 0 ?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Navigation -->
        <div class="mt-16 text-center">
            <a href="/community/ocs" class="inline-flex items-center px-8 py-4 glass border border-gray-700 text-white rounded-2xl hover:border-blue-500 transition-all duration-300 hover-lift font-bold">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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