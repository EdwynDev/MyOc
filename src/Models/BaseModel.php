<?php

namespace Models;

use PDO;
use Exception;

abstract class BaseModel {
    protected $db;
    protected $table;
    
    public function __construct() {
        $this->db = \Database::getInstance()->getConnection();
    }
    
    /**
     * Trouve un enregistrement par ID
     */
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    /**
     * Trouve tous les enregistrements
     */
    public function findAll($orderBy = 'id', $order = 'ASC') {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} ORDER BY {$orderBy} {$order}");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Trouve des enregistrements avec une condition
     */
    public function findWhere($column, $value, $operator = '=') {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$column} {$operator} ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll();
    }
    
    /**
     * Crée un nouvel enregistrement
     */
    public function create($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $columns = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $stmt = $this->db->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})");
        
        if ($stmt->execute($data)) {
            return $this->find($this->db->lastInsertId());
        }
        
        return false;
    }
    
    /**
     * Met à jour un enregistrement
     */
    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $setClause = [];
        foreach (array_keys($data) as $column) {
            $setClause[] = "{$column} = :{$column}";
        }
        $setClause = implode(', ', $setClause);
        
        $data['id'] = $id;
        
        $stmt = $this->db->prepare("UPDATE {$this->table} SET {$setClause} WHERE id = :id");
        
        if ($stmt->execute($data)) {
            return $this->find($id);
        }
        
        return false;
    }
    
    /**
     * Supprime un enregistrement
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    /**
     * Compte les enregistrements
     */
    public function count($where = null) {
        $sql = "SELECT COUNT(*) FROM {$this->table}";
        if ($where) {
            $sql .= " WHERE {$where}";
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    /**
     * Exécute une requête personnalisée
     */
    protected function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}