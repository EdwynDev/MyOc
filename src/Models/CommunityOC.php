<?php

namespace Models;

class CommunityOC extends BaseModel {
    protected $table = 'community_ocs';
    
    /**
     * Trouve une OC publique par ID
     */
    public function findPublicOC($id) {
        $stmt = $this->db->prepare("
            SELECT co.*, u.username, u.avatar 
            FROM {$this->table} co 
            JOIN users u ON co.user_id = u.id 
            WHERE co.id = ? AND co.is_public = 1 AND co.status = 'approved'
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    /**
     * Trouve les OCs publics avec tri
     */
    public function findPublicOCs($limit = 20, $offset = 0, $sort = 'recent') {
        $orderBy = $this->getSortOrder($sort);
        
        $stmt = $this->db->prepare("
            SELECT co.*, u.username, u.avatar 
            FROM {$this->table} co 
            JOIN users u ON co.user_id = u.id 
            WHERE co.is_public = 1 AND co.status = 'approved'
            ORDER BY {$orderBy}
            LIMIT ? OFFSET ?
        ");
        $stmt->execute([$limit, $offset]);
        return $stmt->fetchAll();
    }
    
    /**
     * Incrémente le nombre de vues
     */
    public function incrementViews($id) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET views_count = views_count + 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    /**
     * Récupère les commentaires d'un OC
     */
    public function getComments($ocId) {
        $stmt = $this->db->prepare("
            SELECT oc.*, u.username, u.avatar 
            FROM oc_comments oc 
            JOIN users u ON oc.user_id = u.id 
            WHERE oc.oc_id = ? AND oc.status = 'approved'
            ORDER BY oc.created_at ASC
        ");
        $stmt->execute([$ocId]);
        return $stmt->fetchAll();
    }
    
    /**
     * Trouve les OCs liés par race
     */
    public function findRelated($race, $excludeId, $limit = 4) {
        $stmt = $this->db->prepare("
            SELECT co.*, u.username, u.avatar 
            FROM {$this->table} co 
            JOIN users u ON co.user_id = u.id 
            WHERE co.is_public = 1 AND co.status = 'approved' 
            AND co.race = ? AND co.id != ?
            ORDER BY co.created_at DESC 
            LIMIT ?
        ");
        $stmt->execute([$race, $excludeId, $limit]);
        return $stmt->fetchAll();
    }
    
    /**
     * Toggle like pour un OC
     */
    public function toggleLike($ocId, $userId) {
        try {
            // Vérifier si déjà liké
            $stmt = $this->db->prepare("SELECT 1 FROM oc_likes WHERE oc_id = ? AND user_id = ?");
            $stmt->execute([$ocId, $userId]);
            $exists = $stmt->fetchColumn();
            
            if ($exists) {
                // Retirer le like
                $stmt = $this->db->prepare("DELETE FROM oc_likes WHERE oc_id = ? AND user_id = ?");
                $stmt->execute([$ocId, $userId]);
                
                // Décrémenter le compteur
                $this->db->prepare("UPDATE {$this->table} SET likes_count = likes_count - 1 WHERE id = ?")->execute([$ocId]);
                $liked = false;
            } else {
                // Ajouter le like
                $stmt = $this->db->prepare("INSERT INTO oc_likes (oc_id, user_id, created_at) VALUES (?, ?, NOW())");
                $stmt->execute([$ocId, $userId]);
                
                // Incrémenter le compteur
                $this->db->prepare("UPDATE {$this->table} SET likes_count = likes_count + 1 WHERE id = ?")->execute([$ocId]);
                $liked = true;
            }
            
            // Récupérer le nouveau compteur
            $stmt = $this->db->prepare("SELECT likes_count FROM {$this->table} WHERE id = ?");
            $stmt->execute([$ocId]);
            $count = $stmt->fetchColumn();
            
            return ['liked' => $liked, 'count' => $count];
            
        } catch (\PDOException $e) {
            return false;
        }
    }
    
    /**
     * Ajoute un commentaire
     */
    public function addComment($ocId, $userId, $content, $parentId = null) {
        $stmt = $this->db->prepare("
            INSERT INTO oc_comments (oc_id, user_id, parent_id, content, status, created_at) 
            VALUES (?, ?, ?, ?, 'approved', NOW())
        ");
        
        if ($stmt->execute([$ocId, $userId, $parentId, $content])) {
            $commentId = $this->db->lastInsertId();
            
            // Récupérer le commentaire avec les infos utilisateur
            $stmt = $this->db->prepare("
                SELECT oc.*, u.username, u.avatar 
                FROM oc_comments oc 
                JOIN users u ON oc.user_id = u.id 
                WHERE oc.id = ?
            ");
            $stmt->execute([$commentId]);
            return $stmt->fetch();
        }
        
        return false;
    }
    
    /**
     * Récupère les races distinctes
     */
    public function getDistinctRaces() {
        $stmt = $this->db->prepare("
            SELECT DISTINCT race 
            FROM {$this->table} 
            WHERE race IS NOT NULL AND race != '' AND is_public = 1 AND status = 'approved'
            ORDER BY race ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }
    
    /**
     * Ordre de tri
     */
    private function getSortOrder($sort) {
        switch ($sort) {
            case 'popular':
                return 'co.likes_count DESC, co.created_at DESC';
            case 'views':
                return 'co.views_count DESC, co.created_at DESC';
            case 'name':
                return 'co.name ASC';
            case 'recent':
            default:
                return 'co.created_at DESC';
        }
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