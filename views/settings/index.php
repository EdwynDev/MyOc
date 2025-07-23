<?php 
$title = 'Paramètres - YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Paramètres</h1>
        <p class="text-gray-600">Gérez vos données et personnalisez votre expérience</p>
    </div>
    
    <!-- Navigation rapide -->
    <div class="bg-white p-6 rounded-lg shadow-lg border mb-8">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Actions rapides</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <button onclick="exportData()" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-all duration-200">
                <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <div>
                    <h3 class="font-medium text-gray-900">Export rapide</h3>
                    <p class="text-sm text-gray-600">Sauvegarder vos données</p>
                </div>
            </button>
            
            <button onclick="document.getElementById('import-file').click()" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200">
                <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                </svg>
                <div>
                    <h3 class="font-medium text-gray-900">Import rapide</h3>
                    <p class="text-sm text-gray-600">Charger des données</p>
                </div>
            </button>
        </div>
    </div>
    
    <!-- Import/Export -->
    <div class="bg-white p-8 rounded-lg shadow-lg border mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Sauvegarde et restauration</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Export -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800">Exporter vos données</h3>
                <p class="text-sm text-gray-600">
                    Téléchargez toutes vos données (OCs, races, paramètres) dans un fichier JSON.
                </p>
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-medium text-green-800">Recommandé</h4>
                            <p class="text-xs text-green-700 mt-1">
                                Exportez régulièrement vos données pour éviter toute perte.
                            </p>
                        </div>
                    </div>
                </div>
                <button onclick="exportData()" class="w-full bg-gradient-to-r from-green-600 to-teal-600 text-white py-3 px-4 rounded-lg hover:from-green-700 hover:to-teal-700 transition-all duration-200 shadow-lg">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Exporter en JSON
                </button>
            </div>
            
            <!-- Import -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800">Importer des données</h3>
                <p class="text-sm text-gray-600">
                    Restaurez vos données à partir d'un fichier JSON précédemment exporté.
                </p>
                <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-amber-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-medium text-amber-800">Attention</h4>
                            <p class="text-xs text-amber-700 mt-1">
                                L'import ajoutera les données au contenu existant.
                            </p>
                        </div>
                    </div>
                </div>
                <input type="file" id="import-file" accept=".json" class="hidden" onchange="importData(event)">
                <button onclick="document.getElementById('import-file').click()" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-4 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                    Importer depuis JSON
                </button>
            </div>
        </div>
    </div>
    
    <!-- Statistiques -->
    <div class="bg-white p-8 rounded-lg shadow-lg border mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Statistiques</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="text-center p-6 bg-blue-50 rounded-lg">
                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <p id="stats-ocs" class="text-2xl font-bold text-blue-600">0</p>
                <p class="text-sm text-gray-600">Original Characters</p>
            </div>
            
            <div class="text-center p-6 bg-green-50 rounded-lg">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <p id="stats-races" class="text-2xl font-bold text-green-600">0</p>
                <p class="text-sm text-gray-600">Races créées</p>
            </div>
        </div>
    </div>
    
    <!-- Gestion des données -->
    <div class="bg-white p-8 rounded-lg shadow-lg border mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Gestion des données</h2>
        
        <div class="space-y-6">
            <!-- Informations de stockage -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mt-0.5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex-1">
                        <h3 class="font-medium text-blue-800 mb-2">Stockage local</h3>
                        <p class="text-sm text-blue-700 mb-4">
                            Vos données sont stockées dans le navigateur de cet appareil. Elles ne sont pas synchronisées 
                            entre différents appareils ou navigateurs.
                        </p>
                        <div class="text-xs text-blue-600">
                            <p>Taille approximative des données: <span id="storage-size">Calcul en cours...</span></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Actions de nettoyage -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions de nettoyage</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button onclick="clearAllData()" class="p-4 border-2 border-red-200 rounded-lg hover:border-red-300 transition-colors text-left">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            <span class="font-medium text-red-800">Effacer toutes les données</span>
                        </div>
                        <p class="text-xs text-red-600">
                            Supprime définitivement tous vos OCs, races et paramètres.
                        </p>
                    </button>
                    
                    <button onclick="resetSettings()" class="p-4 border-2 border-yellow-200 rounded-lg hover:border-yellow-300 transition-colors text-left">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <span class="font-medium text-yellow-800">Réinitialiser les paramètres</span>
                        </div>
                        <p class="text-xs text-yellow-600">
                            Remet les paramètres par défaut (conserve vos OCs et races).
                        </p>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Informations système -->
    <div class="bg-white p-8 rounded-lg shadow-lg border">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Informations système</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
            <div>
                <h3 class="font-medium text-gray-800 mb-2">Application</h3>
                <ul class="space-y-1 text-gray-600">
                    <li>Version: 1.0.0</li>
                    <li>Type: Application web locale</li>
                    <li>Stockage: LocalStorage</li>
                </ul>
            </div>
            
            <div>
                <h3 class="font-medium text-gray-800 mb-2">Navigateur</h3>
                <ul class="space-y-1 text-gray-600">
                    <li id="browser-info">Détection en cours...</li>
                    <li id="storage-support">Support LocalStorage: Vérification...</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        updateStats();
        calculateStorageSize();
        detectBrowser();
    });
    
    function updateStats() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        
        document.getElementById('stats-ocs').textContent = (data.ocs || []).length;
        document.getElementById('stats-races').textContent = (data.races || []).length;
    }
    
    function calculateStorageSize() {
        try {
            let totalSize = 0;
            for (let key in localStorage) {
                if (localStorage.hasOwnProperty(key)) {
                    totalSize += localStorage[key].length;
                }
            }
            
            const sizeInKB = (totalSize / 1024).toFixed(2);
            document.getElementById('storage-size').textContent = `${sizeInKB} KB`;
        } catch (error) {
            document.getElementById('storage-size').textContent = 'Impossible à calculer';
        }
    }
    
    function detectBrowser() {
        const userAgent = navigator.userAgent;
        let browserName = 'Navigateur inconnu';
        
        if (userAgent.includes('Chrome')) browserName = 'Google Chrome';
        else if (userAgent.includes('Firefox')) browserName = 'Mozilla Firefox';
        else if (userAgent.includes('Safari')) browserName = 'Safari';
        else if (userAgent.includes('Edge')) browserName = 'Microsoft Edge';
        
        document.getElementById('browser-info').textContent = browserName;
        
        // Test du support LocalStorage
        try {
            localStorage.setItem('test', 'test');
            localStorage.removeItem('test');
            document.getElementById('storage-support').textContent = 'Support LocalStorage: ✓ Supporté';
        } catch (error) {
            document.getElementById('storage-support').textContent = 'Support LocalStorage: ✗ Non supporté';
        }
    }
    
    function exportData() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        data.user_name = localStorage.getItem('user_name');
        data.exported_at = new Date().toISOString();
        data.version = '1.0';
        
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
        window.ocManager.showNotification('Données exportées avec succès !', 'success');
    }
    
    function importData(event) {
        const file = event.target.files[0];
        if (!file) return;
        
        const reader = new FileReader();
        reader.onload = function(e) {
            try {
                const importedData = JSON.parse(e.target.result);
                
                // Validation basique
                if (!importedData || typeof importedData !== 'object') {
                    throw new Error('Format de fichier invalide');
                }
                
                const currentData = JSON.parse(localStorage.getItem('oc_data') || '{}');
                
                // Fusionner les données
                if (importedData.ocs && Array.isArray(importedData.ocs)) {
                    currentData.ocs = [...(currentData.ocs || []), ...importedData.ocs];
                }
                if (importedData.races && Array.isArray(importedData.races)) {
                    currentData.races = [...(currentData.races || []), ...importedData.races];
                }
                if (importedData.custom_fields) {
                    currentData.custom_fields = {
                        ...(currentData.custom_fields || {}),
                        ...importedData.custom_fields
                    };
                }
                
                localStorage.setItem('oc_data', JSON.stringify(currentData));
                
                if (importedData.user_name && !localStorage.getItem('user_name')) {
                    localStorage.setItem('user_name', importedData.user_name);
                }
                
                updateStats();
                calculateStorageSize();
                window.ocManager.showNotification('Données importées avec succès !', 'success');
                
            } catch (error) {
                window.ocManager.showNotification('Erreur lors de l\'importation: ' + error.message, 'error');
            }
        };
        
        reader.onerror = function() {
            window.ocManager.showNotification('Erreur lors de la lecture du fichier', 'error');
        };
        
        reader.readAsText(file);
        
        // Reset input
        event.target.value = '';
    }
    
    function clearAllData() {
        if (confirm('⚠️ ATTENTION ⚠️\n\nCette action supprimera définitivement TOUTES vos données :\n- Tous vos Original Characters\n- Toutes vos races\n- Tous vos paramètres\n\nCette action est IRRÉVERSIBLE.\n\nÊtes-vous absolument sûr de vouloir continuer ?')) {
            if (confirm('Dernière confirmation :\n\nVoulez-vous vraiment supprimer toutes vos données ?\n\nIl est fortement recommandé d\'exporter vos données avant cette action.')) {
                localStorage.clear();
                window.ocManager.showNotification('Toutes les données ont été supprimées', 'success');
                setTimeout(() => {
                    window.location.href = '/';
                }, 2000);
            }
        }
    }
    
    function resetSettings() {
        if (confirm('Voulez-vous réinitialiser tous les paramètres ?\n\nVos OCs et races seront conservés.')) {
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            data.settings = {};
            data.custom_fields = { oc: {}, race: {} };
            localStorage.setItem('oc_data', JSON.stringify(data));
            
            window.ocManager.showNotification('Paramètres réinitialisés avec succès !', 'success');
            updateStats();
        }
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>