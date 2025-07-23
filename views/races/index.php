<?php 
$title = 'Races - YOC';
ob_start(); 
?>

<div class="fade-in space-y-8">
    <!-- Header avec actions -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-6 lg:space-y-0">
        <div>
            <h1 class="text-4xl font-bold text-white neon-text mb-3">Races</h1>
            <p class="text-gray-400 text-lg">Gérez les races de vos univers</p>
        </div>
        <a href="/races/create" class="inline-flex items-center px-6 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl btn-primary text-lg font-medium">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Créer une race
        </a>
    </div>
    
    <!-- Recherche -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-6 lg:space-y-0">
            <div class="flex-1 max-w-md">
                <label for="search" class="sr-only">Rechercher</label>
                <div class="relative">
                    <input type="text" id="search" placeholder="Rechercher une race..." class="w-full pl-12 pr-4 py-4 bg-gray-900/50 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                    <svg class="absolute left-4 top-4 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center">
                <select id="sort-by" class="px-4 py-4 bg-gray-900/50 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                    <option value="name">Nom</option>
                    <option value="created_at">Date de création</option>
                    <option value="updated_at">Dernière modification</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Liste des races -->
    <div id="races-container" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        <!-- Sera rempli par JavaScript -->
    </div>
    
    <!-- Message si aucune race -->
    <div id="no-races" class="hidden">
        <div class="text-center py-20">
            <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-2xl">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4 neon-text">Aucune race trouvée</h3>
            <p class="text-gray-400 mb-8 text-lg">Commencez par créer votre première race</p>
            <a href="/races/create" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl btn-primary text-lg font-medium">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Créer ma première race
            </a>
        </div>
    </div>
</div>

<script>
    let allRaces = [];
    
    window.addEventListener('DOMContentLoaded', function() {
        loadRaces();
        setupEventListeners();
    });
    
    function loadRaces() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        allRaces = data.races || [];
        displayRaces(allRaces);
    }
    
    function displayRaces(races) {
        const container = document.getElementById('races-container');
        const noRaces = document.getElementById('no-races');
        
        if (races.length === 0) {
            container.innerHTML = '';
            noRaces.classList.remove('hidden');
            return;
        }
        
        noRaces.classList.add('hidden');
        container.innerHTML = races.map(race => createRaceCard(race)).join('');
    }
    
    function createRaceCard(race) {
        const createdDate = new Date(race.created_at).toLocaleDateString('fr-FR');
        const updatedDate = new Date(race.updated_at).toLocaleDateString('fr-FR');
        
        return `
            <div class="glass-dark rounded-2xl border border-gray-800 hover-lift card-hover overflow-hidden group">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-xl">
                            ${race.name.charAt(0).toUpperCase()}
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-bold text-white neon-text group-hover:text-green-400 transition-colors">${race.name}</h3>
                            <p class="text-gray-400">${race.type || 'Type non défini'}</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        ${race.origin ? `<div class="flex items-center text-sm"><span class="text-gray-400 w-20">Origine:</span><span class="text-gray-300">${race.origin}</span></div>` : ''}
                        ${race.lifespan ? `<div class="flex items-center text-sm"><span class="text-gray-400 w-20">Durée de vie:</span><span class="text-gray-300">${race.lifespan}</span></div>` : ''}
                        ${race.description ? `<div class="mt-4"><p class="text-gray-300 text-sm leading-relaxed line-clamp-3">${race.description}</p></div>` : ''}
                    </div>
                    
                    ${race.images && race.images.length > 0 ? `
                        <div class="mb-6">
                            <div class="flex space-x-3 overflow-x-auto pb-2">
                                ${race.images.slice(0, 3).map((img, index) => `
                                    <img src="${img.data}" alt="${img.title || 'Image race'}" 
                                         class="w-20 h-20 object-cover rounded-xl flex-shrink-0 border border-gray-700 hover:border-green-500 transition-colors"
                                         onerror="this.style.display='none'" loading="lazy">
                                `).join('')}
                                ${race.images.length > 3 ? `<div class="w-20 h-20 bg-gray-800 rounded-xl flex items-center justify-center text-xs text-gray-400 flex-shrink-0 border border-gray-700">+${race.images.length - 3}</div>` : ''}
                            </div>
                        </div>
                    ` : ''}
                    
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-6 pt-4 border-t border-gray-800">
                        <span>Créée le ${createdDate}</span>
                        ${race.updated_at !== race.created_at ? `<span>Modifiée le ${updatedDate}</span>` : ''}
                    </div>
                    
                    <div class="flex space-x-3">
                        <a href="/races/edit/${race.id}" class="flex-1 text-center py-3 px-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 font-medium btn-primary">
                            Modifier
                        </a>
                        <button onclick="deleteRaceFromList('${race.id}')" class="flex-1 py-3 px-4 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-300 font-medium">
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        `;
    }
    
    function setupEventListeners() {
        const searchInput = document.getElementById('search');
        const sortBy = document.getElementById('sort-by');
        
        searchInput.addEventListener('input', filterRaces);
        sortBy.addEventListener('change', filterRaces);
    }
    
    function filterRaces() {
        const searchTerm = document.getElementById('search').value.toLowerCase();
        const sortBy = document.getElementById('sort-by').value;
        
        let filteredRaces = allRaces.filter(race => {
            return race.name.toLowerCase().includes(searchTerm) ||
                   (race.description && race.description.toLowerCase().includes(searchTerm)) ||
                   (race.type && race.type.toLowerCase().includes(searchTerm));
        });
        
        // Tri
        filteredRaces.sort((a, b) => {
            switch (sortBy) {
                case 'name':
                    return a.name.localeCompare(b.name);
                case 'created_at':
                    return new Date(b.created_at) - new Date(a.created_at);
                case 'updated_at':
                    return new Date(b.updated_at) - new Date(a.updated_at);
                default:
                    return 0;
            }
        });
        
        displayRaces(filteredRaces);
    }
    
    function deleteRaceFromList(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette race ?')) {
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            data.races = (data.races || []).filter(race => race.id !== id);
            localStorage.setItem('oc_data', JSON.stringify(data));
            loadRaces();
            window.ocManager.showNotification('Race supprimée avec succès !', 'success');
        }
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
include __DIR__ . '/../layouts/base.php';
?>