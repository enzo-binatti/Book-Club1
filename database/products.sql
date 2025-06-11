-- Inserir categoria
INSERT INTO categories (nome, descricao, slug) 
VALUES 
('Romance', 'Livros de romance', 'romance'),
('Ficção Científica', 'Livros de ficção científica', 'ficcao-cientifica');

-- Inserir produto
INSERT INTO products (categoria_id, titulo, descricao, preco, estoque, autor, editora, ano_publicacao, isbn) 
VALUES 
(1, 'O Pequeno Príncipe', 'Uma história clássica', 39.90, 100, 'Antoine de Saint-Exupéry', 'Editora A', 1943, '9788501090197'),
(2, 'Neuromancer', 'Clássico da ficção científica', 59.90, 50, 'William Gibson', 'Editora B', 1984, '9788501090203');

-- Atualizar estoque
UPDATE products 
SET estoque = estoque - 1 
WHERE id = 1;

-- Selecionar produtos com estoque disponível
SELECT p.*, c.nome as categoria_nome
FROM products p
JOIN categories c ON p.categoria_id = c.id
WHERE p.estoque > 0
ORDER BY p.titulo;

-- Selecionar produtos por categoria
SELECT p.*, c.nome as categoria_nome
FROM products p
JOIN categories c ON p.categoria_id = c.id
WHERE c.id = 1
ORDER BY p.titulo;
