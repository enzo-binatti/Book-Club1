-- Inserir pedido
INSERT INTO orders (user_id, total, status, endereco_entrega, cep_entrega, cidade_entrega, estado_entrega) 
VALUES 
(1, 99.80, 'pendente', 'Rua A, 123', '01234-567', 'São Paulo', 'SP');

-- Inserir itens do pedido
INSERT INTO order_items (order_id, product_id, quantidade, preco_unitario) 
VALUES 
(1, 1, 2, 39.90),
(1, 2, 1, 19.90);

-- Atualizar status do pedido
UPDATE orders 
SET status = 'processando'
WHERE id = 1;

-- Selecionar pedidos do usuário
SELECT o.*, 
       u.nome as nome_usuario,
       GROUP_CONCAT(DISTINCT CONCAT(
           p.titulo, ' (', oi.quantidade, 'x)', ' - R$', oi.preco_unitario
       ) SEPARATOR ', ') as itens
FROM orders o
JOIN users u ON o.user_id = u.id
LEFT JOIN order_items oi ON o.id = oi.order_id
LEFT JOIN products p ON oi.product_id = p.id
WHERE o.user_id = 1
GROUP BY o.id
ORDER BY o.created_at DESC;

-- Selecionar pedidos por status
SELECT o.*, 
       u.nome as nome_usuario,
       COUNT(oi.id) as total_itens,
       SUM(oi.quantidade * oi.preco_unitario) as total_pedido
FROM orders o
JOIN users u ON o.user_id = u.id
LEFT JOIN order_items oi ON o.id = oi.order_id
WHERE o.status = 'pendente'
GROUP BY o.id
ORDER BY o.created_at DESC;
