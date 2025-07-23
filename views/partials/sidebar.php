<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-80 glass-dark backdrop-blur-xl transform -translate-x-full lg:translate-x-0 transition-all duration-500 ease-in-out border-r border-gray-800">
    <div class="flex flex-col h-full">
        <!-- Header -->
        <div class="flex items-center justify-between h-20 px-6 border-b border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-xl">
                    <span class="text-white font-bold text-xl neon-text">YOC</span>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-white neon-text">Studio</h2>
                    <p class="text-xs text-gray-400">Character Manager</p>
                </div>
            </div>
            <button id="sidebar-close" class="lg:hidden p-2 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Navigation -->
        <nav class="flex-1 px-4 py-8 space-y-3 overflow-y-auto">
            <a href="/dashboard" class="nav-link group flex items-center px-4 py-4 text-gray-300 rounded-xl hover:bg-gray-800/50 hover:text-white transition-all duration-300 border border-transparent hover:border-gray-700">
                <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-800 rounded-lg flex items-center justify-center mr-4 group-hover:from-blue-600 group-hover:to-purple-600 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                    </svg>
                </div>
                <div>
                    <span class="font-medium">Tableau de bord</span>
                    <p class="text-xs text-gray-500 group-hover:text-gray-400">Vue d'ensemble</p>
                </div>
            </a>
            
            <a href="/ocs" class="nav-link group flex items-center px-4 py-4 text-gray-300 rounded-xl hover:bg-gray-800/50 hover:text-white transition-all duration-300 border border-transparent hover:border-gray-700">
                <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-800 rounded-lg flex items-center justify-center mr-4 group-hover:from-indigo-600 group-hover:to-purple-600 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <span class="font-medium">Mes OC</span>
                    <p class="text-xs text-gray-500 group-hover:text-gray-400">Original Characters</p>
                </div>
            </a>
            
            <a href="/races" class="nav-link group flex items-center px-4 py-4 text-gray-300 rounded-xl hover:bg-gray-800/50 hover:text-white transition-all duration-300 border border-transparent hover:border-gray-700">
                <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-800 rounded-lg flex items-center justify-center mr-4 group-hover:from-green-600 group-hover:to-teal-600 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div>
                    <span class="font-medium">Races</span>
                    <p class="text-xs text-gray-500 group-hover:text-gray-400">Espèces & Types</p>
                </div>
            </a>
            
            <div class="border-t border-gray-800 my-6"></div>
            
            <a href="/community" class="nav-link group flex items-center px-4 py-4 text-gray-300 rounded-xl hover:bg-gray-800/50 hover:text-white transition-all duration-300 border border-transparent hover:border-gray-700">
                <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-800 rounded-lg flex items-center justify-center mr-4 group-hover:from-pink-600 group-hover:to-rose-600 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <div>
                    <span class="font-medium">Communauté</span>
                    <p class="text-xs text-gray-500 group-hover:text-gray-400">Partage & Découverte</p>
                </div>
            </a>
            
            <a href="/settings" class="nav-link group flex items-center px-4 py-4 text-gray-300 rounded-xl hover:bg-gray-800/50 hover:text-white transition-all duration-300 border border-transparent hover:border-gray-700">
                <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-800 rounded-lg flex items-center justify-center mr-4 group-hover:from-gray-600 group-hover:to-gray-700 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <span class="font-medium">Paramètres</span>
                    <p class="text-xs text-gray-500 group-hover:text-gray-400">Configuration</p>
                </div>
            </a>
        </nav>
        
        <!-- Footer -->
        <div class="p-6 border-t border-gray-800">
            <div class="glass rounded-xl p-4">
                <div class="flex items-center mb-3">
                    <svg class="w-5 h-5 text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="text-sm font-medium text-white">Stockage Local</span>
                </div>
                <p class="text-xs text-gray-400 mb-3">
                    Vos données sont sécurisées localement. Pensez à exporter régulièrement !
                </p>
                <button onclick="exportData()" class="w-full text-xs bg-gradient-to-r from-blue-600 to-purple-600 text-white px-3 py-2 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 btn-primary">
                    Exporter maintenant
                </button>
            </div>
        </div>
    </div>
</aside>