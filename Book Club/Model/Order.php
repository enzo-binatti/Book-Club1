<?php
class Order extends BaseModel {
    public function createOrder($userId, $items, $total) {
        // Cria o pedido
        $orderId = $this->insert('orders', [
            'user_id' => $userId,
            'total' => $total,
            'status' => 'pendente',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        
        // Adiciona os itens do pedido
        foreach ($items as $item) {
            $this->insert('order_items', [
                'order_id' => $orderId,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }
        
        return $orderId;
    }
    
    public function getOrderById($orderId) {
        $stmt = $this->query("""
            SELECT o.*, u.nome as user_name 
            FROM orders o 
            JOIN users u ON o.user_id = u.id 
            WHERE o.id = ?
        """, [$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getOrderItems($orderId) {
        $stmt = $this->query("""
            SELECT oi.*, p.title as product_title, p.price as product_price 
            FROM order_items oi 
            JOIN products p ON oi.product_id = p.id 
            WHERE oi.order_id = ?
        """, [$orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateOrderStatus($orderId, $status) {
        $this->update('orders', ['status' => $status], "id = ?", [$orderId]);
    }
    
    public function getUserOrders($userId) {
        $stmt = $this->query("""
            SELECT o.*, u.nome as user_name 
            FROM orders o 
            JOIN users u ON o.user_id = u.id 
            WHERE o.user_id = ?
            ORDER BY o.created_at DESC
        """, [$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getRecentOrders($limit = 10) {
        $stmt = $this->query("""
            SELECT o.*, u.nome as user_name 
            FROM orders o 
            JOIN users u ON o.user_id = u.id 
            ORDER BY o.created_at DESC 
            LIMIT ?
        """, [$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
