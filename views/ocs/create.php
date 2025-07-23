<?php 
$title = 'Créer un OC - YOC';
ob_start(); 
?>

<div class="fade-in">
    <!-- Message si aucune race n'existe -->
    <div id="no-races-warning" class="hidden mb-8 bg-amber-50 border border-amber-200 rounded-lg p-6">
        <div class="flex items-start">
            <svg class="w-6 h-6 text-amber-600 mt-0.5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
            <div class="flex-1">
                <h3 class="font-medium text-amber-800 mb-2">Aucune race disponible</h3>
                <p class="text-sm text-amber-700 mb-4">
                    Vous devez créer au moins une race avant de pouvoir créer un Original Character. 
                    Les races définissent les caractéristiques de base de vos personnages.
                </p>
                <div class="flex space-x-4">
                    <a href="/races/create" class="inline-flex items-center px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Créer ma première race
                    </a>
                    <a href="/ocs" class="inline-flex items-center px-4 py-2 border border-amber-300 text-amber-700 rounded-lg hover:bg-amber-100 transition-colors">
                        Retour aux OCs
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Créer un Original Character</h1>
        <p class="text-gray-600">Donnez vie à votre nouveau personnage</p>
    </div>
    
    <form id="oc-form" class="max-w-4xl" style="display: none;">
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
            
            <!-- Champs personnalisés -->
            <div id="custom-fields-section" class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Informations supplémentaires</h2>
                <div id="custom-fields-container" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Sera rempli par JavaScript -->
                </div>
            </div>
            
            <!-- Images -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Images</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600">Ajoutez des images pour illustrer votre OC</p>
                        <button type="button" onclick="addImageField()" class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white text-sm rounded-lg hover:bg-indigo-700 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Ajouter une image
                        </button>
                    </div>
                    
                    <div id="images-container" class="space-y-4">
                        <!-- Les champs d'images seront ajoutés ici -->
                    </div>
                    
                    <div id="no-images" class="text-center py-8 text-gray-500 border-2 border-dashed border-gray-300 rounded-lg">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-sm">Aucune image ajoutée</p>
                        <button type="button" onclick="addImageField()" class="inline-block mt-2 text-sm text-indigo-600 hover:text-indigo-800">
                            Ajouter votre première image
                        </button>
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
        if (checkRacesExist()) {
            loadRaces();
            setupForm();
            document.getElementById('oc-form').style.display = 'block';
        } else {
            showNoRacesWarning();
        }
    });
    
    function checkRacesExist() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const races = data.races || [];
        return races.length > 0;
    }
    
    function showNoRacesWarning() {
        document.getElementById('no-races-warning').classList.remove('hidden');
        
        // Masquer le titre et la description si aucune race
        const header = document.querySelector('.mb-8');
        if (header && header.querySelector('h1')) {
            header.style.display = 'none';
        }
    }
    
    function loadRaces() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const races = data.races || [];
        const raceSelect = document.getElementById('race');
        
        // Vider les options existantes sauf la première
        raceSelect.innerHTML = '<option value="">Sélectionner une race</option>';
        
        races.forEach(race => {
            const option = document.createElement('option');
            option.value = race.name;
            option.textContent = race.name;
            raceSelect.appendChild(option);
        });
    }
    
    function setupForm() {
        loadCustomFields();
        
        const form = document.getElementById('oc-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Collecter les données du formulaire
            const ocData = {
                name: document.getElementById('name').value.trim(),
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
                notes: document.getElementById('notes').value.trim()
            };
            
            // Ajouter les champs personnalisés
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            const customFields = data.custom_fields?.oc || {};
            Object.keys(customFields).forEach(key => {
                const element = document.getElementById(key);
                if (element) {
                    if (element.type === 'checkbox') {
                        ocData[key] = element.checked ? '1' : '0';
                    } else {
                        ocData[key] = element.value.trim();
                    }
                }
            });
            
            if (!ocData.name) {
                alert('Le nom est obligatoire !');
                return;
            }
            
            // Créer l'OC
            const oc = createOC(ocData);
            
            // Ajouter les images
            const images = collectImages();
            if (images.length > 0) {
                updateOC(oc.id, { images: images });
            }
            
            if (oc) {
                showNotification('OC créé avec succès !', 'success');
                setTimeout(() => {
                    window.location.href = '/ocs';
                }, 1000);
            } else {
                showNotification('Erreur lors de la création de l\'OC', 'error');
            }
        });
    }
    
    function collectImages() {
        const images = [];
        const container = document.getElementById('images-container');
        
        container.querySelectorAll('[id^="image-field-"]').forEach(field => {
            const dataInput = field.querySelector('input[name*="[data]"]');
            const titleInput = field.querySelector('input[name*="[title]"]');
            const descInput = field.querySelector('textarea[name*="[description]"]');
            
            if (dataInput && dataInput.value.trim()) {
                images.push({
                    data: dataInput.value.trim(),
                    title: titleInput ? titleInput.value.trim() : '',
                    description: descInput ? descInput.value.trim() : ''
                });
            }
        });
        
        return images;
    }
    
    function loadCustomFields() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const customFields = data.custom_fields?.oc || {};
        const container = document.getElementById('custom-fields-container');
        const section = document.getElementById('custom-fields-section');
        
        const fieldEntries = Object.entries(customFields);
        
        if (fieldEntries.length === 0) {
            section.style.display = 'none';
            return;
        }
        
        section.style.display = 'block';
        container.innerHTML = fieldEntries.map(([key, field]) => createCustomFieldInput(key, field)).join('');
    }
    
    function createCustomFieldInput(key, field) {
        const requiredAttr = field.required ? 'required' : '';
        const requiredLabel = field.required ? ' *' : '';
        
        switch (field.inputType) {
            case 'textarea':
                return `
                    <div>
                        <label for="${key}" class="block text-sm font-medium text-gray-700 mb-2">${field.name}${requiredLabel}</label>
                        <textarea id="${key}" name="${key}" rows="3" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="${field.placeholder || ''}"></textarea>
                    </div>
                `;
            case 'select':
                const options = field.options?.map(opt => `<option value="${opt}">${opt}</option>`).join('') || '';
                return `
                    <div>
                        <label for="${key}" class="block text-sm font-medium text-gray-700 mb-2">${field.name}${requiredLabel}</label>
                        <select id="${key}" name="${key}" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Sélectionner...</option>
                            ${options}
                        </select>
                    </div>
                `;
            case 'checkbox':
                return `
                    <div class="flex items-center">
                        <input type="checkbox" id="${key}" name="${key}" value="1" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="${key}" class="ml-2 block text-sm text-gray-700">${field.name}</label>
                    </div>
                `;
            case 'number':
                return `
                    <div>
                        <label for="${key}" class="block text-sm font-medium text-gray-700 mb-2">${field.name}${requiredLabel}</label>
                        <input type="number" id="${key}" name="${key}" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="${field.placeholder || ''}">
                    </div>
                `;
            case 'date':
                return `
                    <div>
                        <label for="${key}" class="block text-sm font-medium text-gray-700 mb-2">${field.name}${requiredLabel}</label>
                        <input type="date" id="${key}" name="${key}" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                `;
            default: // text
                return `
                    <div>
                        <label for="${key}" class="block text-sm font-medium text-gray-700 mb-2">${field.name}${requiredLabel}</label>
                        <input type="text" id="${key}" name="${key}" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="${field.placeholder || ''}">
                    </div>
                `;
        }
    }
    
    let imageCounter = 0;
    
    function addImageField() {
        const container = document.getElementById('images-container');
        const noImages = document.getElementById('no-images');
        
        imageCounter++;
        const imageId = `image_${imageCounter}`;
        
        const imageField = document.createElement('div');
        imageField.className = 'bg-gray-50 border border-gray-200 rounded-lg p-4';
        imageField.id = `image-field-${imageCounter}`;
        
        imageField.innerHTML = `
            <div class="flex items-center justify-between mb-3">
                <h4 class="font-medium text-gray-900">Image ${imageCounter}</h4>
                <button type="button" onclick="removeImageField(${imageCounter})" class="text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
            
            <div class="space-y-3">
                <div>
                    <label for="${imageId}_url" class="block text-sm font-medium text-gray-700 mb-1">URL de l'image</label>
                    <input type="url" id="${imageId}_url" name="images[${imageCounter}][url]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://exemple.com/image.jpg">
                </div>
                
                <div>
                    <label for="${imageId}_title" class="block text-sm font-medium text-gray-700 mb-1">Titre (optionnel)</label>
                    <input type="text" id="${imageId}_title" name="images[${imageCounter}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Titre de l'image">
                </div>
                
                <div>
                    <label for="${imageId}_description" class="block text-sm font-medium text-gray-700 mb-1">Description (optionnel)</label>
                    <textarea id="${imageId}_description" name="images[${imageCounter}][description]" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Description de l'image"></textarea>
                </div>
                
                <div class="bg-white border border-gray-200 rounded-lg p-3">
                    <div id="${imageId}_preview" class="text-center text-gray-500 text-sm">
                        Aperçu de l'image (entrez une URL ci-dessus)
                    </div>
                </div>
            </div>
        `;
        
        container.appendChild(imageField);
        noImages.style.display = 'none';
        
        // Ajouter l'événement pour l'aperçu
        const urlInput = document.getElementById(`${imageId}_url`);
        urlInput.addEventListener('input', function() {
            updateImagePreview(imageId, this.value);
        });
    }
    
    function removeImageField(id) {
        const field = document.getElementById(`image-field-${id}`);
        if (field) {
            field.remove();
            
            // Vérifier s'il reste des images
            const container = document.getElementById('images-container');
            const noImages = document.getElementById('no-images');
            
            if (container.children.length === 0) {
                noImages.style.display = 'block';
            }
        }
    }
    
    function handleImageUpload(imageCounter, input) {
        const file = input.files[0];
        const imageId = `image_${imageCounter}`;
        const preview = document.getElementById(`${imageId}_preview`);
        const dataInput = document.getElementById(`${imageId}_data`);
        
        if (!file) {
            preview.innerHTML = '<span class="text-gray-500 text-sm">Aperçu de l\'image (sélectionnez un fichier ci-dessus)</span>';
            dataInput.value = '';
            return;
        }
        
        // Vérifier la taille du fichier (max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            preview.innerHTML = '<span class="text-red-500 text-sm">Fichier trop volumineux (max 5MB)</span>';
            input.value = '';
            dataInput.value = '';
            return;
        }
        
        // Vérifier le type de fichier
        if (!file.type.startsWith('image/')) {
            preview.innerHTML = '<span class="text-red-500 text-sm">Format de fichier non supporté</span>';
            input.value = '';
            dataInput.value = '';
            return;
        }
        
        preview.innerHTML = '<div class="text-blue-500 text-sm">Chargement de l\'image...</div>';
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const base64Data = e.target.result;
            dataInput.value = base64Data;
            
            preview.innerHTML = `
                <img src="${base64Data}" alt="Aperçu" class="max-w-full max-h-32 mx-auto rounded-lg shadow-sm">
                <p class="text-xs text-gray-500 mt-2">${file.name} (${(file.size / 1024).toFixed(1)} KB)</p>
            `;
        };
        
        reader.onerror = function() {
            preview.innerHTML = '<span class="text-red-500 text-sm">Erreur lors du chargement du fichier</span>';
            input.value = '';
            dataInput.value = '';
        };
        
        reader.readAsDataURL(file);
    }
    
    function removeImageField(id) {
        const field = document.getElementById(`image-field-${id}`);
        if (field) {
            field.remove();
            
            // Vérifier s'il reste des images
            const container = document.getElementById('images-container');
            const noImages = document.getElementById('no-images');
            
            if (container.children.length === 0) {
                noImages.style.display = 'block';
            }
        }
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>