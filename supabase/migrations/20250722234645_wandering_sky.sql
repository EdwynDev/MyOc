-- Migration: Création des tables de collections
-- Date: 2025-01-27

CREATE TABLE IF NOT EXISTS collections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,
    is_public BOOLEAN DEFAULT FALSE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id),
    INDEX idx_is_public (is_public),
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS collection_ocs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    collection_id INT NOT NULL,
    oc_id INT NOT NULL,
    added_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (collection_id) REFERENCES collections(id) ON DELETE CASCADE,
    FOREIGN KEY (oc_id) REFERENCES community_ocs(id) ON DELETE CASCADE,
    UNIQUE KEY unique_collection_oc (collection_id, oc_id),
    INDEX idx_collection_id (collection_id),
    INDEX idx_oc_id (oc_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS collection_races (
    id INT AUTO_INCREMENT PRIMARY KEY,
    collection_id INT NOT NULL,
    race_id INT NOT NULL,
    added_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (collection_id) REFERENCES collections(id) ON DELETE CASCADE,
    FOREIGN KEY (race_id) REFERENCES community_races(id) ON DELETE CASCADE,
    UNIQUE KEY unique_collection_race (collection_id, race_id),
    INDEX idx_collection_id (collection_id),
    INDEX idx_race_id (race_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;