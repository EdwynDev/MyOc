<?php 
$title = 'Créer une race - YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Créer une race</h1>
        <p class="text-gray-600">Définissez une nouvelle race pour vos univers</p>
    </div>
    
    <form id="race-form" class="max-w-4xl">
        <div class="bg-white p-8 rounded-lg shadow-lg border space-y-6">
            <!-- Informations de base -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Informations de base</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom de la race *</label>
                        <input type="text" id="name" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ex: Elfes, Dragons, Humains...">
                    </div>
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                        <input type="text" id="type" name="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ex: Humanoïde, Bestial, Magique...">
                    </div>
                    <div>
                        <label for="origin" class="block text-sm font-medium text-gray-700 mb-2">Origine</label>
                        <input type="text" id="origin" name="origin" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ex: Forêts anciennes, Autre dimension...">
                    </div>
                    <div>
                        <label for="lifespan" class="block text-sm font-medium text-gray-700 mb-2">Espérance de vie</label>
                        <input type="text" id="lifespan" name="lifespan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ex: 80 ans, Immortel, 500 ans...">
                    </div>
                </div>
            </div>
            
            <!-- Description -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Description</h2>
                <div class="space-y-4">
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description générale</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Décrivez cette race..."></textarea>
                    </div>
                    <div>
                        <label for="appearance" class="block text-sm font-medium text-gray-700 mb-2">Apparence physique</label>
                        <textarea id="appearance" name="appearance" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Caractéristiques physiques typiques..."></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="height" class="block text-sm font-medium text-gray-700 mb-2">Taille moyenne</label>
                            <input type="text" id="height" name="height" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ex: 1m80, Variable, Géant...">
                        </div>
                        <div>
                            <label for="weight" class="block text-sm font-medium text-gray-700 mb-2">Poids moyen</label>
                            <input type="text" id="weight" name="weight" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ex: 70kg, Léger, Lourd...">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Capacités et traits -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Capacités et traits</h2>
                <div class="space-y-4">
                    <div>
                        <label for="abilities" class="block text-sm font-medium text-gray-700 mb-2">Capacités raciales</label>
                        <textarea id="abilities" name="abilities" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Pouvoirs, capacités spéciales..."></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="strengths" class="block text-sm font-medium text-gray-700 mb-2">Forces raciales</label>
                            <textarea id="strengths" name="strengths" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Avantages naturels..."></textarea>
                        </div>
                        <div>
                            <label for="weaknesses" class="block text-sm font-medium text-gray-700 mb-2">Faiblesses raciales</label>
                            <textarea id="weaknesses" name="weaknesses" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Vulnérabilités, limitations..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Culture et société -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Culture et société</h2>
                <div class="space-y-4">
                    <div>
                        <label for="culture" class="block text-sm font-medium text-gray-700 mb-2">Culture</label>
                        <textarea id="culture" name="culture" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Traditions, coutumes, valeurs..."></textarea>
                    </div>
                    <div>
                        <label for="society" class="block text-sm font-medium text-gray-700 mb-2">Organisation sociale</label>
                        <textarea id="society" name="society" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Hiérarchie, gouvernement, structure sociale..."></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-700 mb-2">Langue(s)</label>
                            <input type="text" id="language" name="language" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ex: Elfique, Commun...">
                        </div>
                        <div>
                            <label for="religion" class="block text-sm font-medium text-gray-700 mb-2">Religion/Croyances</label>
                            <input type="text" id="religion" name="religion" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ex: Polythéiste, Animisme...">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Habitat et mode de vie -->
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
                        <p class="text-sm text-gray-600">Ajoutez des images pour illustrer cette race</p>
                        <button type="button" onclick="addImageField()" class="inline-flex items-center px-3 py-2 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 transition-colors">
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
                        <button type="button" onclick="addImageField()" class="inline-block mt-2 text-sm text-green-600 hover:text-green-800">
                            Ajouter votre première image
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Habitat et mode de vie -->
            <div class="pb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Habitat et mode de vie</h2>
                <div class="space-y-4">
                    <div>
                        <label for="habitat" class="block text-sm font-medium text-gray-700 mb-2">Habitat naturel</label>
                        <textarea id="habitat" name="habitat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Environnement préféré, type de logement..."></textarea>
                    </div>
                    <div>
                        <label for="diet" class="block text-sm font-medium text-gray-700 mb-2">Régime alimentaire</label>
                        <input type="text" id="diet" name="diet" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ex: Omnivore, Carnivore, Végétarien...">
                    </div>
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes supplémentaires</label>
                        <textarea id="notes" name="notes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Autres informations importantes..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Boutons d'action -->
        <div class="flex justify-between mt-8">
            <a href="/races" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                Annuler
            </a>
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-lg hover:from-green-700 hover:to-teal-700 transition-all duration-200 shadow-lg">
                Créer la race
            </button>
        </div>
    </form>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        loadCustomFields();
        setupForm();
    });
    
    let imageCounter = 0;
    
    function loadCustomFields() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const customFields = data.custom_fields?.race || {};
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
                        <textarea id="${key}" name="${key}" rows="3" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="${field.placeholder || ''}"></textarea>
                    </div>
                `;
            case 'select':
                const options = field.options?.map(opt => `<option value="${opt}">${opt}</option>`).join('') || '';
                return `
                    <div>
                        <label for="${key}" class="block text-sm font-medium text-gray-700 mb-2">${field.name}${requiredLabel}</label>
                        <select id="${key}" name="${key}" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            <option value="">Sélectionner...</option>
                            ${options}
                        </select>
                    </div>
                `;
            case 'checkbox':
                return `
                    <div class="flex items-center">
                        <input type="checkbox" id="${key}" name="${key}" value="1" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="${key}" class="ml-2 block text-sm text-gray-700">${field.name}</label>
                    </div>
                `;
            case 'number':
                return `
                    <div>
                        <label for="${key}" class="block text-sm font-medium text-gray-700 mb-2">${field.name}${requiredLabel}</label>
                        <input type="number" id="${key}" name="${key}" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="${field.placeholder || ''}">
                    </div>
                `;
            case 'date':
                return `
                    <div>
                        <label for="${key}" class="block text-sm font-medium text-gray-700 mb-2">${field.name}${requiredLabel}</label>
                        <input type="date" id="${key}" name="${key}" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                `;
            default: // text
                return `
                    <div>
                        <label for="${key}" class="block text-sm font-medium text-gray-700 mb-2">${field.name}${requiredLabel}</label>
                        <input type="text" id="${key}" name="${key}" ${requiredAttr} class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="${field.placeholder || ''}">
                    </div>
                `;
        }
    }
    
    function setupForm() {
        const form = document.getElementById('race-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(form);
            const raceData = {};
            
            for (let [key, value] of formData.entries()) {
                if (value.trim()) {
                    raceData[key] = value.trim();
                }
            }
            
            if (!raceData.name) {
                alert('Le nom de la race est obligatoire !');
                return;
            }
            
            // Créer la race
            const race = window.ocManager.createRace(raceData);
            
            // Ajouter les images
            const images = collectImages();
            if (images.length > 0) {
                raceData.images = images;
                const updatedRace = window.ocManager.updateRace(race.id, { images: images });
            }
            
            if (race) {
                window.ocManager.showNotification('Race créée avec succès !', 'success');
                window.location.href = '/races';
            } else {
                window.ocManager.showNotification('Erreur lors de la création de la race', 'error');
            }
        });
    }
    
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
                    <label for="${imageId}_file" class="block text-sm font-medium text-gray-700 mb-1">Choisir une image</label>
                    <input type="file" id="${imageId}_file" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" onchange="handleImageUpload(${imageCounter}, this)">
                    <p class="text-xs text-gray-500 mt-1">Formats supportés: JPG, PNG, GIF, WebP (max 5MB)</p>
                </div>
                
                <div>
                    <label for="${imageId}_title" class="block text-sm font-medium text-gray-700 mb-1">Titre (optionnel)</label>
                    <input type="text" id="${imageId}_title" name="images[${imageCounter}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Titre de l'image">
                </div>
                
                <div>
                    <label for="${imageId}_description" class="block text-sm font-medium text-gray-700 mb-1">Description (optionnel)</label>
                    <textarea id="${imageId}_description" name="images[${imageCounter}][description]" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Description de l'image"></textarea>
                </div>
                
                <div class="bg-white border border-gray-200 rounded-lg p-3">
                    <div id="${imageId}_preview" class="text-center text-gray-500 text-sm">
                        Aperçu de l'image (sélectionnez un fichier ci-dessus)
                    </div>
                </div>
                
                <input type="hidden" id="${imageId}_data" name="images[${imageCounter}][data]" value="">
            </div>
        `;
        
        container.appendChild(imageField);
        noImages.style.display = 'none';
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
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>