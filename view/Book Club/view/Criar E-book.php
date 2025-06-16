<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ebook Creator Pro</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #6C5CE7;
      --primary-dark: #5649C0;
      --secondary: #00B894;
      --accent: #FD79A8;
      --dark: #2D3436;
      --light: #F5F6FA;
      --gray: #636E72;
      --light-gray: #DFE6E9;
      --success: #00B894;
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
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
      background-color: var(--light);
      color: var(--dark);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      line-height: 1.6;
    }

    .container {
      width: 100%;
      max-width: 1200px;
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
      background: linear-gradient(90deg, var(--primary), var(--accent));
    }

    .header {
      padding: 30px 40px;
      text-align: center;
      position: relative;
      background: linear-gradient(135deg, rgba(108, 92, 231, 0.05) 0%, rgba(253, 121, 168, 0.05) 100%);
      border-bottom: 1px solid var(--light-gray);
    }

    h1 {
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: var(--primary);
      display: inline-flex;
      align-items: center;
      gap: 15px;
    }

    h1 .icon {
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    .subtitle {
      color: var(--gray);
      font-size: 1.1rem;
      max-width: 600px;
      margin: 0 auto 15px;
    }

    .tabs {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      gap: 10px;
    }

    .tab {
      padding: 8px 20px;
      border-radius: 50px;
      background: white;
      border: 1px solid var(--light-gray);
      color: var(--gray);
      font-weight: 500;
      cursor: pointer;
      transition: var(--transition);
    }

    .tab.active {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
    }

    .tab:hover:not(.active) {
      background: var(--light);
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

    .form-group {
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: 600;
      color: var(--dark);
      font-size: 0.95rem;
    }

    .input-wrapper {
      position: relative;
    }

    input[type="text"],
    textarea,
    select {
      width: 100%;
      padding: 14px 18px;
      border: 1px solid var(--light-gray);
      border-radius: var(--border-radius-sm);
      font-size: 0.95rem;
      transition: var(--transition);
      background: white;
      font-family: 'Inter', sans-serif;
    }

    input[type="text"]:focus,
    textarea:focus,
    select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.2);
    }

    textarea {
      min-height: 200px;
      resize: vertical;
      line-height: 1.7;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 14px 28px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      border: none;
      border-radius: var(--border-radius-sm);
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
      width: 100%;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(108, 92, 231, 0.4);
      background: linear-gradient(135deg, var(--primary-dark), var(--primary));
    }

    .btn-secondary {
      background: white;
      color: var(--primary);
      border: 1px solid var(--primary);
      box-shadow: none;
    }

    .btn-secondary:hover {
      background: var(--light);
      box-shadow: none;
    }

    .btn i {
      font-size: 0.9rem;
    }

    .preview-section {
      grid-column: span 2;
      background: white;
      border-radius: var(--border-radius);
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
      border: 1px solid var(--light-gray);
    }

    @media (max-width: 992px) {
      .preview-section {
        grid-column: span 1;
      }
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

    .preview-actions {
      display: flex;
      gap: 15px;
    }

    .download-btn {
      background: var(--success);
      padding: 10px 20px;
      font-size: 0.9rem;
      width: auto;
    }

    .export-btn {
      background: var(--accent);
      padding: 10px 20px;
      font-size: 0.9rem;
      width: auto;
    }

    .ebook-preview {
      background: white;
      border-radius: var(--border-radius-sm);
      padding: 40px;
      min-height: 400px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
      overflow: hidden;
      border: 1px dashed var(--light-gray);
    }

    .ebook-cover {
      width: 100%;
      max-width: 300px;
      max-height: 400px;
      object-fit: cover;
      border-radius: var(--border-radius-sm);
      margin-bottom: 30px;
      display: none;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid var(--light-gray);
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
      margin-bottom: 30px;
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

    .ebook-content p {
      margin-bottom: 20px;
    }

    .empty-state {
      display: flex;
      flex-direction: column;
      align-items: center;
      color: var(--gray);
      padding: 40px;
    }

    .empty-state i {
      font-size: 3rem;
      margin-bottom: 20px;
      color: var(--light-gray);
      opacity: 0.7;
    }

    .empty-state p {
      max-width: 350px;
      font-size: 1.1rem;
      line-height: 1.6;
    }

    footer {
      text-align: center;
      padding: 25px 40px;
      border-top: 1px solid var(--light-gray);
      color: var(--gray);
      font-size: 0.9rem;
      background: linear-gradient(135deg, rgba(108, 92, 231, 0.03) 0%, rgba(253, 121, 168, 0.03) 100%);
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

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .form-section {
      animation: fadeIn 0.5s ease-out forwards;
    }

    .form-section:nth-child(2) {
      animation-delay: 0.1s;
    }

    .preview-section {
      animation: fadeIn 0.5s ease-out 0.2s forwards;
      opacity: 0;
    }

    /* Tooltip */
    .tooltip {
      position: relative;
      display: inline-block;
      margin-left: 5px;
    }

    .tooltip i {
      color: var(--accent);
      font-size: 0.9rem;
      cursor: help;
    }

    .tooltip-text {
      visibility: hidden;
      width: 220px;
      background-color: var(--dark);
      color: #fff;
      text-align: center;
      border-radius: var(--border-radius-sm);
      padding: 10px;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      transform: translateX(-50%);
      opacity: 0;
      transition: opacity 0.3s;
      font-size: 0.85rem;
      font-weight: normal;
      line-height: 1.5;
    }

    .tooltip:hover .tooltip-text {
      visibility: visible;
      opacity: 1;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .header {
        padding: 25px 20px;
      }
      
      h1 {
        font-size: 2.2rem;
      }
      
      .form-container {
        padding: 25px;
        gap: 20px;
      }
      
      .form-section {
        padding: 25px;
      }
      
      .preview-section {
        padding: 25px;
      }

      .preview-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }

      .preview-actions {
        width: 100%;
        flex-direction: column;
        gap: 10px;
      }

      .download-btn, .export-btn {
        width: 100%;
      }
    }

    @media (max-width: 576px) {
      h1 {
        font-size: 1.8rem;
      }
      
      .form-container {
        padding: 20px;
      }
      
      .form-section {
        padding: 20px;
      }
      
      .preview-section {
        padding: 20px;
      }

      .ebook-preview {
        padding: 25px;
      }
    }

    /* Advanced features */
    .word-count {
      position: absolute;
      right: 15px;
      bottom: 15px;
      font-size: 0.8rem;
      color: var(--gray);
      background: rgba(255, 255, 255, 0.9);
      padding: 2px 8px;
      border-radius: 10px;
    }

    .character-count {
      position: absolute;
      right: 15px;
      bottom: 35px;
      font-size: 0.8rem;
      color: var(--gray);
      background: rgba(255, 255, 255, 0.9);
      padding: 2px 8px;
      border-radius: 10px;
    }

    .progress-bar {
      height: 6px;
      background: var(--light-gray);
      border-radius: 3px;
      margin-top: 10px;
      overflow: hidden;
    }

    .progress {
      height: 100%;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      width: 0%;
      transition: width 0.5s ease;
    }

    .category-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 10px;
    }

    .category-tag {
      padding: 6px 12px;
      background: var(--light);
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--gray);
      cursor: pointer;
      transition: var(--transition);
      border: 1px solid var(--light-gray);
    }

    .category-tag:hover {
      background: var(--light-gray);
    }

    .category-tag.active {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1><i class="fas fa-book-open icon"></i> Ebook Creator Pro</h1>
      <p class="subtitle">Crie ebooks profissionais com design atraente e exporte em múltiplos formatos</p>
      
      <div class="tabs">
        <div class="tab active">Criação</div>
        <div class="tab">Modelos</div>
        <div class="tab">Configurações</div>
      </div>
    </div>

    <div class="form-container">
      <div class="form-section">
        <h2><i class="fas fa-info-circle"></i> Informações do Ebook</h2>
        <form id="ebookForm">
          <div class="form-group">
            <label for="title">Título do Ebook <span class="tooltip"><i class="fas fa-question-circle"></i><span class="tooltip-text">Use um título claro e atraente que resuma o conteúdo</span></span></label>
            <input type="text" id="title" placeholder="Ex: Guia Avançado de Marketing Digital 2023" required>
            <div class="progress-bar">
              <div class="progress" id="titleProgress"></div>
            </div>
          </div>

          <div class="form-group">
            <label for="author">Autor/Editora</label>
            <input type="text" id="author" placeholder="Seu nome ou nome da empresa">
          </div>

          <div class="form-group">
            <label for="description">Descrição Curta</label>
            <textarea id="description" placeholder="Uma breve descrição do conteúdo do ebook (aparecerá na contracapa)"></textarea>
            <div class="word-count" id="descriptionWordCount">0 palavras</div>
          </div>

          <div class="form-group">
            <label>Categorias</label>
            <div class="category-tags">
              <div class="category-tag active">Negócios</div>
              <div class="category-tag">Marketing</div>
              <div class="category-tag">Tecnologia</div>
              <div class="category-tag">Educação</div>
              <div class="category-tag">Saúde</div>
              <div class="category-tag">Ficção</div>
            </div>
          </div>
        </form>
      </div>

      <div class="form-section">
        <h2><i class="fas fa-edit"></i> Conteúdo</h2>
        <div class="form-group">
          <label for="image">URL da Capa <span class="tooltip"><i class="fas fa-question-circle"></i><span class="tooltip-text">Insira uma URL de imagem ou escolha um de nossos modelos</span></span></label>
          <input type="text" id="image" placeholder="https://exemplo.com/imagem.jpg">
          <button class="btn btn-secondary" style="margin-top: 10px;"><i class="fas fa-images"></i> Escolher Modelo</button>
        </div>

        <div class="form-group">
          <label for="content">Conteúdo do Ebook <span class="tooltip"><i class="fas fa-question-circle"></i><span class="tooltip-text">Formate com parágrafos e títulos para melhor visualização</span></span></label>
          <div class="input-wrapper">
            <textarea id="content" placeholder="Escreva o conteúdo do seu ebook aqui..."></textarea>
            <div class="word-count" id="contentWordCount">0 palavras</div>
            <div class="character-count" id="contentCharCount">0 caracteres</div>
          </div>
        </div>

        <button type="submit" form="ebookForm" class="btn"><i class="fas fa-sync-alt"></i> Atualizar Prévia</button>
      </div>

      <div class="preview-section">
        <div class="preview-header">
          <h2><i class="fas fa-eye"></i> Visualização</h2>
          <div class="preview-actions">
            <button class="btn download-btn"><i class="fas fa-file-pdf"></i> Exportar PDF</button>
            <button class="btn export-btn"><i class="fas fa-file-word"></i> Exportar DOCX</button>
          </div>
        </div>
        
        <div class="ebook-preview" id="preview">
          <div class="empty-state" id="emptyState">
            <i class="fas fa-book"></i>
            <p>Preencha os campos ao lado para visualizar seu ebook. Comece adicionando um título e conteúdo.</p>
          </div>
          
          <img id="previewImage" class="ebook-cover" src="" alt="Capa do Ebook">
          <h2 id="previewTitle" class="ebook-title"></h2>
          <p id="previewAuthor" class="ebook-author"></p>
          <div id="previewDescription" class="ebook-content" style="text-align: center; font-style: italic; margin-bottom: 30px;"></div>
          <div id="previewContent" class="ebook-content"></div>
        </div>
      </div>
    </div>

    <footer>
      <p>© 2023 Ebook Creator Pro | <a href="#"><i class="fas fa-life-ring"></i> Ajuda</a> | <a href="#"><i class="fas fa-envelope"></i> Contato</a> | <a href="#"><i class="fas fa-shield-alt"></i> Privacidade</a></p>
    </footer>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const ebookForm = document.getElementById('ebookForm');
      const previewTitle = document.getElementById('previewTitle');
      const previewImage = document.getElementById('previewImage');
      const previewContent = document.getElementById('previewContent');
      const previewAuthor = document.getElementById('previewAuthor');
      const previewDescription = document.getElementById('previewDescription');
      const emptyState = document.getElementById('emptyState');
      const downloadBtn = document.querySelector('.download-btn');
      const exportBtn = document.querySelector('.export-btn');
      const contentTextarea = document.getElementById('content');
      const descriptionTextarea = document.getElementById('description');
      const titleInput = document.getElementById('title');
      const titleProgress = document.getElementById('titleProgress');
      const contentWordCount = document.getElementById('contentWordCount');
      const contentCharCount = document.getElementById('contentCharCount');
      const descriptionWordCount = document.getElementById('descriptionWordCount');
      const tabs = document.querySelectorAll('.tab');
      const categoryTags = document.querySelectorAll('.category-tag');

      // Contador de palavras e caracteres
      function updateCounters() {
        const content = contentTextarea.value;
        const words = content.trim() ? content.trim().split(/\s+/).length : 0;
        const chars = content.length;
        
        contentWordCount.textContent = `${words} ${words === 1 ? 'palavra' : 'palavras'}`;
        contentCharCount.textContent = `${chars} ${chars === 1 ? 'caractere' : 'caracteres'}`;

        const desc = descriptionTextarea.value;
        const descWords = desc.trim() ? desc.trim().split(/\s+/).length : 0;
        descriptionWordCount.textContent = `${descWords} ${descWords === 1 ? 'palavra' : 'palavras'}`;
      }

      // Barra de progresso do título
      function updateTitleProgress() {
        const length = titleInput.value.length;
        const percentage = Math.min(100, (length / 60) * 100);
        titleProgress.style.width = `${percentage}%`;
        
        if (percentage > 90) {
          titleProgress.style.background = 'var(--error)';
        } else if (percentage > 70) {
          titleProgress.style.background = 'var(--warning)';
        } else {
          titleProgress.style.background = 'linear-gradient(90deg, var(--primary), var(--accent))';
        }
      }

      // Atualizar visualização
      function updatePreview() {
        const title = document.getElementById('title').value;
        const author = document.getElementById('author').value;
        const description = document.getElementById('description').value;
        const imageUrl = document.getElementById('image').value;
        const content = document.getElementById('content').value;

        if (title || content || imageUrl || description) {
          emptyState.style.display = 'none';
          
          if (title) {
            previewTitle.textContent = title;
            previewTitle.style.display = 'block';
          } else {
            previewTitle.style.display = 'none';
          }
          
          if (author) {
            previewAuthor.textContent = `Por ${author}`;
            previewAuthor.style.display = 'block';
          } else {
            previewAuthor.style.display = 'none';
          }
          
          if (description) {
            previewDescription.textContent = `"${description}"`;
            previewDescription.style.display = 'block';
          } else {
            previewDescription.style.display = 'none';
          }
          
          if (imageUrl) {
            previewImage.src = imageUrl;
            previewImage.style.display = 'block';
          } else {
            previewImage.style.display = 'none';
          }
          
          if (content) {
            // Formatação básica do conteúdo
            const formattedContent = content
              .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>') // Negrito
              .replace(/\*(.*?)\*/g, '<em>$1</em>') // Itálico
              .replace(/\n\n/g, '</p><p>') // Parágrafos
              .replace(/\n/g, '<br>'); // Quebras de linha
            
            previewContent.innerHTML = `<p>${formattedContent}</p>`;
            previewContent.style.display = 'block';
          } else {
            previewContent.style.display = 'none';
          }
        } else {
          emptyState.style.display = 'flex';
          previewTitle.style.display = 'none';
          previewImage.style.display = 'none';
          previewContent.style.display = 'none';
          previewAuthor.style.display = 'none';
          previewDescription.style.display = 'none';
        }
      }

      // Event listeners
      ebookForm.addEventListener('submit', (e) => {
        e.preventDefault();
        updatePreview();
      });

      contentTextarea.addEventListener('input', updateCounters);
      descriptionTextarea.addEventListener('input', updateCounters);
      titleInput.addEventListener('input', updateTitleProgress);

      // Simular download/export
      downloadBtn.addEventListener('click', () => {
        if (emptyState.style.display !== 'flex') {
          alert('Funcionalidade de exportação para PDF seria implementada com uma biblioteca como jsPDF ou html2pdf.');
        } else {
          alert('Por favor, preencha o formulário para criar um ebook antes de exportar.');
        }
      });

      exportBtn.addEventListener('click', () => {
        if (emptyState.style.display !== 'flex') {
          alert('Funcionalidade de exportação para Word seria implementada com uma biblioteca como docx.js.');
        } else {
          alert('Por favor, preencha o formulário para criar um ebook antes de exportar.');
        }
      });

      // Tabs
      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
          tabs.forEach(t => t.classList.remove('active'));
          tab.classList.add('active');
          // Aqui você implementaria a mudança de seções
          alert('Navegação entre abas seria implementada para mostrar diferentes seções do criador.');
        });
      });

      // Categorias
      categoryTags.forEach(tag => {
        tag.addEventListener('click', () => {
          tag.classList.toggle('active');
        });
      });

      // Inicializações
      updateCounters();
      updateTitleProgress();
    });
  </script>
</body>
</html>