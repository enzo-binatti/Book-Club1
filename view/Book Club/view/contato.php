<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contato | Book Club</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Variáveis CSS consistentes com o site principal */
    :root {
      primary: #4361ee;
      primary-dark: #3a0ca3;
      secondary: #4525f7;
      light: #f8f9fa;
      dark: #212529;
      white:rgb(255, 255, 255);
      success: #4cc9f0;
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      shadow-sm: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
      shadow-md: 0 4px 6px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.08);
      shadow-lg: 0 10px 20px rgba(0,0,0,0.1), 0 6px 6px rgba(0,0,0,0.1);
      shadow-xl: 0 15px 25px rgba(0,0,0,0.15), 0 5px 10px rgba(0,0,0,0.05);
    }

    /* Reset e estilos globais */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Poppins', 'Segoe UI', Roboto, sans-serif;
      background: linear-gradient(135deg, var(primary-dark), var(primary));
      color: var(light);
      overflow-x: hidden;
    }

    /* Efeito de partículas */
    #particles-js {
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 0;
    }

    /* Navbar */
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(10px);
      padding: 15px 5%;
      box-shadow: var(shadow-sm);
      z-index: 1000;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo img {
      width: 40px;
      height: 40px;
      object-fit: contain;
    }

    .logo-text {
      font-weight: 700;
      font-size: 1.5rem;
      background: linear-gradient(90deg, var(primary), var(secondary));
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .nav-links {
      display: flex;
      gap: 25px;
    }

    .nav-links a {
      font-weight: 500;
      color: var(dark);
      padding: 5px 0;
      position: relative;
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: var(secondary);
      transition: var(transition);
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .nav-links a:hover {
      color: var(primary);
    }

    /* Container principal */
    .contact-container {
      position: relative;
      z-index: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 100px 20px 20px;
    }

    /* Card de contato */
    .contact-card {
      background: #ffffff;
      backdrop-filter: blur(10px);
      border-radius: 16px;
      padding: 40px;
      width: 100%;
      max-width: 800px;
      box-shadow: var(shadow-xl);
      transform: translateY(20px);
      opacity: 0;
      animation: fadeInUp 0.8s 0.3s forwards;
    }

    @keyframes fadeInUp {
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    /* Cabeçalho */
    .contact-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .contact-header h1 {
      font-size: 2.5rem;
      margin-bottom: 15px;
      background: linear-gradient(90deg, var(primary), var(secondary));
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .contact-header p {
      color: var(white);
      font-size: 1.1rem;
    }

    /* Conteúdo */
    .contact-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
    }

    @media (max-width: 768px) {
      .contact-content {
        grid-template-columns: 1fr;
      }
    }

    /* Informações de contato */
    .contact-info {
      display: flex;
      flex-direction: column;
      gap: 25px;
    }

    .info-item {
      display: flex;
      align-items: flex-start;
      gap: 15px;
    }

    .info-icon {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, var(primary), var(primary-dark));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.2rem;
      flex-shrink: 0;
    }

    .info-text h3 {
      font-size: 1.2rem;
      margin-bottom: 5px;
      color: var(dark);
    }

    .info-text p, .info-text a {
      color: var(white);
      text-decoration: none;
      transition: var(transition);
    }

    .info-text a:hover {
      color: var(primary);
    }

    /* Formulário */
    .contact-form {
      background: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: var(shadow-sm);
    }

    .contact-form h2 {
      font-size: 1.5rem;
      margin-bottom: 20px;
      color: var(dark);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(dark);
    }

    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      font-size: 1rem;
      transition: var(transition);
      background: #ffffff;
    }

    .form-control:focus {
      outline: none;
      border-color: var(primary);
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    textarea.form-control {
      min-height: 120px;
      resize: vertical;
    }

    .submit-btn {
      width: 100%;
      padding: 15px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      color: white;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: var(transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .submit-btn:hover {
      background: linear-gradient(90deg, var(secondary), var(primary));
      transform: translateY(-2px);
      box-shadow: var(shadow-md);
    }

    /* Mensagem de status */
    .status-message {
      margin-top: 20px;
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      font-size: 0.9rem;
      display: none;
    }

    .success-message {
      background-color: rgba(40, 167, 69, 0.1);
      color: #28a745;
      border: 1px solid rgba(40, 167, 69, 0.2);
    }

    .error-message {
      background-color: rgba(220, 53, 69, 0.1);
      color: #dc3545;
      border: 1px solid rgba(220, 53, 69, 0.2);
    }

    /* Rodapé */
    .contact-footer {
      margin-top: 30px;
      text-align: center;
      color: var(white);
      font-size: 0.9rem;
    }

    /* Efeitos extras */
    .contact-card::before {
      content: '';
      position: absolute;
      top: -5px;
      left: -5px;
      right: -5px;
      bottom: -5px;
      background: linear-gradient(45deg, var(--primary), var(--secondary), var(--primary-dark));
      z-index: -1;
      border-radius: 20px;
      opacity: 0.7;
      animation: gradientRotate 8s ease infinite;
      background-size: 200% 200%;
    }

    @keyframes gradientRotate {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Responsividade */
    @media (max-width: 576px) {
      .contact-card {
        padding: 30px 20px;
      }
      
      .contact-header h1 {
        font-size: 2rem;
      }
      
      .info-item {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <!-- Efeito de partículas -->
  <div id="particles-js"></div>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <img src="logo book.png" alt="Book Club Logo">
      <span class="logo-text">Book Club</span>
    </div>
    
    <ul class="nav-links">
      <li><a href="Book Club.html">Início</a></li>
      <li><a href="login.html">Login</a></li>
      <li><a href="cadastro.html">Cadastro</a></li>
    </ul>
  </nav>

  <!-- Container principal -->
  <div class="contact-container">
    <!-- Card de contato -->
    <div class="contact-card">
      <div class="contact-header">
        <h1>Fale Conosco</h1>
        <p>Estamos aqui para ajudar. Entre em contato para dúvidas, sugestões ou feedback.</p>
      </div>

      <div class="contact-content">
        <!-- Informações de contato -->
        <div class="contact-info">
          <div class="info-item">
            <div class="info-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="info-text">
              <h3>Endereço</h3>
              <p>Rua dos Livros, 123<br>São Paulo, SP<br>CEP: 01234-567</p>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="info-text">
              <h3>E-mail</h3>
              <p>contato@bookclub.com<br>suporte@bookclub.com</p>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon">
              <i class="fas fa-phone-alt"></i>
            </div>
            <div class="info-text">
              <h3>Telefone</h3>
              <p>(11) 98765-4321<br>(11) 91234-5678 (WhatsApp)</p>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon">
              <i class="fas fa-clock"></i>
            </div>
            <div class="info-text">
              <h3>Horário de Atendimento</h3>
              <p>Segunda a Sexta: 9h às 18h<br>Sábado: 9h às 13h</p>
            </div>
          </div>
        </div>

        <!-- Formulário de contato -->
        <div class="contact-form">
          <h2>Envie uma Mensagem</h2>
          <form id="contactForm">
            <div class="form-group">
              <label for="name">Nome Completo</label>
              <input type="text" id="name" class="form-control" placeholder="Digite seu nome" required>
            </div>

            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" id="email" class="form-control" placeholder="Digite seu e-mail" required>
            </div>

            <div class="form-group">
              <label for="subject">Assunto</label>
              <input type="text" id="subject" class="form-control" placeholder="Qual é o assunto?" required>
            </div>

            <div class="form-group">
              <label for="message">Mensagem</label>
              <textarea id="message" class="form-control" placeholder="Digite sua mensagem aqui..." required></textarea>
            </div>

            <button type="submit" class="submit-btn">
              <i class="fas fa-paper-plane"></i> Enviar Mensagem
            </button>

            <div id="statusMessage" class="status-message"></div>
          </form>
        </div>
      </div>

      <div class="contact-footer">
        <p>Sua opinião é importante para nós. Responderemos o mais breve possível!</p>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script>
    // Inicializa partículas
    particlesJS("particles-js", {
      "particles": {
        "number": {
          "value": 80,
          "density": {
            "enable": true,
            "value_area": 800
          }
        },
        "color": {
          "value": "#ffffff"
        },
        "shape": {
          "type": "circle",
          "stroke": {
            "width": 0,
            "color": "#000000"
          }
        },
        "opacity": {
          "value": 0.3,
          "random": true,
          "anim": {
            "enable": true,
            "speed": 1,
            "opacity_min": 0.1,
            "sync": false
          }
        },
        "size": {
          "value": 3,
          "random": true,
          "anim": {
            "enable": true,
            "speed": 2,
            "size_min": 0.1,
            "sync": false
          }
        },
        "line_linked": {
          "enable": true,
          "distance": 150,
          "color": "#ffffff",
          "opacity": 0.2,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 1,
          "direction": "none",
          "random": true,
          "straight": false,
          "out_mode": "out",
          "bounce": false,
          "attract": {
            "enable": true,
            "rotateX": 600,
            "rotateY": 1200
          }
        }
      },
      "interactivity": {
        "detect_on": "canvas",
        "events": {
          "onhover": {
            "enable": true,
            "mode": "grab"
          },
          "onclick": {
            "enable": true,
            "mode": "push"
          },
          "resize": true
        },
        "modes": {
          "grab": {
            "distance": 140,
            "line_linked": {
              "opacity": 0.5
            }
          },
          "push": {
            "particles_nb": 4
          }
        }
      },
      "retina_detect": true
    });

    // Validação do formulário
    const contactForm = document.getElementById('contactForm');
    const statusMessage = document.getElementById('statusMessage');

    contactForm.addEventListener('submit', (event) => {
      event.preventDefault();

      // Simulação de envio (substitua por sua lógica real)
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const subject = document.getElementById('subject').value.trim();
      const message = document.getElementById('message').value.trim();

      if (!name || !email || !subject || !message) {
        showStatusMessage('Por favor, preencha todos os campos.', 'error');
        return;
      }

      // Simula o envio com um atraso
      showStatusMessage('Enviando sua mensagem...', 'success');
      
      setTimeout(() => {
        showStatusMessage('Mensagem enviada com sucesso! Entraremos em contato em breve.', 'success');
        contactForm.reset();
      }, 2000);
    });

    function showStatusMessage(text, type) {
      statusMessage.textContent = text;
      statusMessage.className = 'status-message';
      statusMessage.classList.add(`${type}-message`);
      statusMessage.style.display = 'block';

      // Esconde a mensagem após 5 segundos
      setTimeout(() => {
        statusMessage.style.display = 'none';
      }, 5000);
    }
  </script>
</body>
</html>