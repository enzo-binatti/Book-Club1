<?php
class BaseModel {
    protected $db;
    
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=book_club', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    protected function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    protected function insert($table, $data) {
        $fields = array_keys($data);
        $values = array_fill(0, count($fields), '?');
        
        $sql = "INSERT INTO $table (" . implode(", ", $fields) . ") VALUES (" . implode(", ", $values) . ")";
        $this->query($sql, array_values($data));
        return $this->db->lastInsertId();
    }
    
    protected function update($table, $data, $where, $whereParams = []) {
        $fields = array_keys($data);
        $set = array_map(function($field) {
            return "$field = ?";
        }, $fields);
        
        $sql = "UPDATE $table SET " . implode(", ", $set) . " WHERE $where";
        $params = array_merge(array_values($data), $whereParams);
        $this->query($sql, $params);
    }
    
    protected function delete($table, $where, $params = []) {
        $sql = "DELETE FROM $table WHERE $where";
        $this->query($sql, $params);
    }
}
