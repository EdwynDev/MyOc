<?php 
$title = 'Connexion à votre Studio - Accès sécurisé | YOC Studio';
$description = 'Connectez-vous à votre espace personnel YOC Studio. Accédez à vos Original Characters, races et outils de création en toute sécurité.';
$keywords = 'connexion, login, accès, studio personnel, sécurisé, authentification';
$canonical = 'https://myocverse.neopolyworks.fr/login';
ob_start(); 
?>

<div class="min-h-screen flex items-center justify-center px-4 relative">
    <!-- Background effects -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-md w-full space-y-8 fade-in relative z-10">
        <!-- Header -->
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mb-8 shadow-2xl hover-lift">
                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-white mb-4 neon-text">Accès au Studio</h2>
            <p class="text-gray-400 mb-8">Entrez votre nom pour accéder à votre espace de création</p>
        </div>
        
        <!-- Formulaire -->
        <form method="POST" action="/login" class="space-y-6">
            <div class="glass-dark rounded-2xl p-8 border border-gray-800">
                <div class="mb-8">
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-3">
                        Votre nom de créateur
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required 
                        class="w-full px-4 py-4 bg-gray-900/50 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm"
                        placeholder="Entrez votre nom..."
                        autocomplete="name"
                    >
                </div>
                
                <!-- Info sécurité -->
                <div class="glass rounded-xl p-6 mb-8 border border-blue-500/30">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-blue-400 font-medium mb-1 text-sm">Données sécurisées</h4>
                            <p class="text-gray-400 text-xs leading-relaxed">
                                Votre nom est uniquement utilisé pour personnaliser l'interface. 
                                Toutes vos données restent sur votre appareil.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Bouton de connexion -->
                <button 
                    type="submit" 
                    class="w-full py-4 px-6 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-bold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl btn-primary text-lg"
                >
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Accéder au studio
                </button>
            </div>
        </form>
        
        <!-- Sauvegarde existante -->
        <div id="existing-save" class="hidden">
            <!-- Sera rempli par JavaScript si une sauvegarde existe -->
        </div>
        
        <!-- Retour -->
        <div class="text-center">
            <a href="/" class="text-gray-500 hover:text-gray-400 transition-colors text-sm flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Retour à l'accueil</span>
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
            existingSaveDiv.className = 'glass-dark rounded-2xl p-6 border border-yellow-500/30';
            existingSaveDiv.innerHTML = `
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <span class="text-yellow-400 font-medium">Sauvegarde détectée</span>
                </div>
                <p class="text-gray-400 mb-4 text-sm">
                    Une sauvegarde a été trouvée sur cet appareil. ${savedUserName ? `Utilisateur: ${savedUserName}` : ''}
                </p>
                <div class="grid grid-cols-1 gap-3">
                    <button onclick="loadExistingSave()" class="w-full py-3 px-4 bg-gradient-to-r from-yellow-600 to-orange-600 text-white rounded-xl hover:from-yellow-700 hover:to-orange-700 transition-all duration-300 text-sm font-medium btn-primary">
                        Charger la sauvegarde
                    </button>
                    <div class="grid grid-cols-2 gap-3">
                        <button onclick="clearSave()" class="py-3 px-4 bg-gray-700 text-white rounded-xl hover:bg-gray-600 transition-all duration-300 text-sm font-medium">
                            Nouvelle session
                        </button>
                        <input type="file" id="import-file" accept=".json" class="hidden" onchange="importSave(event)">
                        <button onclick="document.getElementById('import-file').click()" class="py-3 px-4 bg-blue-700 text-white rounded-xl hover:bg-blue-600 transition-all duration-300 text-sm font-medium">
                            Importer JSON
                        </button>
                    </div>
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