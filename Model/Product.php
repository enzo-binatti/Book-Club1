<?php
class Product extends BaseModel {
    public function getAllProducts() {
        $stmt = $this->query("SELECT * FROM products ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProductById($id) {
        $stmt = $this->query("SELECT * FROM products WHERE id = ?", [$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createProduct($data) {
        $requiredFields = ['title', 'description', 'price', 'stock', 'category_id'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                throw new Exception("Campo obrigatório não encontrado: $field");
            }
        }
        
        return $this->insert('products', $data);
    }
    
    public function updateProduct($id, $data) {
        $this->update('products', $data, "id = ?", [$id]);
    }
    
    public function deleteProduct($id) {
        $this->delete('products', "id = ?", [$id]);
    }
    
    public function getProductsByCategory($categoryId) {
        $stmt = $this->query("SELECT * FROM products WHERE category_id = ? ORDER BY created_at DESC", [$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function searchProducts($query) {
        $stmt = $this->query("SELECT * FROM products WHERE title LIKE ? OR description LIKE ?", 
            ["%$query%", "%$query%"]
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
