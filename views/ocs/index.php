<?php 
$title = 'Mes OC - YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Mes Original Characters</h1>
            <p class="text-gray-600">Gérez tous vos personnages originaux</p>
        </div>
        <a href="/ocs/create" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Créer un OC
        </a>
    </div>
    
    <!-- Avertissement si aucune race -->
    <div id="no-races-alert" class="hidden mb-8 bg-amber-50 border border-amber-200 rounded-lg p-6">
        <div class="flex items-start">
            <svg class="w-6 h-6 text-amber-600 mt-0.5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
            <div class="flex-1">
                <h3 class="font-medium text-amber-800 mb-2">Aucune race disponible</h3>
                <p class="text-sm text-amber-700 mb-4">
                    Pour créer des OCs plus détaillés, nous recommandons de créer d'abord quelques races. 
                    Cela vous permettra de mieux organiser vos personnages.
                </p>
                <a href="/races/create" class="inline-flex items-center px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Créer une race
                </a>
            </div>
        </div>
    </div>
    
    <!-- Filtres et recherche -->
    <div class="bg-white p-6 rounded-lg shadow-lg border mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex-1 max-w-md">
                <label for="search" class="sr-only">Rechercher</label>
                <div class="relative">
                    <input type="text" id="search" placeholder="Rechercher un OC..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <select id="race-filter" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Toutes les races</option>
                </select>
                <select id="sort-by" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="name">Nom</option>
                    <option value="created_at">Date de création</option>
                    <option value="updated_at">Dernière modification</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Liste des OCs -->
    <div id="ocs-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Sera rempli par JavaScript -->
    </div>
    
    <!-- Message si aucun OC -->
    <div id="no-ocs" class="hidden text-center py-12">
        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun OC trouvé</h3>
        <p class="text-gray-500 mb-6">Commencez par créer votre premier Original Character</p>
        <a href="/ocs/create" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Créer mon premier OC
        </a>
    </div>
</div>

<script>
    let allOCs = [];
    let allRaces = [];
    
    window.addEventListener('DOMContentLoaded', function() {
        loadOCs();
        loadRaces();
        checkRacesAvailability();
        setupEventListeners();
    });
    
    function checkRacesAvailability() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const races = data.races || [];
        
        if (races.length === 0) {
            document.getElementById('no-races-alert').classList.remove('hidden');
        }
    }
    
    function loadOCs() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        allOCs = data.ocs || [];
        displayOCs(allOCs);
    }
    
    function loadRaces() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        allRaces = data.races || [];
        populateRaceFilter();
    }
    
    function populateRaceFilter() {
        const raceFilter = document.getElementById('race-filter');
        const races = [...new Set(allOCs.map(oc => oc.race).filter(Boolean))];
        
        raceFilter.innerHTML = '<option value="">Toutes les races</option>';
        races.forEach(race => {
            raceFilter.innerHTML += `<option value="${race}">${race}</option>`;
        });
    }
    
    function displayOCs(ocs) {
        const container = document.getElementById('ocs-container');
        const noOCs = document.getElementById('no-ocs');
        
        if (ocs.length === 0) {
            container.innerHTML = '';
            noOCs.classList.remove('hidden');
            return;
        }
        
        noOCs.classList.add('hidden');
        container.innerHTML = ocs.map(oc => createOCCard(oc)).join('');
    }
    
    function createOCCard(oc) {
        const createdDate = new Date(oc.created_at).toLocaleDateString('fr-FR');
        const updatedDate = new Date(oc.updated_at).toLocaleDateString('fr-FR');
        
        return `
            <div class="bg-white rounded-lg shadow-lg border hover:shadow-xl transition-all duration-200 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            ${oc.name.charAt(0).toUpperCase()}
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-gray-900">${oc.name}</h3>
                            <p class="text-sm text-gray-500">${oc.race || 'Race non définie'}</p>
                        </div>
                    </div>
                    
                    ${oc.age ? `<p class="text-sm text-gray-600 mb-2"><span class="font-medium">Âge:</span> ${oc.age}</p>` : ''}
                    ${oc.gender ? `<p class="text-sm text-gray-600 mb-2"><span class="font-medium">Genre:</span> ${oc.gender}</p>` : ''}
                    ${oc.description ? `<p class="text-sm text-gray-600 mb-4 line-clamp-3">${oc.description}</p>` : ''}
                    
                    ${oc.images && oc.images.length > 0 ? `
                        <div class="mb-4">
                            <div class="flex space-x-2 overflow-x-auto">
                                ${oc.images.slice(0, 3).map(img => `
                                    <img src="${img.url}" alt="${img.title || 'Image OC'}" 
                                         class="w-16 h-16 object-cover rounded-lg flex-shrink-0 border border-gray-200"
                                         onerror="this.style.display='none'">
                                `).join('')}
                                ${oc.images.length > 3 ? `<div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-xs text-gray-500 flex-shrink-0">+${oc.images.length - 3}</div>` : ''}
                            </div>
                        </div>
                    ` : ''}
                    
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                        <span>Créé le ${createdDate}</span>
                        ${oc.updated_at !== oc.created_at ? `<span>Modifié le ${updatedDate}</span>` : ''}
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="/ocs/edit/${oc.id}" class="flex-1 text-center py-2 px-3 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 transition-colors">
                            Modifier
                        </a>
                        <button onclick="deleteOC('${oc.id}')" class="flex-1 py-2 px-3 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition-colors">
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        `;
    }
    
    function setupEventListeners() {
        const searchInput = document.getElementById('search');
        const raceFilter = document.getElementById('race-filter');
        const sortBy = document.getElementById('sort-by');
        
        searchInput.addEventListener('input', filterOCs);
        raceFilter.addEventListener('change', filterOCs);
        sortBy.addEventListener('change', filterOCs);
    }
    
    function filterOCs() {
        const searchTerm = document.getElementById('search').value.toLowerCase();
        const raceFilter = document.getElementById('race-filter').value;
        const sortBy = document.getElementById('sort-by').value;
        
        let filteredOCs = allOCs.filter(oc => {
            const matchesSearch = oc.name.toLowerCase().includes(searchTerm) ||
                                (oc.description && oc.description.toLowerCase().includes(searchTerm));
            const matchesRace = !raceFilter || oc.race === raceFilter;
            
            return matchesSearch && matchesRace;
        });
        
        // Tri
        filteredOCs.sort((a, b) => {
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
        
        displayOCs(filteredOCs);
    }
    
    function deleteOC(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet OC ?')) {
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            data.ocs = (data.ocs || []).filter(oc => oc.id !== id);
            localStorage.setItem('oc_data', JSON.stringify(data));
            loadOCs();
            window.ocManager.showNotification('OC supprimé avec succès !', 'success');
        }
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>