<?php 
$title = 'Modifier une race - YOC';
ob_start(); 
?>

<div class="fade-in">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Modifier la race</h1>
        <p class="text-gray-600">Mettez à jour les informations de cette race</p>
    </div>
    
    <form id="race-form" class="max-w-4xl">
        <input type="hidden" id="race-id" value="<?= htmlspecialchars($id) ?>">
        
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
            <div class="flex space-x-4">
                <button type="button" onclick="deleteRace()" class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    Supprimer
                </button>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-lg hover:from-green-700 hover:to-teal-700 transition-all duration-200 shadow-lg">
                    Sauvegarder
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    let currentRace = null;
    
    window.addEventListener('DOMContentLoaded', function() {
        loadRace();
        setupForm();
    });
    
    function loadRace() {
        const raceId = document.getElementById('race-id').value;
        currentRace = window.ocManager.getRace(raceId);
        
        if (!currentRace) {
            alert('Race non trouvée !');
            window.location.href = '/races';
            return;
        }
        
        // Remplir le formulaire
        const fields = ['name', 'type', 'origin', 'lifespan', 'description', 'appearance', 'height', 
                       'weight', 'abilities', 'strengths', 'weaknesses', 'culture', 'society', 
                       'language', 'religion', 'habitat', 'diet', 'notes'];
        
        fields.forEach(field => {
            const element = document.getElementById(field);
            if (element && currentRace[field]) {
                element.value = currentRace[field];
            }
        });
    }
    
    function setupForm() {
        const form = document.getElementById('race-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(form);
            const updates = {};
            
            for (let [key, value] of formData.entries()) {
                updates[key] = value.trim();
            }
            
            if (!updates.name) {
                alert('Le nom de la race est obligatoire !');
                return;
            }
            
            // Mettre à jour la race
            const raceId = document.getElementById('race-id').value;
            const updatedRace = window.ocManager.updateRace(raceId, updates);
            
            if (updatedRace) {
                window.ocManager.showNotification('Race mise à jour avec succès !', 'success');
                window.location.href = '/races';
            } else {
                window.ocManager.showNotification('Erreur lors de la mise à jour de la race', 'error');
            }
        });
    }
    
    function deleteRace() {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette race ? Cette action est irréversible.')) {
            const raceId = document.getElementById('race-id').value;
            const deleted = window.ocManager.deleteRace(raceId);
            
            if (deleted) {
                window.ocManager.showNotification('Race supprimée avec succès !', 'success');
                window.location.href = '/races';
            } else {
                window.ocManager.showNotification('Erreur lors de la suppression de la race', 'error');
            }
        }
    }
</script>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>