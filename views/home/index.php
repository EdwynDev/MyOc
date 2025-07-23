<?php 
$title = 'YOC Studio - Créateur d\'Original Characters | Gestionnaire de personnages';
$description = 'YOC Studio : créez, organisez et gérez vos Original Characters avec notre interface moderne. Outils avancés pour character design, communauté créative, export/import sécurisé.';
$keywords = 'original character, OC, character design, personnage original, création personnage, fantasy, roleplay, gestionnaire OC, studio création';
$canonical = 'https://yoc.studio/';
$og_title = 'YOC Studio - Le meilleur outil pour créer vos Original Characters';
$og_description = 'Découvrez YOC Studio, la plateforme moderne pour créer, organiser et partager vos Original Characters. Interface intuitive, outils avancés, communauté active.';
ob_start(); 
?>

<div class="min-h-screen flex items-center justify-center px-4 relative">
    <!-- Background particles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-lg w-full space-y-8 fade-in relative z-10">
        <!-- Logo et titre -->
        <div class="text-center">
            <div class="mx-auto h-24 w-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl flex items-center justify-center mb-8 shadow-2xl hover-lift">
                <span class="text-3xl font-bold text-white neon-text">YOC</span>
            </div>
            <h2 class="text-4xl font-bold text-white mb-4 neon-text">Your Original Character</h2>
            <p class="text-gray-400 mb-12 text-lg leading-relaxed">
                Studio de création et gestion d'Original Characters avec formulaires personnalisables
            </p>
        </div>
        
        <!-- Carte principale -->
        <div class="glass-dark rounded-2xl p-8 border border-gray-800 hover-lift">
            <div class="mb-8">
                <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Fonctionnalités principales
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-300">Gestion complète d'Original Characters et de races</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-300">Interface moderne et responsive</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-300">Export/Import JSON pour sauvegarder vos créations</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-300">Communauté pour partager vos créations</span>
                    </div>
                </div>
            </div>
            
            <!-- Avertissement sécurité -->
            <div class="glass rounded-xl p-6 mb-8 border border-blue-500/30">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-blue-400 font-medium mb-2">100% Sécurisé & Privé</h4>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            Toutes vos données sont stockées localement sur votre appareil. 
                            Aucune information n'est transmise vers des serveurs externes.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Bouton principal -->
            <div class="text-center">
                <a href="/login" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-bold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl btn-primary text-lg">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Commencer l'aventure
                </a>
            </div>
        </div>
        
        <!-- Lien mentions légales -->
        <div class="text-center">
            <a href="/legal" class="text-gray-500 hover:text-gray-400 transition-colors text-sm">
                Mentions légales et confidentialité
            </a>
        </div>
    </div>
</div>

<script>
    // Vérifier si des données existent déjà
    window.addEventListener('DOMContentLoaded', function() {
        if (localStorage.getItem('oc_data') || localStorage.getItem('user_name')) {
            const container = document.querySelector('.max-w-lg');
            const existingDataDiv = document.createElement('div');
            existingDataDiv.className = 'mt-8 glass-dark rounded-2xl p-6 border border-yellow-500/30';
            existingDataDiv.innerHTML = `
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <span class="text-yellow-400 font-medium">Données détectées</span>
                </div>
                <p class="text-gray-400 mb-4 text-sm">
                    Une sauvegarde a été trouvée sur cet appareil.
                </p>
                <div class="flex space-x-3">
                    <a href="/login" class="flex-1 text-center py-3 px-4 bg-gradient-to-r from-yellow-600 to-orange-600 text-white rounded-xl hover:from-yellow-700 hover:to-orange-700 transition-all duration-300 text-sm font-medium btn-primary">
                        Charger la sauvegarde
                    </a>
                    <button onclick="localStorage.clear(); location.reload();" class="flex-1 py-3 px-4 bg-gray-700 text-white rounded-xl hover:bg-gray-600 transition-all duration-300 text-sm font-medium">
                        Nouvelle session
                    </button>
                </div>
            `;
            container.appendChild(existingDataDiv);
        }
    });
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>