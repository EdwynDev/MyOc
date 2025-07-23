<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'YOC - Gestionnaire d\'OC' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Electrolize:wght@400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Electrolize', sans-serif; }
        .fade-in { animation: fadeIn 0.5s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .slide-in { animation: slideIn 0.3s ease-out; }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
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
<body class="h-full bg-gradient-to-br from-indigo-50 via-white to-cyan-50 font-electrolize">
    <div class="min-h-screen">
        <?php if (isset($_SESSION['user_name'])): ?>
            <?php include __DIR__ . '/../partials/header.php'; ?>
            <?php include __DIR__ . '/../partials/sidebar.php'; ?>
            <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>
            <main class="ml-0 lg:ml-64 transition-all duration-300">
                <div class="p-4 lg:p-8">
                    <?php include __DIR__ . '/../partials/alerts.php'; ?>
                    <?= $content ?>
                </div>
            </main>
        <?php else: ?>
            <?php include __DIR__ . '/../partials/alerts.php'; ?>
            <?= $content ?>
        <?php endif; ?>
    </div>
    
    <script>
        // Fonctions globales définies immédiatement
        // Attendre que app.js soit chargé avant de définir les fonctions globales
        document.addEventListener('DOMContentLoaded', function() {
            // Attendre un peu pour que app.js soit complètement chargé
            setTimeout(function() {
                window.exportData = function() {
                    if (window.ocManager) {
                        window.ocManager.exportData();
                    }
                };
                
                window.confirmDelete = function(message = 'Êtes-vous sûr de vouloir supprimer cet élément ?') {
                    return confirm(message);
                };
                
                window.createOC = function(ocData) {
                    if (window.ocManager) {
                        return window.ocManager.createOC(ocData);
                    }
                    console.error('ocManager not available');
                    return null;
                };
                
                window.createRace = function(raceData) {
                    if (window.ocManager) {
                        return window.ocManager.createRace(raceData);
                    }
                    console.error('ocManager not available');
                    return null;
                };
                
                window.updateOC = function(id, updates) {
                    if (window.ocManager) {
                        return window.ocManager.updateOC(id, updates);
                    }
                    console.error('ocManager not available');
                    return null;
                };
                
                window.updateRace = function(id, updates) {
                    if (window.ocManager) {
                        return window.ocManager.updateRace(id, updates);
                    }
                    return null;
                };
                
                window.deleteOC = function(id) {
                    if (window.ocManager) {
                        return window.ocManager.deleteOC(id);
                    }
                    return null;
                };
                
                window.deleteRace = function(id) {
                    if (window.ocManager) {
                        return window.ocManager.deleteRace(id);
                    }
                    return null;
                };
                
                window.getOC = function(id) {
                    if (window.ocManager) {
                        return window.ocManager.getOC(id);
                    }
                    return null;
                };
                
                window.getRace = function(id) {
                    if (window.ocManager) {
                        return window.ocManager.getRace(id);
                    }
                    return null;
                };
                
                window.showNotification = function(message, type = 'info') {
                    if (window.ocManager) {
                        return window.ocManager.showNotification(message, type);
                    } else {
                        alert(message);
                    }
                };
            }, 100);
        });
    </script>
    <script src="../../assets/js/app.js"></script>
    <?php if (isset($scripts)): ?>
        <?php foreach ($scripts as $script): ?>
            <script src="<?= $script ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>