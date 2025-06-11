<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Central de Ajuda</title>
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

    .help-center {
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

    .search-bar {
      margin: 30px 0;
      display: flex;
      justify-content: center;
      position: relative;
    }

    .search-bar input {
      padding: 15px 25px;
      width: 70%;
      border: none;
      border-radius: 50px;
      background: rgba(255, 255, 255, 0.15);
      color: #ffffff;
      font-size: 1.1rem;
      outline: none;
      transition: all 0.4s ease;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(5px);
    }

    .search-bar input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .search-bar input:focus {
      background: rgba(255, 255, 255, 0.25);
      transform: scale(1.02);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .search-bar button {
      padding: 15px 30px;
      border: none;
      border-radius: 50px;
      background: linear-gradient(135deg, #7161ff, #3a47ff);
      color: white;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      position: absolute;
      right: 0;
      top: 0;
      height: 100%;
      box-shadow: 0 5px 15px rgba(58, 71, 255, 0.4);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .search-bar button:hover {
      background: linear-gradient(135deg, #3a47ff, #7161ff);
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(58, 71, 255, 0.6);
    }

    .search-bar button:active {
      transform: translateY(0);
    }

    .faq-section {
      margin-top: 30px;
      text-align: left;
    }

    .faq-section h2 {
      font-size: 1.8rem;
      margin-bottom: 20px;
      color: rgba(255, 255, 255, 0.9);
      position: relative;
      display: inline-block;
      padding-bottom: 10px;
    }

    .faq-section h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50%;
      height: 3px;
      background: linear-gradient(90deg, #7161ff, transparent);
      border-radius: 3px;
    }

    .faq-item {
      margin-bottom: 20px;
      padding: 20px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 12px;
      color: rgba(255, 255, 255, 0.9);
      cursor: pointer;
      transition: all 0.4s ease;
      border-left: 4px solid transparent;
      overflow: hidden;
      position: relative;
    }

    .faq-item::before {
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

    .faq-item:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.12);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      border-left: 4px solid #7161ff;
    }

    .faq-item:hover::before {
      opacity: 1;
    }

    .faq-item strong {
      color: #ffffff;
      font-size: 1.2rem;
      font-weight: 600;
      display: block;
      margin-bottom: 10px;
      transition: color 0.3s ease;
    }

    .faq-item:hover strong {
      color: #d1c4ff;
    }

    .faq-item p {
      color: rgba(255, 255, 255, 0.7);
      line-height: 1.6;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.5s ease, padding-top 0.3s ease;
    }

    .faq-item.active p {
      max-height: 200px;
      padding-top: 10px;
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
      .help-center {
        padding: 25px;
        width: 95%;
      }
      
      header h1 {
        font-size: 2.2rem;
      }
      
      .search-bar {
        flex-direction: column;
      }
      
      .search-bar input {
        width: 100%;
        padding: 12px 20px;
      }
      
      .search-bar button {
        position: relative;
        margin-top: 15px;
        width: 100%;
        padding: 12px;
      }
      
      .faq-item {
        padding: 15px;
      }
    }

    /* Efeito de partículas melhorado */
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

  <div class="help-center">
    <header>
      <h1>Central de Ajuda</h1>
      <p>Encontre respostas rápidas para suas dúvidas ou entre em contato com nossa equipe de suporte.</p>
    </header>

    <section class="search-bar">
      <input type="text" placeholder="Digite sua dúvida..." id="searchInput">
      <button onclick="searchFAQ()">
        <i class="fas fa-search"></i> Buscar
      </button>
    </section>

    <section class="faq-section">
      <h2>Perguntas Frequentes</h2>
      <div id="faqList">
        <div class="faq-item" onclick="toggleFAQ(this)">
          <strong>Como faço para redefinir minha senha?</strong>
          <p>Clique no link "Esqueci minha senha" na página de login e siga as instruções enviadas para seu e-mail cadastrado. O link expira em 24 horas por motivos de segurança.</p>
        </div>
        <div class="faq-item" onclick="toggleFAQ(this)">
          <strong>Quanto tempo leva para processar um pedido?</strong>
          <p>O processamento geralmente leva 1-2 dias úteis. Para pedidos especiais ou durante promoções, pode levar até 3 dias úteis. Você receberá notificações por e-mail em cada etapa.</p>
        </div>
        <div class="faq-item" onclick="toggleFAQ(this)">
          <strong>Como posso entrar em contato com o suporte?</strong>
          <p>Você pode nos contatar por e-mail em <a href="mailto:suporte@bookClub.com" style="color: #d1c4ff;">suporte@bookClub.com</a> ou através do chat online disponível em sua conta, das 9h às 18h.</p>
        </div>
        <div class="faq-item" onclick="toggleFAQ(this)">
          <strong>Qual é o horário de atendimento?</strong>
          <p>Nosso suporte está disponível de segunda a sexta, das 9h às 18h. Fora deste horário, você pode deixar sua mensagem que responderemos no próximo dia útil.</p>
        </div>
        <div class="faq-item" onclick="toggleFAQ(this)">
          <strong>Quais são as opções de pagamento?</strong>
          <p>Aceitamos cartões de crédito (Visa, Mastercard, American Express), Pix, boleto bancário e PayPal. Todos os pagamentos são processados com segurança.</p>
        </div>
      </div>
    </section>

    <footer>
      <p>Ainda com dúvidas? Entre em contato conosco: <a href="mailto:suporte@bookClub.com">suporte@bookClub.com</a> ou pelo telefone (11) 1234-5678</p>
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
        this.size = Math.random() * 10 + 5;
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

    // Funções da Central de Ajuda
    function searchFAQ() {
      const query = document.getElementById("searchInput").value.toLowerCase().trim();
      const faqItems = document.querySelectorAll(".faq-item");
      let found = false;

      if (query === '') {
        faqItems.forEach(item => {
          item.style.display = "block";
          item.classList.remove('active');
        });
        return;
      }

      faqItems.forEach(item => {
        const text = item.textContent.toLowerCase();
        if (text.includes(query)) {
          item.style.display = "block";
          item.classList.add('active');
          found = true;
          
          // Destaque animado
          item.style.animation = 'none';
          void item.offsetWidth; // Trigger reflow
          item.style.animation = 'highlight 1.5s ease';
        } else {
          item.style.display = "none";
        }
      });

      if (!found) {
        const notFound = document.createElement('div');
        notFound.className = 'faq-item';
        notFound.innerHTML = '<strong>Nenhum resultado encontrado</strong><p>Tente usar palavras-chave diferentes ou entre em contato com nosso suporte.</p>';
        notFound.style.display = 'block';
        notFound.style.animation = 'fadeIn 0.5s ease';
        document.getElementById('faqList').appendChild(notFound);
        
        setTimeout(() => {
          notFound.style.animation = 'fadeOut 0.5s ease';
          setTimeout(() => notFound.remove(), 500);
        }, 3000);
      }
    }

    function toggleFAQ(item) {
      item.classList.toggle('active');
    }

    // Adiciona evento de tecla para a busca
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        searchFAQ();
      }
    });

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
  </script>
</body>
</html>