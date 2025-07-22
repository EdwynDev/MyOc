<?php 
$title = 'Champs personnalisés - YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Champs personnalisés</h1>
        <p class="text-gray-600">Personnalisez les formulaires d'OCs et de races selon vos besoins</p>
    </div>
    
    <!-- Navigation des onglets -->
    <div class="bg-white rounded-lg shadow-lg border mb-8">
        <div class="border-b border-gray-200">
            <nav class="flex space-x-8 px-6" aria-label="Tabs">
                <button id="tab-oc" class="tab-button active py-4 px-1 border-b-2 border-indigo-500 font-medium text-sm text-indigo-600">
                    Champs OC
                </button>
                <button id="tab-race" class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    Champs Race
                </button>
            </nav>
        </div>
        
        <!-- Contenu OC -->
        <div id="content-oc" class="tab-content p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Champs personnalisés pour les OCs</h2>
                <button onclick="addCustomField('oc')" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Ajouter un champ
                </button>
            </div>
            
            <div id="oc-fields-list" class="space-y-4">
                <!-- Sera rempli par JavaScript -->
            </div>
            
            <div id="no-oc-fields" class="hidden text-center py-8 text-gray-500">
                <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                </svg>
                <p class="text-sm">Aucun champ personnalisé pour les OCs</p>
                <button onclick="addCustomField('oc')" class="inline-block mt-2 text-sm text-indigo-600 hover:text-indigo-800">
                    Créer votre premier champ personnalisé
                </button>
            </div>
        </div>
        
        <!-- Contenu Race -->
        <div id="content-race" class="tab-content hidden p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Champs personnalisés pour les races</h2>
                <button onclick="addCustomField('race')" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Ajouter un champ
                </button>
            </div>
            
            <div id="race-fields-list" class="space-y-4">
                <!-- Sera rempli par JavaScript -->
            </div>
            
            <div id="no-race-fields" class="hidden text-center py-8 text-gray-500">
                <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                </svg>
                <p class="text-sm">Aucun champ personnalisé pour les races</p>
                <button onclick="addCustomField('race')" class="inline-block mt-2 text-sm text-green-600 hover:text-green-800">
                    Créer votre premier champ personnalisé
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal d'ajout de champ -->
    <div id="field-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Ajouter un champ personnalisé</h3>
                    <button onclick="closeFieldModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <form id="field-form" class="space-y-4">
                    <input type="hidden" id="field-type" value="">
                    
                    <div>
                        <label for="field-name" class="block text-sm font-medium text-gray-700 mb-2">Nom du champ *</label>
                        <input type="text" id="field-name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="ex: Couleur des yeux">
                    </div>
                    
                    <div>
                        <label for="field-input-type" class="block text-sm font-medium text-gray-700 mb-2">Type de champ *</label>
                        <select id="field-input-type" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="text">Texte court</option>
                            <option value="textarea">Texte long</option>
                            <option value="number">Nombre</option>
                            <option value="select">Liste déroulante</option>
                            <option value="checkbox">Case à cocher</option>
                            <option value="date">Date</option>
                        </select>
                    </div>
                    
                    <div id="select-options" class="hidden">
                        <label for="field-options" class="block text-sm font-medium text-gray-700 mb-2">Options (une par ligne)</label>
                        <textarea id="field-options" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Option 1&#10;Option 2&#10;Option 3"></textarea>
                    </div>
                    
                    <div>
                        <label for="field-placeholder" class="block text-sm font-medium text-gray-700 mb-2">Texte d'aide (optionnel)</label>
                        <input type="text" id="field-placeholder" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="ex: Entrez la couleur des yeux">
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="field-required" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="field-required" class="ml-2 block text-sm text-gray-700">Champ obligatoire</label>
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeFieldModal()" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let currentFieldType = 'oc';
    
    window.addEventListener('DOMContentLoaded', function() {
        setupTabs();
        loadCustomFields();
        setupFieldForm();
    });
    
    function setupTabs() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.id.replace('tab-', '');
                
                // Mettre à jour les boutons
                tabButtons.forEach(btn => {
                    btn.classList.remove('active', 'border-indigo-500', 'text-indigo-600');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });
                button.classList.add('active', 'border-indigo-500', 'text-indigo-600');
                button.classList.remove('border-transparent', 'text-gray-500');
                
                // Mettre à jour le contenu
                tabContents.forEach(content => content.classList.add('hidden'));
                document.getElementById(`content-${targetTab}`).classList.remove('hidden');
                
                currentFieldType = targetTab;
            });
        });
    }
    
    function loadCustomFields() {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        const customFields = data.custom_fields || { oc: {}, race: {} };
        
        displayCustomFields('oc', customFields.oc || {});
        displayCustomFields('race', customFields.race || {});
    }
    
    function displayCustomFields(type, fields) {
        const container = document.getElementById(`${type}-fields-list`);
        const noFieldsDiv = document.getElementById(`no-${type}-fields`);
        
        const fieldEntries = Object.entries(fields);
        
        if (fieldEntries.length === 0) {
            container.innerHTML = '';
            noFieldsDiv.classList.remove('hidden');
            return;
        }
        
        noFieldsDiv.classList.add('hidden');
        container.innerHTML = fieldEntries.map(([key, field]) => createFieldCard(type, key, field)).join('');
    }
    
    function createFieldCard(type, key, field) {
        const typeLabels = {
            text: 'Texte court',
            textarea: 'Texte long',
            number: 'Nombre',
            select: 'Liste déroulante',
            checkbox: 'Case à cocher',
            date: 'Date'
        };
        
        return `
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="font-medium text-gray-900">${field.name}</h3>
                        <div class="flex items-center space-x-4 mt-1">
                            <span class="text-sm text-gray-500">Type: ${typeLabels[field.inputType] || field.inputType}</span>
                            ${field.required ? '<span class="text-xs bg-red-100 text-red-800 px-2 py-1 rounded">Obligatoire</span>' : ''}
                        </div>
                        ${field.placeholder ? `<p class="text-xs text-gray-600 mt-1">Aide: ${field.placeholder}</p>` : ''}
                        ${field.options ? `<p class="text-xs text-gray-600 mt-1">Options: ${field.options.join(', ')}</p>` : ''}
                    </div>
                    <button onclick="deleteCustomField('${type}', '${key}')" class="ml-4 text-red-600 hover:text-red-800 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        `;
    }
    
    function addCustomField(type) {
        currentFieldType = type;
        document.getElementById('field-type').value = type;
        document.getElementById('field-modal').classList.remove('hidden');
        document.getElementById('field-name').focus();
    }
    
    function closeFieldModal() {
        document.getElementById('field-modal').classList.add('hidden');
        document.getElementById('field-form').reset();
        document.getElementById('select-options').classList.add('hidden');
    }
    
    function setupFieldForm() {
        const form = document.getElementById('field-form');
        const inputTypeSelect = document.getElementById('field-input-type');
        const selectOptionsDiv = document.getElementById('select-options');
        
        inputTypeSelect.addEventListener('change', function() {
            if (this.value === 'select') {
                selectOptionsDiv.classList.remove('hidden');
            } else {
                selectOptionsDiv.classList.add('hidden');
            }
        });
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const fieldData = {
                name: document.getElementById('field-name').value.trim(),
                inputType: document.getElementById('field-input-type').value,
                placeholder: document.getElementById('field-placeholder').value.trim(),
                required: document.getElementById('field-required').checked
            };
            
            if (fieldData.inputType === 'select') {
                const optionsText = document.getElementById('field-options').value.trim();
                fieldData.options = optionsText ? optionsText.split('\n').map(opt => opt.trim()).filter(opt => opt) : [];
                
                if (fieldData.options.length === 0) {
                    alert('Veuillez ajouter au moins une option pour la liste déroulante.');
                    return;
                }
            }
            
            if (!fieldData.name) {
                alert('Le nom du champ est obligatoire.');
                return;
            }
            
            saveCustomField(currentFieldType, fieldData);
            closeFieldModal();
        });
    }
    
    function saveCustomField(type, fieldData) {
        const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
        if (!data.custom_fields) data.custom_fields = { oc: {}, race: {} };
        if (!data.custom_fields[type]) data.custom_fields[type] = {};
        
        // Générer une clé unique
        const key = fieldData.name.toLowerCase().replace(/[^a-z0-9]/g, '_') + '_' + Date.now();
        
        data.custom_fields[type][key] = fieldData;
        localStorage.setItem('oc_data', JSON.stringify(data));
        
        loadCustomFields();
        window.ocManager.showNotification('Champ personnalisé ajouté avec succès !', 'success');
    }
    
    function deleteCustomField(type, key) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce champ personnalisé ?')) {
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            if (data.custom_fields && data.custom_fields[type]) {
                delete data.custom_fields[type][key];
                localStorage.setItem('oc_data', JSON.stringify(data));
                loadCustomFields();
                window.ocManager.showNotification('Champ personnalisé supprimé avec succès !', 'success');
            }
        }
    }
    
    // Fermer le modal en cliquant à l'extérieur
    document.getElementById('field-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeFieldModal();
        }
    });
    
    // Fermer le modal avec Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('field-modal').classList.contains('hidden')) {
            closeFieldModal();
        }
    });
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>