-- Inserir post
INSERT INTO blog_posts (titulo, conteudo, autor_id, imagem, slug, status) 
VALUES 
('10 livros que você deve ler', 'Conteúdo do post...', 1, 'blog-1.jpg', '10-livros-que-voce-deve-ler', 'publicado');

-- Inserir comentário
INSERT INTO blog_comments (post_id, user_id, comentario) 
VALUES 
(1, 1, 'Ótimo post! Recomendo todos esses livros.');

-- Selecionar posts com comentários
SELECT p.*, 
       u.nome as autor_nome,
       COUNT(DISTINCT c.id) as total_comentarios
FROM blog_posts p
JOIN users u ON p.autor_id = u.id
LEFT JOIN blog_comments c ON p.id = c.post_id
WHERE p.status = 'publicado'
GROUP BY p.id
ORDER BY p.created_at DESC;

-- Selecionar comentários por post
SELECT c.*, 
       u.nome as usuario_nome
FROM blog_comments c
JOIN users u ON c.user_id = u.id
WHERE c.post_id = 1
ORDER BY c.created_at DESC;

-- Atualizar status do post
UPDATE blog_posts 
SET status = 'rascunho'
WHERE id = 1;
