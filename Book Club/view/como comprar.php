<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Como Comprar</title>
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

    .steps-section {
      margin-top: 30px;
      text-align: left;
    }

    .steps-section h2 {
      font-size: 1.8rem;
      margin-bottom: 20px;
      color: rgba(255, 255, 255, 0.9);
      position: relative;
      display: inline-block;
      padding-bottom: 10px;
    }

    .steps-section h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50%;
      height: 3px;
      background: linear-gradient(90deg, #7161ff, transparent);
      border-radius: 3px;
    }

    .step-item {
      margin-bottom: 20px;
      padding: 20px 20px 20px 60px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 12px;
      color: rgba(255, 255, 255, 0.9);
      position: relative;
      transition: all 0.4s ease;
      border-left: 4px solid transparent;
      overflow: hidden;
      cursor: pointer;
    }

    .step-item::before {
      content: attr(data-step);
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      font-weight: bold;
      font-size: 1.5rem;
      width: 30px;
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #7161ff, #3a47ff);
      color: white;
      border-radius: 50%;
      box-shadow: 0 4px 10px rgba(58, 71, 255, 0.3);
    }

    .step-item::after {
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

    .step-item:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.12);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      border-left: 4px solid #7161ff;
    }

    .step-item:hover::after {
      opacity: 1;
    }

    .step-item strong {
      color: #ffffff;
      font-size: 1.2rem;
      font-weight: 600;
      display: block;
      margin-bottom: 10px;
      transition: color 0.3s ease;
    }

    .step-item:hover strong {
      color: #d1c4ff;
    }

    .step-item p {
      color: rgba(255, 255, 255, 0.7);
      line-height: 1.6;
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
      
      .step-item {
        padding: 15px 15px 15px 50px;
      }
      
      .step-item::before {
        left: 15px;
        font-size: 1.3rem;
        width: 25px;
        height: 25px;
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
      <h1>Como Comprar</h1>
      <p>Siga os passos abaixo para realizar sua compra com facilidade e segurança.</p>
    </header>

    <section class="steps-section">
      <h2>Passo a Passo</h2>
      <div class="step-item" data-step="1">
        <strong>Escolha seus produtos</strong>
        <p>Navegue pelo nosso catálogo e adicione os itens desejados ao carrinho. Você pode filtrar por categoria ou usar nossa barra de busca.</p>
      </div>
      <div class="step-item" data-step="2">
        <strong>Revise seu pedido</strong>
        <p>Verifique os produtos no carrinho, ajuste quantidades se necessário e aplique cupons de desconto antes de prosseguir.</p>
      </div>
      <div class="step-item" data-step="3">
        <strong>Finalize a compra</strong>
        <p>Informe seus dados de entrega, escolha o método de envio e selecione a forma de pagamento que preferir.</p>
      </div>
      <div class="step-item" data-step="4">
        <strong>Acompanhe seu pedido</strong>
        <p>Após a confirmação do pagamento, você receberá um e-mail com o código de rastreamento e atualizações sobre o status.</p>
      </div>
    </section>

    <footer>
      <p>Dúvidas? Entre em contato conosco: <a href="mailto:suporte@bookClub.com">suporte@bookClub.com</a> ou pelo telefone (11) 1234-5678</p>
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

    // Adiciona animação ao passar o mouse nos passos
    document.querySelectorAll('.step-item').forEach(item => {
      item.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px)';
      });
      
      item.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
      });
    });
  </script>
</body>
</html>