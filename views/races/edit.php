<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Race Fantasy - Édition d'univers | YOC Studio</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Modifiez et perfectionnez vos races fantasy avec YOC Studio. Outils d'édition avancés pour peaufiner cultures, capacités et caractéristiques de vos espèces.">
    <meta name="keywords" content="modifier race fantasy, édition espèce, worldbuilding editing, mise à jour race, perfectionnement univers">
    <meta name="robots" content="noindex, nofollow">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Electrolize:wght@400&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Electrolize', monospace; 
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #0f0f0f 100%);
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .glass-dark {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .fade-in { 
            animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(30px); } 
            to { opacity: 1; transform: translateY(0); } 
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .neon-text {
            text-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #10b981, #059669);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .btn-primary:hover::before {
            left: 100%;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'electrolize': ['Electrolize', 'monospace'],
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full bg-gray-900 text-white font-electrolize">
    <div class="min-h-screen p-6 lg:p-12">
        <div class="max-w-6xl mx-auto fade-in">
            <!-- Header -->
            <div class="mb-12">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mr-6 shadow-2xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-5xl font-bold text-white neon-text mb-2">Modifier la race</h1>
                        <p class="text-gray-400 text-xl">Mettez à jour les informations de cette race</p>
                    </div>
                </div>
            </div>
            
            <form id="race-form" class="space-y-8">
                <input type="hidden" id="race-id" value="<?= htmlspecialchars($id) ?>">
                
                <!-- Informations de base -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Informations de base
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-3">Nom de la race *</label>
                            <input type="text" id="name" name="name" required 
                                   class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                   placeholder="ex: Elfes, Dragons, Humains...">
                        </div>
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-300 mb-3">Type</label>
                            <input type="text" id="type" name="type" 
                                   class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                   placeholder="ex: Humanoïde, Bestial, Magique...">
                        </div>
                        <div>
                            <label for="origin" class="block text-sm font-medium text-gray-300 mb-3">Origine</label>
                            <input type="text" id="origin" name="origin" 
                                   class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                   placeholder="ex: Forêts anciennes, Autre dimension...">
                        </div>
                        <div>
                            <label for="lifespan" class="block text-sm font-medium text-gray-300 mb-3">Espérance de vie</label>
                            <input type="text" id="lifespan" name="lifespan" 
                                   class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                   placeholder="ex: 80 ans, Immortel, 500 ans...">
                        </div>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        Description
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-3">Description générale</label>
                            <textarea id="description" name="description" rows="4" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Décrivez cette race..."></textarea>
                        </div>
                        <div>
                            <label for="appearance" class="block text-sm font-medium text-gray-300 mb-3">Apparence physique</label>
                            <textarea id="appearance" name="appearance" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Caractéristiques physiques typiques..."></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="height" class="block text-sm font-medium text-gray-300 mb-3">Taille moyenne</label>
                                <input type="text" id="height" name="height" 
                                       class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                       placeholder="ex: 1m80, Variable, Géant...">
                            </div>
                            <div>
                                <label for="weight" class="block text-sm font-medium text-gray-300 mb-3">Poids moyen</label>
                                <input type="text" id="weight" name="weight" 
                                       class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                       placeholder="ex: 70kg, Léger, Lourd...">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Capacités -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Capacités et traits
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label for="abilities" class="block text-sm font-medium text-gray-300 mb-3">Capacités raciales</label>
                            <textarea id="abilities" name="abilities" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Pouvoirs, capacités spéciales..."></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="strengths" class="block text-sm font-medium text-gray-300 mb-3">Forces raciales</label>
                                <textarea id="strengths" name="strengths" rows="3" 
                                          class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                          placeholder="Avantages naturels..."></textarea>
                            </div>
                            <div>
                                <label for="weaknesses" class="block text-sm font-medium text-gray-300 mb-3">Faiblesses raciales</label>
                                <textarea id="weaknesses" name="weaknesses" rows="3" 
                                          class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 resize-none" 
                                          placeholder="Vulnérabilités, limitations..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Culture -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Culture et société
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label for="culture" class="block text-sm font-medium text-gray-300 mb-3">Culture</label>
                            <textarea id="culture" name="culture" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Traditions, coutumes, valeurs..."></textarea>
                        </div>
                        <div>
                            <label for="society" class="block text-sm font-medium text-gray-300 mb-3">Organisation sociale</label>
                            <textarea id="society" name="society" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Hiérarchie, gouvernement, structure sociale..."></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="language" class="block text-sm font-medium text-gray-300 mb-3">Langue(s)</label>
                                <input type="text" id="language" name="language" 
                                       class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                       placeholder="ex: Elfique, Commun...">
                            </div>
                            <div>
                                <label for="religion" class="block text-sm font-medium text-gray-300 mb-3">Religion/Croyances</label>
                                <input type="text" id="religion" name="religion" 
                                       class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                       placeholder="ex: Polythéiste, Animisme...">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Habitat -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Habitat et mode de vie
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label for="habitat" class="block text-sm font-medium text-gray-300 mb-3">Habitat naturel</label>
                            <textarea id="habitat" name="habitat" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Environnement préféré, type de logement..."></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="diet" class="block text-sm font-medium text-gray-300 mb-3">Régime alimentaire</label>
                                <input type="text" id="diet" name="diet" 
                                       class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                       placeholder="ex: Omnivore, Carnivore, Végétarien...">
                            </div>
                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-300 mb-3">Notes supplémentaires</label>
                                <input type="text" id="notes" name="notes" 
                                       class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                                       placeholder="Autres informations importantes...">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Images -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Images
                    </h2>
                    
                    <div class="glass rounded-2xl p-6 border border-blue-500/30 mb-6">
                        <div class="flex items-start space-x-4">
                            <svg class="w-6 h-6 text-blue-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="text-blue-400 font-medium mb-2">Hébergement d'images gratuit</h3>
                                <p class="text-gray-300 text-sm leading-relaxed">
                                    Utilisez <a href="https://www.zupimages.net/" target="_blank" class="text-blue-400 hover:text-blue-300 underline font-medium">ZupImages</a> pour héberger vos images gratuitement. 
                                    Après upload, sélectionnez "Lien direct de votre image" et copiez l'URL ici.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div id="images-container" class="space-y-6">
                        <!-- Sera rempli par JavaScript -->
                    </div>
                    
                    <button type="button" onclick="addImageInput()" class="w-full py-4 px-6 border-2 border-dashed border-gray-600 rounded-xl text-gray-400 hover:border-green-500 hover:text-green-400 transition-all duration-300 font-medium">
                        ➕ Ajouter une image
                    </button>
                </div>
                
                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row justify-between gap-6 pt-8">
                    <a href="/races" class="px-8 py-4 glass border border-gray-600 text-white rounded-2xl hover:border-gray-500 transition-all duration-300 text-center font-medium">
                        ← Annuler
                    </a>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="button" onclick="deleteRace()" class="px-8 py-4 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-2xl hover:from-red-700 hover:to-red-800 transition-all duration-300 font-bold">
                            🗑️ Supprimer
                        </button>
                        <button type="submit" class="px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-2xl hover:from-green-700 hover:to-teal-700 transition-all duration-300 shadow-xl font-bold btn-primary">
                            💾 Sauvegarder
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentRace = null;
        
        window.addEventListener('DOMContentLoaded', function() {
            loadRace();
            setupForm();
        });
        
        function loadRace() {
            const raceId = document.getElementById('race-id').value;
            const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
            currentRace = (data.races || []).find(race => race.id === raceId);
            
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
            
            // Charger les images
            loadImages();
        }
        
        function setupForm() {
            const form = document.getElementById('race-form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const name = document.getElementById('name').value.trim();
                if (!name) {
                    alert('Le nom de la race est obligatoire !');
                    return;
                }
                
                const updates = {
                    name: name,
                    type: document.getElementById('type').value.trim(),
                    origin: document.getElementById('origin').value.trim(),
                    lifespan: document.getElementById('lifespan').value.trim(),
                    description: document.getElementById('description').value.trim(),
                    appearance: document.getElementById('appearance').value.trim(),
                    height: document.getElementById('height').value.trim(),
                    weight: document.getElementById('weight').value.trim(),
                    abilities: document.getElementById('abilities').value.trim(),
                    strengths: document.getElementById('strengths').value.trim(),
                    weaknesses: document.getElementById('weaknesses').value.trim(),
                    culture: document.getElementById('culture').value.trim(),
                    society: document.getElementById('society').value.trim(),
                    language: document.getElementById('language').value.trim(),
                    religion: document.getElementById('religion').value.trim(),
                    habitat: document.getElementById('habitat').value.trim(),
                    diet: document.getElementById('diet').value.trim(),
                    notes: document.getElementById('notes').value.trim(),
                    images: collectImages(),
                    updated_at: new Date().toISOString()
                };
                
                const raceId = document.getElementById('race-id').value;
                const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
                const raceIndex = (data.races || []).findIndex(race => race.id === raceId);
                
                if (raceIndex !== -1) {
                    data.races[raceIndex] = { ...data.races[raceIndex], ...updates };
                    localStorage.setItem('oc_data', JSON.stringify(data));
                    
                    alert('💾 Race mise à jour avec succès !');
                    window.location.href = '/races';
                } else {
                    alert('Erreur lors de la mise à jour de la race');
                }
            });
        }
        
        function deleteRace() {
            if (confirm('⚠️ Êtes-vous sûr de vouloir supprimer cette race ? Cette action est irréversible.')) {
                const raceId = document.getElementById('race-id').value;
                const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
                
                data.races = (data.races || []).filter(race => race.id !== raceId);
                localStorage.setItem('oc_data', JSON.stringify(data));
                
                alert('🗑️ Race supprimée avec succès !');
                window.location.href = '/races';
            }
        }
        
        function loadImages() {
            const container = document.getElementById('images-container');
            container.innerHTML = '';
            
            const images = currentRace.images || [];
            
            if (images.length === 0) {
                addImageInput();
            } else {
                images.forEach(image => {
                    addImageInputWithData(image);
                });
            }
        }
        
        function addImageInput() {
            const container = document.getElementById('images-container');
            const newImageInput = document.createElement('div');
            newImageInput.className = 'image-input-group glass rounded-2xl p-6 border border-gray-700';
            newImageInput.innerHTML = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-3">Titre de l'image (optionnel)</label>
                        <input type="text" class="image-title w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                               placeholder="ex: Illustration de la race, Habitat...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-3">URL de l'image</label>
                        <input type="url" class="image-url w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                               placeholder="https://exemple.com/image.jpg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-3">Description (optionnel)</label>
                        <textarea class="image-description w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                  rows="2" placeholder="Description de l'image..."></textarea>
                    </div>
                    <button type="button" onclick="removeImageInput(this)" class="text-red-400 hover:text-red-300 transition-colors text-sm font-medium">
                        🗑️ Supprimer cette image
                    </button>
                </div>
            `;
            container.appendChild(newImageInput);
        }
        
        function addImageInputWithData(image) {
            const container = document.getElementById('images-container');
            const newImageInput = document.createElement('div');
            newImageInput.className = 'image-input-group glass rounded-2xl p-6 border border-gray-700';
            newImageInput.innerHTML = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-3">Titre de l'image (optionnel)</label>
                        <input type="text" class="image-title w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                               placeholder="ex: Illustration de la race, Habitat..." value="${image.title || ''}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-3">URL de l'image</label>
                        <input type="url" class="image-url w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" 
                               placeholder="https://exemple.com/image.jpg" value="${image.data || ''}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-3">Description (optionnel)</label>
                        <textarea class="image-description w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                  rows="2" placeholder="Description de l'image...">${image.description || ''}</textarea>
                    </div>
                    <button type="button" onclick="removeImageInput(this)" class="text-red-400 hover:text-red-300 transition-colors text-sm font-medium">
                        🗑️ Supprimer cette image
                    </button>
                </div>
            `;
            container.appendChild(newImageInput);
        }
        
        function removeImageInput(button) {
            const container = document.getElementById('images-container');
            if (container.children.length > 1) {
                button.closest('.image-input-group').remove();
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
</body>
</html>