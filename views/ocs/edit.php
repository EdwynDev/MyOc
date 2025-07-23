<?php 
$title = 'Modifier un OC - YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Modifier l'Original Character</h1>
        <p class="text-gray-600">Mettez à jour les informations de votre personnage</p>
    </div>
    
    <form id="oc-form" class="max-w-4xl">
        <input type="hidden" id="oc-id" value="<?= htmlspecialchars($id) ?>">
        
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
                        <p class="text-sm text-gray-600">Gérez les images de votre OC</p>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
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
            <div class="flex space-x-4">
                <button type="button" onclick="deleteOC()" class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    Supprimer
                </button>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg">
                    Sauvegarder
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    let currentOC = null;
    
    window.addEventListener('DOMContentLoaded', function() {
        loadRaces();
        loadOC();
        setupForm();
    });
    
    let imageCounter = 0;
    
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
    
    function loadOC() {
        const ocId = document.getElementById('oc-id').value;
        currentOC = window.ocManager.getOC(ocId);
        
        // Fallback si ocManager n'est pas encore chargé
        if (!currentOC && typeof getOC === 'function') {
            currentOC = getOC(ocId);
        }
        
        if (!currentOC) {
            alert('OC non trouvé !');
            window.location.href = '/ocs';
            return;
        }
        
        loadCustomFields();
        
        // Remplir le formulaire
        const fields = ['name', 'race', 'age', 'gender', 'description', 'appearance', 'personality', 
                       'backstory', 'occupation', 'location', 'abilities', 'skills', 'strengths', 
                       'weaknesses', 'relationships', 'notes'];
        
        fields.forEach(field => {
            const element = document.getElementById(field);
            if (element && currentOC[field]) {
                element.value = currentOC[field];
            }
        });
        
        // Remplir les champs personnalisés
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const customFields = data.custom_fields?.oc || {};
        Object.keys(customFields).forEach(key => {
            const element = document.getElementById(key);
            if (element && currentOC[key]) {
                if (element.type === 'checkbox') {
                    element.checked = currentOC[key] === '1' || currentOC[key] === true;
                } else {
                    element.value = currentOC[key];
                }
            }
        });
        
        // Charger les images existantes
        loadExistingImages();
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
    
    function setupForm() {
        const form = document.getElementById('oc-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Collecter les données du formulaire
            const updates = {
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
                        updates[key] = element.checked ? '1' : '0';
                    } else {
                        updates[key] = element.value.trim();
                    }
                }
            });
            
            if (!updates.name) {
                alert('Le nom est obligatoire !');
                return;
            }
            
            const ocId = document.getElementById('oc-id').value;
            
            // Ajouter les images
            const images = collectImages();
            updates.images = images;
            
            const updatedOC = window.ocManager.updateOC(ocId, updates);
            
            if (updatedOC) {
                window.ocManager.showNotification('OC mis à jour avec succès !', 'success');
                setTimeout(() => {
                    window.location.href = '/ocs';
                }, 1000);
            } else {
                window.ocManager.showNotification('Erreur lors de la mise à jour de l\'OC', 'error');
            }
        });
    }
    
    function loadExistingImages() {
        if (currentOC.images && Array.isArray(currentOC.images)) {
            currentOC.images.forEach((image, index) => {
                addImageField(image);
            });
        }
        
        updateImagesDisplay();
    }
    
    function addImageField(existingImage = null) {
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
                    <label for="${imageId}_file" class="block text-sm font-medium text-gray-700 mb-1">Choisir une image</label>
                    <input type="file" id="${imageId}_file" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" onchange="handleImageUpload(${imageCounter}, this)">
                    <p class="text-xs text-gray-500 mt-1">Formats supportés: JPG, PNG, GIF, WebP (max 5MB)</p>
                </div>
                
                <div>
                    <label for="${imageId}_title" class="block text-sm font-medium text-gray-700 mb-1">Titre (optionnel)</label>
                    <input type="text" id="${imageId}_title" name="images[${imageCounter}][title]" value="${existingImage ? existingImage.title || '' : ''}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Titre de l'image">
                </div>
                
                <div>
                    <label for="${imageId}_description" class="block text-sm font-medium text-gray-700 mb-1">Description (optionnel)</label>
                    <textarea id="${imageId}_description" name="images[${imageCounter}][description]" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Description de l'image">${existingImage ? existingImage.description || '' : ''}</textarea>
                </div>
                
                <div class="bg-white border border-gray-200 rounded-lg p-3">
                    <div id="${imageId}_preview" class="text-center text-gray-500 text-sm">
                        Aperçu de l'image
                    </div>
                </div>
                
                <input type="hidden" id="${imageId}_data" name="images[${imageCounter}][data]" value="${existingImage ? existingImage.data || '' : ''}">
            </div>
        `;
        
        container.appendChild(imageField);
        noImages.style.display = 'none';
        
        // Charger l'aperçu si une image existe
        if (existingImage && existingImage.data) {
            const preview = document.getElementById(`${imageId}_preview`);
            preview.innerHTML = `
                <img src="${existingImage.data}" alt="Aperçu" class="max-w-full max-h-32 mx-auto rounded-lg shadow-sm">
                <p class="text-xs text-gray-500 mt-2">Image existante</p>
            `;
        }
    }
    
    function removeImageField(id) {
        const field = document.getElementById(`image-field-${id}`);
        if (field) {
            field.remove();
            updateImagesDisplay();
        }
    }
    
    function updateImagesDisplay() {
        const container = document.getElementById('images-container');
        const noImages = document.getElementById('no-images');
        
        if (container.children.length === 0) {
            noImages.style.display = 'block';
        } else {
            noImages.style.display = 'none';
        }
    }
    
    function handleImageUpload(imageCounter, input) {
        const file = input.files[0];
        const imageId = `image_${imageCounter}`;
        const preview = document.getElementById(`${imageId}_preview`);
        const dataInput = document.getElementById(`${imageId}_data`);
        
        if (!file) {
            return;
        }
        
        // Vérifier la taille du fichier (max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            preview.innerHTML = '<span class="text-red-500 text-sm">Fichier trop volumineux (max 5MB)</span>';
            input.value = '';
            return;
        }
        
        // Vérifier le type de fichier
        if (!file.type.startsWith('image/')) {
            preview.innerHTML = '<span class="text-red-500 text-sm">Format de fichier non supporté</span>';
            input.value = '';
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
            updateImagesDisplay();
        }
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
    
    function deleteOC() {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet OC ? Cette action est irréversible.')) {
            const ocId = document.getElementById('oc-id').value;
            const deleted = window.ocManager.deleteOC(ocId);
            
            if (deleted) {
                window.ocManager.showNotification('OC supprimé avec succès !', 'success');
                window.location.href = '/ocs';
            } else {
                window.ocManager.showNotification('Erreur lors de la suppression de l\'OC', 'error');
            }
        }
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>