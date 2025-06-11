-- Inserir usuário
INSERT INTO users (nome, email, senha, telefone, data_nascimento, endereco, cidade, estado, cep) 
VALUES 
('João Silva', 'joao@example.com', '$2y$10$hashdosenhasaqui', '(11) 99999-9999', '1990-01-01', 'Rua A, 123', 'São Paulo', 'SP', '01234-567'),
('Maria Santos', 'maria@example.com', '$2y$10$hashdosenhasaqui', '(11) 88888-8888', '1985-05-15', 'Av B, 456', 'São Paulo', 'SP', '01234-568');

-- Atualizar usuário
UPDATE users 
SET nome = 'João Silva', 
    telefone = '(11) 99999-9999', 
    data_nascimento = '1990-01-01'
WHERE id = 1;

-- Selecionar usuários
SELECT u.*, 
       COUNT(DISTINCT o.id) as total_pedidos,
       COUNT(DISTINCT r.id) as total_avaliacoes
FROM users u
LEFT JOIN orders o ON u.id = o.user_id
LEFT JOIN product_reviews r ON u.id = r.user_id
GROUP BY u.id
ORDER BY u.nome;

-- Deletar usuário
DELETE FROM users WHERE id = 1;
