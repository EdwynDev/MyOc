<?php 
$title = 'Base de données - YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Gestion de la base de données</h1>
        <p class="text-gray-600">Configuration et outils pour les futures fonctionnalités communautaires</p>
    </div>
    
    <!-- Statut de connexion -->
    <div class="bg-white p-8 rounded-lg shadow-lg border mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Statut de la connexion</h2>
        
        <div id="connection-status" class="mb-6">
            <div class="flex items-center justify-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
                <span class="ml-3 text-gray-600">Vérification de la connexion...</span>
            </div>
        </div>
        
        <div class="flex space-x-4">
            <button onclick="testConnection()" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                Tester la connexion
            </button>
            <button onclick="getDatabaseInfo()" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                Informations BDD
            </button>
        </div>
    </div>
    
    <!-- Informations de la base de données -->
    <div id="database-info" class="hidden bg-white p-8 rounded-lg shadow-lg border mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Informations de la base de données</h2>
        <div id="database-info-content">
            <!-- Sera rempli par JavaScript -->
        </div>
    </div>
    
    <!-- Outils de développement -->
    <div class="bg-white p-8 rounded-lg shadow-lg border mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Outils de développement</h2>
        
        <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-6">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-amber-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <div>
                    <h3 class="text-sm font-medium text-amber-800">Attention - Environnement de développement</h3>
                    <p class="text-xs text-amber-700 mt-1">
                        Ces outils sont destinés au développement. Utilisez-les avec précaution.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <button onclick="runMigrations()" class="p-4 border-2 border-blue-200 rounded-lg hover:border-blue-300 transition-colors text-left">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 1.79 4 4 4h8c2.21 0 4-1.79 4-4V7c0-2.21-1.79-4-4-4H8c-2.21 0-4 1.79-4 4z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 12 2 2 4-4"></path>
                    </svg>
                    <span class="font-medium text-blue-800">Exécuter les migrations</span>
                </div>
                <p class="text-xs text-blue-600">
                    Crée les tables nécessaires pour les fonctionnalités communautaires
                </p>
            </button>
            
            <button onclick="seedDatabase()" class="p-4 border-2 border-green-200 rounded-lg hover:border-green-300 transition-colors text-left">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                    </svg>
                    <span class="font-medium text-green-800">Insérer données de test</span>
                </div>
                <p class="text-xs text-green-600">
                    Ajoute des utilisateurs et contenus de test pour le développement
                </p>
            </button>
        </div>
    </div>
    
    <!-- Fonctionnalités futures -->
    <div class="bg-white p-8 rounded-lg shadow-lg border">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Fonctionnalités communautaires à venir</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-4 bg-blue-50 rounded-lg">
                <h3 class="font-medium text-blue-900 mb-2">Partage d'OCs</h3>
                <p class="text-sm text-blue-700">Partagez vos Original Characters avec la communauté</p>
            </div>
            
            <div class="p-4 bg-green-50 rounded-lg">
                <h3 class="font-medium text-green-900 mb-2">Galerie de races</h3>
                <p class="text-sm text-green-700">Découvrez et partagez des races créées par d'autres utilisateurs</p>
            </div>
            
            <div class="p-4 bg-purple-50 rounded-lg">
                <h3 class="font-medium text-purple-900 mb-2">Système de likes</h3>
                <p class="text-sm text-purple-700">Likez et commentez les créations qui vous plaisent</p>
            </div>
            
            <div class="p-4 bg-yellow-50 rounded-lg">
                <h3 class="font-medium text-yellow-900 mb-2">Collections</h3>
                <p class="text-sm text-yellow-700">Créez des collections thématiques d'OCs et de races</p>
            </div>
            
            <div class="p-4 bg-red-50 rounded-lg">
                <h3 class="font-medium text-red-900 mb-2">Suivi d'utilisateurs</h3>
                <p class="text-sm text-red-700">Suivez vos créateurs favoris</p>
            </div>
            
            <div class="p-4 bg-indigo-50 rounded-lg">
                <h3 class="font-medium text-indigo-900 mb-2">Commentaires</h3>
                <p class="text-sm text-indigo-700">Échangez avec la communauté sur les créations</p>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        testConnection();
    });
    
    function testConnection() {
        const statusDiv = document.getElementById('connection-status');
        statusDiv.innerHTML = `
            <div class="flex items-center justify-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
                <span class="ml-3 text-gray-600">Test de connexion en cours...</span>
            </div>
        `;
        
        fetch('/api/database/test', { method: 'POST' })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    statusDiv.innerHTML = `
                        <div class="flex items-center p-4 bg-green-50 border border-green-200 rounded-lg">
                            <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h3 class="font-medium text-green-800">Connexion réussie</h3>
                                <p class="text-sm text-green-700">Base de données connectée - ${data.timestamp}</p>
                            </div>
                        </div>
                    `;
                } else {
                    statusDiv.innerHTML = `
                        <div class="flex items-center p-4 bg-red-50 border border-red-200 rounded-lg">
                            <svg class="w-6 h-6 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <div>
                                <h3 class="font-medium text-red-800">Connexion échouée</h3>
                                <p class="text-sm text-red-700">${data.message}</p>
                            </div>
                        </div>
                    `;
                }
            })
            .catch(error => {
                statusDiv.innerHTML = `
                    <div class="flex items-center p-4 bg-red-50 border border-red-200 rounded-lg">
                        <svg class="w-6 h-6 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <div>
                            <h3 class="font-medium text-red-800">Erreur de connexion</h3>
                            <p class="text-sm text-red-700">Impossible de contacter la base de données</p>
                        </div>
                    </div>
                `;
            });
    }
    
    function getDatabaseInfo() {
        fetch('/api/database/info', { method: 'POST' })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const infoDiv = document.getElementById('database-info');
                    const contentDiv = document.getElementById('database-info-content');
                    
                    contentDiv.innerHTML = `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="font-medium text-gray-900 mb-3">Informations générales</h3>
                                <ul class="space-y-2 text-sm text-gray-600">
                                    <li><span class="font-medium">Version MySQL:</span> ${data.mysql_version}</li>
                                    <li><span class="font-medium">Nombre de tables:</span> ${data.total_tables}</li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-3">Tables et données</h3>
                                <div class="space-y-1 text-sm">
                                    ${Object.entries(data.table_stats).map(([table, count]) => 
                                        `<div class="flex justify-between">
                                            <span class="text-gray-600">${table}:</span>
                                            <span class="font-medium">${count} enregistrements</span>
                                        </div>`
                                    ).join('')}
                                </div>
                            </div>
                        </div>
                    `;
                    
                    infoDiv.classList.remove('hidden');
                } else {
                    window.ocManager.showNotification('Erreur: ' + data.message, 'error');
                }
            })
            .catch(error => {
                window.ocManager.showNotification('Erreur lors de la récupération des informations', 'error');
            });
    }
    
    function runMigrations() {
        if (confirm('Voulez-vous exécuter les migrations de base de données ?')) {
            window.ocManager.showNotification('Exécution des migrations...', 'info');
            
            fetch('/api/database/migrate', { method: 'POST' })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.ocManager.showNotification('Migrations exécutées avec succès !', 'success');
                        getDatabaseInfo(); // Rafraîchir les infos
                    } else {
                        window.ocManager.showNotification('Erreur: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    window.ocManager.showNotification('Erreur lors de l\'exécution des migrations', 'error');
                });
        }
    }
    
    function seedDatabase() {
        if (confirm('Voulez-vous insérer les données de test ? Cela ajoutera des utilisateurs et contenus de démonstration.')) {
            window.ocManager.showNotification('Insertion des données de test...', 'info');
            
            fetch('/api/database/seed', { method: 'POST' })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.ocManager.showNotification('Données de test insérées avec succès !', 'success');
                        getDatabaseInfo(); // Rafraîchir les infos
                    } else {
                        window.ocManager.showNotification('Erreur: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    window.ocManager.showNotification('Erreur lors de l\'insertion des données', 'error');
                });
        }
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>