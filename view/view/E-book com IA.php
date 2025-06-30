<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar E-book com IA | Book Club</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css "/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins :wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --primary: #4361ee;
      --primary-dark: #3a0ca3;
      --secondary: #f68afa;
      --accent: #FD79A8;
      --dark: #212529;
      --light: #f8f9fa;
      --gray: #636E72;
      --light-gray: #DFE6E9;
      --success: #4cc9f0;
      --error: #D63031;
      --warning: #FDCB6E;
      --border-radius: 16px;
      --border-radius-sm: 8px;
      --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      --transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--light);
      color: var(--dark);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 1100px;
      background: white;
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      overflow: hidden;
      position: relative;
    }

    .container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
    }

    .header {
      padding: 30px 40px;
      text-align: center;
      background: linear-gradient(135deg, rgba(67, 97, 238, 0.05) 0%, rgba(25, 0, 255, 0.05) 100%);
      border-bottom: 1px solid var(--light-gray);
    }

    h1 {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: var(--primary);
      display: inline-flex;
      align-items: center;
      gap: 15px;
    }

    h1 .icon {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    .subtitle {
      color: var(--gray);
      font-size: 1.1rem;
      max-width: 600px;
      margin: 0 auto;
    }

    .form-container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 30px;
      padding: 40px;
    }

    @media (max-width: 992px) {
      .form-container {
        grid-template-columns: 1fr;
      }
    }

    .form-section {
      background: white;
      padding: 30px;
      border-radius: var(--border-radius);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
      border: 1px solid var(--light-gray);
      transition: var(--transition);
    }

    .form-section:hover {
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }

    .form-section h2 {
      font-size: 1.4rem;
      margin-bottom: 25px;
      color: var(--primary-dark);
      display: flex;
      align-items: center;
      gap: 12px;
      padding-bottom: 10px;
      border-bottom: 2px solid var(--light-gray);
    }

    .form-section h2 i {
      color: var(--accent);
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: 600;
      color: var(--dark);
      font-size: 0.95rem;
    }

    textarea,
    input[type="text"] {
      width: 100%;
      padding: 14px 18px;
      border: 1px solid var(--light-gray);
      border-radius: var(--border-radius-sm);
      font-size: 0.95rem;
      transition: var(--transition);
      background: white;
      resize: vertical;
      min-height: 120px;
      font-family: inherit;
    }

    textarea:focus,
    input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 14px 28px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      color: white;
      border: none;
      border-radius: var(--border-radius-sm);
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
      width: 100%;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
      background: linear-gradient(90deg, var(--secondary), var(--primary));
    }

    .preview-section {
      grid-column: span 2;
      background: white;
      border-radius: var(--border-radius);
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
      border: 1px solid var(--light-gray);
    }

    .preview-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 2px solid var(--light-gray);
    }

    .preview-header h2 {
      color: var(--primary-dark);
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .ebook-preview {
      background: white;
      border-radius: var(--border-radius-sm);
      padding: 40px;
      min-height: 400px;
      border: 1px dashed var(--light-gray);
      position: relative;
    }

    .ebook-title {
      font-size: 2rem;
      color: var(--dark);
      margin-bottom: 10px;
      font-weight: 700;
      line-height: 1.3;
    }

    .ebook-author {
      color: var(--gray);
      margin-bottom: 20px;
      font-size: 1.1rem;
      font-weight: 500;
    }

    .ebook-content {
      text-align: left;
      width: 100%;
      color: var(--dark);
      white-space: pre-wrap;
      line-height: 1.8;
    }

    .empty-state {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: var(--gray);
      height: 300px;
    }

    .empty-state i {
      font-size: 3rem;
      margin-bottom: 20px;
      color: var(--light-gray);
      opacity: 0.7;
    }

    footer {
      text-align: center;
      padding: 25px 40px;
      border-top: 1px solid var(--light-gray);
      color: var(--gray);
      font-size: 0.9rem;
      background: linear-gradient(135deg, rgba(67, 97, 238, 0.03) 0%, rgba(25, 0, 255, 0.03) 100%);
    }

    footer a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 600;
      transition: var(--transition);
    }

    footer a:hover {
      color: var(--accent);
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .form-section,
    .preview-section {
      animation: fadeIn 0.5s ease-out forwards;
    }

    .form-section:nth-child(2) {
      animation-delay: 0.1s;
    }

    .preview-section {
      animation-delay: 0.2s;
    }

    .loading {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      font-weight: 500;
      color: var(--gray);
    }

    .loading i {
      animation: spin 1.5s infinite linear;
    }

    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1><i class="fas fa-brain icon"></i> Criar E-book com IA</h1>
      <p class="subtitle">Descreva seu tema e deixe a inteligência artificial gerar um conteúdo completo para você.</p>
    </div>

    <div class="form-container">
      <div class="form-section">
        <h2><i class="fas fa-edit"></i> Prompt do E-book</h2>
        <label for="prompt">Descreva o que você quer que a IA gere:</label>
        <textarea id="prompt" placeholder="Ex: Um guia sobre técnicas de estudo para vestibulares com dicas práticas e estratégias de memorização..."></textarea>
        <button id="generateBtn" class="btn"><i class="fas fa-sparkles"></i> Gerar E-book</button>
      </div>

      <div class="form-section">
        <h2><i class="fas fa-cog"></i> Configurações</h2>
        <label for="title">Título do E-book (opcional)</label>
        <input type="text" id="title" placeholder="Guia Prático de Estudos">

        <label for="author">Autor (opcional)</label>
        <input type="text" id="author" placeholder="Book Club AI">

        <label for="language">Idioma</label>
        <select id="language">
          <option value="pt">Português</option>
          <option value="en">Inglês</option>
        </select>
      </div>

      <div class="preview-section">
        <div class="preview-header">
          <h2><i class="fas fa-eye"></i> Prévia do E-book</h2>
        </div>
        <div class="ebook-preview" id="ebookPreview">
          <div class="empty-state">
            <i class="fas fa-book-open"></i>
            <p>Aguardando sua descrição para gerar o conteúdo...</p>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <p>© 2023 Book Club | Todos os direitos reservados</p>
    </footer>
  </div>

  <script>
    const generateBtn = document.getElementById('generateBtn');
    const promptInput = document.getElementById('prompt');
    const titleInput = document.getElementById('title');
    const authorInput = document.getElementById('author');
    const ebookPreview = document.getElementById('ebookPreview');

    generateBtn.addEventListener('click', () => {
      const prompt = promptInput.value.trim();
      if (!prompt) {
        alert("Por favor, descreva o tema do e-book.");
        return;
      }

      ebookPreview.innerHTML = `
        <div class="empty-state">
          <i class="fas fa-spinner loading"><i class="fas fa-sync-alt"></i></i>
          <p class="loading">Gerando e-book com IA, aguarde...</p>
        </div>
      `;

      // Simulação da geração via IA
      setTimeout(() => {
        const fakeEbook = `
          <div class="ebook-title">${titleInput.value || "Guia Automatizado"}</div>
          <div class="ebook-author">Por ${authorInput.value || "IA Book Club"}</div>
          <div class="ebook-content">
            <p><strong>Introdução:</strong> Este e-book foi gerado automaticamente com base na descrição "${prompt}".</p>
            <p>Conteúdo fictício inclui: técnicas avançadas, dicas práticas, exemplos ilustrativos e conclusão útil.</p>
            <p>Este é um modelo simulado. Na versão real, integraria-se com uma API de IA para gerar conteúdo realista.</p>
          </div>
        `;
        ebookPreview.innerHTML = fakeEbook;
      }, 2000);
    });
  </script>
</body>
</html>