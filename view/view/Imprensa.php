<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Imprensa | Book Club</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #6C5CE7;
      --primary-dark: #4B44B2;
      --secondary: #00CEFF;
      --text: #2D3436;
      --text-light: #636E72;
      --white: #FFFFFF;
      --bg: #F9F9FF;
      --shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      color: var(--text);
      background-color: var(--bg);
      line-height: 1.7;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 0 20px;
    }

    header {
      text-align: center;
      padding: 80px 0 40px;
      position: relative;
    }

    header::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 4px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      border-radius: 2px;
    }

    h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--primary-dark);
      margin-bottom: 15px;
      line-height: 1.2;
    }

    .subtitle {
      font-size: 1.1rem;
      color: var(--text-light);
      max-width: 700px;
      margin: 0 auto;
    }

    .press-content {
      display: grid;
      grid-template-columns: 1fr;
      gap: 30px;
      padding: 40px 0 60px;
    }

    .press-section {
      background: var(--white);
      border-radius: 16px;
      padding: 30px;
      box-shadow: var(--shadow);
      transition: var(--transition);
      border-left: 5px solid var(--primary);
    }

    .press-section:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      font-weight: 600;
      color: var(--primary-dark);
      margin-bottom: 20px;
      position: relative;
      display: flex;
      align-items: center;
    }

    h2::before {
      content: '';
      display: inline-block;
      width: 10px;
      height: 10px;
      background: var(--secondary);
      border-radius: 50%;
      margin-right: 15px;
    }

    p {
      color: var(--text-light);
      margin-bottom: 15px;
      font-size: 1rem;
    }

    .press-form {
      margin-top: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--text-light);
    }

    input, textarea {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-family: 'Poppins', sans-serif;
      transition: var(--transition);
    }

    input:focus, textarea:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.2);
    }

    button {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      border: none;
      padding: 14px 30px;
      border-radius: 50px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
      width: 100%;
    }

    button:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(108, 92, 231, 0.4);
    }

    .press-releases {
      margin-top: 20px;
    }

    .release-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 0;
      border-bottom: 1px solid #eee;
    }

    .release-item:last-child {
      border-bottom: none;
    }

    .release-title {
      font-weight: 500;
      color: var(--primary-dark);
    }

    .download-btn {
      padding: 8px 20px;
      background: var(--white);
      color: var(--primary-dark);
      border: 1px solid var(--primary);
      border-radius: 50px;
      font-size: 0.9rem;
      text-decoration: none;
      transition: var(--transition);
    }

    .download-btn:hover {
      background: var(--primary);
      color: white;
    }

    .contact-info {
      margin-top: 20px;
    }

    .contact-item {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .contact-icon {
      margin-right: 15px;
      color: var(--primary);
      font-size: 1.2rem;
    }

    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-link {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: var(--primary);
      color: white;
      border-radius: 50%;
      transition: var(--transition);
    }

    .social-link:hover {
      transform: translateY(-3px);
      background: var(--primary-dark);
    }

    footer {
      text-align: center;
      padding: 40px 0;
      margin-top: 40px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--white);
      border-radius: 16px;
    }

    footer p {
      color: var(--white);
      margin-bottom: 0;
    }

    .contact-link {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 30px;
      background: var(--white);
      color: var(--primary-dark);
      text-decoration: none;
      border-radius: 50px;
      font-weight: 600;
      transition: var(--transition);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .contact-link:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    /* Animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .press-section {
      animation: fadeIn 0.6s ease-out forwards;
      opacity: 0;
    }

    .press-section:nth-child(1) { animation-delay: 0.1s; }
    .press-section:nth-child(2) { animation-delay: 0.2s; }
    .press-section:nth-child(3) { animation-delay: 0.3s; }

    /* Responsive */
    @media (max-width: 768px) {
      h1 {
        font-size: 2rem;
      }
      
      h2 {
        font-size: 1.4rem;
      }
      
      .press-section {
        padding: 25px;
      }
      
      .press-content {
        gap: 25px;
        padding: 30px 0;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.8rem;
      }
      
      .subtitle {
        font-size: 1rem;
      }
      
      .press-section {
        padding: 20px 15px;
      }
      
      .contact-link {
        padding: 10px 25px;
      }
      
      h2::before {
        width: 8px;
        height: 8px;
        margin-right: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Imprensa</h1>
      <p class="subtitle">Materiais e informações para jornalistas e parceiros de mídia</p>
    </header>

    <div class="press-content">
      <section class="press-section">
        <h2>Solicite Materiais</h2>
        <p>Preencha o formulário abaixo para receber nosso kit de imprensa completo:</p>
        
        <form id="pressForm" class="press-form">
          <div class="form-group">
            <label for="name">Nome Completo</label>
            <input type="text" id="name" name="name" placeholder="Seu nome completo" required>
          </div>
          
          <div class="form-group">
            <label for="email">E-mail Profissional</label>
            <input type="email" id="email" name="email" placeholder="seu@email.com" required>
          </div>
          
          <div class="form-group">
            <label for="organization">Veículo de Comunicação</label>
            <input type="text" id="organization" name="organization" placeholder="Nome da organização" required>
          </div>
          
          <button type="submit">Enviar Solicitação</button>
        </form>
      </section>

      <section class="press-section">
        <h2>Press Releases</h2>
        <p>Baixe nossos comunicados oficiais em formato PDF:</p>
        
        <div class="press-releases">
          <div class="release-item">
            <span class="release-title">Lançamento do Book Club - 2025</span>
            <a href="#" class="download-btn">Download</a>
          </div>
          <div class="release-item">
            <span class="release-title">Eventos Literários - Temporada 2025</span>
            <a href="#" class="download-btn">Download</a>
          </div>
          <div class="release-item">
            <span class="release-title">Parcerias com Livrarias</span>
            <a href="#" class="download-btn">Download</a>
          </div>
          <div class="release-item">
            <span class="release-title">Programa de Afiliados</span>
            <a href="#" class="download-btn">Download</a>
          </div>
        </div>
      </section>

      <section class="press-section">
        <h2>Contato</h2>
        <p>Entre em contato com nossa equipe de relações com a imprensa:</p>
        
        <div class="contact-info">
          <div class="contact-item">
            <span class="contact-icon">✉️</span>
            <span>imprensa@bookclub.com</span>
          </div>
          <div class="contact-item">
            <span class="contact-icon">📞</span>
            <span>+55 (11) 98765-4321</span>
          </div>
          <div class="contact-item">
            <span class="contact-icon">🕒</span>
            <span>Segunda a Sexta, das 9h às 18h</span>
          </div>
        </div>
        
        <p style="margin-top: 25px;">Siga-nos nas redes sociais:</p>
        <div class="social-links">
          <a href="https://instagram.com/bookclub" class="social-link" target="_blank">📷</a>
          <a href="https://twitter.com/bookclub" class="social-link" target="_blank">🐦</a>
          <a href="https://facebook.com/bookclub" class="social-link" target="_blank">👍</a>
          <a href="https://linkedin.com/company/bookclub" class="social-link" target="_blank">💼</a>
        </div>
      </section>
    </div>

    <footer>
      <p>Precisa de outras informações?</p>
      <a href="mailto:contato@bookclub.com" class="contact-link">Fale conosco</a>
    </footer>
  </div>

  <script>
    const pressForm = document.getElementById('pressForm');

    pressForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      // Simulação de envio do formulário
      alert('Sua solicitação foi enviada com sucesso! Enviaremos os materiais para o e-mail fornecido em breve.');
      
      // Limpa o formulário
      pressForm.reset();
    });
  </script>
</body>
</html>