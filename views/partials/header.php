<header class="glass-dark backdrop-blur-xl border-b border-gray-800 lg:ml-80 transition-all duration-500 sticky top-0 z-30">
    <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center">
            <button id="sidebar-toggle" class="lg:hidden mr-4 p-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-xl transition-all duration-300 group">
                <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-lg neon-text">Y</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white neon-text">YOC Manager</h1>
                    <p class="text-xs text-gray-400">Original Character Studio</p>
                </div>
            </div>
        </div>
        
        <div class="flex items-center space-x-4">
            <div class="hidden sm:flex items-center space-x-4">
                <div class="flex items-center space-x-3 glass px-4 py-2 rounded-xl">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-lg">
                        <?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-white"><?= $_SESSION['user_name'] ?></span>
                        <p class="text-xs text-gray-400">Créateur</p>
                    </div>
                </div>
            </div>
            
            <div class="sm:hidden w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-lg">
                <?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?>
            </div>
            
            <a href="/logout" class="text-sm text-red-400 hover:text-red-300 transition-colors px-3 py-2 rounded-lg hover:bg-red-900/20 border border-red-800/30 hover:border-red-600/50">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Déconnexion
            </a>
        </div>
    </div>
</header>