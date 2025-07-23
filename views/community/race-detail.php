<?php 
$title = htmlspecialchars($race['name']) . ' - Race Fantasy par ' . htmlspecialchars($race['username']) . ' | YOC';
$description = 'Découvrez la race ' . htmlspecialchars($race['name']) . ($race['type'] ? ' (' . htmlspecialchars($race['type']) . ')' : '') . ' créée par ' . htmlspecialchars($race['username']) . '. ' . (isset($race['description']) ? substr(strip_tags($race['description']), 0, 150) . '...' : 'Explorez cette espèce unique sur YOC.');
$keywords = 'race ' . htmlspecialchars($race['name']) . ', fantasy race, ' . ($race['type'] ? htmlspecialchars($race['type']) . ', ' : '') . 'worldbuilding, ' . htmlspecialchars($race['username']);
$canonical = 'https://yoc.studio/community/race/' . $race['id'];
$og_title = htmlspecialchars($race['name']) . ' - Race Fantasy par ' . htmlspecialchars($race['username']);
$og_description = $description;
$robots = 'index, follow';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-6xl mx-auto">
        <!-- Header de la race -->
        <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between space-y-8 lg:space-y-0">
                <div class="flex items-center space-x-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-500 to-teal-600 rounded-3xl flex items-center justify-center text-white font-bold text-3xl shadow-2xl neon-glow">
                        <?= strtoupper(substr($race['name'], 0, 1)) ?>
                    </div>
                    <div>
                        <h1 class="text-5xl font-bold text-white neon-text mb-4"><?= htmlspecialchars($race['name']) ?></h1>
                        <div class="flex items-center space-x-6 text-lg text-gray-400">
                            <span>par <a href="/community/profile/<?= htmlspecialchars($race['username']) ?>" class="text-green-400 hover:text-green-300 font-medium transition-colors"><?= htmlspecialchars($race['username']) ?></a></span>
                            <span>•</span>
                            <span><?= date('d/m/Y', strtotime($race['created_at'])) ?></span>
                            <span>•</span>
                            <span class="flex items-center"><svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg><?= $race['views_count'] ?? 0 ?> vues</span>
                        </div>
                    </div>
                </div>
                
                <?php if (isset($_SESSION['community_user_id'])): ?>
                    <button class="like-btn glass rounded-2xl px-8 py-4 border border-gray-700 hover:border-green-500 transition-all duration-300 hover-lift" 
                            data-type="race" data-id="<?= $race['id'] ?>">
                        <div class="flex items-center space-x-3">
                            <span class="like-icon text-2xl">🤍</span>
                            <span class="like-count text-xl font-bold text-white"><?= $race['likes_count'] ?? 0 ?></span>
                        </div>
                    </button>
                <?php endif; ?>
            </div>
            
            <!-- Informations de base -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
                <?php if ($race['type']): ?>
                    <div class="glass rounded-2xl p-6 text-center hover-lift">
                        <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Type</h3>
                        <p class="text-white text-xl font-bold"><?= htmlspecialchars($race['type']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($race['origin']): ?>
                    <div class="glass rounded-2xl p-6 text-center hover-lift">
                        <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Origine</h3>
                        <p class="text-white text-xl font-bold"><?= htmlspecialchars($race['origin']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($race['lifespan']): ?>
                    <div class="glass rounded-2xl p-6 text-center hover-lift">
                        <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Espérance de vie</h3>
                        <p class="text-white text-xl font-bold"><?= htmlspecialchars($race['lifespan']) ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if ($race['language']): ?>
                    <div class="glass rounded-2xl p-6 text-center hover-lift">
                        <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Langue</h3>
                        <p class="text-white text-xl font-bold"><?= htmlspecialchars($race['language']) ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Description -->
            <?php if ($race['description']): ?>
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-white mb-6 neon-text">Description</h3>
                    <div class="glass rounded-2xl p-8">
                        <p class="text-gray-300 text-lg leading-relaxed"><?= nl2br(htmlspecialchars($race['description'])) ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Images -->
        <?php if (!empty($race['images'])): ?>
            <?php $images = json_decode($race['images'], true) ?: []; ?>
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
                                         alt="<?= htmlspecialchars($image['title'] ?? 'Image de ' . $race['name']) ?>" 
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
        
        <!-- Détails -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
            <!-- Apparence et caractéristiques -->
            <?php if ($race['appearance'] || $race['height'] || $race['weight']): ?>
                <div class="glass-dark rounded-3xl p-12 border border-gray-800">
                    <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                        <svg class="w-8 h-8 mr-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Caractéristiques physiques
                    </h2>
                    
                    <?php if ($race['appearance']): ?>
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-white mb-4">Apparence</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($race['appearance'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <?php if ($race['height']): ?>
                            <div class="glass rounded-2xl p-6 text-center">
                                <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Taille</h3>
                                <p class="text-white text-lg font-bold"><?= htmlspecialchars($race['height']) ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($race['weight']): ?>
                            <div class="glass rounded-2xl p-6 text-center">
                                <h3 class="font-bold text-gray-400 mb-2 text-sm uppercase tracking-wider">Poids</h3>
                                <p class="text-white text-lg font-bold"><?= htmlspecialchars($race['weight']) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Capacités -->
            <?php if ($race['abilities'] || $race['strengths'] || $race['weaknesses']): ?>
                <div class="glass-dark rounded-3xl p-12 border border-gray-800">
                    <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                        <svg class="w-8 h-8 mr-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Capacités raciales
                    </h2>
                    
                    <?php if ($race['abilities']): ?>
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-white mb-4">Capacités spéciales</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($race['abilities'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="grid grid-cols-1 gap-6">
                        <?php if ($race['strengths']): ?>
                            <div>
                                <h3 class="text-lg font-bold text-green-400 mb-4">Forces raciales</h3>
                                <div class="glass rounded-2xl p-6 border border-green-500/20">
                                    <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($race['strengths'])) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($race['weaknesses']): ?>
                            <div>
                                <h3 class="text-lg font-bold text-red-400 mb-4">Faiblesses raciales</h3>
                                <div class="glass rounded-2xl p-6 border border-red-500/20">
                                    <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($race['weaknesses'])) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Culture et société -->
        <?php if ($race['culture'] || $race['society'] || $race['religion'] || $race['habitat']): ?>
            <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
                <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                    <svg class="w-8 h-8 mr-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Culture et société
                </h2>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <?php if ($race['culture']): ?>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Culture</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($race['culture'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($race['society']): ?>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Organisation sociale</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($race['society'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($race['religion']): ?>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Religion</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($race['religion'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($race['habitat']): ?>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Habitat</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed"><?= nl2br(htmlspecialchars($race['habitat'])) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Commentaires -->
        <div class="bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl rounded-3xl border border-gray-700/50 p-12 mb-12 hover:border-gray-600/50 transition-all duration-500">
            <h2 class="text-3xl font-bold text-white mb-8 flex items-center">
                <svg class="w-8 h-8 mr-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                Commentaires (<?= count($comments) ?>)
            </h2>
            
            <?php if (isset($_SESSION['community_user_id'])): ?>
                <form class="comment-form mb-12 bg-gray-800/30 backdrop-blur-sm rounded-2xl p-8 border border-gray-700/30" data-type="race" data-item-id="<?= $race['id'] ?>">
                    <div class="flex space-x-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-xl border-2 border-white/10">
                            <?= strtoupper(substr($_SESSION['community_username'], 0, 1)) ?>
                        </div>
                        <div class="flex-1">
                            <div class="mb-4">
                                <span class="text-white font-medium"><?= htmlspecialchars($_SESSION['community_username']) ?></span>
                                <span class="text-gray-400 text-sm ml-2">Ajouter un commentaire</span>
                            </div>
                            <textarea name="content" rows="4" placeholder="Ajoutez un commentaire..." 
                                      class="w-full px-6 py-4 bg-gray-800/50 border border-gray-600/50 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm resize-none" required></textarea>
                            <input type="hidden" name="type" value="race">
                            <input type="hidden" name="item_id" value="<?= $race['id'] ?>">
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl font-bold relative overflow-hidden group">
                                    <span class="relative z-10 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </span>
                                    Publier le commentaire
                                    <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-teal-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
            
            <div class="comments-list space-y-6">
                <?php if (empty($comments)): ?>
                    <div class="text-center py-20">
                        <div class="w-24 h-24 bg-gray-800/50 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-8 border border-gray-700/30">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Aucun commentaire</h3>
                        <p class="text-gray-400 text-lg">Soyez le premier à commenter cette race !</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="bg-gray-800/30 backdrop-blur-sm rounded-2xl p-8 border border-gray-700/30 hover:border-gray-600/30 transition-all duration-300">
                            <div class="flex items-start space-x-6">
                                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold shadow-xl border-2 border-white/10 flex-shrink-0">
                                    <?= strtoupper(substr($comment['username'], 0, 1)) ?>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center space-x-4">
                                            <a href="/community/profile/<?= htmlspecialchars($comment['username']) ?>" class="font-bold text-white text-lg hover:text-green-400 transition-colors">
                                                <?= htmlspecialchars($comment['username']) ?>
                                            </a>
                                            <span class="text-gray-400 text-sm"><?= date('d/m/Y à H:i', strtotime($comment['created_at'])) ?></span>
                                        </div>
                                        <?php if (isset($_SESSION['community_user_id']) && $_SESSION['community_user_id'] == $comment['user_id']): ?>
                                            <button onclick="deleteComment('<?= $comment['id'] ?>', 'race')" class="text-red-400 hover:text-red-300 transition-colors p-2 rounded-lg hover:bg-red-900/20">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-gray-300 leading-relaxed text-lg"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Actions pour le propriétaire -->
        <?php if (isset($_SESSION['community_user_id']) && $_SESSION['community_user_id'] == $race['user_id']): ?>
            <div class="bg-gradient-to-br from-red-900/20 to-red-800/20 backdrop-blur-xl rounded-3xl border border-red-700/30 p-12 mb-12">
                <h2 class="text-3xl font-bold text-white mb-8 flex items-center">
                    <svg class="w-8 h-8 mr-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    Gestion de votre race
                </h2>
                <div class="flex flex-col sm:flex-row gap-6">
                    <button onclick="editCommunityRace('<?= $race['id'] ?>')" class="px-8 py-4 bg-green-600 text-white rounded-2xl hover:bg-green-700 transition-all duration-300 font-bold">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Modifier
                    </button>
                    <button onclick="deleteCommunityRace('<?= $race['id'] ?>')" class="px-8 py-4 bg-red-600 text-white rounded-2xl hover:bg-red-700 transition-all duration-300 font-bold">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Supprimer de la communauté
                    </button>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- OCs de cette race -->
        <?php if (!empty($ocs_of_race)): ?>
            <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
                <h2 class="text-3xl font-bold text-white mb-8 neon-text">OCs de race <?= htmlspecialchars($race['name']) ?></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($ocs_of_race as $oc): ?>
                        <a href="/community/oc/<?= $oc['id'] ?>" class="glass rounded-2xl p-6 hover-lift transition-all duration-300 border border-gray-800 hover:border-green-500/50 group">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold shadow-lg mr-4">
                                    <?= strtoupper(substr($oc['name'], 0, 1)) ?>
                                </div>
                                <div>
                                    <h3 class="font-bold text-white group-hover:text-green-400 transition-colors"><?= htmlspecialchars($oc['name']) ?></h3>
                                    <p class="text-gray-400 text-sm">par <?= htmlspecialchars($oc['username']) ?></p>
                                </div>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 space-x-4">
                                <span>❤️ <?= $oc['likes_count'] ?? 0 ?></span>
                                <span>👁️ <?= $oc['views_count'] ?? 0 ?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Navigation -->
        <div class="text-center">
            <a href="/community/races" class="inline-flex items-center px-8 py-4 glass border border-gray-700 text-white rounded-2xl hover:border-green-500 transition-all duration-300 hover-lift font-bold">
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