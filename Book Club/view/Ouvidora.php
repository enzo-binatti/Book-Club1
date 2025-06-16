<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ouvidoria</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #ffffff;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #0d0049, #2c007e);
      padding: 20px;
    }

    canvas {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
    }

    .container {
      max-width: 700px;
      width: 100%;
      margin: 20px auto;
      padding: 30px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
      text-align: center;
      position: relative;
      z-index: 1;
      border: 1px solid rgba(255, 255, 255, 0.15);
      animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    header h1 {
      font-size: 2.2rem;
      margin-bottom: 15px;
      background: linear-gradient(90deg, #ffffff, #d1c4ff);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      font-weight: 700;
    }

    header p {
      font-size: 1rem;
      margin-bottom: 25px;
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.6;
    }

    .section {
      margin-top: 20px;
      padding: 20px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 15px;
      text-align: left;
      transition: all 0.4s ease;
      border-left: 4px solid transparent;
    }

    .section:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.12);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      border-left: 4px solid #7161ff;
    }

    .section h2 {
      font-size: 1.4rem;
      margin-bottom: 15px;
      color: rgba(255, 255, 255, 0.9);
      position: relative;
      display: inline-block;
      padding-bottom: 5px;
    }

    .section h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50%;
      height: 3px;
      background: linear-gradient(90deg, #7161ff, transparent);
      border-radius: 3px;
    }

    .section p {
      color: rgba(255, 255, 255, 0.7);
      line-height: 1.6;
      margin-bottom: 15px;
      font-size: 0.95rem;
    }

    .steps-list {
      margin: 15px 0;
      padding-left: 20px;
      list-style: none;
    }

    .steps-list li {
      margin-bottom: 10px;
      padding-left: 25px;
      position: relative;
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.5;
      font-size: 0.95rem;
    }

    .steps-list li::before {
      content: '\f054';
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      position: absolute;
      left: 0;
      color: #7161ff;
      font-size: 0.7rem;
      top: 4px;
    }

    .steps-list ol {
      counter-reset: step;
    }

    .steps-list ol li::before {
      content: counter(step);
      counter-increment: step;
      font-family: 'Poppins', sans-serif;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 18px;
      height: 18px;
      background: linear-gradient(135deg, #7161ff, #3a47ff);
      color: white;
      border-radius: 50%;
      font-size: 0.7rem;
      position: absolute;
      left: 0;
      top: 2px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    label {
      color: rgba(255, 255, 255, 0.9);
      font-weight: 500;
      margin-bottom: -8px;
      font-size: 0.95rem;
    }

    input, textarea, select {
      padding: 12px 15px;
      border: none;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      font-family: 'Poppins', sans-serif;
      transition: all 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.1);
      width: 100%;
      font-size: 0.95rem;
    }

    input:focus, textarea:focus, select:focus {
      outline: none;
      background: rgba(255, 255, 255, 0.15);
      border-color: rgba(113, 97, 255, 0.5);
      box-shadow: 0 0 0 2px rgba(113, 97, 255, 0.2);
    }

    input::placeholder, textarea::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    .cta-button {
      margin-top: 10px;
      padding: 14px 25px;
      background: linear-gradient(135deg, #7161ff, #3a47ff);
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(58, 71, 255, 0.4);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
    }

    .cta-button:hover {
      background: linear-gradient(135deg, #3a47ff, #7161ff);
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(58, 71, 255, 0.6);
    }

    footer {
      margin-top: 25px;
      font-size: 0.9rem;
      color: rgba(255, 255, 255, 0.7);
      text-align: center;
      padding-top: 15px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    footer a {
      color: #d1c4ff;
      text-decoration: none;
      transition: all 0.3s ease;
      font-weight: 600;
    }

    footer a:hover {
      color: #ffffff;
      text-decoration: underline;
    }

    /* Responsividade */
    @media (max-width: 600px) {
      .container {
        padding: 20px;
      }
      
      header h1 {
        font-size: 1.8rem;
      }
      
      .section {
        padding: 15px;
      }
      
      .section h2 {
        font-size: 1.2rem;
      }
      
      .steps-list li {
        padding-left: 22px;
        font-size: 0.9rem;
      }
      
      .cta-button {
        padding: 12px 20px;
      }
      
      footer {
        font-size: 0.8rem;
      }
    }

    @media (max-width: 400px) {
      .container {
        padding: 15px;
      }
      
      header h1 {
        font-size: 1.6rem;
      }
      
      header p, .section p {
        font-size: 0.9rem;
      }
    }

    .particle {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
    }
  </style>
</head>
<body>
  <canvas id="animatedBackground"></canvas>

  <div class="container">
    <header>
      <h1>Ouvidoria</h1>
      <p>Sua voz é essencial para nosso crescimento. Compartilhe conosco suas sugestões, reclamações ou elogios.</p>
    </header>

    <section class="section">
      <h2>Nosso Compromisso</h2>
      <p>
        Na Book Club, valorizamos cada opinião e nos comprometemos a responder todas as manifestações em até 5 dias úteis. Sua contribuição nos ajuda a melhorar continuamente.
      </p>
      <ul class="steps-list">
        <li><strong>Reclamações:</strong> Relate problemas para que possamos corrigi-los</li>
        <li><strong>Sugestões:</strong> Compartilhe ideias para melhorarmos nossos serviços</li>
        <li><strong>Elogios:</strong> Conte o que mais gosta em nossa plataforma</li>
        <li><strong>Dúvidas:</strong> Esclareça questões não resolvidas por outros canais</li>
      </ul>
    </section>

    <section class="section">
      <h2>Como Funciona</h2>
      <ol class="steps-list">
        <li>Você envia sua manifestação pelo formulário abaixo</li>
        <li>Recebe um número de protocolo para acompanhamento</li>
        <li>Nossa equipe analisa e responde em até 5 dias úteis</li>
        <li>Caso necessário, entramos em contato para mais informações</li>
      </ol>
      <p>Todas as mensagens são tratadas com confidencialidade e respeito.</p>
    </section>

    <section class="section">
      <h2>Formulário da Ouvidoria</h2>
      <form id="ouvidoriaForm">
        <label for="name">Nome Completo</label>
        <input type="text" id="name" name="name" placeholder="Como gostaria de ser chamado" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Seu melhor e-mail" required>

        <label for="subject">Assunto</label>
        <select id="subject" name="subject" required>
          <option value="" disabled selected>Selecione o tipo de mensagem</option>
          <option value="reclamacao">Reclamação</option>
          <option value="sugestao">Sugestão</option>
          <option value="elogio">Elogio</option>
          <option value="duvida">Dúvida</option>
        </select>

        <label for="message">Mensagem</label>
        <textarea id="message" name="message" placeholder="Descreva detalhadamente sua manifestação" rows="5" required></textarea>

        <button type="submit" class="cta-button">
          <i class="fas fa-paper-plane"></i> Enviar Mensagem
        </button>
      </form>
    </section>

    <footer>
      <p>Outros canais: <a href="mailto:ouvidoria@bookClub.com">ouvidoria@bookClub.com</a> | Telefone: (11) 1234-5678</p>
      <p>Horário de atendimento: Segunda a Sexta, das 9h às 18h</p>
    </footer>
  </div>

  <script>
    // Configuração do canvas animado
    const canvas = document.getElementById('animatedBackground');
    const ctx = canvas.getContext('2d');

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = Math.max(document.body.scrollHeight, window.innerHeight);
      
      // Redesenha o gradiente de fundo
      const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
      gradient.addColorStop(0, 'rgba(13, 0, 73, 0.8)');
      gradient.addColorStop(1, 'rgba(44, 0, 126, 0.8)');
      ctx.fillStyle = gradient;
      ctx.fillRect(0, 0, canvas.width, canvas.height);
    }
    
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // Bolhas animadas
    class Bubble {
      constructor() {
        this.reset();
        this.size = Math.random() * 10 + 3;
        this.alpha = Math.random() * 0.3 + 0.1;
      }

      reset() {
        this.x = Math.random() * canvas.width;
        this.y = canvas.height + Math.random() * 100;
        this.speedX = Math.random() * 0.4 - 0.2;
        this.speedY = Math.random() * -1 - 0.5;
        this.color = `rgba(255, 255, 255, ${this.alpha})`;
      }

      update() {
        this.x += this.speedX;
        this.y += this.speedY;
        
        if (this.y < -this.size || this.x < -this.size || this.x > canvas.width + this.size) {
          this.reset();
        }
      }

      draw() {
        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
        
        // Efeito de brilho
        ctx.fillStyle = `rgba(255, 255, 255, ${this.alpha * 0.5})`;
        ctx.beginPath();
        ctx.arc(this.x - this.size/3, this.y - this.size/3, this.size/3, 0, Math.PI * 2);
        ctx.fill();
      }
    }

    const bubbles = [];
    const bubbleCount = 25;

    for (let i = 0; i < bubbleCount; i++) {
      bubbles.push(new Bubble());
    }

    function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      
      // Fundo gradiente
      const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
      gradient.addColorStop(0, 'rgba(13, 0, 73, 0.8)');
      gradient.addColorStop(1, 'rgba(44, 0, 126, 0.8)');
      ctx.fillStyle = gradient;
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      
      bubbles.forEach(bubble => {
        bubble.update();
        bubble.draw();
      });
      
      requestAnimationFrame(animate);
    }
    animate();

    // Adiciona partículas flutuantes
    function createParticles() {
      const particlesContainer = document.createElement('div');
      particlesContainer.style.position = 'fixed';
      particlesContainer.style.top = '0';
      particlesContainer.style.left = '0';
      particlesContainer.style.width = '100%';
      particlesContainer.style.height = '100%';
      particlesContainer.style.pointerEvents = 'none';
      particlesContainer.style.zIndex = '0';
      document.body.appendChild(particlesContainer);

      const particleCount = 15;
      
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        const size = Math.random() * 5 + 2;
        const posX = Math.random() * 100;
        const posY = Math.random() * 100;
        const delay = Math.random() * 5;
        const duration = 20 + Math.random() * 20;
        
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.left = `${posX}%`;
        particle.style.top = `${posY}%`;
        particle.style.backgroundColor = `rgba(255, 255, 255, ${Math.random() * 0.2 + 0.1})`;
        particle.style.boxShadow = `0 0 ${size*2}px ${size/2}px rgba(113, 97, 255, 0.2)`;
        particle.style.animation = `float ${duration}s linear ${delay}s infinite`;
        
        particlesContainer.appendChild(particle);
      }
    }

    createParticles();

    // Animação do formulário
    document.getElementById('ouvidoriaForm').addEventListener('submit', function(e) {
      e.preventDefault();
      alert('Obrigado por sua mensagem! Entraremos em contato em breve.');
      this.reset();
    });

    // Adiciona animação de flutuação para as partículas
    const style = document.createElement('style');
    style.textContent = `
      @keyframes float {
        0% { transform: translateY(0) translateX(0); opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { transform: translateY(-100vh) translateX(20px); opacity: 0; }
      }
    `;
    document.head.appendChild(style);
  </script>
</body>
</html>