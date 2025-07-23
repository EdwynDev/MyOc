<?php

namespace Controllers;

use Models\User;
use Models\CommunityOC;
use Models\CommunityRace;

class CommunityController extends BaseController {
    private $userModel;
    private $ocModel;
    private $raceModel;
    
    public function __construct() {
        $this->userModel = new User();
        $this->ocModel = new CommunityOC();
        $this->raceModel = new CommunityRace();
    }
    
    // Page d'accueil communautaire
    public function index() {
        try {
            $recentOCs = $this->ocModel->findPublicOCs(6);
            $recentRaces = $this->raceModel->findPublicRaces(6, 0);
            $topCreators = $this->userModel->getTopCreators(5);
        } catch (Exception $e) {
            // Si la base de données n'est pas disponible, utiliser des données vides
            $recentOCs = [];
            $recentRaces = [];
            $topCreators = [];
        }
        
        $this->view('community/index', [
            'recent_ocs' => $recentOCs,
            'recent_races' => $recentRaces,
            'top_creators' => $topCreators
        ]);
    }
    
    // Galerie d'OCs
    public function ocs() {
        $page = $_GET['page'] ?? 1;
        $search = $_GET['search'] ?? '';
        $race = $_GET['race'] ?? '';
        $sort = $_GET['sort'] ?? 'recent';
        
        $limit = 12;
        $offset = ($page - 1) * $limit;
        
        try {
            if ($search) {
                $ocs = $this->ocModel->search($search, $limit);
            } elseif ($race) {
                $ocs = $this->ocModel->findByRace($race, $limit);
            } else {
                $ocs = $this->ocModel->findPublicOCs($limit, $offset, $sort);
            }
            $races = $this->ocModel->getDistinctRaces();
        } catch (Exception $e) {
            // Si la base de données n'est pas disponible, utiliser des données vides
            $ocs = [];
            $races = [];
        }
        
        $this->view('community/ocs', [
            'ocs' => $ocs,
            'races' => $races,
            'current_page' => $page,
            'search' => $search,
            'selected_race' => $race,
            'sort' => $sort
        ]);
    }
    
    // Galerie de races
    public function races() {
        $page = $_GET['page'] ?? 1;
        $search = $_GET['search'] ?? '';
        $sort = $_GET['sort'] ?? 'recent';
        
        $limit = 12;
        $offset = ($page - 1) * $limit;
        
        try {
            if ($search) {
                $races = $this->raceModel->search($search, $limit, $offset);
            } else {
                $races = $this->raceModel->findPublicRaces($limit, $offset, $sort);
            }
        } catch (Exception $e) {
            // Si la base de données n'est pas disponible, utiliser des données vides
            $races = [];
        }
        
        $this->view('community/races', [
            'races' => $races,
            'current_page' => $page,
            'search' => $search,
            'sort' => $sort
        ]);
    }
    
    // Détail d'un OC
    public function viewOC($id) {
        $oc = $this->ocModel->findPublicOC($id);
        if (!$oc) {
            $_SESSION['error'] = 'OC non trouvé.';
            $this->redirect('/community/ocs');
            return;
        }
        
        // Incrémenter les vues
        $this->ocModel->incrementViews($id);
        
        $comments = $this->ocModel->getComments($id);
        $relatedOCs = $this->ocModel->findRelated($oc['race'], $id, 4);
        
        $this->view('community/oc-detail', [
            'oc' => $oc,
            'comments' => $comments,
            'related_ocs' => $relatedOCs
        ]);
    }
    
    // Détail d'une race
    public function viewRace($id) {
        $race = $this->raceModel->findPublicRace($id);
        if (!$race) {
            $_SESSION['error'] = 'Race non trouvée.';
            $this->redirect('/community/races');
            return;
        }
        
        // Incrémenter les vues
        $this->raceModel->incrementViews($id);
        
        $comments = $this->raceModel->getComments($id);
        $ocsOfRace = $this->ocModel->findByRace($race['name'], 6);
        
        $this->view('community/race-detail', [
            'race' => $race,
            'comments' => $comments,
            'ocs_of_race' => $ocsOfRace
        ]);
    }
    
    // Profil utilisateur
    public function profile($username) {
        $user = $this->userModel->findByUsername($username);
        if (!$user) {
            $_SESSION['error'] = 'Utilisateur non trouvé.';
            $this->redirect('/community');
            return;
        }
        
        $userOCs = $this->ocModel->findByUser($user['id']);
        $userRaces = $this->raceModel->findByUser($user['id']);
        $collections = $this->userModel->getPublicCollections($user['id']);
        
        $this->view('community/profile', [
            'user' => $user,
            'ocs' => $userOCs,
            'races' => $userRaces,
            'collections' => $collections
        ]);
    }
    
    // API - Liker un OC
    public function likeOC() {
        if (!isset($_SESSION['community_user_id'])) {
            $this->json(['success' => false, 'message' => 'Connexion requise'], 401);
            return;
        }
        
        $ocId = $_POST['oc_id'] ?? null;
        $userId = $_SESSION['community_user_id'];
        
        if (!$ocId) {
            $this->json(['success' => false, 'message' => 'ID OC manquant'], 400);
            return;
        }
        
        $result = $this->ocModel->toggleLike($ocId, $userId);
        $this->json(['success' => true, 'liked' => $result['liked'], 'count' => $result['count']]);
    }
    
    // API - Liker une race
    public function likeRace() {
        if (!isset($_SESSION['community_user_id'])) {
            $this->json(['success' => false, 'message' => 'Connexion requise'], 401);
            return;
        }
        
        $raceId = $_POST['race_id'] ?? null;
        $userId = $_SESSION['community_user_id'];
        
        if (!$raceId) {
            $this->json(['success' => false, 'message' => 'ID race manquant'], 400);
            return;
        }
        
        $result = $this->raceModel->toggleLike($raceId, $userId);
        $this->json(['success' => true, 'liked' => $result['liked'], 'count' => $result['count']]);
    }
    
    // API - Ajouter un commentaire
    public function addComment() {
        if (!isset($_SESSION['community_user_id'])) {
            $this->json(['success' => false, 'message' => 'Connexion requise'], 401);
            return;
        }
        
        $type = $_POST['type'] ?? null; // 'oc' ou 'race'
        $itemId = $_POST['item_id'] ?? null;
        $content = trim($_POST['content'] ?? '');
        $parentId = $_POST['parent_id'] ?? null;
        $userId = $_SESSION['community_user_id'];
        
        if (!$type || !$itemId || !$content) {
            $this->json(['success' => false, 'message' => 'Données manquantes'], 400);
            return;
        }
        
        if ($type === 'oc') {
            $comment = $this->ocModel->addComment($itemId, $userId, $content, $parentId);
        } else {
            $comment = $this->raceModel->addComment($itemId, $userId, $content, $parentId);
        }
        
        if ($comment) {
            $this->json(['success' => true, 'comment' => $comment]);
        } else {
            $this->json(['success' => false, 'message' => 'Erreur lors de l\'ajout du commentaire'], 500);
        }
    }
    
    // Publier un OC local vers la communauté
    public function publishOC() {
        if (!isset($_SESSION['community_user_id'])) {
            $_SESSION['error'] = 'Vous devez être connecté pour publier.';
            $this->redirect('/community/login');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Récupérer les données JSON
                $input = file_get_contents('php://input');
                $ocData = json_decode($input, true);
                
                if (!$ocData || !isset($ocData['name'])) {
                    $this->json(['success' => false, 'message' => 'Données invalides ou nom manquant'], 400);
                    return;
                }
                
                // Préparer les données pour la base de données
                $communityOCData = [
                    'user_id' => $_SESSION['community_user_id'],
                    'name' => $ocData['name'],
                    'race' => $ocData['race'] ?? null,
                    'age' => $ocData['age'] ?? null,
                    'gender' => $ocData['gender'] ?? null,
                    'description' => $ocData['description'] ?? null,
                    'appearance' => $ocData['appearance'] ?? null,
                    'personality' => $ocData['personality'] ?? null,
                    'backstory' => $ocData['backstory'] ?? null,
                    'occupation' => $ocData['occupation'] ?? null,
                    'location' => $ocData['location'] ?? null,
                    'abilities' => $ocData['abilities'] ?? null,
                    'skills' => $ocData['skills'] ?? null,
                    'strengths' => $ocData['strengths'] ?? null,
                    'weaknesses' => $ocData['weaknesses'] ?? null,
                    'relationships' => $ocData['relationships'] ?? null,
                    'notes' => $ocData['notes'] ?? null,
                    'images' => !empty($ocData['images']) ? json_encode($ocData['images']) : null,
                    'is_public' => true,
                    'status' => 'approved'
                ];
                
                // Créer l'OC dans la base de données
                $createdOC = $this->ocModel->create($communityOCData);
                
                if ($createdOC) {
                    $this->json(['success' => true, 'message' => 'OC publié avec succès dans la communauté !', 'oc_id' => $createdOC['id']]);
                } else {
                    $this->json(['success' => false, 'message' => 'Erreur lors de la publication de l\'OC'], 500);
                }
                
            } catch (Exception $e) {
                error_log('Erreur publication OC: ' . $e->getMessage());
                $this->json(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()], 500);
            }
            return;
        }
        
        $this->view('community/publish-oc');
    }
    
    // Publier une race locale vers la communauté
    public function publishRace() {
        if (!isset($_SESSION['community_user_id'])) {
            $_SESSION['error'] = 'Vous devez être connecté pour publier.';
            $this->redirect('/community/login');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Récupérer les données JSON
                $input = file_get_contents('php://input');
                $raceData = json_decode($input, true);
                
                if (!$raceData || !isset($raceData['name'])) {
                    $this->json(['success' => false, 'message' => 'Données invalides ou nom manquant'], 400);
                    return;
                }
                
                // Préparer les données pour la base de données
                $communityRaceData = [
                    'user_id' => $_SESSION['community_user_id'],
                    'name' => $raceData['name'],
                    'type' => $raceData['type'] ?? null,
                    'origin' => $raceData['origin'] ?? null,
                    'lifespan' => $raceData['lifespan'] ?? null,
                    'description' => $raceData['description'] ?? null,
                    'appearance' => $raceData['appearance'] ?? null,
                    'height' => $raceData['height'] ?? null,
                    'weight' => $raceData['weight'] ?? null,
                    'abilities' => $raceData['abilities'] ?? null,
                    'strengths' => $raceData['strengths'] ?? null,
                    'weaknesses' => $raceData['weaknesses'] ?? null,
                    'culture' => $raceData['culture'] ?? null,
                    'society' => $raceData['society'] ?? null,
                    'language' => $raceData['language'] ?? null,
                    'religion' => $raceData['religion'] ?? null,
                    'habitat' => $raceData['habitat'] ?? null,
                    'diet' => $raceData['diet'] ?? null,
                    'notes' => $raceData['notes'] ?? null,
                    'images' => !empty($raceData['images']) ? json_encode($raceData['images']) : null,
                    'is_public' => true,
                    'status' => 'approved'
                ];
                
                // Créer la race dans la base de données
                $createdRace = $this->raceModel->create($communityRaceData);
                
                if ($createdRace) {
                    $this->json(['success' => true, 'message' => 'Race publiée avec succès dans la communauté !', 'race_id' => $createdRace['id']]);
                } else {
                    $this->json(['success' => false, 'message' => 'Erreur lors de la publication de la race'], 500);
                }
                
            } catch (Exception $e) {
                error_log('Erreur publication race: ' . $e->getMessage());
                $this->json(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()], 500);
            }
            return;
        }
        
        $this->view('community/publish-race');
    }
    
    // API - Supprimer un OC de la communauté
    public function deleteCommunityOC() {
        if (!isset($_SESSION['community_user_id'])) {
            $this->json(['success' => false, 'message' => 'Connexion requise'], 401);
            return;
        }
        
        $ocId = $_POST['oc_id'] ?? null;
        $userId = $_SESSION['community_user_id'];
        
        if (!$ocId) {
            $this->json(['success' => false, 'message' => 'ID OC manquant'], 400);
            return;
        }
        
        try {
            $db = \Database::getInstance()->getConnection();
            
            // Vérifier que l'OC appartient à l'utilisateur
            $stmt = $db->prepare("SELECT user_id FROM community_ocs WHERE id = ?");
            $stmt->execute([$ocId]);
            $oc = $stmt->fetch();
            
            if (!$oc || $oc['user_id'] != $userId) {
                $this->json(['success' => false, 'message' => 'OC non trouvé ou non autorisé'], 403);
                return;
            }
            
            // Supprimer l'OC et ses dépendances
            $db->beginTransaction();
            
            // Supprimer les commentaires
            $stmt = $db->prepare("DELETE FROM oc_comments WHERE oc_id = ?");
            $stmt->execute([$ocId]);
            
            // Supprimer les likes
            $stmt = $db->prepare("DELETE FROM oc_likes WHERE oc_id = ?");
            $stmt->execute([$ocId]);
            
            // Supprimer l'OC
            $stmt = $db->prepare("DELETE FROM community_ocs WHERE id = ?");
            $deleted = $stmt->execute([$ocId]);
            
            $db->commit();
            
            if ($deleted) {
                $this->json(['success' => true, 'message' => 'OC supprimé de la communauté avec succès']);
            } else {
                $this->json(['success' => false, 'message' => 'Erreur lors de la suppression'], 500);
            }
            
        } catch (Exception $e) {
            if (isset($db)) {
                $db->rollBack();
            }
            error_log('Erreur suppression OC communauté: ' . $e->getMessage());
            $this->json(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()], 500);
        }
    }
    
    // API - Supprimer une race de la communauté
    public function deleteCommunityRace() {
        if (!isset($_SESSION['community_user_id'])) {
            $this->json(['success' => false, 'message' => 'Connexion requise'], 401);
            return;
        }
        
        $raceId = $_POST['race_id'] ?? null;
        $userId = $_SESSION['community_user_id'];
        
        if (!$raceId) {
            $this->json(['success' => false, 'message' => 'ID race manquant'], 400);
            return;
        }
        
        try {
            $db = \Database::getInstance()->getConnection();
            
            // Vérifier que la race appartient à l'utilisateur
            $stmt = $db->prepare("SELECT user_id FROM community_races WHERE id = ?");
            $stmt->execute([$raceId]);
            $race = $stmt->fetch();
            
            if (!$race || $race['user_id'] != $userId) {
                $this->json(['success' => false, 'message' => 'Race non trouvée ou non autorisée'], 403);
                return;
            }
            
            // Supprimer la race et ses dépendances
            $db->beginTransaction();
            
            // Supprimer les commentaires
            $stmt = $db->prepare("DELETE FROM race_comments WHERE race_id = ?");
            $stmt->execute([$raceId]);
            
            // Supprimer les likes
            $stmt = $db->prepare("DELETE FROM race_likes WHERE race_id = ?");
            $stmt->execute([$raceId]);
            
            // Supprimer la race
            $stmt = $db->prepare("DELETE FROM community_races WHERE id = ?");
            $deleted = $stmt->execute([$raceId]);
            
            $db->commit();
            
            if ($deleted) {
                $this->json(['success' => true, 'message' => 'Race supprimée de la communauté avec succès']);
            } else {
                $this->json(['success' => false, 'message' => 'Erreur lors de la suppression'], 500);
            }
            
        } catch (Exception $e) {
            if (isset($db)) {
                $db->rollBack();
            }
            error_log('Erreur suppression race communauté: ' . $e->getMessage());
            $this->json(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()], 500);
        }
    }
    
    // API - Supprimer un commentaire
    public function deleteComment() {
        if (!isset($_SESSION['community_user_id'])) {
            $this->json(['success' => false, 'message' => 'Connexion requise'], 401);
            return;
        }
        
        $commentId = $_POST['comment_id'] ?? null;
        $type = $_POST['type'] ?? null;
        $userId = $_SESSION['community_user_id'];
        
        if (!$commentId || !$type) {
            $this->json(['success' => false, 'message' => 'Données manquantes'], 400);
            return;
        }
        
        try {
            $db = \Database::getInstance()->getConnection();
            $table = $type === 'oc' ? 'oc_comments' : 'race_comments';
            
            // Vérifier que le commentaire appartient à l'utilisateur
            $stmt = $db->prepare("SELECT * FROM {$table} WHERE id = ? AND user_id = ?");
            $stmt->execute([$commentId, $userId]);
            $comment = $stmt->fetch();
            
            if (!$comment) {
                $this->json(['success' => false, 'message' => 'Commentaire non trouvé ou non autorisé'], 403);
                return;
            }
            
            // Supprimer le commentaire
            $stmt = $db->prepare("DELETE FROM {$table} WHERE id = ?");
            $result = $stmt->execute([$commentId]);
            
            if ($result) {
                $this->json(['success' => true, 'message' => 'Commentaire supprimé avec succès']);
            } else {
                $this->json(['success' => false, 'message' => 'Erreur lors de la suppression'], 500);
            }
            
        } catch (Exception $e) {
            error_log('Erreur suppression commentaire: ' . $e->getMessage());
            $this->json(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()], 500);
        }
    }
}