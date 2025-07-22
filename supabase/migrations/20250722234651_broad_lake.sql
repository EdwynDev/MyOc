-- Données de test pour YOC Community
-- Date: 2025-01-27

-- Utilisateurs de test
INSERT INTO users (username, email, password, bio, status, email_verified) VALUES
('admin', 'admin@yoc.local', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrateur de YOC', 'active', TRUE),
('alice_creator', 'alice@yoc.local', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Créatrice passionnée d\'OCs fantasy', 'active', TRUE),
('bob_artist', 'bob@yoc.local', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Artiste et créateur d\'univers', 'active', TRUE),
('charlie_writer', 'charlie@yoc.local', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Écrivain de fiction', 'active', TRUE);

-- Races communautaires de test
INSERT INTO community_races (user_id, name, type, origin, lifespan, description, appearance, abilities, culture, is_public, status) VALUES
(2, 'Elfes Lunaires', 'Humanoïde', 'Forêts de Selenya', '800-1000 ans', 'Elfes gracieux aux pouvoirs liés à la lune', 'Peau pâle argentée, cheveux blancs ou argentés, yeux violets', 'Magie lunaire, vision nocturne, télépathie limitée', 'Culture nocturne, vénération de la lune', TRUE, 'approved'),
(3, 'Dragons de Cristal', 'Draconique', 'Montagnes de Cristal', 'Immortels', 'Dragons aux écailles cristallines', 'Écailles translucides, ailes cristallines, souffle de glace', 'Magie de glace, vol, résistance magique', 'Solitaires, gardiens de trésors', TRUE, 'approved'),
(4, 'Kitsune', 'Esprit', 'Forêts spirituelles', '500-2000 ans', 'Esprits renards aux multiples queues', 'Forme humaine ou renard, queues multiples', 'Métamorphose, illusions, magie spirituelle', 'Sagesse ancestrale, respect de la nature', TRUE, 'approved');

-- OCs communautaires de test
INSERT INTO community_ocs (user_id, name, race, age, gender, description, personality, abilities, is_public, status) VALUES
(2, 'Luna Silverleaf', 'Elfes Lunaires', '156 ans', 'Féminin', 'Prêtresse de la lune aux cheveux argentés', 'Sage, mystérieuse, protectrice', 'Guérison lunaire, divination, contrôle des marées', TRUE, 'approved'),
(3, 'Crystalius', 'Dragons de Cristal', 'Millénaire', 'Masculin', 'Dragon gardien des montagnes cristallines', 'Fier, noble, protecteur de son territoire', 'Souffle glacial, magie de cristal, vol supersonique', TRUE, 'approved'),
(4, 'Yuki', 'Kitsune', '342 ans', 'Féminin', 'Kitsune à trois queues, guide spirituel', 'Espiègle, sage, bienveillante', 'Illusions, téléportation, communication avec les esprits', TRUE, 'approved'),
(2, 'Aria Nightwhisper', 'Elfes Lunaires', '203 ans', 'Féminin', 'Assassin elfe spécialisée dans les missions nocturnes', 'Discrète, efficace, loyale', 'Invisibilité nocturne, agilité surhumaine, poison lunaire', TRUE, 'approved');

-- Likes de test
INSERT INTO oc_likes (oc_id, user_id) VALUES
(1, 3), (1, 4),
(2, 2), (2, 4),
(3, 2), (3, 3),
(4, 3), (4, 4);

INSERT INTO race_likes (race_id, user_id) VALUES
(1, 3), (1, 4),
(2, 2), (2, 4),
(3, 2), (3, 3);

-- Commentaires de test
INSERT INTO oc_comments (oc_id, user_id, content) VALUES
(1, 3, 'Magnifique OC ! J\'adore le concept de prêtresse lunaire.'),
(1, 4, 'Les pouvoirs liés à la lune sont très originaux !'),
(2, 2, 'Un dragon de cristal, quelle idée géniale !'),
(3, 3, 'Les kitsune sont mes créatures préférées, très bien réalisé !');

-- Collections de test
INSERT INTO collections (user_id, name, description, is_public) VALUES
(2, 'Mes Favoris Fantasy', 'Collection de mes OCs et races fantasy préférés', TRUE),
(3, 'Créatures Magiques', 'Toutes les créatures magiques que j\'aime', TRUE),
(4, 'Inspiration Écriture', 'OCs qui m\'inspirent pour mes histoires', FALSE);

-- Éléments dans les collections
INSERT INTO collection_ocs (collection_id, oc_id) VALUES
(1, 2), (1, 3),
(2, 1), (2, 3),
(3, 1), (3, 4);

INSERT INTO collection_races (collection_id, race_id) VALUES
(1, 2), (1, 3),
(2, 1), (2, 2), (2, 3),
(3, 1);

-- Follows de test
INSERT INTO user_follows (follower_id, following_id) VALUES
(2, 3), (2, 4),
(3, 2), (3, 4),
(4, 2), (4, 3);

-- Mise à jour des compteurs de likes
UPDATE community_ocs SET likes_count = (SELECT COUNT(*) FROM oc_likes WHERE oc_id = community_ocs.id);
UPDATE community_races SET likes_count = (SELECT COUNT(*) FROM race_likes WHERE race_id = community_races.id);