<?php 
$title = 'Publier un Original Character - Partagez votre création | YOC';
$description = 'Partagez votre Original Character avec la communauté YOC. Sélectionnez depuis votre espace personnel et publiez pour inspirer d\'autres créateurs.';
$keywords = 'publier OC, partager original character, publication communauté, share OC, community publishing';
$robots = 'noindex, nofollow';
ob_start(); 
?>

<div class="fade-in">
    <div class="max-w-6xl mx-auto">
        <div class="mb-12">
            <h1 class="text-5xl font-bold text-white neon-text mb-4">Publier un OC dans la communauté</h1>
            <p class="text-gray-400 text-xl">Partagez votre Original Character avec la communauté</p>
        </div>
        
        <!-- Sélection depuis l'espace personnel -->
        <div class="glass-dark rounded-3xl p-12 border border-gray-800 mb-12">
            <h2 class="text-3xl font-bold text-white mb-8 neon-text flex items-center">
                <svg class="w-8 h-8 mr-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Choisir un OC depuis votre espace personnel
            </h2>
            
            <div id="personal-ocs-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Sera rempli par JavaScript -->
            </div>
            
            <div id="no-personal-ocs" class="hidden text-center py-20">
                <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl flex items-center justify-center mx-auto mb-8">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Aucun OC dans votre espace personnel</h3>
                <p class="text-gray-400 mb-8">Créez d'abord des OCs dans votre espace personnel pour les partager</p>
                <a href="/ocs/create" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl font-bold">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Créer un OC
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
            
            <input type="hidden" id="selected-oc-id" name="oc_id">
            
            <div class="space-y-12">
                <!-- Aperçu de l'OC sélectionné -->
                <div id="oc-preview" class="glass rounded-2xl p-8 border border-gray-700">
                    <!-- Sera rempli par JavaScript -->
                </div>
                
                <!-- Options de publication -->
                <div>
                    <label class="block text-xl font-bold text-white mb-6">Options de publication</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="glass rounded-2xl p-6 hover-lift">
                            <div class="flex items-center">
                                <input type="checkbox" id="include-images" name="include_images" checked class="h-6 w-6 text-blue-600 focus:ring-blue-500 border-gray-600 rounded bg-gray-800">
                                <label for="include-images" class="ml-4 block text-lg text-white font-medium">Inclure les images</label>
                            </div>
                            <p class="text-gray-400 text-sm mt-2">Partager les images de votre OC</p>
                        </div>
                        <div class="glass rounded-2xl p-6 hover-lift">
                            <div class="flex items-center">
                                <input type="checkbox" id="include-backstory" name="include_backstory" checked class="h-6 w-6 text-blue-600 focus:ring-blue-500 border-gray-600 rounded bg-gray-800">
                                <label for="include-backstory" class="ml-4 block text-lg text-white font-medium">Inclure l'histoire</label>
                            </div>
                            <p class="text-gray-400 text-sm mt-2">Partager l'histoire personnelle</p>
                        </div>
                        <div class="glass rounded-2xl p-6 hover-lift">
                            <div class="flex items-center">
                                <input type="checkbox" id="include-abilities" name="include_abilities" checked class="h-6 w-6 text-blue-600 focus:ring-blue-500 border-gray-600 rounded bg-gray-800">
                                <label for="include-abilities" class="ml-4 block text-lg text-white font-medium">Inclure les capacités</label>
                            </div>
                            <p class="text-gray-400 text-sm mt-2">Partager les compétences et pouvoirs</p>
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
                        class="w-full px-6 py-4 bg-gray-900/50 border border-gray-700 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm resize-none"
                        placeholder="Ajoutez une note pour présenter votre OC à la communauté..."
                    ></textarea>
                </div>
                
                <!-- Avertissement -->
                <div class="glass rounded-2xl p-8 border border-red-500/30">
                    <div class="flex items-start space-x-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-red-400 mb-3">⚠️ Publication permanente</h3>
                            <p class="text-gray-300 leading-relaxed">
                                <strong>ATTENTION :</strong> Une fois publié, votre OC sera permanent et ne pourra plus être modifié ou supprimé. 
                                Assurez-vous que votre création est finalisée et que le contenu est approprié avant de publier.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Boutons d'action -->
                <div class="flex justify-between pt-8">
                    <button type="button" onclick="cancelPublication()" class="px-8 py-4 glass border border-gray-700 text-white rounded-2xl hover:border-gray-500 transition-all duration-300 hover-lift font-bold">
                        Annuler
                    </button>
                    <button type="submit" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl font-bold hover-lift">
                        Publier dans la communauté
                    </button>
                </div>
            </div>
        </form>
        
        <!-- Navigation -->
        <div class="mt-16 text-center">
            <a href="/community" class="inline-flex items-center px-8 py-4 glass border border-gray-700 text-white rounded-2xl hover:border-blue-500 transition-all duration-300 hover-lift font-bold">
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
            <div class="glass rounded-2xl border border-gray-800 hover:border-blue-500/50 transition-all duration-300 hover-lift cursor-pointer group" onclick="selectOC('${oc.id}')">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-xl">
                            ${oc.name.charAt(0).toUpperCase()}
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors">${oc.name}</h3>
                            <p class="text-gray-400">${oc.race || 'Race non définie'}</p>
                        </div>
                    </div>
                    
                    ${oc.description ? `<p class="text-gray-300 mb-6 line-clamp-3 leading-relaxed">${oc.description}</p>` : ''}
                    
                    <div class="text-sm text-gray-500 mb-6">
                        Créé le ${createdDate}
                    </div>
                    
                    <button class="w-full py-4 px-6 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl font-bold">
                        Sélectionner cet OC
                    </button>
                </div>
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
            <div class="flex items-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-xl mr-8">
                    ${oc.name.charAt(0).toUpperCase()}
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-white neon-text">${oc.name}</h3>
                    <p class="text-gray-400 text-lg">${oc.race || 'Race non définie'}</p>
                </div>
            </div>
            ${oc.description ? `<p class="text-gray-300 mb-8 text-lg leading-relaxed">${oc.description}</p>` : ''}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                ${oc.age ? `<div class="glass rounded-xl p-4"><span class="font-bold text-gray-400 block text-sm">Âge</span><span class="text-white text-lg">${oc.age}</span></div>` : ''}
                ${oc.gender ? `<div class="glass rounded-xl p-4"><span class="font-bold text-gray-400 block text-sm">Genre</span><span class="text-white text-lg">${oc.gender}</span></div>` : ''}
                ${oc.occupation ? `<div class="glass rounded-xl p-4"><span class="font-bold text-gray-400 block text-sm">Profession</span><span class="text-white text-lg">${oc.occupation}</span></div>` : ''}
                ${oc.location ? `<div class="glass rounded-xl p-4"><span class="font-bold text-gray-400 block text-sm">Lieu</span><span class="text-white text-lg">${oc.location}</span></div>` : ''}
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