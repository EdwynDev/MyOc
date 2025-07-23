<?php if (isset($_SESSION['success'])): ?>
    <div id="success-alert" class="fixed top-6 right-6 z-50 max-w-md glass-dark backdrop-blur-xl rounded-xl shadow-2xl scale-in border border-green-500/30">
        <div class="flex items-center p-4">
            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-green-400"><?= $_SESSION['success'] ?></p>
            </div>
            <button onclick="this.parentElement.parentElement.style.display='none'" class="ml-2 text-green-400 hover:text-green-300 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div id="error-alert" class="fixed top-6 right-6 z-50 max-w-md glass-dark backdrop-blur-xl rounded-xl shadow-2xl scale-in border border-red-500/30">
        <div class="flex items-center p-4">
            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-rose-600 rounded-lg flex items-center justify-center mr-3 shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-red-400"><?= $_SESSION['error'] ?></p>
            </div>
            <button onclick="this.parentElement.parentElement.style.display='none'" class="ml-2 text-red-400 hover:text-red-300 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>