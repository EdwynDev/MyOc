<?php if (isset($_SESSION['success'])): ?>
    <div id="success-alert" class="fixed top-4 right-4 z-50 max-w-md bg-green-50 border border-green-200 rounded-lg shadow-lg slide-in">
        <div class="flex items-center p-4">
            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <div class="flex-1">
                <p class="text-sm font-medium text-green-800"><?= $_SESSION['success'] ?></p>
            </div>
            <button onclick="this.parentElement.parentElement.style.display='none'" class="ml-2 text-green-600 hover:text-green-800">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div id="error-alert" class="fixed top-4 right-4 z-50 max-w-md bg-red-50 border border-red-200 rounded-lg shadow-lg slide-in">
        <div class="flex items-center p-4">
            <svg class="w-5 h-5 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <div class="flex-1">
                <p class="text-sm font-medium text-red-800"><?= $_SESSION['error'] ?></p>
            </div>
            <button onclick="this.parentElement.parentElement.style.display='none'" class="ml-2 text-red-600 hover:text-red-800">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>