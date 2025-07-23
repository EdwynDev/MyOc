<?php 
$title = 'Mes OC - YOC';
ob_start(); 
?>

<div class="fade-in space-y-8">
    <!-- Header avec actions -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-6 lg:space-y-0">
        <div>
            <h1 class="text-4xl font-bold text-white neon-text mb-3">Mes Original Characters</h1>
            <p class="text-gray-400 text-lg">Gérez tous vos personnages originaux</p>
        </div>
        <a href="/ocs/create" class="inline-flex items-center px-6 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl btn-primary text-lg font-medium">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Créer un OC
        </a>
    </div>
    
    <!-- Avertissement si aucune race -->
    <div id="no-races-alert" class="hidden">
        <div class="glass-dark rounded-2xl p-8 border border-yellow-500/30">
            <div class="flex items-start space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-yellow-400 mb-3 text-lg">Aucune race disponible</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Pour créer des OCs plus détaillés, nous recommandons de créer d'abord quelques races. 
                        Cela vous permettra de mieux organiser vos personnages.
                    </p>
                    <a href="/races/create" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-600 to-orange-600 text-white rounded-xl hover:from-yellow-700 hover:to-orange-700 transition-all duration-300 btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Créer une race
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filtres et recherche -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-6 lg:space-y-0">
            <div class="flex-1 max-w-md">
                <label for="search" class="sr-only">Rechercher</label>
                <div class="relative">
                    <input type="text" id="search" placeholder="Rechercher un OC..." class="w-full pl-12 pr-4 py-4 bg-gray-900/50 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                    <svg class="absolute left-4 top-4 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <select id="race-filter" class="px-4 py-4 bg-gray-900/50 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                    <option value="">Toutes les races</option>
                </select>
                <select id="sort-by" class="px-4 py-4 bg-gray-900/50 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                    <option value="name">Nom</option>
                    <option value="created_at">Date de création</option>
                    <option value="updated_at">Dernière modification</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Liste des OCs -->
    <div id="ocs-container" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        <!-- Sera rempli par JavaScript -->
    </div>
    
    <!-- Message si aucun OC -->
    <div id="no-ocs" class="hidden">
        <div class="text-center py-20">
            <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-2xl">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4 neon-text">Aucun OC trouvé</h3>
            <p class="text-gray-400 mb-8 text-lg">Commencez par créer votre premier Original Character</p>
            <a href="/ocs/create" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl btn-primary text-lg font-medium">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Créer mon premier OC
            </a>
        </div>
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
            <div class="glass-dark rounded-2xl border border-gray-800 hover-lift card-hover overflow-hidden group">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-xl">
                            ${oc.name.charAt(0).toUpperCase()}
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-bold text-white neon-text group-hover:text-blue-400 transition-colors">${oc.name}</h3>
                            <p class="text-gray-400">${oc.race || 'Race non définie'}</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        ${oc.age ? `<div class="flex items-center text-sm"><span class="text-gray-400 w-16">Âge:</span><span class="text-gray-300">${oc.age}</span></div>` : ''}
                        ${oc.gender ? `<div class="flex items-center text-sm"><span class="text-gray-400 w-16">Genre:</span><span class="text-gray-300">${oc.gender}</span></div>` : ''}
                        ${oc.description ? `<div class="mt-4"><p class="text-gray-300 text-sm leading-relaxed line-clamp-3">${oc.description}</p></div>` : ''}
                    </div>
                    
                    ${oc.images && oc.images.length > 0 ? `
                        <div class="mb-6">
                            <div class="flex space-x-3 overflow-x-auto pb-2">
                                ${oc.images.slice(0, 3).map((img, index) => `
                                    <img src="${img.data}" alt="${img.title || 'Image OC'}" 
                                         class="w-20 h-20 object-cover rounded-xl flex-shrink-0 border border-gray-700 hover:border-blue-500 transition-colors"
                                         onerror="this.style.display='none'" loading="lazy">
                                `).join('')}
                                ${oc.images.length > 3 ? `<div class="w-20 h-20 bg-gray-800 rounded-xl flex items-center justify-center text-xs text-gray-400 flex-shrink-0 border border-gray-700">+${oc.images.length - 3}</div>` : ''}
                            </div>
                        </div>
                    ` : ''}
                    
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-6 pt-4 border-t border-gray-800">
                        <span>Créé le ${createdDate}</span>
                        ${oc.updated_at !== oc.created_at ? `<span>Modifié le ${updatedDate}</span>` : ''}
                    </div>
                    
                    <div class="flex space-x-3">
                        <a href="/ocs/edit/${oc.id}" class="flex-1 text-center py-3 px-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 font-medium btn-primary">
                            Modifier
                        </a>
                        <button onclick="deleteOCFromList('${oc.id}')" class="flex-1 py-3 px-4 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-300 font-medium">
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
    
    function deleteOCFromList(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet OC ?')) {
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            data.ocs = (data.ocs || []).filter(oc => oc.id !== id);
            localStorage.setItem('oc_data', JSON.stringify(data));
            loadOCs();
            window.ocManager.showNotification('OC supprimé avec succès !', 'success');
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