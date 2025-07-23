<?php 
$title = 'Publier une race - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-6xl mx-auto">
        <div class="mb-12">
            <h1 class="text-5xl font-bold text-white neon-text mb-4">Publier une race dans la communauté</h1>
            <p class="text-gray-400 text-xl">Partagez votre race avec la communauté</p>
        </div>
        
        <!-- Sélection depuis l'espace personnel -->
        <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
            <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                <svg class="w-8 h-8 mr-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Choisir une race depuis votre espace personnel
            </h2>
            
            <div id="personal-races-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Sera rempli par JavaScript -->
            </div>
            
            <div id="no-personal-races" class="hidden text-center py-20">
                <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl flex items-center justify-center mx-auto mb-8">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Aucune race dans votre espace personnel</h3>
                <p class="text-gray-400 mb-8">Créez d'abord des races dans votre espace personnel pour les partager</p>
                <a href="/races/create" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl font-bold">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Créer une race
                </a>
            </div>
        </div>
        
        <!-- Formulaire de publication -->
        <form id="publish-form" class="hidden glass-dark rounded-3xl p-12 border border-gray-800">
            <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                <svg class="w-8 h-8 mr-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
                Détails de publication
            </h2>
            
            <input type="hidden" id="selected-race-id" name="race_id">
            
            <div class="space-y-12">
                <!-- Aperçu de la race sélectionnée -->
                <div id="race-preview" class="glass rounded-2xl p-8 border border-gray-700">
                    <!-- Sera rempli par JavaScript -->
                </div>
                
                <!-- Options de publication -->
                <div>
                    <label class="block text-xl font-bold text-white mb-6">Options de publication</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="glass rounded-2xl p-6 hover-lift">
                            <div class="flex items-center">
                                <input type="checkbox" id="include-images" name="include_images" checked class="h-6 w-6 text-green-600 focus:ring-green-500 border-gray-600 rounded bg-gray-800">
                                <label for="include-images" class="ml-4 block text-lg text-white font-medium">Inclure les images</label>
                            </div>
                            <p class="text-gray-400 text-sm mt-2">Partager les images de votre race</p>
                        </div>
                        <div class="glass rounded-2xl p-6 hover-lift">
                            <div class="flex items-center">
                                <input type="checkbox" id="include-culture" name="include_culture" checked class="h-6 w-6 text-green-600 focus:ring-green-500 border-gray-600 rounded bg-gray-800">
                                <label for="include-culture" class="ml-4 block text-lg text-white font-medium">Inclure la culture</label>
                            </div>
                            <p class="text-gray-400 text-sm mt-2">Partager la culture et société</p>
                        </div>
                        <div class="glass rounded-2xl p-6 hover-lift">
                            <div class="flex items-center">
                                <input type="checkbox" id="include-abilities" name="include_abilities" checked class="h-6 w-6 text-green-600 focus:ring-green-500 border-gray-600 rounded bg-gray-800">
                                <label for="include-abilities" class="ml-4 block text-lg text-white font-medium">Inclure les capacités</label>
                            </div>
                            <p class="text-gray-400 text-sm mt-2">Partager les capacités raciales</p>
                        </div>
                    </div>
                </div>
                
                <!-- Note de publication -->
                <div>
                    <label for="publication-note" class="block text-xl font-bold text-white mb-4">
                        Note de publication (optionnel)
                    </label>
                    <textarea 
                        id="publication-note" 
                        name="publication_note" 
                        rows="4"
                        class="w-full px-6 py-4 bg-gray-900/50 border border-gray-700 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm resize-none"
                        placeholder="Ajoutez une note pour présenter votre race à la communauté..."
                    ></textarea>
                </div>
                
                <!-- Avertissement -->
                <div class="glass rounded-2xl p-8 border border-green-500/30">
                    <div class="flex items-start space-x-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-green-400 mb-3">Publication publique</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Votre race sera visible par tous les membres de la communauté. Assurez-vous que le contenu est approprié et respectueux.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Boutons d'action -->
                <div class="flex justify-between pt-8">
                    <button type="button" onclick="cancelPublication()" class="px-8 py-4 glass border border-gray-700 text-white rounded-2xl hover:border-gray-500 transition-all duration-300 hover-lift font-bold">
                        Annuler
                    </button>
                    <button type="submit" class="px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl font-bold hover-lift">
                        Publier dans la communauté
                    </button>
                </div>
            </div>
        </form>
        
        <!-- Navigation -->
        <div class="mt-16 text-center">
            <a href="/community" class="inline-flex items-center px-8 py-4 glass border border-gray-700 text-white rounded-2xl hover:border-green-500 transition-all duration-300 hover-lift font-bold">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour à la communauté
            </a>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        loadPersonalRaces();
        setupPublishForm();
    });
    
    function loadPersonalRaces() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const races = data.races || [];
        const container = document.getElementById('personal-races-list');
        const noRaces = document.getElementById('no-personal-races');
        
        if (races.length === 0) {
            container.style.display = 'none';
            noRaces.classList.remove('hidden');
            return;
        }
        
        container.innerHTML = races.map(race => createRaceCard(race)).join('');
    }
    
    function createRaceCard(race) {
        const createdDate = new Date(race.created_at).toLocaleDateString('fr-FR');
        
        return `
            <div class="glass rounded-2xl border border-gray-800 hover:border-green-500/50 transition-all duration-300 hover-lift cursor-pointer group" onclick="selectRace('${race.id}')">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-xl">
                            ${race.name.charAt(0).toUpperCase()}
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-bold text-white group-hover:text-green-400 transition-colors">${race.name}</h3>
                            <p class="text-gray-400">${race.type || 'Type non défini'}</p>
                        </div>
                    </div>
                    
                    ${race.description ? `<p class="text-gray-300 mb-6 line-clamp-3 leading-relaxed">${race.description}</p>` : ''}
                    
                    <div class="text-sm text-gray-500 mb-6">
                        Créée le ${createdDate}
                    </div>
                    
                    <button class="w-full py-4 px-6 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl font-bold">
                        Sélectionner cette race
                    </button>
                </div>
            </div>
        `;
    }
    
    function selectRace(raceId) {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const race = (data.races || []).find(r => r.id === raceId);
        
        if (!race) return;
        
        // Masquer la liste et afficher le formulaire
        document.getElementById('personal-races-list').parentElement.style.display = 'none';
        document.getElementById('publish-form').classList.remove('hidden');
        document.getElementById('selected-race-id').value = raceId;
        
        // Remplir l'aperçu
        const preview = document.getElementById('race-preview');
        preview.innerHTML = `
            <div class="flex items-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-xl mr-8">
                    ${race.name.charAt(0).toUpperCase()}
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-white neon-text">${race.name}</h3>
                    <p class="text-gray-400 text-lg">${race.type || 'Type non défini'}</p>
                </div>
            </div>
            ${race.description ? `<p class="text-gray-300 mb-8 text-lg leading-relaxed">${race.description}</p>` : ''}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                ${race.origin ? `<div class="glass rounded-xl p-4"><span class="font-bold text-gray-400 block text-sm">Origine</span><span class="text-white text-lg">${race.origin}</span></div>` : ''}
                ${race.lifespan ? `<div class="glass rounded-xl p-4"><span class="font-bold text-gray-400 block text-sm">Espérance de vie</span><span class="text-white text-lg">${race.lifespan}</span></div>` : ''}
                ${race.language ? `<div class="glass rounded-xl p-4"><span class="font-bold text-gray-400 block text-sm">Langue</span><span class="text-white text-lg">${race.language}</span></div>` : ''}
                ${race.diet ? `<div class="glass rounded-xl p-4"><span class="font-bold text-gray-400 block text-sm">Régime</span><span class="text-white text-lg">${race.diet}</span></div>` : ''}
            </div>
        `;
    }
    
    function cancelPublication() {
        document.getElementById('personal-races-list').parentElement.style.display = 'block';
        document.getElementById('publish-form').classList.add('hidden');
        document.getElementById('publish-form').reset();
    }
    
    function setupPublishForm() {
        const form = document.getElementById('publish-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const raceId = document.getElementById('selected-race-id').value;
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            const race = (data.races || []).find(r => r.id === raceId);
            
            if (!race) {
                alert('Race non trouvée !');
                return;
            }
            
            // Préparer les données pour la publication
            const formData = new FormData(form);
            const publicationData = {
                ...race,
                publication_note: formData.get('publication_note'),
                include_images: formData.get('include_images') === 'on',
                include_culture: formData.get('include_culture') === 'on',
                include_abilities: formData.get('include_abilities') === 'on'
            };
            
            // Filtrer les données selon les options
            if (!publicationData.include_images) {
                delete publicationData.images;
            }
            if (!publicationData.include_culture) {
                delete publicationData.culture;
                delete publicationData.society;
                delete publicationData.religion;
            }
            if (!publicationData.include_abilities) {
                delete publicationData.abilities;
                delete publicationData.strengths;
                delete publicationData.weaknesses;
            }
            
            // Publier la race dans la communauté
            fetch('/community/publish-race', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(publicationData)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message || 'Race publiée avec succès dans la communauté !');
                    window.location.href = '/community';
                } else {
                    alert('Erreur: ' + (data.message || 'Erreur lors de la publication'));
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur de connexion lors de la publication de la race');
            });
        });
    }
</script>

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/community.php';
?>