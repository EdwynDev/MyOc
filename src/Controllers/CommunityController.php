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
        $recentOCs = $this->ocModel->findPublicOCs(6);
        $recentRaces = $this->raceModel->findPublicRaces(6);
        $topCreators = $this->userModel->getTopCreators(5);
        
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
        
        if ($search) {
            $ocs = $this->ocModel->search($search, $limit, $offset);
        } elseif ($race) {
            $ocs = $this->ocModel->findByRace($race, $limit, $offset);
        } else {
            $ocs = $this->ocModel->findPublicOCs($limit, $offset, $sort);
        }
        
        $races = $this->raceModel->getDistinctRaces();
        
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
        
        if ($search) {
            $races = $this->raceModel->search($search, $limit, $offset);
        } else {
            $races = $this->raceModel->findPublicRaces($limit, $offset, $sort);
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
            $_SESSION['error'] = 'Connexion requise pour publier.';
            $this->redirect('/community/login');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ocData = $_POST;
            $ocData['user_id'] = $_SESSION['community_user_id'];
            $ocData['is_public'] = true;
            $ocData['status'] = 'approved'; // Auto-approuvé pour l'instant
            
            $oc = $this->ocModel->create($ocData);
            
            if ($oc) {
                $_SESSION['success'] = 'OC publié avec succès !';
                $this->redirect('/community/ocs');
            } else {
                $_SESSION['error'] = 'Erreur lors de la publication.';
            }
        }
        
        $this->view('community/publish-oc');
    }
    
    // Publier une race locale vers la communauté
    public function publishRace() {
        if (!isset($_SESSION['community_user_id'])) {
            $_SESSION['error'] = 'Connexion requise pour publier.';
            $this->redirect('/community/login');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $raceData = $_POST;
            $raceData['user_id'] = $_SESSION['community_user_id'];
            $raceData['is_public'] = true;
            $raceData['status'] = 'approved'; // Auto-approuvé pour l'instant
            
            $race = $this->raceModel->create($raceData);
            
            if ($race) {
                $_SESSION['success'] = 'Race publiée avec succès !';
                $this->redirect('/community/races');
            } else {
                $_SESSION['error'] = 'Erreur lors de la publication.';
            }
        }
        
        $this->view('community/publish-race');
    }
}