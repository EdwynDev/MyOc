<?php 
$title = 'Créer un OC - YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Créer un Original Character</h1>
        <p class="text-gray-600">Donnez vie à votre nouveau personnage</p>
    </div>
    
    <form id="oc-form" class="max-w-4xl">
        <div class="bg-white p-8 rounded-lg shadow-lg border space-y-6">
            <!-- Informations de base -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Informations de base</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                        <input type="text" id="name" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Nom de votre OC">
                    </div>
                    <div>
                        <label for="race" class="block text-sm font-medium text-gray-700 mb-2">Race</label>
                        <select id="race" name="race" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Sélectionner une race</option>
                        </select>
                    </div>
                    <div>
                        <label for="age" class="block text-sm font-medium text-gray-700 mb-2">Âge</label>
                        <input type="text" id="age" name="age" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="ex: 25 ans, Adulte, etc.">
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
                        <input type="text" id="gender" name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="ex: Masculin, Féminin, Non-binaire, etc.">
                    </div>
                </div>
            </div>
            
            <!-- Description -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Description</h2>
                <div class="space-y-4">
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description générale</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Décrivez votre personnage..."></textarea>
                    </div>
                    <div>
                        <label for="appearance" class="block text-sm font-medium text-gray-700 mb-2">Apparence physique</label>
                        <textarea id="appearance" name="appearance" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Couleur des cheveux, des yeux, taille, etc."></textarea>
                    </div>
                    <div>
                        <label for="personality" class="block text-sm font-medium text-gray-700 mb-2">Personnalité</label>
                        <textarea id="personality" name="personality" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Traits de caractère, comportement, etc."></textarea>
                    </div>
                </div>
            </div>
            
            <!-- Histoire -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Histoire</h2>
                <div class="space-y-4">
                    <div>
                        <label for="backstory" class="block text-sm font-medium text-gray-700 mb-2">Histoire personnelle</label>
                        <textarea id="backstory" name="backstory" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Passé, origine, événements marquants..."></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="occupation" class="block text-sm font-medium text-gray-700 mb-2">Profession/Occupation</label>
                            <input type="text" id="occupation" name="occupation" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Métier, rôle, etc.">
                        </div>
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lieu de résidence</label>
                            <input type="text" id="location" name="location" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ville, région, monde...">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Capacités et compétences -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Capacités et compétences</h2>
                <div class="space-y-4">
                    <div>
                        <label for="abilities" class="block text-sm font-medium text-gray-700 mb-2">Pouvoirs/Capacités spéciales</label>
                        <textarea id="abilities" name="abilities" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Magie, super-pouvoirs, talents particuliers..."></textarea>
                    </div>
                    <div>
                        <label for="skills" class="block text-sm font-medium text-gray-700 mb-2">Compétences</label>
                        <textarea id="skills" name="skills" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Combat, artisanat, connaissances..."></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="strengths" class="block text-sm font-medium text-gray-700 mb-2">Forces</label>
                            <textarea id="strengths" name="strengths" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Points forts du personnage"></textarea>
                        </div>
                        <div>
                            <label for="weaknesses" class="block text-sm font-medium text-gray-700 mb-2">Faiblesses</label>
                            <textarea id="weaknesses" name="weaknesses" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Points faibles du personnage"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Relations -->
            <div class="pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Relations</h2>
                <div class="space-y-4">
                    <div>
                        <label for="relationships" class="block text-sm font-medium text-gray-700 mb-2">Relations importantes</label>
                        <textarea id="relationships" name="relationships" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Famille, amis, ennemis, mentors..."></textarea>
                    </div>
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes supplémentaires</label>
                        <textarea id="notes" name="notes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Autres informations importantes..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Images -->
        <div class="border-b border-gray-200 pb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Images</h2>
            <div class="space-y-4">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-blue-800">Hébergement d'images gratuit</h3>
                            <p class="text-xs text-blue-700 mt-1">
                                Utilisez <a href="https://www.zupimages.net/" target="_blank" class="underline font-medium">ZupImages</a> pour héberger vos images gratuitement. 
                                Après upload, sélectionnez "Lien direct de votre image" et copiez l'URL ici.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div id="images-container">
                    <div class="image-input-group space-y-3 p-4 border border-gray-200 rounded-lg">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Titre de l'image (optionnel)</label>
                            <input type="text" class="image-title w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="ex: Portrait, Tenue de combat...">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">URL de l'image</label>
                            <input type="url" class="image-url w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://exemple.com/image.jpg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description (optionnel)</label>
                            <textarea class="image-description w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" rows="2" placeholder="Description de l'image..."></textarea>
                        </div>
                        <button type="button" onclick="removeImageInput(this)" class="text-red-600 hover:text-red-800 text-sm">
                            Supprimer cette image
                        </button>
                    </div>
                </div>
                
                <button type="button" onclick="addImageInput()" class="w-full py-2 px-4 border-2 border-dashed border-gray-300 rounded-lg text-gray-600 hover:border-indigo-300 hover:text-indigo-600 transition-colors">
                    + Ajouter une image
                </button>
            </div>
        </div>
        
        <!-- Boutons d'action -->
        <div class="flex justify-between mt-8">
            <a href="/ocs" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                Annuler
            </a>
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg">
                Créer l'OC
            </button>
        </div>
    </form>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        loadRaces();
        setupForm();
        handleURLParams();
    });
    
    function handleURLParams() {
        const urlParams = new URLSearchParams(window.location.search);
        
        // Si on vient d'un DTIYS ou d'un OC de base
        if (urlParams.has('based_on_oc') || urlParams.has('dtiys_oc')) {
            const ocId = urlParams.get('based_on_oc') || urlParams.get('dtiys_oc');
            const isDTIYS = urlParams.has('dtiys_oc');
            
            // Afficher un message d'information
            const infoDiv = document.createElement('div');
            infoDiv.className = 'bg-blue-900/20 border border-blue-500/30 rounded-2xl p-6 mb-8';
            infoDiv.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-blue-400 font-medium">
                        ${isDTIYS ? 'Mode DTIYS activé - Créez votre version de cet OC' : 'Création basée sur un OC existant'}
                    </span>
                </div>
            `;
            document.querySelector('.fade-in').insertBefore(infoDiv, document.querySelector('form'));
        }
        
        // Si on vient avec une race pré-remplie
        if (urlParams.has('race')) {
            const raceName = decodeURIComponent(urlParams.get('race'));
            setTimeout(() => {
                const raceSelect = document.getElementById('race');
                raceSelect.value = raceName;
            }, 100);
        }
    }
    
    function loadRaces() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const races = data.races || [];
        const raceSelect = document.getElementById('race');
        
        races.forEach(race => {
            const option = document.createElement('option');
            option.value = race.name;
            option.textContent = race.name;
            raceSelect.appendChild(option);
        });
    }
    
    function setupForm() {
        const form = document.getElementById('oc-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value.trim();
            if (!name) {
                alert('Le nom est obligatoire !');
                return;
            }
            
            // Collecter toutes les données du formulaire
            const ocData = {
                name: name,
                race: document.getElementById('race').value.trim(),
                age: document.getElementById('age').value.trim(),
                gender: document.getElementById('gender').value.trim(),
                description: document.getElementById('description').value.trim(),
                appearance: document.getElementById('appearance').value.trim(),
                personality: document.getElementById('personality').value.trim(),
                backstory: document.getElementById('backstory').value.trim(),
                occupation: document.getElementById('occupation').value.trim(),
                location: document.getElementById('location').value.trim(),
                abilities: document.getElementById('abilities').value.trim(),
                skills: document.getElementById('skills').value.trim(),
                strengths: document.getElementById('strengths').value.trim(),
                weaknesses: document.getElementById('weaknesses').value.trim(),
                relationships: document.getElementById('relationships').value.trim(),
                notes: document.getElementById('notes').value.trim(),
                images: collectImages()
            };
            
            // Créer l'OC directement
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            if (!data.ocs) data.ocs = [];
            
            const newOC = {
                id: Date.now().toString(36) + Math.random().toString(36).substr(2),
                created_at: new Date().toISOString(),
                updated_at: new Date().toISOString(),
                ...ocData
            };
            
            // Nettoyer les champs vides
            Object.keys(newOC).forEach(key => {
                if (newOC[key] === '' || newOC[key] === null || newOC[key] === undefined) {
                    delete newOC[key];
                }
            });
            
            data.ocs.push(newOC);
            localStorage.setItem('oc_data', JSON.stringify(data));
            
            alert('OC créé avec succès !');
            window.location.href = '/ocs';
        });
    }
    
    function addImageInput() {
        const container = document.getElementById('images-container');
        const newImageInput = document.createElement('div');
        newImageInput.className = 'image-input-group space-y-3 p-4 border border-gray-200 rounded-lg';
        newImageInput.innerHTML = `
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Titre de l'image (optionnel)</label>
                <input type="text" class="image-title w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="ex: Portrait, Tenue de combat...">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">URL de l'image</label>
                <input type="url" class="image-url w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://exemple.com/image.jpg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description (optionnel)</label>
                <textarea class="image-description w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" rows="2" placeholder="Description de l'image..."></textarea>
            </div>
            <button type="button" onclick="removeImageInput(this)" class="text-red-600 hover:text-red-800 text-sm">
                Supprimer cette image
            </button>
        `;
        container.appendChild(newImageInput);
    }
    
    function removeImageInput(button) {
        const container = document.getElementById('images-container');
        if (container.children.length > 1) {
            button.parentElement.remove();
        } else {
            alert('Vous devez garder au moins un champ d\'image (vous pouvez le laisser vide).');
        }
    }
    
    function collectImages() {
        const imageGroups = document.querySelectorAll('.image-input-group');
        const images = [];
        
        imageGroups.forEach(group => {
            const title = group.querySelector('.image-title').value.trim();
            const url = group.querySelector('.image-url').value.trim();
            const description = group.querySelector('.image-description').value.trim();
            
            if (url) {
                images.push({
                    title: title || '',
                    data: url,
                    description: description || ''
                });
            }
        });
        
        return images;
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>