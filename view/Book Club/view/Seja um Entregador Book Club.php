<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seja um Entregador - Book Club</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      color: #8d8d8d;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #0d0049; 
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
      max-width: 600px;
      margin: auto;
      padding: 20px;
      background: rgba(0, 0, 0, 0.6); 
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      position: relative;
      z-index: 1;
    }

    header h1 {
      font-size: 2rem;
      margin-bottom: 10px;
      color: #ffffff;
    }

    header p {
      margin-bottom: 20px;
      font-size: 0.9rem;
      color: #cccccc; 
    }

    .section {
      margin-top: 15px;
      text-align: left;
    }

    .section h2 {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: #ffffff; 
    }

    .section p {
      margin-bottom: 10px;
      font-size: 0.9rem;
      color: #cccccc; 
      line-height: 1.6; 
    }

    form label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #ffffff;
    }

    form input,
    form textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: none;
      border-radius: 5px;
      background: rgba(255, 255, 255, 0.2);
      color: #ffffff;
    }

    form button {
      padding: 8px 15px;
      background: #3b2ef3;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 0.9rem;
      transition: background 0.3s ease;
    }

    form button:hover {
      background: #1100ff;
    }

    .status-display {
      margin-top: 20px;
      text-align: center;
      font-size: 1rem;
      color: #ffffff;
    }

    footer {
      margin-top: 20px;
      font-size: 0.8rem;
      color: #ffffff;
    }

    footer a {
      color: #ffdd57; 
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline; 
    }
  </style>
</head>
<body>
  <canvas id="animatedBackground"></canvas>

  <div class="container">
    <header>
      <h1>Seja um Entregador</h1>
      <p>Ganhe dinheiro entregando livros para o Garantia Book Club!</p>
    </header>

    <section class="section">
      <h2>Benefícios e Requisitos</h2>
      <p>
        Ao se tornar um entregador, você terá acesso a:
      </p>
      <ul style="margin-left: 20px;">
        <li>Pagamentos semanais via PIX ou transferência bancária.</li>
        <li>Flexibilidade para escolher sua carga horária.</li>
        <li>Apoio total da equipe administrativa.</li>
      </ul>
      <p>
        Para participar, é necessário:
      </p>
      <ul style="margin-left: 20px;">
        <li>Possuir um veículo (bicicleta, moto ou carro).</li>
        <li>Ter disponibilidade mínima de 10 horas semanais.</li>
        <li>Residir em uma região atendida pelo Book Club.</li>
      </ul>
    </section>

    <section class="section">
      <h2>Inscreva-se Agora</h2>
      <form id="deliveryForm">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" placeholder="Digite seu nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

        <label for="phone">Telefone:</label>
        <input type="tel" id="phone" name="phone" placeholder="Digite seu telefone" required>

        <button type="submit">Enviar Inscrição</button>
      </form>
    </section>

    <section class="section">
      <h2>Status da Inscrição</h2>
      <div id="statusDisplay" class="status-display">
        Status: <span id="applicationStatus">Aguardando inscrição...</span>
      </div>
    </section>

    <footer>
      <p>
        Entre em contato conosco: 
        <a href="mailto:suporte@bookclub.com">suporte@bookclub.com</a>
      </p>
    </footer>
  </div>

  <script>
    const canvas = document.getElementById('animatedBackground');
    const ctx = canvas.getContext('2d');

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    const balls = [];
    const ballCount = 15;

    class Ball {
      constructor() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.size = Math.random() * 12 + 3;
        this.speedX = Math.random() * 1 - 0.5;
        this.speedY = Math.random() * 1 - 0.5;
        this.color = ['#666666', '#f4f4f4'][Math.floor(Math.random() * 2)];
      }

      update() {
        this.x += this.speedX;
        this.y += this.speedY;

        if (this.x > canvas.width || this.x < 0) this.speedX *= -1;
        if (this.y > canvas.height || this.y < 0) this.speedY *= -1;
      }

      draw() {
        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
      }
    }

    for (let i = 0; i < ballCount; i++) {
      balls.push(new Ball());
    }

    function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      balls.forEach(ball => {
        ball.update();
        ball.draw();
      });
      requestAnimationFrame(animate);
    }
    animate();
  </script>

  <script>
    const deliveryForm = document.getElementById('deliveryForm');
    const applicationStatusDisplay = document.getElementById('applicationStatus');

    const savedStatus = localStorage.getItem('applicationStatus');
    if (savedStatus) {
      applicationStatusDisplay.textContent = savedStatus;
    }

    deliveryForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const newStatus = 'Inscrição enviada! Aguarde nossa resposta.';
      applicationStatusDisplay.textContent = newStatus;

      localStorage.setItem('applicationStatus', newStatus);

      deliveryForm.reset();

      alert('Sua inscrição foi enviada com sucesso!');
    });
  </script>
</body>
</html>