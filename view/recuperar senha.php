<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar Senha | Book Club</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Variáveis CSS consistentes com o site principal */
    :root {
      --primary: #4361ee;
      --primary-dark: #3a0ca3;
      --secondary: #1900ff;
      --light: #f8f9fa;
      --dark: #212529;
      --gray: #000000;
      --success: #4cc9f0;
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      --shadow-sm: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
      --shadow-md: 0 4px 6px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.08);
      --shadow-lg: 0 10px 20px rgba(0,0,0,0.1), 0 6px 6px rgba(0,0,0,0.1);
      --shadow-xl: 0 15px 25px rgba(0,0,0,0.15), 0 5px 10px rgba(0,0,0,0.05);
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
      background: linear-gradient(135deg, var(--primary-dark), var(--primary));
      color: var(--light);
      overflow: hidden;
    }

    /* Efeito de partículas */
    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 0;
    }

    /* Container principal */
    .recover-container {
      position: relative;
      z-index: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }

    /* Card de recuperação */
    .recover-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 16px;
      padding: 40px;
      width: 100%;
      max-width: 450px;
      box-shadow: var(--shadow-xl);
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

    /* Logo */
    .recover-logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .recover-logo img {
      width: 80px;
      height: auto;
      margin-bottom: 15px;
    }

    .recover-logo h1 {
      font-size: 2rem;
      font-weight: 700;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 5px;
    }

    .recover-logo p {
      color: var(--gray);
      font-size: 0.9rem;
    }

    /* Formulário */
    .recover-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .form-group {
      position: relative;
    }

    .form-group label {
      position: absolute;
      top: -10px;
      left: 15px;
      background: white;
      padding: 0 5px;
      font-size: 0.8rem;
      color: var(--primary);
      font-weight: 500;
    }

    .form-control {
      width: 100%;
      padding: 15px;
      border: 2px solid rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      font-size: 1rem;
      transition: var(--transition);
      background: rgba(255, 255, 255, 0.8);
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    /* Botão */
    .recover-btn {
      padding: 15px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      color: white;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .recover-btn:hover {
      background: linear-gradient(90deg, var(--secondary), var(--primary));
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    /* Links e mensagens */
    .recover-links {
      text-align: center;
      margin-top: 15px;
      font-size: 0.9rem;
    }

    .recover-links a {
      color: var(--gray);
      transition: var(--transition);
    }

    .recover-links a:hover {
      color: var(--primary);
    }

    .message {
      margin-top: 20px;
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      font-size: 0.9rem;
      display: none;
    }

    .error-message {
      background-color: rgba(255, 0, 0, 0.1);
      color: #ff4d4d;
      border: 1px solid rgba(255, 0, 0, 0.2);
    }

    .success-message {
      background-color: rgba(0, 255, 0, 0.1);
      color: #28a745;
      border: 1px solid rgba(0, 255, 0, 0.2);
    }

    /* Instruções */
    .recover-instructions {
      color: var(--gray);
      font-size: 0.9rem;
      margin-bottom: 20px;
      text-align: center;
    }

    /* Efeitos extras */
    .recover-card::before {
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
      .recover-card {
        padding: 30px 20px;
      }
      
      .recover-logo h1 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <!-- Efeito de partículas -->
  <div id="particles-js"></div>

  <!-- Container principal -->
  <div class="recover-container">
    <!-- Card de recuperação -->
    <div class="recover-card">
      <div class="recover-logo">
        <img src="logo book.png" alt="Book Club">
        <h1>Book Club</h1>
        <p>Recupere sua senha</p>
      </div>

      <p class="recover-instructions">
        Digite seu e-mail cadastrado e enviaremos um link para redefinir sua senha.
      </p>

      <form id="recoverForm" class="recover-form">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" class="form-control" placeholder="seu@email.com" required>
        </div>

        <button type="submit" class="recover-btn">
          <i class="fas fa-paper-plane"></i> Enviar Link
        </button>

        <div id="message" class="message"></div>

        <div class="recover-links">
          <a href="login.html"><i class="fas fa-arrow-left"></i> Voltar para o login</a>
        </div>
      </form>
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
    const recoverForm = document.getElementById('recoverForm');
    const messageDiv = document.getElementById('message');

    recoverForm.addEventListener('submit', (event) => {
      event.preventDefault();

      const email = document.getElementById('email').value.trim();

      // Simulação de validação
      if (!email) {
        showMessage('Por favor, insira seu e-mail cadastrado.', 'error');
        return;
      }

      // Verifica se o e-mail existe (simulação)
      const userData = JSON.parse(localStorage.getItem('userData'));
      
      if (!userData || userData.email !== email) {
        showMessage('Este e-mail não está cadastrado em nosso sistema.', 'error');
        return;
      }

      showMessage('Enviamos um link de recuperação para seu e-mail! Verifique sua caixa de entrada.', 'success');

      // Simula um redirecionamento após 3 segundos
      setTimeout(() => {
        window.location.href = 'login.html';
      }, 3000);
    });

    function showMessage(text, type) {
      messageDiv.textContent = text;
      messageDiv.className = 'message';
      messageDiv.classList.add(`${type}-message`);
      messageDiv.style.display = 'block';

      // Esconde a mensagem após 5 segundos (apenas para erros)
      if (type === 'error') {
        setTimeout(() => {
          messageDiv.style.display = 'none';
        }, 5000);
      }
    }
  </script>
</body>
</html>