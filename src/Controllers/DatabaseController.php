<?php

namespace Controllers;

use Database;

class DatabaseController extends BaseController {
    
    /**
     * Test de connexion à la base de données
     */
    public function testConnection() {
        try {
            $db = Database::getInstance();
            $isConnected = $db->testConnection();
            
            if ($isConnected) {
                $this->json([
                    'success' => true,
                    'message' => 'Connexion à la base de données réussie',
                    'timestamp' => date('Y-m-d H:i:s')
                ]);
            } else {
                $this->json([
                    'success' => false,
                    'message' => 'Échec de la connexion à la base de données'
                ], 500);
            }
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'message' => 'Erreur de connexion: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Informations sur la base de données
     */
    public function info() {
        try {
            $db = Database::getInstance()->getConnection();
            
            // Version MySQL
            $versionStmt = $db->query("SELECT VERSION() as version");
            $version = $versionStmt->fetch()['version'];
            
            // Informations sur les tables
            $tablesStmt = $db->query("SHOW TABLES");
            $tables = $tablesStmt->fetchAll(\PDO::FETCH_COLUMN);
            
            // Statistiques des tables
            $stats = [];
            foreach ($tables as $table) {
                $countStmt = $db->prepare("SELECT COUNT(*) as count FROM `{$table}`");
                $countStmt->execute();
                $count = $countStmt->fetch()['count'];
                $stats[$table] = $count;
            }
            
            $this->json([
                'success' => true,
                'mysql_version' => $version,
                'tables' => $tables,
                'table_stats' => $stats,
                'total_tables' => count($tables)
            ]);
            
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des informations: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Exécution des migrations (pour le développement)
     */
    public function migrate() {
        try {
            $db = Database::getInstance()->getConnection();
            $migrationPath = __DIR__ . '/../../database/migrations/';
            
            if (!is_dir($migrationPath)) {
                throw new \Exception("Dossier de migrations non trouvé");
            }
            
            $migrations = glob($migrationPath . '*.sql');
            sort($migrations);
            
            $executed = [];
            
            foreach ($migrations as $migration) {
                $filename = basename($migration);
                $sql = file_get_contents($migration);
                
                // Exécuter chaque instruction SQL séparément
                $statements = array_filter(array_map('trim', explode(';', $sql)));
                
                foreach ($statements as $statement) {
                    if (!empty($statement)) {
                        $db->exec($statement);
                    }
                }
                
                $executed[] = $filename;
            }
            
            $this->json([
                'success' => true,
                'message' => 'Migrations exécutées avec succès',
                'executed_migrations' => $executed
            ]);
            
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'message' => 'Erreur lors de l\'exécution des migrations: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Insertion des données de test
     */
    public function seed() {
        try {
            $db = Database::getInstance()->getConnection();
            $seedFile = __DIR__ . '/../../database/seed.sql';
            
            if (!file_exists($seedFile)) {
                throw new \Exception("Fichier de données de test non trouvé");
            }
            
            $sql = file_get_contents($seedFile);
            
            // Exécuter chaque instruction SQL séparément
            $statements = array_filter(array_map('trim', explode(';', $sql)));
            
            foreach ($statements as $statement) {
                if (!empty($statement) && !preg_match('/^--/', $statement)) {
                    $db->exec($statement);
                }
            }
            
            $this->json([
                'success' => true,
                'message' => 'Données de test insérées avec succès'
            ]);
            
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'message' => 'Erreur lors de l\'insertion des données de test: ' . $e->getMessage()
            ], 500);
        }
    }
}