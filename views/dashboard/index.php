<?php 
$title = 'Tableau de bord - YourOriginalCharacter';
ob_start(); 
?>

<div class="fade-in">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Tableau de bord</h1>
        <p class="text-gray-600">Bienvenue <?= htmlspecialchars($user_name) ?>, gérez vos Original Characters et races</p>
    </div>
    
    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-lg border hover:shadow-xl transition-all duration-200">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Original Characters</p>
                    <p id="oc-count" class="text-2xl font-bold text-gray-900">0</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-lg border hover:shadow-xl transition-all duration-200">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Races</p>
                    <p id="race-count" class="text-2xl font-bold text-gray-900">0</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-lg border hover:shadow-xl transition-all duration-200">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Champs personnalisés</p>
                    <p id="custom-fields-count" class="text-2xl font-bold text-gray-900">0</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-lg border hover:shadow-xl transition-all duration-200">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Dernière sauvegarde</p>
                    <p id="last-save" class="text-sm font-bold text-gray-900">Jamais</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Actions rapides -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <a href="/ocs/create" class="group bg-gradient-to-r from-indigo-500 to-purple-600 p-6 rounded-lg shadow-lg text-white hover:from-indigo-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-2">Créer un OC</h3>
                    <p class="text-indigo-100">Ajoutez un nouveau personnage original</p>
                </div>
                <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
        </a>
        
        <a href="/races/create" class="group bg-gradient-to-r from-green-500 to-teal-600 p-6 rounded-lg shadow-lg text-white hover:from-green-600 hover:to-teal-700 transition-all duration-200 transform hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-2">Créer une race</h3>
                    <p class="text-green-100">Définissez une nouvelle race</p>
                </div>
                <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
        </a>
        
        <a href="/settings" class="group bg-gradient-to-r from-gray-600 to-gray-700 p-6 rounded-lg shadow-lg text-white hover:from-gray-700 hover:to-gray-800 transition-all duration-200 transform hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-2">Paramètres</h3>
                    <p class="text-gray-200">Import/Export et personnalisation</p>
                </div>
                <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
        </a>
    </div>
    
    <!-- OCs récents -->
    <div class="bg-white p-6 rounded-lg shadow-lg border mb-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900">OCs récents</h2>
            <a href="/ocs" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition-colors">
                Voir tous
            </a>
        </div>
        <div id="recent-ocs" class="space-y-4">
            <!-- Sera rempli par JavaScript -->
        </div>
    </div>
    
    <!-- Avertissement stockage local -->
    <div class="bg-amber-50 border border-amber-200 rounded-lg p-6">
        <div class="flex items-start">
            <svg class="w-6 h-6 text-amber-600 mt-0.5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
            <div>
                <h3 class="font-medium text-amber-800 mb-2">Rappel important - Stockage local</h3>
                <p class="text-amber-700 text-sm mb-3">
                    Vos données sont stockées uniquement sur cet appareil. Pensez à exporter régulièrement vos OCs en JSON 
                    pour éviter toute perte de données en cas de suppression du cache du navigateur.
                </p>
                <div class="flex space-x-4">
                    <button onclick="exportData()" class="text-xs bg-amber-600 text-white px-3 py-1 rounded hover:bg-amber-700 transition-colors">
                        Exporter maintenant
                    </button>
                    <a href="/settings" class="text-xs text-amber-700 hover:text-amber-800 underline">
                        Aller aux paramètres
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
    });
    
    function updateStats() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        
        document.getElementById('oc-count').textContent = (data.ocs || []).length;
        document.getElementById('race-count').textContent = (data.races || []).length;
        document.getElementById('custom-fields-count').textContent = 
            Object.keys(data.custom_fields || {}).length;
        
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
                <div class="text-center py-8 text-gray-500">
                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <p class="text-sm">Aucun OC créé pour le moment</p>
                    <a href="/ocs/create" class="inline-block mt-2 text-sm text-indigo-600 hover:text-indigo-800">
                        Créer votre premier OC
                    </a>
                </div>
            `;
            return;
        }
        
        container.innerHTML = ocs.map(oc => `
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        ${oc.name.charAt(0).toUpperCase()}
                    </div>
                    <div class="ml-3">
                        <p class="font-medium text-gray-900">${oc.name}</p>
                        <p class="text-sm text-gray-500">${oc.race || 'Race non définie'}</p>
                    </div>
                </div>
                <a href="/ocs/edit/${oc.id}" class="text-sm text-indigo-600 hover:text-indigo-800">
                    Modifier
                </a>
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
include 'layouts/base.php';
?>