-- Inserir contato
INSERT INTO contacts (nome, email, telefone, assunto, mensagem) 
VALUES 
('João Silva', 'joao@example.com', '(11) 99999-9999', 'Dúvida sobre pedido', 'Quando meu pedido será entregue?');

-- Selecionar contatos não respondidos
SELECT *
FROM contacts
WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 DAY)
ORDER BY created_at DESC;

-- Selecionar estatísticas de contatos
SELECT 
    COUNT(*) as total_contatos,
    COUNT(DISTINCT DATE(created_at)) as dias_com_contatos,
    AVG(TIMESTAMPDIFF(MINUTE, created_at, NOW())) as media_resposta
FROM contacts;

-- Deletar contato respondido
DELETE FROM contacts WHERE id = 1;
