// Application JavaScript principal pour YOC

class OCManager {
    constructor() {
        this.data = this.loadData();
        this.initializeEventListeners();
    }
    
    loadData() {
        const stored = localStorage.getItem('oc_data');
        return stored ? JSON.parse(stored) : {
            ocs: [],
            races: [],
            custom_fields: {
                oc: {},
                race: {}
            },
            settings: {}
        };
    }
    
    saveData() {
        localStorage.setItem('oc_data', JSON.stringify(this.data));
        localStorage.setItem('last_save', Date.now().toString());
        this.showNotification('Données sauvegardées !', 'success');
    }
    
    initializeEventListeners() {
        // Sidebar toggle
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarClose = document.getElementById('sidebar-close');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                if (overlay) {
                    overlay.classList.toggle('hidden');
                }
            });
        }
        
        if (sidebarClose && sidebar) {
            sidebarClose.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                if (overlay) {
                    overlay.classList.add('hidden');
                }
            });
        }
        
        if (overlay) {
            overlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        }
        
        // Fermer le sidebar avec Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && sidebar && !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
                if (overlay) {
                    overlay.classList.add('hidden');
                }
            }
        });
        
        // Navigation active state
        this.updateActiveNavigation();
        
        // Auto-hide alerts
        this.autoHideAlerts();
    }
    
    updateActiveNavigation() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href === currentPath || (currentPath.startsWith(href) && href !== '/')) {
                link.classList.add('bg-indigo-100', 'text-indigo-700');
            } else {
                link.classList.remove('bg-indigo-100', 'text-indigo-700');
            }
        });
    }
    
    autoHideAlerts() {
        const alerts = document.querySelectorAll('#success-alert, #error-alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                if (alert) {
                    alert.style.opacity = '0';
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 300);
                }
            }, 5000);
        });
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
        };
        return classes[type] || classes.info;
    }
    
    getNotificationButtonClass(type) {
        const classes = {
            success: 'text-green-600 hover:text-green-800',
            error: 'text-red-600 hover:text-red-800',
            info: 'text-blue-600 hover:text-blue-800',
            warning: 'text-amber-600 hover:text-amber-800'
        };
        return classes[type] || classes.info;
    }
    
    generateId() {
        return Date.now().toString(36) + Math.random().toString(36).substr(2);
    }
    
    // Méthodes pour les OCs
    createOC(ocData) {
        const oc = {
            id: this.generateId(),
            created_at: new Date().toISOString(),
            updated_at: new Date().toISOString(),
            ...ocData
        };
        
        // Nettoyer les données vides
        Object.keys(oc).forEach(key => {
            if (oc[key] === '' || oc[key] === null || oc[key] === undefined) {
                delete oc[key];
            }
        });
        
        this.data.ocs.push(oc);
        this.saveData();
        return oc;
    }
    
    updateOC(id, updates) {
        const index = this.data.ocs.findIndex(oc => oc.id === id);
        if (index !== -1) {
            this.data.ocs[index] = {
                ...this.data.ocs[index],
                ...updates,
                updated_at: new Date().toISOString()
            };
            this.saveData();
            return this.data.ocs[index];
        }
        return null;
    }
    
    deleteOC(id) {
        const index = this.data.ocs.findIndex(oc => oc.id === id);
        if (index !== -1) {
            const deleted = this.data.ocs.splice(index, 1)[0];
            this.saveData();
            return deleted;
        }
        return null;
    }
    
    getOC(id) {
        return this.data.ocs.find(oc => oc.id === id);
    }
    
    // Méthodes pour les races
    createRace(raceData) {
        const race = {
            id: this.generateId(),
            created_at: new Date().toISOString(),
            updated_at: new Date().toISOString(),
            ...raceData
        };
        
        // Nettoyer les données vides
        Object.keys(race).forEach(key => {
            if (race[key] === '' || race[key] === null || race[key] === undefined) {
                delete race[key];
            }
        });
        
        this.data.races.push(race);
        this.saveData();
        return race;
    }
    
    updateRace(id, updates) {
        const index = this.data.races.findIndex(race => race.id === id);
        if (index !== -1) {
            this.data.races[index] = {
                ...this.data.races[index],
                ...updates,
                updated_at: new Date().toISOString()
            };
            this.saveData();
            return this.data.races[index];
        }
        return null;
    }
    
    deleteRace(id) {
        const index = this.data.races.findIndex(race => race.id === id);
        if (index !== -1) {
            const deleted = this.data.races.splice(index, 1)[0];
            this.saveData();
            return deleted;
        }
        return null;
    }
    
    getRace(id) {
        return this.data.races.find(race => race.id === id);
    }
    
    // Import/Export
    exportData() {
        const exportData = {
            ...this.data,
            user_name: localStorage.getItem('user_name'),
            exported_at: new Date().toISOString(),
            version: '1.0'
        };
        
        const blob = new Blob([JSON.stringify(exportData, null, 2)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `oc_data_${new Date().toISOString().split('T')[0]}.json`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        this.showNotification('Données exportées avec succès !', 'success');
        localStorage.setItem('last_save', Date.now().toString());
    }
    
    importData(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                try {
                    const importedData = JSON.parse(e.target.result);
                    
                    // Validation basique
                    if (importedData.ocs && Array.isArray(importedData.ocs)) {
                        this.data.ocs = [...this.data.ocs, ...importedData.ocs];
                    }
                    if (importedData.races && Array.isArray(importedData.races)) {
                        this.data.races = [...this.data.races, ...importedData.races];
                    }
                    if (importedData.custom_fields) {
                        this.data.custom_fields = {
                            ...this.data.custom_fields,
                            ...importedData.custom_fields
                        };
                    }
                    
                    this.saveData();
                    this.showNotification('Données importées avec succès !', 'success');
                    resolve(importedData);
                } catch (error) {
                    this.showNotification('Erreur lors de l\'importation du fichier JSON', 'error');
                    reject(error);
                }
            };
            reader.onerror = () => {
                this.showNotification('Erreur lors de la lecture du fichier', 'error');
                reject(new Error('File read error'));
            };
            reader.readAsText(file);
        });
    }
}

// Instance globale
window.ocManager = new OCManager();

// Fonctions globales utiles
window.exportData = function() {
    window.ocManager.exportData();
};

window.confirmDelete = function(message = 'Êtes-vous sûr de vouloir supprimer cet élément ?') {
    return confirm(message);
};

// Fonctions globales pour les formulaires
window.createOC = function(ocData) {
    return window.ocManager.createOC(ocData);
};

window.createRace = function(raceData) {
    return window.ocManager.createRace(raceData);
};

window.updateOC = function(id, updates) {
    return window.ocManager.updateOC(id, updates);
};

window.updateRace = function(id, updates) {
    return window.ocManager.updateRace(id, updates);
};

window.deleteOC = function(id) {
    return window.ocManager.deleteOC(id);
};

window.deleteRace = function(id) {
    return window.ocManager.deleteRace(id);
};

window.getOC = function(id) {
    return window.ocManager.getOC(id);
};

window.getRace = function(id) {
    return window.ocManager.getRace(id);
};

window.showNotification = function(message, type = 'info') {
    return window.ocManager.showNotification(message, type);
};