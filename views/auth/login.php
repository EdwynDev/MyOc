<?php 
$title = 'Connexion - YourOriginalCharacter';
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
            <p class="text-gray-600 mb-8">Merci de bien renseigner votre nom</p>
        </div>
        
        <form method="POST" action="/login" class="mt-8 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-lg border">
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Votre nom
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required 
                        class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                        placeholder="Entrez votre nom..."
                        autocomplete="name"
                    >
                </div>
                
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-blue-800">Données sécurisées</h3>
                            <p class="text-xs text-blue-700 mt-1">
                                Votre nom est uniquement utilisé pour personnaliser l'interface. Toutes vos données restent sur votre appareil.
                            </p>
                        </div>
                    </div>
                </div>
                
                <button 
                    type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200"
                >
                    Accéder au gestionnaire
                </button>
            </div>
        </form>
        
        <div id="existing-save" class="hidden">
            <!-- Sera rempli par JavaScript si une sauvegarde existe -->
        </div>
        
        <div class="text-center">
            <a href="/" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">
                ← Retour à l'accueil
            </a>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        // Vérifier s'il existe des données sauvegardées
        const savedData = localStorage.getItem('oc_data');
        const savedUserName = localStorage.getItem('user_name');
        
        if (savedData || savedUserName) {
            const existingSaveDiv = document.getElementById('existing-save');
            existingSaveDiv.className = 'mt-6 p-4 bg-amber-50 border border-amber-200 rounded-lg';
            existingSaveDiv.innerHTML = `
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="text-sm font-medium text-amber-800">Sauvegarde détectée</span>
                </div>
                <p class="text-xs text-amber-700 mb-3">
                    Une sauvegarde a été trouvée sur cet appareil. ${savedUserName ? `Utilisateur: ${savedUserName}` : ''}
                </p>
                <div class="flex space-x-2">
                    <button onclick="loadExistingSave()" class="flex-1 text-center py-2 px-3 bg-amber-600 text-white text-xs rounded hover:bg-amber-700 transition-colors">
                        Charger la sauvegarde
                    </button>
                    <button onclick="clearSave()" class="flex-1 py-2 px-3 bg-gray-600 text-white text-xs rounded hover:bg-gray-700 transition-colors">
                        Nouvelle session
                    </button>
                    <input type="file" id="import-file" accept=".json" class="hidden" onchange="importSave(event)">
                    <button onclick="document.getElementById('import-file').click()" class="flex-1 py-2 px-3 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition-colors">
                        Importer JSON
                    </button>
                </div>
            `;
            
            // Remplir automatiquement le nom si disponible
            if (savedUserName) {
                document.getElementById('name').value = savedUserName;
            }
        }
    });
    
    function loadExistingSave() {
        const savedUserName = localStorage.getItem('user_name');
        if (savedUserName) {
            document.getElementById('name').value = savedUserName;
        }
        // Le reste sera géré par la soumission normale du formulaire
    }
    
    function clearSave() {
        if (confirm('Êtes-vous sûr de vouloir supprimer toutes les données sauvegardées ?')) {
            localStorage.clear();
            location.reload();
        }
    }
    
    function importSave(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                try {
                    const data = JSON.parse(e.target.result);
                    if (data.user_name) {
                        localStorage.setItem('user_name', data.user_name);
                        document.getElementById('name').value = data.user_name;
                    }
                    if (data.ocs || data.races || data.custom_fields) {
                        localStorage.setItem('oc_data', JSON.stringify(data));
                    }
                    alert('Données importées avec succès !');
                    location.reload();
                } catch (error) {
                    alert('Erreur lors de l\'importation du fichier JSON.');
                }
            };
            reader.readAsText(file);
        }
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>