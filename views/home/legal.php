<?php 
$title = 'Mentions légales - YOC';
ob_start(); 
?>

<div class="min-h-screen py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12 fade-in">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Mentions légales et Confidentialité</h1>
            <p class="text-gray-600">Informations importantes sur l'utilisation de YOC</p>
        </div>
        
        <div class="space-y-8">
            <div class="bg-white p-8 rounded-lg shadow-lg fade-in">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Stockage des données</h2>
                
                <div class="space-y-6">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-green-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="font-medium text-green-800 mb-2">100% Local</h3>
                                <p class="text-green-700 text-sm">
                                    Toutes vos données (OC, races, paramètres) sont stockées uniquement dans le stockage local de votre navigateur. 
                                    Aucune information n'est transmise vers des serveurs externes.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <div>
                                <h3 class="font-medium text-blue-800 mb-2">Sécurité et Confidentialité</h3>
                                <p class="text-blue-700 text-sm mb-2">
                                    Vos Original Characters et toutes les informations associées restent privés et ne sont accessibles que par vous.
                                </p>
                                <p class="text-blue-700 text-sm">
                                    Le créateur de cette application n'a aucun accès à vos données personnelles ou à vos créations.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-amber-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <div>
                                <h3 class="font-medium text-amber-800 mb-2">Recommandations importantes</h3>
                                <ul class="text-amber-700 text-sm space-y-1">
                                    <li>• Exportez régulièrement vos données en JSON pour éviter toute perte</li>
                                    <li>• La suppression des données du navigateur effacera définitivement vos OC</li>
                                    <li>• Les mises à jour du navigateur peuvent parfois réinitialiser le stockage local</li>
                                    <li>• Conservez toujours une copie de sauvegarde de vos créations</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg fade-in">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Utilisation de l'application</h2>
                
                <div class="space-y-4">
                    <div>
                        <h3 class="font-medium text-gray-900 mb-2">Propriété intellectuelle</h3>
                        <p class="text-gray-700 text-sm">
                            Tous les Original Characters que vous créez vous appartiennent entièrement. Cette application est un simple outil 
                            de gestion et n'a aucun droit sur vos créations.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-gray-900 mb-2">Responsabilité</h3>
                        <p class="text-gray-700 text-sm">
                            L'application est fournie "en l'état". Nous recommandons fortement de sauvegarder régulièrement vos données. 
                            L'utilisateur est responsable de la conservation de ses créations.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-gray-900 mb-2">Code source</h3>
                        <p class="text-gray-700 text-sm">
                            Cette application est créée avec des technologies web standard (PHP, JavaScript, Tailwind CSS) 
                            et fonctionne entièrement côté client pour le stockage des données.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="/" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>