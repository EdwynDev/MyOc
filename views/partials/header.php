<header class="bg-white shadow-sm border-b border-gray-200 lg:ml-64 transition-all duration-300">
    <div class="flex items-center justify-between px-4 sm:px-6 py-3">
        <div class="flex items-center">
            <button id="sidebar-toggle" class="lg:hidden mr-2 sm:mr-3 p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h1 class="text-lg sm:text-xl font-bold text-gray-900 truncate">Gestionnaire d'OC</h1>
        </div>
        <div class="flex items-center space-x-2 sm:space-x-4">
            <div class="hidden sm:flex items-center space-x-2">
                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                    <?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?>
                </div>
                <span class="text-sm font-medium text-gray-700"><?= $_SESSION['user_name'] ?></span>
            </div>
            <div class="sm:hidden w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                <?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?>
            </div>
            <a href="/logout" class="text-xs sm:text-sm text-red-600 hover:text-red-800 transition-colors px-2 py-1 rounded">
                Déconnexion
            </a>
        </div>
    </div>
</header>