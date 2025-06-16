<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vender Livro Usado | Book Club</title>
  <link rel="stylesheet" href="<?php echo generateLink('font-awesome'); ?>">
  <link href="<?php echo generateLink('google-fonts'); ?>" rel="stylesheet">
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
    input[type="number"],
    input[type="email"],
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
    input[type="number"]:focus,
    input[type="email"]:focus,
    textarea:focus,
    select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.2);
    }

    textarea {
      min-height: 120px;
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

    .publish-btn {
      background: var(--success);
      padding: 10px 20px;
      font-size: 0.9rem;
      width: auto;
    }

    .save-btn {
      background: var(--accent);
      padding: 10px 20px;
      font-size: 0.9rem;
      width: auto;
    }

    .book-preview {
      display: flex;
      gap: 30px;
      align-items: flex-start;
    }

    @media (max-width: 768px) {
      .book-preview {
        flex-direction: column;
      }
    }

    .book-cover {
      width: 100%;
      max-width: 250px;
      border-radius: var(--border-radius-sm);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid var(--light-gray);
      aspect-ratio: 2/3;
      object-fit: cover;
      background: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gray);
      font-size: 0.9rem;
      text-align: center;
      padding: 20px;
    }

    .book-details {
      flex: 1;
    }

    .book-title {
      font-size: 1.8rem;
      color: var(--dark);
      margin-bottom: 10px;
      font-weight: 700;
      line-height: 1.3;
    }

    .book-author {
      color: var(--gray);
      margin-bottom: 15px;
      font-size: 1.1rem;
      font-weight: 500;
    }

    .book-price {
      font-size: 1.5rem;
      color: var(--primary);
      font-weight: 700;
      margin: 20px 0;
    }

    .book-condition {
      display: inline-block;
      padding: 6px 12px;
      background: var(--light);
      border-radius: 50px;
      font-size: 0.9rem;
      font-weight: 500;
      color: var(--gray);
      margin-bottom: 15px;
      border: 1px solid var(--light-gray);
    }

    .book-description {
      color: var(--dark);
      line-height: 1.8;
      margin-bottom: 20px;
    }

    .book-seller {
      margin-top: 25px;
      padding-top: 15px;
      border-top: 1px solid var(--light-gray);
    }

    .seller-name {
      font-weight: 600;
      margin-bottom: 5px;
    }

    .seller-contact {
      color: var(--gray);
      font-size: 0.9rem;
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

    /* Condition rating */
    .condition-rating {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .condition-option {
      flex: 1;
      text-align: center;
      padding: 10px;
      border: 1px solid var(--light-gray);
      border-radius: var(--border-radius-sm);
      cursor: pointer;
      transition: var(--transition);
    }

    .condition-option:hover {
      background: var(--light);
    }

    .condition-option.active {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
    }

    .condition-option i {
      display: block;
      font-size: 1.5rem;
      margin-bottom: 5px;
    }

    /* File upload */
    .file-upload {
      position: relative;
      margin-bottom: 20px;
    }

    .file-upload input {
      position: absolute;
      left: 0;
      top: 0;
      opacity: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    .file-upload-label {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 30px;
      border: 2px dashed var(--light-gray);
      border-radius: var(--border-radius-sm);
      background: var(--light);
      transition: var(--transition);
      text-align: center;
    }

    .file-upload-label:hover {
      border-color: var(--primary);
      background: rgba(108, 92, 231, 0.05);
    }

    .file-upload-label i {
      font-size: 2rem;
      color: var(--primary);
      margin-bottom: 15px;
    }

    .file-upload-label p {
      color: var(--gray);
      margin-bottom: 5px;
    }

    .file-upload-label small {
      color: var(--gray);
      font-size: 0.8rem;
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

      .publish-btn, .save-btn {
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

      .empty-state {
        padding: 25px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1><i class="fas fa-book icon"></i> Vender Livro Usado</h1>
      <p class="subtitle">Anuncie seu livro usado na nossa comunidade de leitores e encontre o próximo dono perfeito</p>
      
      <div class="tabs">
        <div class="tab active">Informações do Livro</div>
        <div class="tab">Detalhes da Venda</div>
        <div class="tab">Contato</div>
      </div>
    </div>

    <div class="form-container">
      <div class="form-section">
        <h2><i class="fas fa-info-circle"></i> Sobre o Livro</h2>
        <form id="bookForm">
          <div class="form-group">
            <label for="title">Título do Livro <span class="tooltip"><i class="fas fa-question-circle"></i><span class="tooltip-text">Digite o título exato como consta na capa</span></span></label>
            <input type="text" id="title" placeholder="Ex: O Pequeno Príncipe" required>
          </div>

          <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" id="author" placeholder="Ex: Antoine de Saint-Exupéry">
          </div>

          <div class="form-group">
            <label for="isbn">ISBN (opcional)</label>
            <input type="text" id="isbn" placeholder="Ex: 978-8595081512">
          </div>

          <div class="form-group">
            <label for="year">Ano de Publicação</label>
            <input type="number" id="year" placeholder="Ex: 1943" min="1900" max="2023">
          </div>

          <div class="form-group">
            <label for="publisher">Editora</label>
            <input type="text" id="publisher" placeholder="Ex: Agir">
          </div>
        </form>
      </div>

      <div class="form-section">
        <h2><i class="fas fa-camera"></i> Fotos & Condição</h2>
        <div class="form-group">
          <label>Fotos do Livro <span class="tooltip"><i class="fas fa-question-circle"></i><span class="tooltip-text">Inclua fotos da capa, contracapa e páginas internas</span></span></label>
          <div class="file-upload">
            <input type="file" id="images" accept="image/*" multiple>
            <label for="images" class="file-upload-label">
              <i class="fas fa-cloud-upload-alt"></i>
              <p>Arraste e solte fotos aqui ou clique para selecionar</p>
              <small>Máximo de 5 fotos (JPEG ou PNG)</small>
            </label>
          </div>
        </div>

        <div class="form-group">
          <label>Estado de Conservação</label>
          <div class="condition-rating">
            <div class="condition-option active">
              <i class="fas fa-grin-stars"></i>
              <span>Novo</span>
            </div>
            <div class="condition-option">
              <i class="fas fa-smile"></i>
              <span>Ótimo</span>
            </div>
            <div class="condition-option">
              <i class="fas fa-meh"></i>
              <span>Bom</span>
            </div>
            <div class="condition-option">
              <i class="fas fa-frown"></i>
              <span>Usado</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="condition-details">Detalhes sobre o estado <span class="tooltip"><i class="fas fa-question-circle"></i><span class="tooltip-text">Descreva marcas de uso, páginas faltando, etc.</span></span></label>
          <textarea id="condition-details" placeholder="Ex: Capa com pequenas marcas de uso, páginas amareladas mas todas presentes, sem grifos ou anotações"></textarea>
        </div>
      </div>

      <div class="preview-section">
        <div class="preview-header">
          <h2><i class="fas fa-eye"></i> Pré-visualização do Anúncio</h2>
          <div class="preview-actions">
            <button class="btn publish-btn"><i class="fas fa-check-circle"></i> Publicar Anúncio</button>
            <button class="btn save-btn"><i class="fas fa-save"></i> Salvar Rascunho</button>
          </div>
        </div>
        
        <div class="book-preview" id="preview">
          <div class="empty-state" id="emptyState">
            <i class="fas fa-book-open"></i>
            <p>Preencha os campos ao lado para visualizar como ficará seu anúncio. Comece adicionando informações básicas sobre o livro.</p>
          </div>
          
          <div id="previewContent" style="display: none; width: 100%;">
            <div class="book-cover" id="previewCover">
              <span>Imagem não disponível</span>
            </div>
            <div class="book-details">
              <h2 id="previewTitle" class="book-title"></h2>
              <p id="previewAuthor" class="book-author"></p>
              <div class="book-price" id="previewPrice"></div>
              <span class="book-condition" id="previewCondition"></span>
              <p class="book-description" id="previewConditionDetails"></p>
              
              <div class="book-seller">
                <p class="seller-name" id="previewSellerName"></p>
                <p class="seller-contact" id="previewSellerContact"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <p>© 2025 Book Club | <a href="#"><i class="fas fa-life-ring"></i> Ajuda</a> | <a href="#"><i class="fas fa-envelope"></i> Contato</a> | <a href="#"><i class="fas fa-shield-alt"></i> Privacidade</a></p>
    </footer>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const bookForm = document.getElementById('bookForm');
      const previewTitle = document.getElementById('previewTitle');
      const previewAuthor = document.getElementById('previewAuthor');
      const previewPrice = document.getElementById('previewPrice');
      const previewCondition = document.getElementById('previewCondition');
      const previewConditionDetails = document.getElementById('previewConditionDetails');
      const previewSellerName = document.getElementById('previewSellerName');
      const previewSellerContact = document.getElementById('previewSellerContact');
      const previewCover = document.getElementById('previewCover');
      const emptyState = document.getElementById('emptyState');
      const previewContent = document.getElementById('previewContent');
      const publishBtn = document.querySelector('.publish-btn');
      const saveBtn = document.querySelector('.save-btn');
      const conditionOptions = document.querySelectorAll('.condition-option');
      const tabs = document.querySelectorAll('.tab');
      const fileUpload = document.getElementById('images');
      
      // Estado do formulário
      let formData = {
        title: '',
        author: '',
        isbn: '',
        year: '',
        publisher: '',
        condition: 'Novo',
        conditionDetails: '',
        price: '',
        sellerName: '',
        sellerEmail: '',
        sellerPhone: '',
        images: []
      };

      // Atualizar visualização
      function updatePreview() {
        const hasData = formData.title || formData.author || formData.condition || formData.conditionDetails;
        
        if (hasData) {
          emptyState.style.display = 'none';
          previewContent.style.display = 'flex';
          
          if (formData.title) {
            previewTitle.textContent = formData.title;
          } else {
            previewTitle.textContent = 'Título não informado';
          }
          
          if (formData.author) {
            previewAuthor.textContent = `Por ${formData.author}`;
          } else {
            previewAuthor.textContent = 'Autor não informado';
          }
          
          previewPrice.textContent = formData.price ? `R$ ${formData.price}` : 'Preço não definido';
          previewCondition.textContent = formData.condition;
          previewConditionDetails.textContent = formData.conditionDetails || 'Nenhum detalhe adicional fornecido sobre o estado.';
          
          if (formData.sellerName || formData.sellerEmail || formData.sellerPhone) {
            previewSellerName.textContent = formData.sellerName || 'Vendedor não identificado';
            let contact = [];
            if (formData.sellerEmail) contact.push(formData.sellerEmail);
            if (formData.sellerPhone) contact.push(formData.sellerPhone);
            previewSellerContact.textContent = contact.join(' | ') || 'Contato não informado';
          }
          
          // Simular exibição da primeira imagem
          if (formData.images.length > 0) {
            previewCover.innerHTML = '';
            const img = document.createElement('img');
            img.src = URL.createObjectURL(formData.images[0]);
            img.alt = formData.title || 'Capa do livro';
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'cover';
            img.style.borderRadius = 'var(--border-radius-sm)';
            previewCover.appendChild(img);
          } else {
            previewCover.innerHTML = '<span>Imagem não disponível</span>';
          }
        } else {
          emptyState.style.display = 'flex';
          previewContent.style.display = 'none';
        }
      }

      // Event listeners para campos básicos
      document.getElementById('title').addEventListener('input', (e) => {
        formData.title = e.target.value;
        updatePreview();
      });

      document.getElementById('author').addEventListener('input', (e) => {
        formData.author = e.target.value;
        updatePreview();
      });

      document.getElementById('condition-details').addEventListener('input', (e) => {
        formData.conditionDetails = e.target.value;
        updatePreview();
      });

      // Condição do livro
      conditionOptions.forEach(option => {
        option.addEventListener('click', () => {
          conditionOptions.forEach(opt => opt.classList.remove('active'));
          option.classList.add('active');
          formData.condition = option.querySelector('span').textContent;
          updatePreview();
        });
      });

      // Upload de imagens
      fileUpload.addEventListener('change', (e) => {
        formData.images = Array.from(e.target.files);
        updatePreview();
      });

      // Tabs
      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
          tabs.forEach(t => t.classList.remove('active'));
          tab.classList.add('active');
          // Aqui você implementaria a mudança de seções
          alert('Navegação entre abas seria implementada para mostrar diferentes seções do formulário.');
        });
      });

      // Botões
      publishBtn.addEventListener('click', () => {
        if (emptyState.style.display !== 'flex') {
          alert('Anúncio publicado com sucesso! (Funcionalidade completa incluiria validação e envio para o servidor)');
        } else {
          alert('Por favor, preencha as informações básicas sobre o livro antes de publicar.');
        }
      });

      saveBtn.addEventListener('click', () => {
        alert('Rascunho salvo com sucesso! (Funcionalidade completa incluiria armazenamento local ou no servidor)');
      });

      // Inicialização
      updatePreview();
    });
  </script>
</body>
</html>