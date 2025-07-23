<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Original Character - Studio de création | YOC Studio</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Créez votre Original Character avec YOC Studio. Interface moderne et intuitive pour donner vie à vos personnages. Outils avancés de character design.">
    <meta name="keywords" content="créer OC, character design, création personnage, original character creator, studio création">
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
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
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
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mr-6 shadow-2xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-5xl font-bold text-white neon-text mb-2">Créer un Original Character</h1>
                        <p class="text-gray-400 text-xl">Donnez vie à votre nouveau personnage</p>
                    </div>
                </div>
                
                        </svg>
                        <span id="creation-info-text" class="text-blue-400 font-medium"></span>
                    </div>
                </div>
            </div>
            
            <form id="oc-form" class="space-y-8">
                <!-- Informations de base -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Informations de base
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-3">Nom *</label>
                            <input type="text" id="name" name="name" required 
                                   class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                                   placeholder="Nom de votre OC">
                        </div>
                        <div>
                            <label for="race" class="block text-sm font-medium text-gray-300 mb-3">Race</label>
                            <select id="race" name="race" 
                                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                <option value="">Sélectionner une race</option>
                            </select>
                        </div>
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-300 mb-3">Âge</label>
                            <input type="text" id="age" name="age" 
                                   class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                                   placeholder="ex: 25 ans, Adulte, etc.">
                        </div>
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-300 mb-3">Genre</label>
                            <input type="text" id="gender" name="gender" 
                                   class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                                   placeholder="ex: Masculin, Féminin, Non-binaire, etc.">
                        </div>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        Description
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-3">Description générale</label>
                            <textarea id="description" name="description" rows="4" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Décrivez votre personnage..."></textarea>
                        </div>
                        <div>
                            <label for="appearance" class="block text-sm font-medium text-gray-300 mb-3">Apparence physique</label>
                            <textarea id="appearance" name="appearance" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Couleur des cheveux, des yeux, taille, etc."></textarea>
                        </div>
                        <div>
                            <label for="personality" class="block text-sm font-medium text-gray-300 mb-3">Personnalité</label>
                            <textarea id="personality" name="personality" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Traits de caractère, comportement, etc."></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Histoire -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Histoire
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label for="backstory" class="block text-sm font-medium text-gray-300 mb-3">Histoire personnelle</label>
                            <textarea id="backstory" name="backstory" rows="4" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Passé, origine, événements marquants..."></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="occupation" class="block text-sm font-medium text-gray-300 mb-3">Profession/Occupation</label>
                                <input type="text" id="occupation" name="occupation" 
                                       class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                                       placeholder="Métier, rôle, etc.">
                            </div>
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-300 mb-3">Lieu de résidence</label>
                                <input type="text" id="location" name="location" 
                                       class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                                       placeholder="Ville, région, monde...">
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
                        Capacités et compétences
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label for="abilities" class="block text-sm font-medium text-gray-300 mb-3">Pouvoirs/Capacités spéciales</label>
                            <textarea id="abilities" name="abilities" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Magie, super-pouvoirs, talents particuliers..."></textarea>
                        </div>
                        <div>
                            <label for="skills" class="block text-sm font-medium text-gray-300 mb-3">Compétences</label>
                            <textarea id="skills" name="skills" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Combat, artisanat, connaissances..."></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="strengths" class="block text-sm font-medium text-gray-300 mb-3">Forces</label>
                                <textarea id="strengths" name="strengths" rows="3" 
                                          class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none" 
                                          placeholder="Points forts du personnage"></textarea>
                            </div>
                            <div>
                                <label for="weaknesses" class="block text-sm font-medium text-gray-300 mb-3">Faiblesses</label>
                                <textarea id="weaknesses" name="weaknesses" rows="3" 
                                          class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 resize-none" 
                                          placeholder="Points faibles du personnage"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Relations -->
                <div class="glass-dark rounded-3xl p-8 border border-gray-800">
                    <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        Relations
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label for="relationships" class="block text-sm font-medium text-gray-300 mb-3">Relations importantes</label>
                            <textarea id="relationships" name="relationships" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Famille, amis, ennemis, mentors..."></textarea>
                        </div>
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-300 mb-3">Notes supplémentaires</label>
                            <textarea id="notes" name="notes" rows="3" 
                                      class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                      placeholder="Autres informations importantes..."></textarea>
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
                        <div class="image-input-group glass rounded-2xl p-6 border border-gray-700">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-3">Titre de l'image (optionnel)</label>
                                    <input type="text" class="image-title w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                                           placeholder="ex: Portrait, Tenue de combat...">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-3">URL de l'image</label>
                                    <input type="url" class="image-url w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                                           placeholder="https://exemple.com/image.jpg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-3">Description (optionnel)</label>
                                    <textarea class="image-description w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                              rows="2" placeholder="Description de l'image..."></textarea>
                                </div>
                                <button type="button" onclick="removeImageInput(this)" class="text-red-400 hover:text-red-300 transition-colors text-sm font-medium">
                                    🗑️ Supprimer cette image
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" onclick="addImageInput()" class="w-full py-4 px-6 border-2 border-dashed border-gray-600 rounded-xl text-gray-400 hover:border-blue-500 hover:text-blue-400 transition-all duration-300 font-medium">
                        ➕ Ajouter une image
                    </button>
                </div>
                
                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row justify-between gap-6 pt-8">
                    <a href="/ocs" class="px-8 py-4 glass border border-gray-600 text-white rounded-2xl hover:border-gray-500 transition-all duration-300 text-center font-medium">
                        ← Annuler
                    </a>
                    <button type="submit" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl font-bold btn-primary">
                        ✨ Créer l'OC
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            loadRaces();
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
        
        function setupForm() {
            const form = document.getElementById('oc-form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const name = document.getElementById('name').value.trim();
                if (!name) {
                    alert('Le nom est obligatoire !');
                    return;
                }
                
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
                
                const data = JSON.parse(localStorage.getItem('oc_data') || '{}');
                if (!data.ocs) data.ocs = [];
                
                const newOC = {
                    id: Date.now().toString(36) + Math.random().toString(36).substr(2),
                    created_at: new Date().toISOString(),
                    updated_at: new Date().toISOString(),
                    ...ocData
                };
                
                Object.keys(newOC).forEach(key => {
                    if (newOC[key] === '' || newOC[key] === null || newOC[key] === undefined) {
                        delete newOC[key];
                    }
                });
                
                data.ocs.push(newOC);
                localStorage.setItem('oc_data', JSON.stringify(data));
                
                alert('✨ OC créé avec succès !');
                window.location.href = '/ocs';
            });
        }
        
        function addImageInput() {
            const container = document.getElementById('images-container');
            const newImageInput = document.createElement('div');
            newImageInput.className = 'image-input-group glass rounded-2xl p-6 border border-gray-700';
            newImageInput.innerHTML = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-3">Titre de l'image (optionnel)</label>
                        <input type="text" class="image-title w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                               placeholder="ex: Portrait, Tenue de combat...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-3">URL de l'image</label>
                        <input type="url" class="image-url w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                               placeholder="https://exemple.com/image.jpg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-3">Description (optionnel)</label>
                        <textarea class="image-description w-full px-4 py-3 bg-gray-800/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                                  rows="2" placeholder="Description de l'image..."></textarea>
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