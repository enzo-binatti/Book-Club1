<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reclame Aqui</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #ffffff;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #0d0049, #2c007e);
    }

    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 400;
      src: url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
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
      width: 90%;
      margin: auto;
      padding: 40px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
      text-align: center;
      position: relative;
      z-index: 1;
      border: 1px solid rgba(255, 255, 255, 0.15);
      transform-style: preserve-3d;
      perspective: 1000px;
      animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    header h1 {
      font-size: 2.8rem;
      margin-bottom: 15px;
      color: #ffffff;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
      background: linear-gradient(90deg, #ffffff, #d1c4ff);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      font-weight: 700;
    }

    header p {
      font-size: 1.1rem;
      margin-bottom: 30px;
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.6;
    }

    .section {
      margin-top: 25px;
      padding: 25px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 15px;
      text-align: left;
      transition: all 0.4s ease;
      border-left: 4px solid transparent;
      position: relative;
      overflow: hidden;
    }

    .section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(113, 97, 255, 0.1), transparent);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .section:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.12);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      border-left: 4px solid #7161ff;
    }

    .section:hover::before {
      opacity: 1;
    }

    .section h2 {
      font-size: 1.6rem;
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

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      color: rgba(255, 255, 255, 0.9);
      font-weight: 500;
      margin-bottom: -10px;
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
    }

    .cta-button:hover {
      background: linear-gradient(135deg, #3a47ff, #7161ff);
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(58, 71, 255, 0.6);
    }

    .cta-button:active {
      transform: translateY(0);
    }

    .complaint-list {
      margin-top: 20px;
    }

    .complaint-item {
      background: rgba(255, 255, 255, 0.08);
      padding: 20px;
      margin-bottom: 15px;
      border-radius: 10px;
      transition: all 0.3s ease;
      border-left: 3px solid #7161ff;
    }

    .complaint-item:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .complaint-item strong {
      color: #d1c4ff;
      font-weight: 600;
    }

    .complaint-item em {
      color: rgba(255, 255, 255, 0.7);
      font-size: 0.9rem;
    }

    .complaint-item p {
      margin: 10px 0;
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.5;
    }

    .complaint-item small {
      display: inline-block;
      padding: 4px 10px;
      background: rgba(113, 97, 255, 0.2);
      color: #d1c4ff;
      border-radius: 20px;
      font-size: 0.8rem;
    }

    footer {
      margin-top: 30px;
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.7);
      text-align: center;
      padding-top: 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    footer a {
      color: #d1c4ff;
      text-decoration: none;
      transition: all 0.3s ease;
      font-weight: 600;
      position: relative;
    }

    footer a::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: #7161ff;
      transition: width 0.3s ease;
    }

    footer a:hover {
      color: #ffffff;
    }

    footer a:hover::after {
      width: 100%;
    }

    /* Responsividade */
    @media (max-width: 768px) {
      .container {
        padding: 25px;
        width: 95%;
      }
      
      header h1 {
        font-size: 2.2rem;
      }
      
      .section {
        padding: 20px;
      }
      
      .cta-button {
        padding: 12px 20px;
      }
    }

    /* Efeito de partículas */
    .particle {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
    }
  </style>
</head>
<body>
  <canvas id="animatedBackground"></canvas>
  <div id="particles-js"></div>

  <div class="container">
    <header>
      <h1>Reclame Aqui</h1>
      <p>Nosso canal direto para resolver suas questões com agilidade e transparência</p>
    </header>

    <section class="section">
      <h2>Registrar Reclamação</h2>
      <form id="complaintForm">
        <label for="name">Nome Completo</label>
        <input type="text" id="name" name="name" placeholder="Como gostaria de ser chamado" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Seu melhor e-mail" required>

        <label for="subject">Tipo de Reclamação</label>
        <select id="subject" name="subject" required>
          <option value="" disabled selected>Selecione o tipo</option>
          <option value="entrega">Problema com entrega</option>
          <option value="produto">Problema com produto</option>
          <option value="atendimento">Problema com atendimento</option>
          <option value="outro">Outro</option>
        </select>

        <label for="complaint">Detalhes da Reclamação</label>
        <textarea id="complaint" name="complaint" placeholder="Descreva detalhadamente sua reclamação" rows="5" required></textarea>

        <button type="submit" class="cta-button">
          <i class="fas fa-paper-plane"></i> Enviar Reclamação
        </button>
      </form>
    </section>

    <section class="section">
      <h2>Suas Reclamações</h2>
      <div id="complaintList" class="complaint-list"></div>
    </section>

    <footer>
      <p>Precisa de ajuda imediata? <a href="mailto:suporte@bookClub.com">suporte@bookClub.com</a> | Telefone: (11) 1234-5678</p>
      <p>Horário de atendimento: Segunda a Sexta, das 9h às 18h</p>
    </footer>
  </div>

  <script>
    // Configuração do canvas animado
    const canvas = document.getElementById('animatedBackground');
    const ctx = canvas.getContext('2d');

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // Bolhas animadas melhoradas
    class Bubble {
      constructor() {
        this.reset();
        this.size = Math.random() * 12 + 3;
        this.alpha = Math.random() * 0.4 + 0.1;
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
    const bubbleCount = 30;

    for (let i = 0; i < bubbleCount; i++) {
      setTimeout(() => {
        bubbles.push(new Bubble());
      }, i * 300);
    }

    function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      
      // Fundo gradiente animado
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

      const particleCount = 20;
      
      for (let i = 0; i < particleCount; i++) {
        setTimeout(() => {
          const particle = document.createElement('div');
          particle.className = 'particle';
          
          const size = Math.random() * 6 + 2;
          const posX = Math.random() * 100;
          const posY = Math.random() * 100;
          const delay = Math.random() * 5;
          const duration = 20 + Math.random() * 20;
          
          particle.style.width = `${size}px`;
          particle.style.height = `${size}px`;
          particle.style.left = `${posX}%`;
          particle.style.top = `${posY}%`;
          particle.style.backgroundColor = `rgba(255, 255, 255, ${Math.random() * 0.3 + 0.1})`;
          particle.style.boxShadow = `0 0 ${size*2}px ${size/2}px rgba(113, 97, 255, 0.3)`;
          particle.style.animation = `float ${duration}s linear ${delay}s infinite`;
          
          particlesContainer.appendChild(particle);
        }, i * 300);
      }
    }

    createParticles();

    // Sistema de reclamações
    const complaintForm = document.getElementById('complaintForm');
    const complaintList = document.getElementById('complaintList');

    let complaints = JSON.parse(localStorage.getItem('complaints')) || [];

    function renderComplaints() {
      complaintList.innerHTML = '';
      if (complaints.length === 0) {
        complaintList.innerHTML = '<p style="color: rgba(255,255,255,0.6); text-align: center;">Nenhuma reclamação registrada ainda</p>';
        return;
      }
      
      complaints.forEach((complaint, index) => {
        const complaintItem = document.createElement('div');
        complaintItem.classList.add('complaint-item');
        complaintItem.innerHTML = `
          <strong>${complaint.name}</strong>
          <em>${complaint.email}</em>
          <p>${complaint.message}</p>
          <small>Status: ${complaint.status || 'Em análise'}</small>
        `;
        complaintList.appendChild(complaintItem);
      });
    }

    function saveComplaints() {
      localStorage.setItem('complaints', JSON.stringify(complaints));
    }

    complaintForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const subject = document.getElementById('subject').value;
      const message = document.getElementById('complaint').value;

      complaints.unshift({
        name,
        email,
        subject,
        message,
        status: 'Em análise',
        date: new Date().toLocaleDateString()
      });

      complaintForm.reset();

      saveComplaints();
      renderComplaints();
      
      // Feedback visual
      const button = complaintForm.querySelector('button');
      button.innerHTML = '<i class="fas fa-check"></i> Reclamação Enviada';
      button.style.background = 'linear-gradient(135deg, #4CAF50, #2E7D32)';
      
      setTimeout(() => {
        button.innerHTML = '<i class="fas fa-paper-plane"></i> Enviar Reclamação';
        button.style.background = 'linear-gradient(135deg, #7161ff, #3a47ff)';
      }, 2000);
    });

    renderComplaints();
  </script>
</body>
</html>