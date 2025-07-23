<?php 
$title = 'Publier une race - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Publier une race dans la communauté</h1>
            <p class="text-gray-600">Partagez votre race avec la communauté</p>
        </div>
        
        <!-- Sélection depuis l'espace personnel -->
        <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Choisir une race depuis votre espace personnel</h2>
            
            <div id="personal-races-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sera rempli par JavaScript -->
            </div>
            
            <div id="no-personal-races" class="hidden text-center py-12 text-gray-500">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune race dans votre espace personnel</h3>
                <p class="text-gray-500 mb-6">Créez d'abord des races dans votre espace personnel pour les partager</p>
                <a href="/races/create" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Créer une race
                </a>
            </div>
        </div>
        
        <!-- Formulaire de publication -->
        <form id="publish-form" class="hidden bg-white rounded-lg shadow-lg border p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Détails de publication</h2>
            
            <input type="hidden" id="selected-race-id" name="race_id">
            
            <div class="space-y-6">
                <!-- Aperçu de la race sélectionnée -->
                <div id="race-preview" class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <!-- Sera rempli par JavaScript -->
                </div>
                
                <!-- Options de publication -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-4">Options de publication</label>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" id="include-images" name="include_images" checked class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="include-images" class="ml-2 block text-sm text-gray-700">Inclure les images</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="include-culture" name="include_culture" checked class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="include-culture" class="ml-2 block text-sm text-gray-700">Inclure la culture et société</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="include-abilities" name="include_abilities" checked class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="include-abilities" class="ml-2 block text-sm text-gray-700">Inclure les capacités raciales</label>
                        </div>
                    </div>
                </div>
                
                <!-- Note de publication -->
                <div>
                    <label for="publication-note" class="block text-sm font-medium text-gray-700 mb-2">
                        Note de publication (optionnel)
                    </label>
                    <textarea 
                        id="publication-note" 
                        name="publication_note" 
                        rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                        placeholder="Ajoutez une note pour présenter votre race à la communauté..."
                    ></textarea>
                </div>
                
                <!-- Avertissement -->
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-green-800">Publication publique</h3>
                            <p class="text-xs text-green-700 mt-1">
                                Votre race sera visible par tous les membres de la communauté. Assurez-vous que le contenu est approprié et respectueux.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Boutons d'action -->
                <div class="flex justify-between pt-6">
                    <button type="button" onclick="cancelPublication()" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                        Annuler
                    </button>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-lg hover:from-green-700 hover:to-teal-700 transition-all duration-200 shadow-lg">
                        Publier dans la communauté
                    </button>
                </div>
            </div>
        </form>
        
        <!-- Navigation -->
        <div class="mt-8 text-center">
            <a href="/community" class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 hover:border-green-300 transition-colors cursor-pointer" onclick="selectRace('${race.id}')">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold">
                        ${race.name.charAt(0).toUpperCase()}
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-900">${race.name}</h3>
                        <p class="text-sm text-gray-500">${race.type || 'Type non défini'}</p>
                    </div>
                </div>
                
                ${race.description ? `<p class="text-sm text-gray-600 mb-4 line-clamp-3">${race.description}</p>` : ''}
                
                <div class="text-xs text-gray-500 mb-4">
                    Créée le ${createdDate}
                </div>
                
                <button class="w-full py-2 px-4 bg-green-600 text-white rounded hover:bg-green-700 transition-colors">
                    Sélectionner cette race
                </button>
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
            <div class="flex items-center mb-4">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-6">
                    ${race.name.charAt(0).toUpperCase()}
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900">${race.name}</h3>
                    <p class="text-gray-600">${race.type || 'Type non défini'}</p>
                </div>
            </div>
            ${race.description ? `<p class="text-gray-700 mb-4">${race.description}</p>` : ''}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                ${race.origin ? `<div><span class="font-medium">Origine:</span> ${race.origin}</div>` : ''}
                ${race.lifespan ? `<div><span class="font-medium">Espérance de vie:</span> ${race.lifespan}</div>` : ''}
                ${race.language ? `<div><span class="font-medium">Langue:</span> ${race.language}</div>` : ''}
                ${race.diet ? `<div><span class="font-medium">Régime:</span> ${race.diet}</div>` : ''}
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
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Race publiée avec succès dans la communauté !');
                    window.location.href = '/community/races';
                } else {
                    alert('Erreur: ' + (data.message || 'Erreur lors de la publication'));
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de la publication de la race');
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