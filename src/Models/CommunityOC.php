<?php

namespace Models;

class CommunityOC extends BaseModel {
    protected $table = 'community_ocs';
    
    /**
     * Trouve les OCs publics
     */
    public function findPublicOCs($limit = 20, $offset = 0) {
        $stmt = $this->db->prepare("
            SELECT co.*, u.username, u.avatar 
            FROM {$this->table} co 
            JOIN users u ON co.user_id = u.id 
            WHERE co.is_public = 1 AND co.status = 'approved'
            ORDER BY co.created_at DESC 
            LIMIT ? OFFSET ?
        ");
        $stmt->execute([$limit, $offset]);
        return $stmt->fetchAll();
    }
    
    /**
     * Trouve les OCs d'un utilisateur
     */
    public function findByUser($userId) {
        return $this->findWhere('user_id', $userId);
    }
    
    /**
     * Recherche des OCs par nom ou description
     */
    public function search($query, $limit = 20) {
        $stmt = $this->db->prepare("
            SELECT co.*, u.username, u.avatar 
            FROM {$this->table} co 
            JOIN users u ON co.user_id = u.id 
            WHERE co.is_public = 1 AND co.status = 'approved'
            AND (co.name LIKE ? OR co.description LIKE ?)
            ORDER BY co.created_at DESC 
            LIMIT ?
        ");
        $searchTerm = "%{$query}%";
        $stmt->execute([$searchTerm, $searchTerm, $limit]);
        return $stmt->fetchAll();
    }
    
    /**
     * Trouve les OCs par race
     */
    public function findByRace($race, $limit = 20) {
        $stmt = $this->db->prepare("
            SELECT co.*, u.username, u.avatar 
            FROM {$this->table} co 
            JOIN users u ON co.user_id = u.id 
            WHERE co.is_public = 1 AND co.status = 'approved' AND co.race = ?
            ORDER BY co.created_at DESC 
            LIMIT ?
        ");
        $stmt->execute([$race, $limit]);
        return $stmt->fetchAll();
    }
    
    /**
     * Ajoute un like à un OC
     */
    public function addLike($ocId, $userId) {
        try {
            $stmt = $this->db->prepare("INSERT INTO oc_likes (oc_id, user_id, created_at) VALUES (?, ?, NOW())");
            $result = $stmt->execute([$ocId, $userId]);
            
            if ($result) {
                // Mettre à jour le compteur de likes
                $this->db->prepare("UPDATE {$this->table} SET likes_count = likes_count + 1 WHERE id = ?")->execute([$ocId]);
            }
            
            return $result;
        } catch (\PDOException $e) {
            // Like déjà existant (contrainte unique)
            return false;
        }
    }
    
    /**
     * Retire un like d'un OC
     */
    public function removeLike($ocId, $userId) {
        $stmt = $this->db->prepare("DELETE FROM oc_likes WHERE oc_id = ? AND user_id = ?");
        $result = $stmt->execute([$ocId, $userId]);
        
        if ($result && $stmt->rowCount() > 0) {
            // Mettre à jour le compteur de likes
            $this->db->prepare("UPDATE {$this->table} SET likes_count = likes_count - 1 WHERE id = ?")->execute([$ocId]);
            return true;
        }
        
        return false;
    }
    
    /**
     * Vérifie si un utilisateur a liké un OC
     */
    public function hasUserLiked($ocId, $userId) {
        $stmt = $this->db->prepare("SELECT 1 FROM oc_likes WHERE oc_id = ? AND user_id = ?");
        $stmt->execute([$ocId, $userId]);
        return $stmt->fetchColumn() !== false;
    }
}