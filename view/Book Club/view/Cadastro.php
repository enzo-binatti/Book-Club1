<?php
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - <?php echo SITE_NAME; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Variáveis CSS consistentes com o site principal */
    :root {
      --primary: #4361ee;
      --primary-dark: #3a0ca3;
      --secondary: #2533f7;
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
    }

    /* Efeito de partículas */
    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 0;
    }

    /* Container principal */
    .register-container {
      position: relative;
      z-index: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }

    /* Card de cadastro */
    .register-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 16px;
      padding: 40px;
      width: 100%;
      max-width: 500px;
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
    .register-logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .register-logo img {
      width: 80px;
      height: auto;
      margin-bottom: 15px;
    }

    .register-logo h1 {
      font-size: 2rem;
      font-weight: 700;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 5px;
    }

    .register-logo p {
      color: var(--gray);
      font-size: 0.9rem;
    }

    /* Formulário */
    .register-form {
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
      box-shadow: 0 0 0 3px rgba(0, 47, 255, 0.2);
    }

    /* Mostrar/Ocultar senha */
    .password-wrapper {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: var(--gray);
      transition: var(--transition);
    }

    .toggle-password:hover {
      color: var(--primary);
    }

    /* Botão */
    .register-btn {
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

    .register-btn:hover {
      background: linear-gradient(90deg, var(--secondary), var(--primary));
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    /* Links e mensagens */
    .register-links {
      text-align: center;
      margin-top: 15px;
      font-size: 0.9rem;
    }

    .register-links a {
      color: var(--gray);
      transition: var(--transition);
    }

    .register-links a:hover {
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

    /* Barra de progresso da senha */
    .password-strength {
      margin-top: 5px;
      height: 5px;
      background-color: #e9ecef;
      border-radius: 3px;
      overflow: hidden;
    }

    .strength-meter {
      height: 100%;
      width: 0;
      transition: width 0.3s ease;
    }

    .strength-weak {
      background-color: #dc3545;
      width: 25%;
    }

    .strength-medium {
      background-color: #fd7e14;
      width: 50%;
    }

    .strength-strong {
      background-color: #28a745;
      width: 75%;
    }

    .strength-very-strong {
      background-color: #20c997;
      width: 100%;
    }

    .password-strength-text {
      font-size: 0.8rem;
      color: var(--gray);
      margin-top: 3px;
      text-align: right;
    }

    /* Efeitos extras */
    .register-card::before {
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
      .register-card {
        padding: 30px 20px;
      }
      
      .register-logo h1 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <!-- Efeito de partículas -->
  <div id="particles-js"></div>

  <!-- Container principal -->
  <div class="register-container">
    <!-- Card de cadastro -->
    <div class="register-card">
      <div class="register-logo">
        <img src="logo book.png" alt="Book Club">
        <h1>Book Club</h1>
        <p>Crie sua conta e comece sua jornada literária</p>
      </div>

      <form id="registerForm" class="register-form">
        <div class="form-group">
          <label for="fullname">Nome Completo</label>
          <input type="text" id="fullname" class="form-control" placeholder="Digite seu nome completo" required>
        </div>

        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" class="form-control" placeholder="seu@email.com" required>
        </div>

        <div class="form-group">
          <label for="password">Senha</label>
          <div class="password-wrapper">
            <input type="password" id="password" class="form-control" placeholder="••••••••" required>
            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
          </div>
          <div class="password-strength">
            <div class="strength-meter" id="strengthMeter"></div>
          </div>
          <div class="password-strength-text" id="strengthText">Força da senha</div>
        </div>

        <div class="form-group">
          <label for="confirmPassword">Confirmar Senha</label>
          <div class="password-wrapper">
            <input type="password" id="confirmPassword" class="form-control" placeholder="••••••••" required>
            <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
          </div>
        </div>

        <button type="submit" class="register-btn">
          <i class="fas fa-user-plus"></i> Criar Conta
        </button>

        <div id="message" class="message"></div>

        <div class="register-links">
          Já tem uma conta? <a href="<?php echo generateLink('login'); ?>">Faça login</a>
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

    // Mostrar/Ocultar senha
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');

    togglePassword.addEventListener('click', function() {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });

    toggleConfirmPassword.addEventListener('click', function() {
      const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmPassword.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });

    // Verificação de força da senha
    password.addEventListener('input', function() {
      const strengthMeter = document.getElementById('strengthMeter');
      const strengthText = document.getElementById('strengthText');
      const strength = checkPasswordStrength(this.value);
      
      // Remove todas as classes de força
      strengthMeter.className = 'strength-meter';
      
      // Adiciona a classe apropriada
      if (strength === 0) {
        strengthText.textContent = 'Muito fraca';
        strengthMeter.className = 'strength-meter';
      } else if (strength === 1) {
        strengthText.textContent = 'Fraca';
        strengthMeter.className = 'strength-meter strength-weak';
      } else if (strength === 2) {
        strengthText.textContent = 'Moderada';
        strengthMeter.className = 'strength-meter strength-medium';
      } else if (strength === 3) {
        strengthText.textContent = 'Forte';
        strengthMeter.className = 'strength-meter strength-strong';
      } else {
        strengthText.textContent = 'Muito forte';
        strengthMeter.className = 'strength-meter strength-very-strong';
      }
    });

    function checkPasswordStrength(password) {
      let strength = 0;
      
      // Verifica o comprimento
      if (password.length >= 8) strength++;
      if (password.length >= 12) strength++;
      
      // Verifica caracteres diversos
      if (/[A-Z]/.test(password)) strength++;
      if (/[0-9]/.test(password)) strength++;
      if (/[^A-Za-z0-9]/.test(password)) strength++;
      
      // Limita a força máxima a 4
      return Math.min(strength, 4);
    }

    // Validação do formulário
    const registerForm = document.getElementById('registerForm');
    const messageDiv = document.getElementById('message');

    registerForm.addEventListener('submit', (event) => {
      event.preventDefault();

      const fullname = document.getElementById('fullname').value.trim();
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value.trim();
      const confirmPassword = document.getElementById('confirmPassword').value.trim();

      // Validações básicas
      if (!fullname || !email || !password || !confirmPassword) {
        showMessage('Todos os campos são obrigatórios.', 'error');
        return;
      }

      if (password !== confirmPassword) {
        showMessage('As senhas não coincidem.', 'error');
        return;
      }

      if (password.length < 8) {
        showMessage('A senha deve ter pelo menos 8 caracteres.', 'error');
        return;
      }

      // Verifica se o email já está cadastrado
      const existingUser = localStorage.getItem('user_' + email);
      if (existingUser) {
        showMessage('Este e-mail já está cadastrado.', 'error');
        return;
      }

      // Salva os dados do usuário (simulando um banco de dados)
      const userData = {
        fullname,
        email,
        password
      };

      localStorage.setItem('user_' + email, JSON.stringify(userData));
      
      // Também salva como "usuário atual" para facilitar o login
      localStorage.setItem('userData', JSON.stringify(userData));

      showMessage('Cadastro realizado com sucesso! Redirecionando...', 'success');

      // Simula um redirecionamento após 2 segundos
      setTimeout(() => {
        window.location.href="<?php echo generateLink('home'); ?>";
      }, 2000);
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