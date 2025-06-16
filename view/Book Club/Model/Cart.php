<?php
class Cart extends BaseModel {
    public function addToCart($userId, $productId, $quantity = 1) {
        // Verifica se o produto já está no carrinho
        $stmt = $this->query("SELECT id FROM cart WHERE user_id = ? AND product_id = ?", 
            [$userId, $productId]
        );
        
        $cartItem = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($cartItem) {
            // Se já existe, atualiza a quantidade
            $this->update('cart', ['quantity' => $quantity], 
                "id = ?", [$cartItem['id']]
            );
        } else {
            // Se não existe, cria novo item
            $this->insert('cart', [
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }
    }
    
    public function getCartItems($userId) {
        $stmt = $this->query("""
            SELECT c.id as cart_id, c.quantity, p.* 
            FROM cart c 
            JOIN products p ON c.product_id = p.id 
            WHERE c.user_id = ?
        """, [$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateCartItem($cartId, $quantity) {
        $this->update('cart', ['quantity' => $quantity], 
            "id = ?", [$cartId]
        );
    }
    
    public function removeCartItem($cartId) {
        $this->delete('cart', "id = ?", [$cartId]);
    }
    
    public function clearCart($userId) {
        $this->delete('cart', "user_id = ?", [$userId]);
    }
    
    public function calculateTotal($userId) {
        $stmt = $this->query("""
            SELECT SUM(p.price * c.quantity) as total 
            FROM cart c 
            JOIN products p ON c.product_id = p.id 
            WHERE c.user_id = ?
        """, [$userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
}
