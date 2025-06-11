<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Políticas do Book Club</title>
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
      max-width: 900px;
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

    .policies-content {
      display: grid;
      grid-template-columns: 1fr;
      gap: 30px;
      padding: 40px 0 60px;
    }

    .policy-section {
      background: var(--white);
      border-radius: 16px;
      padding: 30px;
      box-shadow: var(--shadow);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
      border-left: 5px solid var(--primary);
    }

    .policy-section:hover {
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

    .policy-icon {
      position: absolute;
      opacity: 0.05;
      z-index: -1;
      font-size: 10rem;
      color: var(--primary);
      right: 20px;
      top: 20px;
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

    .policy-section {
      animation: fadeIn 0.6s ease-out forwards;
      opacity: 0;
    }

    .policy-section:nth-child(1) { animation-delay: 0.1s; }
    .policy-section:nth-child(2) { animation-delay: 0.2s; }
    .policy-section:nth-child(3) { animation-delay: 0.3s; }
    .policy-section:nth-child(4) { animation-delay: 0.4s; }
    .policy-section:nth-child(5) { animation-delay: 0.5s; }
    .policy-section:nth-child(6) { animation-delay: 0.6s; }

    /* Responsive */
    @media (max-width: 768px) {
      h1 {
        font-size: 2.2rem;
      }
      
      h2 {
        font-size: 1.4rem;
      }
      
      .policy-section {
        padding: 25px;
      }
      
      .policies-content {
        gap: 25px;
        padding: 30px 0;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.8rem;
      }
      
      .subtitle {
        font-size: 1rem;
      }
      
      .policy-section {
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
      <h1>Políticas do Book Club</h1>
      <p class="subtitle">Conheça as diretrizes que mantêm nossa comunidade segura e acolhedora</p>
    </header>

    <div class="policies-content">
      <section class="policy-section">
        <div class="policy-icon">📖</div>
        <h2>1. Participação no Book Club</h2>
        <p>
          Para participar do Book Club, é necessário preencher nosso formulário de inscrição. Após a aprovação, você receberá um e-mail de boas-vindas com todas as informações para começar sua jornada literária conosco.
        </p>
        <div class="highlight">
          <p>
            A participação no clube é gratuita, mas valorizamos o comprometimento dos membros com as atividades regulares, como discussões semanais e eventos online. Pedimos que todos respeitem os prazos e orientações da equipe organizadora.
          </p>
        </div>
      </section>

      <section class="policy-section">
        <div class="policy-icon">🤝</div>
        <h2>2. Conduta na Comunidade</h2>
        <p>
          Nossa comunidade é construída sobre os pilares de respeito, diversidade e inclusão. Comportamentos abusivos, discriminatórios ou ofensivos não serão tolerados e podem resultar em medidas disciplinares, incluindo a exclusão do clube.
        </p>
        <p>
          Mantenha as discussões focadas em temas literários, evitando compartilhar conteúdo inadequado como spam, propaganda ou links maliciosos. Nossa equipe monitora as interações para garantir um ambiente saudável para todos.
        </p>
      </section>

      <section class="policy-section">
        <div class="policy-icon">🔒</div>
        <h2>3. Privacidade dos Membros</h2>
        <p>
          Protegemos rigorosamente os dados pessoais de nossos membros. As informações fornecidas durante a inscrição são utilizadas exclusivamente para comunicação oficial do clube e não são compartilhadas com terceiros sem consentimento explícito.
        </p>
        <div class="highlight">
          <p>
            Você pode solicitar a exclusão de seus dados a qualquer momento através do e-mail privacidade@bookclub.com. Processaremos sua solicitação dentro de 7 dias úteis.
          </p>
        </div>
      </section>

      <section class="policy-section">
        <div class="policy-icon">©️</div>
        <h2>4. Direitos Autorais</h2>
        <p>
          Respeitamos integralmente os direitos autorais. Ao participar das discussões e compartilhar materiais, você concorda em não violar leis de propriedade intelectual. Citações devem ser breves e acompanhadas de referências adequadas.
        </p>
        <p>
          Incentivamos a criação de conteúdo original, como resenhas e análises críticas, desde que não infrinjam direitos de terceiros. Materiais protegidos não devem ser compartilhados integralmente sem autorização.
        </p>
      </section>

      <section class="policy-section">
        <div class="policy-icon">🎉</div>
        <h2>5. Eventos e Parcerias</h2>
        <p>
          Organizamos regularmente eventos exclusivos para membros, incluindo encontros com autores, workshops literários e clubes de leitura temáticos. A participação é gratuita, mas sujeita a lotação.
        </p>
        <div class="highlight">
          <p>
            Nossas parcerias com livrarias e editoras oferecem descontos especiais aos membros ativos. Para acessar esses benefícios, basta apresentar seu código de membro no momento da compra.
          </p>
        </div>
      </section>

      <section class="policy-section">
        <div class="policy-icon">🔄</div>
        <h2>6. Alterações nas Políticas</h2>
        <p>
          Reservamo-nos o direito de atualizar estas políticas periodicamente para melhor atender às necessidades da comunidade. Todas as alterações serão comunicadas com antecedência por e-mail e publicadas nesta página.
        </p>
        <p>
          A continuação da participação no clube após atualizações nas políticas implica na aceitação dos novos termos. Recomendamos a revisão periódica deste documento.
        </p>
      </section>
    </div>

    <footer>
      <p>Dúvidas sobre nossas políticas?</p>
      <a href="mailto:suporte@bookclub.com" class="contact-link">Fale com nossa equipe</a>
    </footer>
  </div>
</body>
</html>