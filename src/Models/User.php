<?php

namespace Models;

class User extends BaseModel {
    protected $table = 'users';
    
    /**
     * Trouve un utilisateur par email
     */
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    
    /**
     * Trouve un utilisateur par nom d'utilisateur
     */
    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
    
    /**
     * Crée un nouvel utilisateur avec hash du mot de passe
     */
    public function createUser($data) {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        return $this->create($data);
    }
    
    /**
     * Vérifie le mot de passe
     */
    public function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
    
    /**
     * Met à jour le dernier login
     */
    public function updateLastLogin($id) {
        return $this->update($id, ['last_login' => date('Y-m-d H:i:s')]);
    }
    
    /**
     * Trouve les utilisateurs actifs
     */
    public function findActiveUsers() {
        return $this->findWhere('status', 'active');
    }
    
    /**
     * Trouve les top créateurs avec le nombre de créations
     */
    public function getTopCreators($limit = 5) {
        $stmt = $this->db->prepare("
            SELECT u.*, 
                   (SELECT COUNT(*) FROM community_ocs WHERE user_id = u.id AND is_public = 1) +
                   (SELECT COUNT(*) FROM community_races WHERE user_id = u.id AND is_public = 1) as total_creations
            FROM {$this->table} u 
            WHERE u.status = 'active'
            HAVING total_creations > 0
            ORDER BY total_creations DESC 
            LIMIT ?
        ");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }
    
    /**
     * Trouve les collections publiques d'un utilisateur
     */
    public function getPublicCollections($userId) {
        $stmt = $this->db->prepare("
            SELECT * FROM collections 
            WHERE user_id = ? AND is_public = 1 
            ORDER BY created_at DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}