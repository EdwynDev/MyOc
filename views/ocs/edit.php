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
        
        if (!currentOC) {
            alert('OC non trouvé !');
            window.location.href = '/ocs';
            return;
        }
        
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
    }
    
    function setupForm() {
        const form = document.getElementById('oc-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(form);
            const updates = {};
            
            for (let [key, value] of formData.entries()) {
                updates[key] = value.trim();
            }
            
            if (!updates.name) {
                alert('Le nom est obligatoire !');
                return;
            }
            
            // Mettre à jour l'OC
            const ocId = document.getElementById('oc-id').value;
            const updatedOC = window.ocManager.updateOC(ocId, updates);
            
            if (updatedOC) {
                window.ocManager.showNotification('OC mis à jour avec succès !', 'success');
                window.location.href = '/ocs';
            } else {
                window.ocManager.showNotification('Erreur lors de la mise à jour de l\'OC', 'error');
            }
        });
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