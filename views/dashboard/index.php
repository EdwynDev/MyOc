<?php 
$title = 'Tableau de bord - YOC';
ob_start(); 
?>

<div class="fade-in space-y-8">
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="glass-dark rounded-2xl p-8 lg:p-12 border border-gray-800">
            <div class="relative z-10">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl font-bold text-white neon-text mb-2">Bienvenue, <?= htmlspecialchars($user_name) ?></h1>
                        <p class="text-gray-400 text-lg">Votre studio de création d'Original Characters</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="glass rounded-xl p-6 hover-lift card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <span id="oc-count" class="text-3xl font-bold text-white neon-text">0</span>
                        </div>
                        <h3 class="text-white font-medium mb-1">Original Characters</h3>
                        <p class="text-gray-400 text-sm">Personnages créés</p>
                    </div>
                    
                    <div class="glass rounded-xl p-6 hover-lift card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <span id="race-count" class="text-3xl font-bold text-white neon-text">0</span>
                        </div>
                        <h3 class="text-white font-medium mb-1">Races</h3>
                        <p class="text-gray-400 text-sm">Espèces définies</p>
                    </div>
                    
                    <div class="glass rounded-xl p-6 hover-lift card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span id="last-save" class="text-sm font-bold text-white">Jamais</span>
                        </div>
                        <h3 class="text-white font-medium mb-1">Dernière sauvegarde</h3>
                        <p class="text-gray-400 text-sm">Backup automatique</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Actions rapides -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="/ocs/create" id="create-oc-link" class="group glass-dark rounded-2xl p-8 hover-lift transition-all duration-500 border border-gray-800 hover:border-blue-500/50 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 group-hover:neon-text transition-all duration-300">Créer un OC</h3>
                <p id="create-oc-description" class="text-gray-400 group-hover:text-gray-300 transition-colors">Donnez vie à un nouveau personnage original</p>
            </div>
        </a>
        
        <a href="/races/create" class="group glass-dark rounded-2xl p-8 hover-lift transition-all duration-500 border border-gray-800 hover:border-green-500/50 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-green-600/10 to-teal-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 group-hover:neon-text transition-all duration-300">Créer une race</h3>
                <p class="text-gray-400 group-hover:text-gray-300 transition-colors">Définissez une nouvelle espèce</p>
            </div>
        </a>
        
        <a href="/settings" class="group glass-dark rounded-2xl p-8 hover-lift transition-all duration-500 border border-gray-800 hover:border-gray-500/50 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-gray-600/10 to-gray-700/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 group-hover:neon-text transition-all duration-300">Paramètres</h3>
                <p class="text-gray-400 group-hover:text-gray-300 transition-colors">Import/Export et configuration</p>
            </div>
        </a>
    </div>
    
    <!-- OCs récents -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white neon-text">OCs récents</h2>
            </div>
            <a href="/ocs" class="text-blue-400 hover:text-blue-300 font-medium transition-colors flex items-center space-x-2">
                <span>Voir tous</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <div id="recent-ocs" class="space-y-4">
            <!-- Sera rempli par JavaScript -->
        </div>
    </div>
    
    <!-- Avertissement stockage local -->
    <div class="glass-dark rounded-2xl p-8 border border-yellow-500/30">
        <div class="flex items-start space-x-4">
            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="font-bold text-yellow-400 mb-2 text-lg">Sauvegarde recommandée</h3>
                <p class="text-gray-300 mb-4 leading-relaxed">
                    Vos données sont stockées localement sur cet appareil. Pour éviter toute perte, 
                    exportez régulièrement vos créations en JSON.
                </p>
                <div class="flex flex-wrap gap-3">
                    <button onclick="exportData()" class="btn-primary px-6 py-3 bg-gradient-to-r from-yellow-600 to-orange-600 text-white rounded-xl font-medium hover:from-yellow-700 hover:to-orange-700 transition-all duration-300 shadow-lg">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Exporter maintenant
                    </button>
                    <a href="/settings" class="px-6 py-3 text-yellow-400 border border-yellow-500/30 rounded-xl font-medium hover:bg-yellow-500/10 transition-all duration-300">
                        Paramètres
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        updateStats();
        loadRecentOCs();
        checkRacesForOCCreation();
    });
    
    function checkRacesForOCCreation() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const races = data.races || [];
        
        if (races.length === 0) {
            const createOCLink = document.getElementById('create-oc-link');
            const createOCDescription = document.getElementById('create-oc-description');
            
            // Modifier le lien pour rediriger vers la création de race
            createOCLink.href = '/races/create';
            createOCLink.querySelector('.w-16').classList.remove('from-blue-500', 'to-purple-600');
            createOCLink.querySelector('.w-16').classList.add('from-amber-500', 'to-orange-600');
            
            // Modifier le texte
            createOCLink.querySelector('h3').textContent = 'Créer une race d\'abord';
            createOCDescription.textContent = 'Créez une race avant vos OCs';
        }
    }
    
    function updateStats() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        
        document.getElementById('oc-count').textContent = (data.ocs || []).length;
        document.getElementById('race-count').textContent = (data.races || []).length;
        
        const lastSave = localStorage.getItem('last_save');
        if (lastSave) {
            const date = new Date(parseInt(lastSave));
            document.getElementById('last-save').textContent = date.toLocaleDateString('fr-FR');
        }
    }
    
    function loadRecentOCs() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const ocs = (data.ocs || []).slice(-3).reverse(); // 3 plus récents
        const container = document.getElementById('recent-ocs');
        
        if (ocs.length === 0) {
            container.innerHTML = `
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-300 mb-2">Aucun OC créé</h3>
                    <p class="text-gray-500 mb-6">Commencez par créer votre premier personnage</p>
                    <a href="/ocs/create" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Créer votre premier OC
                    </a>
                </div>
            `;
            return;
        }
        
        container.innerHTML = ocs.map(oc => `
            <div class="glass rounded-xl p-6 hover-lift card-hover">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                            ${oc.name.charAt(0).toUpperCase()}
                        </div>
                        <div>
                            <h4 class="font-bold text-white">${oc.name}</h4>
                            <p class="text-gray-400 text-sm">${oc.race || 'Race non définie'}</p>
                        </div>
                    </div>
                    <a href="/ocs/edit/${oc.id}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 text-sm btn-primary">
                        Modifier
                    </a>
                </div>
            </div>
        `).join('');
    }
    
    function exportData() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        data.user_name = localStorage.getItem('user_name');
        data.exported_at = new Date().toISOString();
        
        const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `oc_data_${new Date().toISOString().split('T')[0]}.json`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        localStorage.setItem('last_save', Date.now().toString());
        updateStats();
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>