<?php 
$title = 'Communauté YOC - Partagez et découvrez des Original Characters';
$description = 'Rejoignez la communauté YOC ! Partagez vos Original Characters, découvrez les créations d\'autres artistes, échangez conseils et inspirations dans un environnement bienveillant.';
$keywords = 'communauté OC, partage original characters, galerie personnages, community fantasy, character sharing, inspiration OC';
$canonical = 'https://myocverse.neopolyworks.fr/community';
$og_title = 'Communauté YOC - La plus grande galerie d\'Original Characters';
$og_description = 'Découvrez des milliers d\'Original Characters créés par une communauté passionnée. Partagez vos créations et inspirez-vous !';
ob_start(); 
?>

<div class="fade-in space-y-12">
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="glass-dark rounded-3xl p-12 lg:p-16 border border-gray-800">
            <div class="relative z-10 text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-white neon-text mb-6">Bienvenue dans la Communauté YOC</h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed">
                    Partagez vos Original Characters et découvrez les créations d'autres passionnés
                </p>
                
                <?php if (!isset($_SESSION['community_user_id'])): ?>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center max-w-md mx-auto">
                        <a href="/community/register" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl btn-primary font-bold text-lg">
                            Rejoindre
                        </a>
                        <a href="/community/login" class="px-8 py-4 glass border border-gray-600 text-white rounded-2xl hover:border-blue-500 transition-all duration-300 font-bold text-lg">
                            Se connecter
                        </a>
                    </div>
                <?php else: ?>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center max-w-md mx-auto">
                        <a href="/community/publish-oc" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl btn-primary font-bold text-lg">
                            Publier un OC
                        </a>
                        <a href="/community/publish-race" class="px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl btn-primary font-bold text-lg">
                            Publier une race
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="glass-dark rounded-2xl p-8 text-center hover-lift border border-gray-800">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div id="total-ocs" class="text-3xl font-bold text-blue-400 neon-text mb-2">0</div>
            <div class="text-gray-400">OCs partagés</div>
        </div>
        <div class="glass-dark rounded-2xl p-8 text-center hover-lift border border-gray-800">
            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <div id="total-races" class="text-3xl font-bold text-green-400 neon-text mb-2">0</div>
            <div class="text-gray-400">Races créées</div>
        </div>
        <div class="glass-dark rounded-2xl p-8 text-center hover-lift border border-gray-800">
            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
            </div>
            <div id="total-users" class="text-3xl font-bold text-purple-400 neon-text mb-2">0</div>
            <div class="text-gray-400">Créateurs</div>
        </div>
        <div class="glass-dark rounded-2xl p-8 text-center hover-lift border border-gray-800">
            <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <div id="total-likes" class="text-3xl font-bold text-pink-400 neon-text mb-2">0</div>
            <div class="text-gray-400">Likes donnés</div>
        </div>
    </div>
    
    <!-- OCs récents -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-white neon-text flex items-center">
                <svg class="w-8 h-8 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                OCs récents
            </h2>
            <a href="/community/ocs" class="text-blue-400 hover:text-blue-300 font-medium transition-colors flex items-center space-x-2">
                <span>Voir tous les OCs</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="recent-ocs">
            <!-- Sera rempli par les données -->
        </div>
    </div>
    
    <!-- Races récentes -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-white neon-text flex items-center">
                <svg class="w-8 h-8 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Races récentes
            </h2>
            <a href="/community/races" class="text-green-400 hover:text-green-300 font-medium transition-colors flex items-center space-x-2">
                <span>Voir toutes les races</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="recent-races">
            <!-- Sera rempli par les données -->
        </div>
    </div>
    
    <!-- Top créateurs -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <h2 class="text-3xl font-bold text-white neon-text mb-8 flex items-center">
            <svg class="w-8 h-8 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
            </svg>
            Top créateurs
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6" id="top-creators">
            <!-- Sera rempli par les données -->
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        loadCommunityStats();
        loadRecentContent();
    });
    
    function loadCommunityStats() {
        // Afficher les vraies statistiques depuis les données PHP
        const recentOCs = <?= json_encode($recent_ocs ?? []) ?>;
        const recentRaces = <?= json_encode($recent_races ?? []) ?>;
        const topCreators = <?= json_encode($top_creators ?? []) ?>;
        
        // Calculer les vraies statistiques
        const totalOCs = recentOCs.length;
        const totalRaces = recentRaces.length;
        const totalUsers = topCreators.length;
        const totalLikes = recentOCs.reduce((sum, oc) => sum + (oc.likes_count || 0), 0) + 
                          recentRaces.reduce((sum, race) => sum + (race.likes_count || 0), 0);
        
        // Animer les compteurs
        animateCounter('total-ocs', totalOCs);
        animateCounter('total-races', totalRaces);
        animateCounter('total-users', totalUsers);
        animateCounter('total-likes', totalLikes);
    }
    
    function animateCounter(elementId, targetValue) {
        const element = document.getElementById(elementId);
        const duration = 2000; // 2 secondes
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
    
    function loadRecentContent() {
        // Afficher les OCs récents
        const recentOCs = <?= json_encode($recent_ocs ?? []) ?>;
        const ocsContainer = document.getElementById('recent-ocs');
        
        if (recentOCs.length === 0) {
            ocsContainer.innerHTML = `
                <div class="col-span-full text-center py-16">
                    <div class="w-20 h-20 bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Aucun OC partagé pour le moment</h3>
                    <p class="text-gray-400 mb-6">Soyez le premier à partager votre création !</p>
                    ${<?= isset($_SESSION['community_user_id']) ? 'true' : 'false' ?> ? 
                        '<a href="/community/publish-oc" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 btn-primary"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>Publier un OC</a>' : 
                        '<a href="/community/register" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 btn-primary">Rejoindre la communauté</a>'
                    }
                </div>
            `;
        } else {
            ocsContainer.innerHTML = recentOCs.map(oc => createOCCard(oc)).join('');
        }
        
        // Afficher les races récentes
        const recentRaces = <?= json_encode($recent_races ?? []) ?>;
        const racesContainer = document.getElementById('recent-races');
        
        if (recentRaces.length === 0) {
            racesContainer.innerHTML = `
                <div class="col-span-full text-center py-16">
                    <div class="w-20 h-20 bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Aucune race partagée pour le moment</h3>
                    <p class="text-gray-400 mb-6">Partagez vos créations de races !</p>
                    ${<?= isset($_SESSION['community_user_id']) ? 'true' : 'false' ?> ? 
                        '<a href="/community/publish-race" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 btn-primary"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>Publier une race</a>' : 
                        '<a href="/community/register" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 btn-primary">Rejoindre la communauté</a>'
                    }
                </div>
            `;
        } else {
            racesContainer.innerHTML = recentRaces.map(race => createRaceCard(race)).join('');
        }
        
        // Afficher les top créateurs
        const topCreators = <?= json_encode($top_creators ?? []) ?>;
        const creatorsContainer = document.getElementById('top-creators');
        
        if (topCreators.length === 0) {
            creatorsContainer.innerHTML = `
                <div class="col-span-full text-center py-12">
                    <div class="w-16 h-16 bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-400">Aucun créateur pour le moment</p>
                </div>
            `;
        } else {
            creatorsContainer.innerHTML = topCreators.map(creator => createCreatorCard(creator)).join('');
        }
    }
    
    function createOCCard(oc) {
        const createdDate = new Date(oc.created_at).toLocaleDateString('fr-FR');
        
        // Récupérer la première image ou utiliser la lettre
        let avatarHTML = '';
        if (oc.images) {
            try {
                const images = typeof oc.images === 'string' ? JSON.parse(oc.images) : oc.images;
                if (images && images.length > 0 && images[0].data) {
                    avatarHTML = `<img src="${images[0].data}" alt="${oc.name}" class="w-12 h-12 rounded-xl object-cover shadow-lg" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                  <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg" style="display: none;">
                                      ${oc.name.charAt(0).toUpperCase()}
                                  </div>`;
                } else {
                    avatarHTML = `<div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                                      ${oc.name.charAt(0).toUpperCase()}
                                  </div>`;
                }
            } catch (e) {
                avatarHTML = `<div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                                  ${oc.name.charAt(0).toUpperCase()}
                              </div>`;
            }
        } else {
            avatarHTML = `<div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                              ${oc.name.charAt(0).toUpperCase()}
                          </div>`;
        }
        
        return `
            <div class="glass rounded-2xl border border-gray-800 hover-lift card-hover overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        ${avatarHTML}
                        <div class="ml-4">
                            <h3 class="font-bold text-white group-hover:text-blue-400 transition-colors">${oc.name}</h3>
                            <p class="text-sm text-gray-400">par ${oc.username}</p>
                        </div>
                    </div>
                    
                    ${oc.race ? `<p class="text-sm text-gray-300 mb-2"><span class="text-gray-400">Race:</span> ${oc.race}</p>` : ''}
                    ${oc.description ? `<p class="text-sm text-gray-300 mb-4 line-clamp-3">${oc.description}</p>` : ''}
                    
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                        <span>${createdDate}</span>
                        <div class="flex items-center space-x-4">
                            <span>❤️ ${oc.likes_count || 0}</span>
                            <span>👁️ ${oc.views_count || 0}</span>
                        </div>
                    </div>
                    
                    <a href="/community/oc/${oc.id}" class="block w-full text-center py-3 px-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 btn-primary font-medium">
                        Voir l'OC
                    </a>
                </div>
            </div>
        `;
    }
    
    function createRaceCard(race) {
        const createdDate = new Date(race.created_at).toLocaleDateString('fr-FR');
        
        // Récupérer la première image ou utiliser la lettre
        let avatarHTML = '';
        if (race.images) {
            try {
                const images = typeof race.images === 'string' ? JSON.parse(race.images) : race.images;
                if (images && images.length > 0 && images[0].data) {
                    avatarHTML = `<img src="${images[0].data}" alt="${race.name}" class="w-12 h-12 rounded-xl object-cover shadow-lg" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                  <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg" style="display: none;">
                                      ${race.name.charAt(0).toUpperCase()}
                                  </div>`;
                } else {
                    avatarHTML = `<div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                                      ${race.name.charAt(0).toUpperCase()}
                                  </div>`;
                }
            } catch (e) {
                avatarHTML = `<div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                                  ${race.name.charAt(0).toUpperCase()}
                              </div>`;
            }
        } else {
            avatarHTML = `<div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                              ${race.name.charAt(0).toUpperCase()}
                          </div>`;
        }
        
        return `
            <div class="glass rounded-2xl border border-gray-800 hover-lift card-hover overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        ${avatarHTML}
                        <div class="ml-4">
                            <h3 class="font-bold text-white group-hover:text-green-400 transition-colors">${race.name}</h3>
                            <p class="text-sm text-gray-400">par ${race.username}</p>
                        </div>
                    </div>
                    
                    ${race.type ? `<p class="text-sm text-gray-300 mb-2"><span class="text-gray-400">Type:</span> ${race.type}</p>` : ''}
                    ${race.description ? `<p class="text-sm text-gray-300 mb-4 line-clamp-3">${race.description}</p>` : ''}
                    
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                        <span>${createdDate}</span>
                        <div class="flex items-center space-x-4">
                            <span>❤️ ${race.likes_count || 0}</span>
                            <span>👁️ ${race.views_count || 0}</span>
                        </div>
                    </div>
                    
                    <a href="/community/race/${race.id}" class="block w-full text-center py-3 px-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 btn-primary font-medium">
                        Voir la race
                    </a>
                </div>
            </div>
        `;
    }
    
    function createCreatorCard(creator) {
        return `
            <div class="text-center glass rounded-2xl p-6 hover-lift border border-gray-800">
                <img src="${creator.avatar || '/assets/default-avatar.png'}" alt="${creator.username}" class="w-16 h-16 rounded-xl mx-auto mb-4 object-cover shadow-lg">
                <h3 class="font-bold text-white mb-1">${creator.username}</h3>
                <p class="text-sm text-gray-400 mb-3">${creator.total_creations || 0} créations</p>
                <a href="/community/profile/${creator.username}" class="text-xs text-blue-400 hover:text-blue-300 transition-colors">
                    Voir le profil
                </a>
            </div>
        `;
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/community.php';
?>