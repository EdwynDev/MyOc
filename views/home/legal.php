<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions légales - YOC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Electrolize:wght@400&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Electrolize', monospace; 
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #0f0f0f 100%);
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .glass-dark {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .fade-in { 
            animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(30px); } 
            to { opacity: 1; transform: translateY(0); } 
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .neon-text {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'electrolize': ['Electrolize', 'monospace'],
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full bg-gray-900 text-white font-electrolize">
    <div class="min-h-screen p-6 lg:p-12">
        <div class="max-w-6xl mx-auto fade-in">
            <!-- Header -->
            <div class="text-center mb-16">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-2xl">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h1 class="text-5xl font-bold text-white neon-text mb-4">Mentions légales et Confidentialité</h1>
                <p class="text-gray-400 text-xl">Informations importantes sur l'utilisation de YOC</p>
            </div>
            
            <!-- Stockage des données -->
            <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
                <h2 class="text-3xl font-bold text-white mb-10 flex items-center">
                    <svg class="w-8 h-8 mr-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Stockage des données
                </h2>
                
                <div class="space-y-8">
                    <div class="glass rounded-2xl p-8 border border-green-500/30">
                        <div class="flex items-start space-x-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-green-400 mb-4">100% Local</h3>
                                <p class="text-gray-300 leading-relaxed">
                                    Toutes vos données (OC, races, paramètres) sont stockées uniquement dans le stockage local de votre navigateur. 
                                    Aucune information n'est transmise vers des serveurs externes.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass rounded-2xl p-8 border border-blue-500/30">
                        <div class="flex items-start space-x-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-blue-400 mb-4">Sécurité et Confidentialité</h3>
                                <p class="text-gray-300 mb-4 leading-relaxed">
                                    Vos Original Characters et toutes les informations associées restent privés et ne sont accessibles que par vous.
                                </p>
                                <p class="text-gray-300 leading-relaxed">
                                    Le créateur de cette application n'a aucun accès à vos données personnelles ou à vos créations.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass rounded-2xl p-8 border border-amber-500/30">
                        <div class="flex items-start space-x-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-amber-400 mb-4">Recommandations importantes</h3>
                                <ul class="text-gray-300 space-y-2 leading-relaxed">
                                    <li class="flex items-start">
                                        <span class="text-amber-400 mr-3">•</span>
                                        Exportez régulièrement vos données en JSON pour éviter toute perte
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-amber-400 mr-3">•</span>
                                        La suppression des données du navigateur effacera définitivement vos OC
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-amber-400 mr-3">•</span>
                                        Les mises à jour du navigateur peuvent parfois réinitialiser le stockage local
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-amber-400 mr-3">•</span>
                                        Conservez toujours une copie de sauvegarde de vos créations
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Utilisation de l'application -->
            <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
                <h2 class="text-3xl font-bold text-white mb-10 flex items-center">
                    <svg class="w-8 h-8 mr-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Utilisation de l'application
                </h2>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="space-y-8">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Propriété intellectuelle</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed">
                                    Tous les Original Characters que vous créez vous appartiennent entièrement. Cette application est un simple outil 
                                    de gestion et n'a aucun droit sur vos créations.
                                </p>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Responsabilité</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed">
                                    L'application est fournie "en l'état". Nous recommandons fortement de sauvegarder régulièrement vos données. 
                                    L'utilisateur est responsable de la conservation de ses créations.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-8">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Code source</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed">
                                    Cette application est créée avec des technologies web standard (PHP, JavaScript, Tailwind CSS) 
                                    et fonctionne entièrement côté client pour le stockage des données.
                                </p>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Communauté</h3>
                            <div class="glass rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed">
                                    La fonctionnalité communautaire permet de partager vos créations. Les données partagées deviennent publiques 
                                    mais vous gardez tous vos droits sur vos créations.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="text-center">
                <a href="/" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl font-bold hover-lift">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</body>
</html>