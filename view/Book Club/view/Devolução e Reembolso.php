<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Devolução e Reembolso</title>
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
      max-width: 850px;
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
      font-size: 3rem;
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
      font-size: 1.2rem;
      margin-bottom: 30px;
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.6;
    }

    .section {
      margin-top: 30px;
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
      font-size: 1.8rem;
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
    }

    .steps-list {
      margin: 15px 0;
      padding-left: 25px;
      list-style: none;
    }

    .steps-list li {
      margin-bottom: 12px;
      padding-left: 30px;
      position: relative;
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.6;
    }

    .steps-list li::before {
      content: '';
      position: absolute;
      left: 0;
      top: 8px;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background: linear-gradient(135deg, #7161ff, #3a47ff);
    }

    .steps-list ol li::before {
      content: counter(step);
      counter-increment: step;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8rem;
      font-weight: bold;
      color: white;
      background: linear-gradient(135deg, #7161ff, #3a47ff);
    }

    .steps-list ol {
      counter-reset: step;
    }

    .steps-list strong {
      color: #d1c4ff;
      font-weight: 600;
    }

    footer {
      margin-top: 40px;
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
      
      .steps-list li {
        padding-left: 25px;
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
      <h1>Devolução e Reembolso</h1>
      <p>Nossa política transparente para garantir sua satisfação</p>
    </header>

    <section class="section">
      <h2>Política de Devolução</h2>
      <p>
        Oferecemos uma política de devolução simplificada para garantir sua total satisfação. Você tem até 7 dias corridos após o recebimento para solicitar a devolução de produtos não satisfatórios.
      </p>
      <ol class="steps-list">
        <li>Entre em contato com nosso suporte via e-mail ou telefone informando o número do pedido</li>
        <li>Nosso time enviará um código de autorização e instruções para postagem</li>
        <li>Encaminhe o produto na embalagem original com todos os acessórios e etiquetas</li>
        <li>Aguarde nossa análise (realizada em até 3 dias úteis após o recebimento)</li>
      </ol>
      <p><strong>Observação:</strong> Produtos com sinais de uso não serão aceitos para devolução.</p>
    </section>

    <section class="section">
      <h2>Política de Reembolso</h2>
      <p>
        Após a aprovação da devolução, processaremos seu reembolso da forma mais ágil possível, conforme o método de pagamento original:
      </p>
      <ul class="steps-list">
        <li><strong>Cartão de Crédito:</strong> Estorno na fatura atual ou próxima (dependendo da data de fechamento)</li>
        <li><strong>Boleto Bancário:</strong> Depósito em conta em até 5 dias úteis (envie seus dados bancários)</li>
        <li><strong>Pix:</strong> Reembolso imediato no mesmo dia útil após aprovação</li>
        <li><strong>Vale-presente:</strong> Crédito em sua conta para futuras compras</li>
      </ul>
      <p>O prazo total para conclusão do reembolso é de até 5 dias úteis após a aprovação.</p>
    </section>

    <section class="section">
      <h2>Precisa de ajuda?</h2>
      <p>
        Nossa equipe está disponível para esclarecer qualquer dúvida sobre devoluções ou reembolsos:
      </p>
      <footer>
        <p><i class="fas fa-envelope"></i> <a href="mailto:devolucoes@bookClub.com">devolucoes@bookClub.com</a></p>
        <p><i class="fas fa-phone"></i> (11) 1234-5678 (Seg-Sex, 9h-18h)</p>
        <p><i class="fas fa-comment-dots"></i> Chat online em sua conta</p>
      </footer>
    </section>
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

    // Animação dos itens
    document.querySelectorAll('.section').forEach(section => {
      section.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px)';
      });
      
      section.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
      });
    });
  </script>
</body>
</html>