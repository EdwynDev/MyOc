<?php 
$title = 'Races - YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Races</h1>
            <p class="text-gray-600">Gérez les races de vos univers</p>
        </div>
        <a href="/races/create" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-lg hover:from-green-700 hover:to-teal-700 transition-all duration-200 shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Créer une race
        </a>
    </div>
    
    <!-- Recherche -->
    <div class="bg-white p-6 rounded-lg shadow-lg border mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex-1 max-w-md">
                <label for="search" class="sr-only">Rechercher</label>
                <div class="relative">
                    <input type="text" id="search" placeholder="Rechercher une race..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <select id="sort-by" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <option value="name">Nom</option>
                    <option value="created_at">Date de création</option>
                    <option value="updated_at">Dernière modification</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Liste des races -->
    <div id="races-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Sera rempli par JavaScript -->
    </div>
    
    <!-- Message si aucune race -->
    <div id="no-races" class="hidden text-center py-12">
        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune race trouvée</h3>
        <p class="text-gray-500 mb-6">Commencez par créer votre première race</p>
        <a href="/races/create" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Créer ma première race
        </a>
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
            <div class="bg-white rounded-lg shadow-lg border hover:shadow-xl transition-all duration-200 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            ${race.name.charAt(0).toUpperCase()}
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-gray-900">${race.name}</h3>
                            <p class="text-sm text-gray-500">${race.type || 'Type non défini'}</p>
                        </div>
                    </div>
                    
                    ${race.origin ? `<p class="text-sm text-gray-600 mb-2"><span class="font-medium">Origine:</span> ${race.origin}</p>` : ''}
                    ${race.lifespan ? `<p class="text-sm text-gray-600 mb-2"><span class="font-medium">Espérance de vie:</span> ${race.lifespan}</p>` : ''}
                    ${race.description ? `<p class="text-sm text-gray-600 mb-4 line-clamp-3">${race.description}</p>` : ''}
                    
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                        <span>Créée le ${createdDate}</span>
                        ${race.updated_at !== race.created_at ? `<span>Modifiée le ${updatedDate}</span>` : ''}
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="/races/edit/${race.id}" class="flex-1 text-center py-2 px-3 bg-green-600 text-white text-sm rounded hover:bg-green-700 transition-colors">
                            Modifier
                        </a>
                        <button onclick="deleteRace('${race.id}')" class="flex-1 py-2 px-3 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition-colors">
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
    
    function deleteRace(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette race ?')) {
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            data.races = (data.races || []).filter(race => race.id !== id);
            localStorage.setItem('oc_data', JSON.stringify(data));
            loadRaces();
            window.ocManager.showNotification('Race supprimée avec succès !', 'success');
        }
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>