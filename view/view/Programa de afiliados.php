<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Programa de Afiliados - Book Club</title>
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
      --bg: #F9F9FF;
      --white: #FFFFFF;
      --shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      --success: #00B894;
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
      overflow-x: hidden;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 0 20px;
      position: relative;
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
      font-size: 3rem;
      font-weight: 700;
      color: var(--primary-dark);
      margin-bottom: 20px;
      line-height: 1.2;
    }

    .subtitle {
      font-size: 1.2rem;
      color: var(--text-light);
      max-width: 700px;
      margin: 0 auto;
    }

    .affiliate-content {
      display: grid;
      grid-template-columns: 1fr;
      gap: 30px;
      padding: 40px 0 60px;
    }

    .affiliate-section {
      background: var(--white);
      border-radius: 16px;
      padding: 30px;
      box-shadow: var(--shadow);
      transition: var(--transition);
    }

    .affiliate-section:hover {
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
      font-size: 1.05rem;
    }

    .highlight {
      background-color: rgba(108, 92, 231, 0.1);
      padding: 15px;
      border-radius: 8px;
      margin: 15px 0;
      border-left: 3px solid var(--primary);
    }

    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin: 25px 0;
    }

    .benefit-card {
      background: var(--white);
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      text-align: center;
      border-top: 4px solid var(--primary);
    }

    .benefit-icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: var(--primary);
    }

    .benefit-title {
      font-weight: 600;
      margin-bottom: 10px;
      color: var(--primary-dark);
    }

    form {
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

    .commission-display {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      padding: 25px;
      border-radius: 16px;
      text-align: center;
      margin-top: 30px;
      box-shadow: var(--shadow);
    }

    .commission-amount {
      font-size: 2.5rem;
      font-weight: 700;
      margin: 10px 0;
      color: white;
    }

    .affiliate-link {
      background: rgba(255, 255, 255, 0.2);
      padding: 15px;
      border-radius: 8px;
      margin-top: 20px;
      word-break: break-all;
      color: white;
      font-weight: 500;
    }

    .copy-btn {
      background: white;
      color: var(--primary-dark);
      margin-top: 15px;
      padding: 10px 20px;
      font-size: 0.9rem;
    }

    .copy-btn:hover {
      background: white;
      opacity: 0.9;
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

    .affiliate-section {
      animation: fadeIn 0.6s ease-out forwards;
      opacity: 0;
    }

    .affiliate-section:nth-child(1) { animation-delay: 0.1s; }
    .affiliate-section:nth-child(2) { animation-delay: 0.2s; }
    .affiliate-section:nth-child(3) { animation-delay: 0.3s; }

    /* Responsive */
    @media (max-width: 768px) {
      h1 {
        font-size: 2.2rem;
      }
      
      h2 {
        font-size: 1.4rem;
      }
      
      .affiliate-section {
        padding: 25px;
      }
      
      .affiliate-content {
        gap: 25px;
        padding: 30px 0;
      }
      
      .benefits-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.8rem;
      }
      
      .subtitle {
        font-size: 1rem;
      }
      
      .affiliate-section {
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
      <h1>Programa de Afiliados</h1>
      <p class="subtitle">Ganhe comissões promovendo o Book Club</p>
    </header>

    <div class="affiliate-content">
      <section class="affiliate-section">
        <h2>Como Funciona</h2>
        <p>
          Nosso programa de afiliados foi criado para recompensar você por compartilhar o Book Club com sua rede. Cada indicação que se tornar membro pago através do seu link exclusivo gera comissões para você.
        </p>
        
        <div class="benefits-grid">
          <div class="benefit-card">
            <div class="benefit-icon">💰</div>
            <div class="benefit-title">10% de Comissão</div>
            <p>Por cada assinatura mensal gerada</p>
          </div>
          
          <div class="benefit-card">
            <div class="benefit-icon">🔄</div>
            <div class="benefit-title">Pagamento Recorrente</div>
            <p>Enquanto o membro permanecer ativo</p>
          </div>
          
          <div class="benefit-card">
            <div class="benefit-icon">🎁</div>
            <div class="benefit-title">Bônus Especiais</div>
            <p>Para afiliados de alto desempenho</p>
          </div>
        </div>
        
        <div class="highlight">
          <p>
            As comissões são pagas mensalmente via PIX ou transferência bancária, sempre que seu saldo atingir o mínimo de R$ 50,00. Você pode acompanhar seu desempenho em tempo real através do painel do afiliado.
          </p>
        </div>
      </section>

      <section class="affiliate-section">
        <h2>Seu Link de Afiliado</h2>
        <div class="commission-display">
          <p>Suas comissões acumuladas</p>
          <div class="commission-amount">R$ <span id="totalCommission">0,00</span></div>
          
          <div class="affiliate-link" id="affiliateLink">
            https://bookclub.com/afiliado/?ref=<span id="userCode">seucodigo</span>
          </div>
          <button class="copy-btn" id="copyBtn">Copiar Link</button>
        </div>
      </section>

      <section class="affiliate-section">
        <h2>Inscreva-se Agora</h2>
        <form id="affiliateForm">
          <div class="form-group">
            <label for="name">Nome Completo</label>
            <input type="text" id="name" name="name" placeholder="Seu nome completo" required>
          </div>
          
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="seu@email.com" required>
          </div>
          
          <div class="form-group">
            <label for="phone">Telefone (WhatsApp)</label>
            <input type="tel" id="phone" name="phone" placeholder="(00) 00000-0000">
          </div>
          
          <button type="submit">Tornar-me Afiliado</button>
        </form>
      </section>
    </div>

    <footer>
      <p>Dúvidas sobre nosso programa de afiliados?</p>
      <a href="mailto:afiliados@bookclub.com" class="contact-link">Fale com nossa equipe</a>
    </footer>
  </div>

  <script>
    // Simulação de comissões (substituir por lógica real)
    const affiliateForm = document.getElementById('affiliateForm');
    const totalCommissionDisplay = document.getElementById('totalCommission');
    const affiliateLink = document.getElementById('affiliateLink');
    const userCode = document.getElementById('userCode');
    const copyBtn = document.getElementById('copyBtn');

    // Carrega comissões do localStorage ou inicia com zero
    let totalCommission = parseFloat(localStorage.getItem('totalCommission')) || 0;
    totalCommissionDisplay.textContent = totalCommission.toFixed(2);

    // Gera um código de afiliado aleatório se não existir
    let affiliateCode = localStorage.getItem('affiliateCode');
    if (!affiliateCode) {
      affiliateCode = Math.random().toString(36).substring(2, 8).toUpperCase();
      localStorage.setItem('affiliateCode', affiliateCode);
    }
    userCode.textContent = affiliateCode;

    // Copiar link de afiliado
    copyBtn.addEventListener('click', () => {
      navigator.clipboard.writeText(affiliateLink.textContent)
        .then(() => {
          copyBtn.textContent = 'Copiado!';
          setTimeout(() => {
            copyBtn.textContent = 'Copiar Link';
          }, 2000);
        });
    });

    // Envio do formulário
    affiliateForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      // Simulação de ganho de comissão
      const commissionEarned = 10; 
      totalCommission += commissionEarned;
      
      // Atualiza localStorage
      localStorage.setItem('totalCommission', totalCommission);
      totalCommissionDisplay.textContent = totalCommission.toFixed(2);
      
      // Feedback visual
      alert(`Cadastro realizado com sucesso!\nSeu código de afiliado: ${affiliateCode}\nVocê ganhou R$ ${commissionEarned},00 de bônus de boas-vindas!`);
      
      // Limpa formulário (em produção, enviaria para o servidor)
      affiliateForm.reset();
    });
  </script>
</body>
</html>