// JavaScript pour les fonctionnalités communautaires

class CommunityManager {
    constructor() {
        this.initializeEventListeners();
    }
    
    initializeEventListeners() {
        // Gestion des likes
        document.addEventListener('click', (e) => {
            if (e.target.matches('.like-btn') || e.target.closest('.like-btn')) {
                e.preventDefault();
                this.handleLike(e.target.closest('.like-btn'));
            }
        });
        
        // Gestion des commentaires
        document.addEventListener('submit', (e) => {
            if (e.target.matches('.comment-form')) {
                e.preventDefault();
                this.handleComment(e.target);
            }
        });
        
        // Gestion du suivi d'utilisateurs
        document.addEventListener('click', (e) => {
            if (e.target.matches('.follow-btn') || e.target.closest('.follow-btn')) {
                e.preventDefault();
                this.handleFollow(e.target.closest('.follow-btn'));
            }
        });
    }
    
    async handleLike(button) {
        const type = button.dataset.type; // 'oc' ou 'race'
        const itemId = button.dataset.id;
        
        if (!itemId || !type) return;
        
        try {
            const response = await fetch(`/community/like-${type}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `${type}_id=${itemId}`
            });
            
            const data = await response.json();
            
            if (data.success) {
                // Mettre à jour l'interface
                const icon = button.querySelector('.like-icon');
                const count = button.querySelector('.like-count');
                
                if (data.liked) {
                    icon.textContent = '❤️';
                    button.classList.add('liked');
                } else {
                    icon.textContent = '🤍';
                    button.classList.remove('liked');
                }
                
                count.textContent = data.count;
                
                // Animation
                button.classList.add('animate-pulse');
                setTimeout(() => button.classList.remove('animate-pulse'), 300);
            } else {
                if (response.status === 401) {
                    this.showNotification('Vous devez être connecté pour liker', 'warning');
                } else {
                    this.showNotification(data.message || 'Erreur lors du like', 'error');
                }
            }
        } catch (error) {
            this.showNotification('Erreur de connexion', 'error');
        }
    }
    
    async handleComment(form) {
        const formData = new FormData(form);
        
        try {
            const response = await fetch('/community/add-comment', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                // Ajouter le commentaire à la liste
                this.addCommentToList(data.comment, form);
                
                // Réinitialiser le formulaire
                form.reset();
                
                this.showNotification('Commentaire ajouté !', 'success');
            } else {
                if (response.status === 401) {
                    this.showNotification('Vous devez être connecté pour commenter', 'warning');
                } else {
                    this.showNotification(data.message || 'Erreur lors de l\'ajout du commentaire', 'error');
                }
            }
        } catch (error) {
            this.showNotification('Erreur de connexion', 'error');
        }
    }
    
    addCommentToList(comment, form) {
        const commentsList = document.querySelector('.comments-list');
        if (!commentsList) return;
        
        const commentElement = document.createElement('div');
        commentElement.className = 'bg-gray-50 p-4 rounded-lg';
        commentElement.innerHTML = `
            <div class="flex items-start space-x-3">
                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                    ${comment.username.charAt(0).toUpperCase()}
                </div>
                <div class="flex-1">
                    <div class="flex items-center space-x-2 mb-1">
                        <span class="font-medium text-gray-900">${comment.username}</span>
                        <span class="text-xs text-gray-500">À l'instant</span>
                    </div>
                    <p class="text-gray-700 text-sm">${comment.content}</p>
                </div>
            </div>
        `;
        
        commentsList.appendChild(commentElement);
        
        // Scroll vers le nouveau commentaire
        commentElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
    
    async handleFollow(button) {
        const userId = button.dataset.userId;
        
        if (!userId) return;
        
        try {
            const response = await fetch('/community/follow', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `user_id=${userId}`
            });
            
            const data = await response.json();
            
            if (data.success) {
                if (data.following) {
                    button.textContent = 'Ne plus suivre';
                    button.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                    button.classList.add('bg-gray-600', 'hover:bg-gray-700');
                } else {
                    button.textContent = 'Suivre';
                    button.classList.remove('bg-gray-600', 'hover:bg-gray-700');
                    button.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
                }
                
                // Mettre à jour le compteur si présent
                const followersCount = document.querySelector('.followers-count');
                if (followersCount) {
                    followersCount.textContent = data.followers_count;
                }
            } else {
                if (response.status === 401) {
                    this.showNotification('Vous devez être connecté pour suivre', 'warning');
                } else {
                    this.showNotification(data.message || 'Erreur lors du suivi', 'error');
                }
            }
        } catch (error) {
            this.showNotification('Erreur de connexion', 'error');
        }
    }
    
    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 max-w-md ${this.getNotificationClasses(type)} rounded-lg shadow-lg slide-in`;
        notification.innerHTML = `
            <div class="flex items-center p-4">
                ${this.getNotificationIcon(type)}
                <div class="flex-1">
                    <p class="text-sm font-medium ${this.getNotificationTextClass(type)}">${message}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-2 ${this.getNotificationButtonClass(type)}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 5000);
    }
    
    getNotificationClasses(type) {
        const classes = {
            success: 'bg-green-50 border border-green-200',
            error: 'bg-red-50 border border-red-200',
            info: 'bg-blue-50 border border-blue-200',
            warning: 'bg-amber-50 border border-amber-200'
        };
        return classes[type] || classes.info;
    }
    
    getNotificationIcon(type) {
        const icons = {
            success: '<svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>',
            error: '<svg class="w-5 h-5 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>',
            warning: '<svg class="w-5 h-5 text-amber-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>',
            info: '<svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
        };
        return icons[type] || icons.info;
    }
    
    getNotificationTextClass(type) {
        const classes = {
            success: 'text-green-800',
            error: 'text-red-800',
            info: 'text-blue-800',
            warning: 'text-amber-800'
        }
    }
}
// Modal d'affichage d'images
function openImageModal(src, alt, caption = '') {
    const modal = document.getElementById('image-modal');
    if (!modal) {
        // Créer le modal s'il n'existe pas
        const modalHTML = `
            <div id="image-modal" class="fixed inset-0 bg-black/90 backdrop-blur-sm z-50 hidden flex items-center justify-center p-6">
                <div class="relative max-w-6xl max-h-full">
                    <button onclick="closeImageModal()" class="absolute -top-4 -right-4 w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <img id="modal-image" src="" alt="" class="max-w-full max-h-full object-contain rounded-2xl shadow-2xl">
                    <div id="modal-caption" class="absolute bottom-0 left-0 right-0 bg-black/70 backdrop-blur-sm text-white p-6 rounded-b-2xl"></div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', modalHTML);
    }
    
    const image = document.getElementById('modal-image');
    const captionEl = document.getElementById('modal-caption');
    
    image.src = src;
    image.alt = alt;
    captionEl.textContent = caption;
    
    document.getElementById('image-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('image-modal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

// Initialiser le gestionnaire communautaire
window.addEventListener('DOMContentLoaded', function() {
    window.communityManager = new CommunityManager();
    
    // Setup image modal
    document.addEventListener('click', function(e) {
        if (e.target.matches('.modal-image')) {
            openImageModal(e.target.src, e.target.alt, e.target.dataset.caption || '');
        }
    });
    
    // Fermer le modal avec Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });
});

// Fonctions utilitaires pour les vues
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

function formatRelativeTime(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    const diffInSeconds = Math.floor((now - date) / 1000);
    
    if (diffInSeconds < 60) return 'À l\'instant';
    if (diffInSeconds < 3600) return `Il y a ${Math.floor(diffInSeconds / 60)} min`;
    if (diffInSeconds < 86400) return `Il y a ${Math.floor(diffInSeconds / 3600)} h`;
    if (diffInSeconds < 2592000) return `Il y a ${Math.floor(diffInSeconds / 86400)} j`;
    
    return formatDate(dateString);
}

function truncateText(text, maxLength = 150) {
    if (text.length <= maxLength) return text;
    return text.substring(0, maxLength) + '...';
}