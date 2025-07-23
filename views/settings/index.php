<?php 
$title = 'Paramètres et Configuration - Export/Import | YOC Studio';
$description = 'Configurez votre espace YOC Studio. Exportez vos données, importez des sauvegardes, gérez vos paramètres et consultez les statistiques d\'utilisation.';
$keywords = 'paramètres, configuration, export, import, sauvegarde, données, statistiques, settings';
$robots = 'noindex, nofollow';
ob_start(); 
?>

<div class="fade-in space-y-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-white neon-text mb-3">Paramètres</h1>
        <p class="text-gray-400 text-lg">Gérez vos données et personnalisez votre expérience</p>
    </div>
    
    <!-- Actions rapides -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
            <svg class="w-8 h-8 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            Actions rapides
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <button onclick="exportData()" class="group glass rounded-2xl p-8 hover-lift transition-all duration-500 border border-gray-800 hover:border-green-500/50 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-green-600/10 to-emerald-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:neon-text transition-all duration-300">Export rapide</h3>
                    <p class="text-gray-400 group-hover:text-gray-300 transition-colors">Sauvegarder vos données</p>
                </div>
            </button>
            
            <button onclick="document.getElementById('import-file').click()" class="group glass rounded-2xl p-8 hover-lift transition-all duration-500 border border-gray-800 hover:border-blue-500/50 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:neon-text transition-all duration-300">Import rapide</h3>
                    <p class="text-gray-400 group-hover:text-gray-300 transition-colors">Charger des données</p>
                </div>
            </button>
        </div>
    </div>
    
    <!-- Import/Export -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
            <svg class="w-8 h-8 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
            Sauvegarde et restauration
        </h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Export -->
            <div class="space-y-6">
                <h3 class="text-xl font-bold text-white">Exporter vos données</h3>
                <p class="text-gray-300 leading-relaxed">
                    Téléchargez toutes vos données (OCs, races, paramètres) dans un fichier JSON.
                </p>
                <div class="glass rounded-xl p-6 border border-green-500/30">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-green-400 mb-2">Recommandé</h4>
                            <p class="text-gray-300 text-sm leading-relaxed">
                                Exportez régulièrement vos données pour éviter toute perte.
                            </p>
                        </div>
                    </div>
                </div>
                <button onclick="exportData()" class="w-full py-4 px-6 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-xl btn-primary font-medium">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Exporter en JSON
                </button>
            </div>
            
            <!-- Import -->
            <div class="space-y-6">
                <h3 class="text-xl font-bold text-white">Importer des données</h3>
                <p class="text-gray-300 leading-relaxed">
                    Restaurez vos données à partir d'un fichier JSON précédemment exporté.
                </p>
                <div class="glass rounded-xl p-6 border border-yellow-500/30">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-yellow-400 mb-2">Attention</h4>
                            <p class="text-gray-300 text-sm leading-relaxed">
                                L'import ajoutera les données au contenu existant.
                            </p>
                        </div>
                    </div>
                </div>
                <input type="file" id="import-file" accept=".json" class="hidden" onchange="importData(event)">
                <button onclick="document.getElementById('import-file').click()" class="w-full py-4 px-6 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl btn-primary font-medium">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                    Importer depuis JSON
                </button>
            </div>
        </div>
    </div>
    
    <!-- Statistiques -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
            <svg class="w-8 h-8 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
            Statistiques
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="glass rounded-xl p-8 text-center hover-lift">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <p id="stats-ocs" class="text-3xl font-bold text-blue-400 neon-text mb-2">0</p>
                <p class="text-gray-400">Original Characters</p>
            </div>
            
            <div class="glass rounded-xl p-8 text-center hover-lift">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <p id="stats-races" class="text-3xl font-bold text-green-400 neon-text mb-2">0</p>
                <p class="text-gray-400">Races créées</p>
            </div>
            
            <div class="glass rounded-xl p-8 text-center hover-lift">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <p id="storage-size" class="text-3xl font-bold text-purple-400 neon-text mb-2">0 KB</p>
                <p class="text-gray-400">Taille des données</p>
            </div>
        </div>
    </div>
    
    <!-- Gestion des données -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
            <svg class="w-8 h-8 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
            Gestion des données
        </h2>
        
        <div class="space-y-8">
            <!-- Informations de stockage -->
            <div class="glass rounded-xl p-8 border border-blue-500/30">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-blue-400 mb-3 text-lg">Stockage local</h3>
                        <p class="text-gray-300 mb-6 leading-relaxed">
                            Vos données sont stockées dans le navigateur de cet appareil. Elles ne sont pas synchronisées 
                            entre différents appareils ou navigateurs.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Navigateur:</span>
                                <span id="browser-info" class="text-white font-medium">Détection...</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Support LocalStorage:</span>
                                <span id="storage-support" class="text-white font-medium">Vérification...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Actions de nettoyage -->
            <div>
                <h3 class="text-xl font-bold text-white mb-6">Actions de nettoyage</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <button onclick="clearAllData()" class="group glass rounded-xl p-8 hover-lift transition-all duration-500 border border-red-500/30 hover:border-red-500/50 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 to-red-700/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-red-400 mb-2">Effacer toutes les données</h4>
                            <p class="text-gray-400 text-sm">
                                Supprime définitivement tous vos OCs, races et paramètres.
                            </p>
                        </div>
                    </button>
                    
                    <button onclick="resetSettings()" class="group glass rounded-xl p-8 hover-lift transition-all duration-500 border border-yellow-500/30 hover:border-yellow-500/50 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-600/10 to-orange-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-yellow-400 mb-2">Réinitialiser les paramètres</h4>
                            <p class="text-gray-400 text-sm">
                                Remet les paramètres par défaut (conserve vos OCs et races).
                            </p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Informations système -->
    <div class="glass-dark rounded-2xl p-8 border border-gray-800">
        <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
            <svg class="w-8 h-8 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
            </svg>
            Informations système
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <h3 class="font-bold text-white text-lg">Application</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Version:</span>
                        <span class="text-white font-medium">1.0.0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Type:</span>
                        <span class="text-white font-medium">Application web locale</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Stockage:</span>
                        <span class="text-white font-medium">LocalStorage</span>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4">
                <h3 class="font-bold text-white text-lg">Performance</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Temps de chargement:</span>
                        <span class="text-green-400 font-medium">< 1s</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Animations:</span>
                        <span class="text-blue-400 font-medium">GPU accélérées</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Responsive:</span>
                        <span class="text-purple-400 font-medium">Mobile-first</span>
                    </div>
                </div>
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
            document.getElementById('storage-size').textContent = 'N/A';
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
            document.getElementById('storage-support').textContent = '✓ Supporté';
            document.getElementById('storage-support').className = 'text-green-400 font-medium';
        } catch (error) {
            document.getElementById('storage-support').textContent = '✗ Non supporté';
            document.getElementById('storage-support').className = 'text-red-400 font-medium';
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