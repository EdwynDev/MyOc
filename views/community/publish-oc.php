<?php 
$title = 'Publier un OC - Communauté YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Publier un OC dans la communauté</h1>
            <p class="text-gray-600">Partagez votre Original Character avec la communauté</p>
        </div>
        
        <!-- Sélection depuis l'espace personnel -->
        <div class="bg-white rounded-lg shadow-lg border p-8 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Choisir un OC depuis votre espace personnel</h2>
            
            <div id="personal-ocs-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sera rempli par JavaScript -->
            </div>
            
            <div id="no-personal-ocs" class="hidden text-center py-12 text-gray-500">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun OC dans votre espace personnel</h3>
                <p class="text-gray-500 mb-6">Créez d'abord des OCs dans votre espace personnel pour les partager</p>
                <a href="/ocs/create" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Créer un OC
                </a>
            </div>
        </div>
        
        <!-- Formulaire de publication -->
        <form id="publish-form" class="hidden bg-white rounded-lg shadow-lg border p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Détails de publication</h2>
            
            <input type="hidden" id="selected-oc-id" name="oc_id">
            
            <div class="space-y-6">
                <!-- Aperçu de l'OC sélectionné -->
                <div id="oc-preview" class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <!-- Sera rempli par JavaScript -->
                </div>
                
                <!-- Options de publication -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-4">Options de publication</label>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" id="include-images" name="include_images" checked class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="include-images" class="ml-2 block text-sm text-gray-700">Inclure les images</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="include-backstory" name="include_backstory" checked class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="include-backstory" class="ml-2 block text-sm text-gray-700">Inclure l'histoire personnelle</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="include-abilities" name="include_abilities" checked class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="include-abilities" class="ml-2 block text-sm text-gray-700">Inclure les capacités et compétences</label>
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
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Ajoutez une note pour présenter votre OC à la communauté..."
                    ></textarea>
                </div>
                
                <!-- Avertissement -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-blue-800">Publication publique</h3>
                            <p class="text-xs text-blue-700 mt-1">
                                Votre OC sera visible par tous les membres de la communauté. Assurez-vous que le contenu est approprié et respectueux.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Boutons d'action -->
                <div class="flex justify-between pt-6">
                    <button type="button" onclick="cancelPublication()" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                        Annuler
                    </button>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg">
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
        loadPersonalOCs();
        setupPublishForm();
    });
    
    function loadPersonalOCs() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const ocs = data.ocs || [];
        const container = document.getElementById('personal-ocs-list');
        const noOCs = document.getElementById('no-personal-ocs');
        
        if (ocs.length === 0) {
            container.style.display = 'none';
            noOCs.classList.remove('hidden');
            return;
        }
        
        container.innerHTML = ocs.map(oc => createOCCard(oc)).join('');
    }
    
    function createOCCard(oc) {
        const createdDate = new Date(oc.created_at).toLocaleDateString('fr-FR');
        
        return `
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 hover:border-indigo-300 transition-colors cursor-pointer" onclick="selectOC('${oc.id}')">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                        ${oc.name.charAt(0).toUpperCase()}
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-900">${oc.name}</h3>
                        <p class="text-sm text-gray-500">${oc.race || 'Race non définie'}</p>
                    </div>
                </div>
                
                ${oc.description ? `<p class="text-sm text-gray-600 mb-4 line-clamp-3">${oc.description}</p>` : ''}
                
                <div class="text-xs text-gray-500 mb-4">
                    Créé le ${createdDate}
                </div>
                
                <button class="w-full py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors">
                    Sélectionner cet OC
                </button>
            </div>
        `;
    }
    
    function selectOC(ocId) {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const oc = (data.ocs || []).find(o => o.id === ocId);
        
        if (!oc) return;
        
        // Masquer la liste et afficher le formulaire
        document.getElementById('personal-ocs-list').parentElement.style.display = 'none';
        document.getElementById('publish-form').classList.remove('hidden');
        document.getElementById('selected-oc-id').value = ocId;
        
        // Remplir l'aperçu
        const preview = document.getElementById('oc-preview');
        preview.innerHTML = `
            <div class="flex items-center mb-4">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-6">
                    ${oc.name.charAt(0).toUpperCase()}
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900">${oc.name}</h3>
                    <p class="text-gray-600">${oc.race || 'Race non définie'}</p>
                </div>
            </div>
            ${oc.description ? `<p class="text-gray-700 mb-4">${oc.description}</p>` : ''}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                ${oc.age ? `<div><span class="font-medium">Âge:</span> ${oc.age}</div>` : ''}
                ${oc.gender ? `<div><span class="font-medium">Genre:</span> ${oc.gender}</div>` : ''}
                ${oc.occupation ? `<div><span class="font-medium">Profession:</span> ${oc.occupation}</div>` : ''}
                ${oc.location ? `<div><span class="font-medium">Lieu:</span> ${oc.location}</div>` : ''}
            </div>
        `;
    }
    
    function cancelPublication() {
        document.getElementById('personal-ocs-list').parentElement.style.display = 'block';
        document.getElementById('publish-form').classList.add('hidden');
        document.getElementById('publish-form').reset();
    }
    
    function setupPublishForm() {
        const form = document.getElementById('publish-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const ocId = document.getElementById('selected-oc-id').value;
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            const oc = (data.ocs || []).find(o => o.id === ocId);
            
            if (!oc) {
                alert('OC non trouvé !');
                return;
            }
            
            // Préparer les données pour la publication
            const formData = new FormData(form);
            const publicationData = {
                ...oc,
                publication_note: formData.get('publication_note'),
                include_images: formData.get('include_images') === 'on',
                include_backstory: formData.get('include_backstory') === 'on',
                include_abilities: formData.get('include_abilities') === 'on'
            };
            
            // Filtrer les données selon les options
            if (!publicationData.include_images) {
                delete publicationData.images;
            }
            if (!publicationData.include_backstory) {
                delete publicationData.backstory;
            }
            if (!publicationData.include_abilities) {
                delete publicationData.abilities;
                delete publicationData.skills;
                delete publicationData.strengths;
                delete publicationData.weaknesses;
            }
            
            // Publier l'OC dans la communauté
            fetch('/community/publish-oc', {
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
                    alert(data.message || 'OC publié avec succès dans la communauté !');
                    window.location.href = '/community';
                } else {
                    alert('Erreur: ' + (data.message || 'Erreur lors de la publication'));
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur de connexion lors de la publication de l\'OC');
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