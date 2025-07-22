<?php 
$title = 'Communauté YOC - Partagez vos créations';
ob_start(); 
?>

<div class="fade-in">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white py-16 px-4 rounded-lg mb-8">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Bienvenue dans la Communauté YOC</h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">Partagez vos Original Characters et découvrez les créations d'autres passionnés</p>
            
            <?php if (!isset($_SESSION['community_user_id'])): ?>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/community/register" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Rejoindre la communauté
                    </a>
                    <a href="/community/login" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors">
                        Se connecter
                    </a>
                </div>
            <?php else: ?>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/community/publish-oc" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Publier un OC
                    </a>
                    <a href="/community/publish-race" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors">
                        Publier une race
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <div class="text-3xl font-bold text-indigo-600 mb-2" id="total-ocs">0</div>
            <div class="text-gray-600">OCs partagés</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <div class="text-3xl font-bold text-green-600 mb-2" id="total-races">0</div>
            <div class="text-gray-600">Races créées</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <div class="text-3xl font-bold text-purple-600 mb-2" id="total-users">0</div>
            <div class="text-gray-600">Créateurs</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <div class="text-3xl font-bold text-pink-600 mb-2" id="total-likes">0</div>
            <div class="text-gray-600">Likes donnés</div>
        </div>
    </div>
    
    <!-- OCs récents -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">OCs récents</h2>
            <a href="/community/ocs" class="text-indigo-600 hover:text-indigo-800 font-medium">
                Voir tous les OCs →
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="recent-ocs">
            <!-- Sera rempli par les données -->
        </div>
    </div>
    
    <!-- Races récentes -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Races récentes</h2>
            <a href="/community/races" class="text-green-600 hover:text-green-800 font-medium">
                Voir toutes les races →
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="recent-races">
            <!-- Sera rempli par les données -->
        </div>
    </div>
    
    <!-- Top créateurs -->
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Top créateurs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4" id="top-creators">
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
        // Simuler le chargement des statistiques
        // En production, cela viendrait d'une API
        document.getElementById('total-ocs').textContent = '<?= count($recent_ocs ?? []) * 10 ?>';
        document.getElementById('total-races').textContent = '<?= count($recent_races ?? []) * 5 ?>';
        document.getElementById('total-users').textContent = '<?= count($top_creators ?? []) * 20 ?>';
        document.getElementById('total-likes').textContent = '<?= count($recent_ocs ?? []) * 50 ?>';
    }
    
    function loadRecentContent() {
        // Afficher les OCs récents
        const recentOCs = <?= json_encode($recent_ocs ?? []) ?>;
        const ocsContainer = document.getElementById('recent-ocs');
        
        if (recentOCs.length === 0) {
            ocsContainer.innerHTML = `
                <div class="col-span-full text-center py-12 text-gray-500">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <p>Aucun OC partagé pour le moment</p>
                    <p class="text-sm mt-2">Soyez le premier à partager votre création !</p>
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
                <div class="col-span-full text-center py-12 text-gray-500">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <p>Aucune race partagée pour le moment</p>
                    <p class="text-sm mt-2">Partagez vos créations de races !</p>
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
                <div class="col-span-full text-center py-8 text-gray-500">
                    <p>Aucun créateur pour le moment</p>
                </div>
            `;
        } else {
            creatorsContainer.innerHTML = topCreators.map(creator => createCreatorCard(creator)).join('');
        }
    }
    
    function createOCCard(oc) {
        const createdDate = new Date(oc.created_at).toLocaleDateString('fr-FR');
        
        return `
            <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                            ${oc.name.charAt(0).toUpperCase()}
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-gray-900">${oc.name}</h3>
                            <p class="text-sm text-gray-500">par ${oc.username}</p>
                        </div>
                    </div>
                    
                    ${oc.race ? `<p class="text-sm text-gray-600 mb-2"><span class="font-medium">Race:</span> ${oc.race}</p>` : ''}
                    ${oc.description ? `<p class="text-sm text-gray-600 mb-4 line-clamp-3">${oc.description}</p>` : ''}
                    
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                        <span>${createdDate}</span>
                        <div class="flex items-center space-x-4">
                            <span>❤️ ${oc.likes_count || 0}</span>
                            <span>👁️ ${oc.views_count || 0}</span>
                        </div>
                    </div>
                    
                    <a href="/community/oc/${oc.id}" class="block w-full text-center py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors">
                        Voir l'OC
                    </a>
                </div>
            </div>
        `;
    }
    
    function createRaceCard(race) {
        const createdDate = new Date(race.created_at).toLocaleDateString('fr-FR');
        
        return `
            <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold">
                            ${race.name.charAt(0).toUpperCase()}
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-gray-900">${race.name}</h3>
                            <p class="text-sm text-gray-500">par ${race.username}</p>
                        </div>
                    </div>
                    
                    ${race.type ? `<p class="text-sm text-gray-600 mb-2"><span class="font-medium">Type:</span> ${race.type}</p>` : ''}
                    ${race.description ? `<p class="text-sm text-gray-600 mb-4 line-clamp-3">${race.description}</p>` : ''}
                    
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                        <span>${createdDate}</span>
                        <div class="flex items-center space-x-4">
                            <span>❤️ ${race.likes_count || 0}</span>
                            <span>👁️ ${race.views_count || 0}</span>
                        </div>
                    </div>
                    
                    <a href="/community/race/${race.id}" class="block w-full text-center py-2 px-4 bg-green-600 text-white rounded hover:bg-green-700 transition-colors">
                        Voir la race
                    </a>
                </div>
            </div>
        `;
    }
    
    function createCreatorCard(creator) {
        return `
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-lg mx-auto mb-3">
                    ${creator.username.charAt(0).toUpperCase()}
                </div>
                <h3 class="font-medium text-gray-900">${creator.username}</h3>
                <p class="text-sm text-gray-500">${creator.total_creations || 0} créations</p>
                <a href="/community/profile/${creator.username}" class="text-xs text-indigo-600 hover:text-indigo-800">
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