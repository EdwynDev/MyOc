-- Migration: Création de la table community_ocs
-- Date: 2025-01-27

CREATE TABLE IF NOT EXISTS community_ocs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    race VARCHAR(100) NULL,
    age VARCHAR(50) NULL,
    gender VARCHAR(50) NULL,
    description TEXT NULL,
    appearance TEXT NULL,
    personality TEXT NULL,
    backstory TEXT NULL,
    occupation VARCHAR(255) NULL,
    location VARCHAR(255) NULL,
    abilities TEXT NULL,
    skills TEXT NULL,
    strengths TEXT NULL,
    weaknesses TEXT NULL,
    relationships TEXT NULL,
    notes TEXT NULL,
    images JSON NULL,
    custom_fields JSON NULL,
    is_public BOOLEAN DEFAULT FALSE,
    status ENUM('draft', 'pending', 'approved', 'rejected') DEFAULT 'draft',
    likes_count INT DEFAULT 0,
    views_count INT DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id),
    INDEX idx_is_public (is_public),
    INDEX idx_status (status),
    INDEX idx_race (race),
    INDEX idx_created_at (created_at),
    INDEX idx_likes_count (likes_count)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;