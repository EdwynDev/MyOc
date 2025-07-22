-- Migration: Création des tables de likes
-- Date: 2025-01-27

CREATE TABLE IF NOT EXISTS oc_likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    oc_id INT NOT NULL,
    user_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (oc_id) REFERENCES community_ocs(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_oc_like (oc_id, user_id),
    INDEX idx_oc_id (oc_id),
    INDEX idx_user_id (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS race_likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    race_id INT NOT NULL,
    user_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (race_id) REFERENCES community_races(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_race_like (race_id, user_id),
    INDEX idx_race_id (race_id),
    INDEX idx_user_id (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;