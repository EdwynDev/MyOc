<?php 
$title = 'Accueil - YOC';
ob_start(); 
?>

<div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full space-y-8 fade-in">
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full flex items-center justify-center mb-6">
                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Bienvenue dans votre gestionnaire d'OC</h2>
            <p class="text-gray-600 mb-8">Créez et gérez vos Original Characters avec des formulaires personnalisables</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-lg border">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Fonctionnalités principales :</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Gestion complète d'Original Characters et de races
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Formulaires personnalisables avec champs sur mesure
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Export/Import JSON pour sauvegarder vos créations
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Interface moderne et responsive
                    </li>
                </ul>
            </div>
            
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-sm font-medium text-blue-800">Stockage local</h3>
                        <p class="text-xs text-blue-700 mt-1">
                            Vos données sont stockées uniquement sur votre appareil. Aucune information n'est partagée ou envoyée sur internet. Pensez à exporter régulièrement vos données !
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <a href="/login" class="w-full inline-flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                    Commencer
                </a>
            </div>
        </div>
        
        <div class="text-center">
            <a href="/legal" class="text-xs text-gray-500 hover:text-gray-700 transition-colors">
                Mentions légales et confidentialité
            </a>
        </div>
    </div>
</div>

<script>
    // Vérifier si des données existent déjà
    window.addEventListener('DOMContentLoaded', function() {
        if (localStorage.getItem('oc_data') || localStorage.getItem('user_name')) {
            const welcomeDiv = document.querySelector('.max-w-md');
            const existingDataDiv = document.createElement('div');
            existingDataDiv.className = 'mt-6 p-4 bg-amber-50 border border-amber-200 rounded-lg';
            existingDataDiv.innerHTML = `
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="text-sm font-medium text-amber-800">Données détectées</span>
                </div>
                <p class="text-xs text-amber-700 mb-3">
                    Une sauvegarde a été trouvée sur cet appareil.
                </p>
                <div class="flex space-x-2">
                    <a href="/login" class="flex-1 text-center py-2 px-3 bg-amber-600 text-white text-xs rounded hover:bg-amber-700 transition-colors">
                        Charger la sauvegarde
                    </a>
                    <button onclick="localStorage.clear(); location.reload();" class="flex-1 py-2 px-3 bg-gray-600 text-white text-xs rounded hover:bg-gray-700 transition-colors">
                        Nouvelle session
                    </button>
                </div>
            `;
            welcomeDiv.appendChild(existingDataDiv);
        }
    });
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>