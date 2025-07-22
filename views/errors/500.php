<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur serveur - YOC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Electrolize:wght@400&display=swap" rel="stylesheet">
    <style>body { font-family: 'Electrolize', sans-serif; }</style>
</head>
<body class="h-full bg-gradient-to-br from-indigo-50 via-white to-cyan-50">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full text-center">
            <div class="mb-8">
                <div class="mx-auto h-20 w-20 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center mb-6">
                    <span class="text-3xl font-bold text-white">500</span>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Erreur serveur</h1>
                <p class="text-gray-600 mb-8">
                    Une erreur inattendue s'est produite. Veuillez réessayer plus tard.
                </p>
            </div>
            
            <div class="space-y-4">
                <a href="/" class="block w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-4 rounded-md hover:from-indigo-700 hover:to-purple-700 transition-all duration-200">
                    Retour à l'accueil
                </a>
                
                <button onclick="location.reload()" class="block w-full bg-white text-gray-700 border border-gray-300 py-3 px-4 rounded-md hover:bg-gray-50 transition-all duration-200">
                    Réessayer
                </button>
            </div>
        </div>
    </div>
</body>
</html>