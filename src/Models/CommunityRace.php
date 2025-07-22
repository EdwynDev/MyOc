<?php

namespace Models;

class CommunityRace extends BaseModel {
    protected $table = 'community_races';
    
    /**
     * Trouve les races publiques
     */
    public function findPublicRaces($limit = 20, $offset = 0, $sort = 'recent') {
        $orderBy = $this->getSortOrder($sort);
        
        $stmt = $this->db->prepare("
            SELECT cr.*, u.username, u.avatar 
            FROM {$this->table} cr 
            JOIN users u ON cr.user_id = u.id 
            WHERE cr.is_public = 1 AND cr.status = 'approved'
            ORDER BY {$orderBy}
            LIMIT ? OFFSET ?
        ");
        $stmt->execute([$limit, $offset]);
        return $stmt->fetchAll();
    }
    
    /**
     * Trouve une race publique par ID
     */
    public function findPublicRace($id) {
        $stmt = $this->db->prepare("
            SELECT cr.*, u.username, u.avatar 
            FROM {$this->table} cr 
            JOIN users u ON cr.user_id = u.id 
            WHERE cr.id = ? AND cr.is_public = 1 AND cr.status = 'approved'
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    /**
     * Trouve les races d'un utilisateur
     */
    public function findByUser($userId) {
        return $this->findWhere('user_id', $userId);
    }
    
    /**
     * Recherche des races par nom ou description
     */
    public function search($query, $limit = 20, $offset = 0) {
        $stmt = $this->db->prepare("
            SELECT cr.*, u.username, u.avatar 
            FROM {$this->table} cr 
            JOIN users u ON cr.user_id = u.id 
            WHERE cr.is_public = 1 AND cr.status = 'approved'
            AND (cr.name LIKE ? OR cr.description LIKE ?)
            ORDER BY cr.created_at DESC 
            LIMIT ? OFFSET ?
        ");
        $searchTerm = "%{$query}%";
        $stmt->execute([$searchTerm, $searchTerm, $limit, $offset]);
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
     * Toggle like pour une race
     */
    public function toggleLike($raceId, $userId) {
        try {
            // Vérifier si déjà liké
            $stmt = $this->db->prepare("SELECT 1 FROM race_likes WHERE race_id = ? AND user_id = ?");
            $stmt->execute([$raceId, $userId]);
            $exists = $stmt->fetchColumn();
            
            if ($exists) {
                // Retirer le like
                $stmt = $this->db->prepare("DELETE FROM race_likes WHERE race_id = ? AND user_id = ?");
                $stmt->execute([$raceId, $userId]);
                
                // Décrémenter le compteur
                $this->db->prepare("UPDATE {$this->table} SET likes_count = likes_count - 1 WHERE id = ?")->execute([$raceId]);
                $liked = false;
            } else {
                // Ajouter le like
                $stmt = $this->db->prepare("INSERT INTO race_likes (race_id, user_id, created_at) VALUES (?, ?, NOW())");
                $stmt->execute([$raceId, $userId]);
                
                // Incrémenter le compteur
                $this->db->prepare("UPDATE {$this->table} SET likes_count = likes_count + 1 WHERE id = ?")->execute([$raceId]);
                $liked = true;
            }
            
            // Récupérer le nouveau compteur
            $stmt = $this->db->prepare("SELECT likes_count FROM {$this->table} WHERE id = ?");
            $stmt->execute([$raceId]);
            $count = $stmt->fetchColumn();
            
            return ['liked' => $liked, 'count' => $count];
            
        } catch (\PDOException $e) {
            return false;
        }
    }
    
    /**
     * Récupère les commentaires d'une race
     */
    public function getComments($raceId) {
        $stmt = $this->db->prepare("
            SELECT rc.*, u.username, u.avatar 
            FROM race_comments rc 
            JOIN users u ON rc.user_id = u.id 
            WHERE rc.race_id = ? AND rc.status = 'approved'
            ORDER BY rc.created_at ASC
        ");
        $stmt->execute([$raceId]);
        return $stmt->fetchAll();
    }
    
    /**
     * Ajoute un commentaire
     */
    public function addComment($raceId, $userId, $content, $parentId = null) {
        $stmt = $this->db->prepare("
            INSERT INTO race_comments (race_id, user_id, parent_id, content, status, created_at) 
            VALUES (?, ?, ?, ?, 'approved', NOW())
        ");
        
        if ($stmt->execute([$raceId, $userId, $parentId, $content])) {
            $commentId = $this->db->lastInsertId();
            
            // Récupérer le commentaire avec les infos utilisateur
            $stmt = $this->db->prepare("
                SELECT rc.*, u.username, u.avatar 
                FROM race_comments rc 
                JOIN users u ON rc.user_id = u.id 
                WHERE rc.id = ?
            ");
            $stmt->execute([$commentId]);
            return $stmt->fetch();
        }
        
        return false;
    }
    
    /**
     * Ordre de tri
     */
    private function getSortOrder($sort) {
        switch ($sort) {
            case 'popular':
                return 'cr.likes_count DESC, cr.created_at DESC';
            case 'views':
                return 'cr.views_count DESC, cr.created_at DESC';
            case 'name':
                return 'cr.name ASC';
            case 'recent':
            default:
                return 'cr.created_at DESC';
        }
    }
}