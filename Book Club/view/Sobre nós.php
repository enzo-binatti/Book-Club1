<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre Nós | Book Club</title>
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
      font-size: 3.5rem;
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

    .about-content {
      display: grid;
      grid-template-columns: 1fr;
      gap: 40px;
      padding: 60px 0;
    }

    .section {
      background: var(--white);
      border-radius: 16px;
      padding: 40px;
      box-shadow: var(--shadow);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }

    .section:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 5px;
      height: 100%;
      background: linear-gradient(to bottom, var(--primary), var(--secondary));
    }

    h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 600;
      color: var(--primary-dark);
      margin-bottom: 20px;
      position: relative;
      display: inline-block;
    }

    h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      width: 50px;
      height: 3px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      border-radius: 3px;
    }

    p {
      color: var(--text-light);
      margin-bottom: 20px;
      font-size: 1.05rem;
    }

    .values-list {
      list-style: none;
      margin-top: 20px;
    }

    .values-list li {
      position: relative;
      padding-left: 30px;
      margin-bottom: 15px;
      color: var(--text-light);
      font-size: 1.05rem;
    }

    .values-list li::before {
      content: '✓';
      position: absolute;
      left: 0;
      color: var(--primary);
      font-weight: bold;
    }

    .values-list li strong {
      color: var(--primary-dark);
    }

    footer {
      text-align: center;
      padding: 40px 0;
      margin-top: 40px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--white);
      border-radius: 16px 16px 0 0;
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

    .book-icon {
      position: absolute;
      opacity: 0.03;
      z-index: -1;
    }

    .book-icon-1 {
      top: 10%;
      right: 5%;
      font-size: 15rem;
      color: var(--primary);
    }

    .book-icon-2 {
      bottom: 10%;
      left: 5%;
      font-size: 12rem;
      color: var(--secondary);
    }

    /* Animations */
    @keyframes float {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-20px);
      }
    }

    .floating {
      animation: float 6s ease-in-out infinite;
    }

    /* Responsive */
    @media (max-width: 768px) {
      h1 {
        font-size: 2.5rem;
      }
      
      h2 {
        font-size: 1.6rem;
      }
      
      .section {
        padding: 30px;
      }
      
      .about-content {
        gap: 30px;
        padding: 40px 0;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 2rem;
      }
      
      .subtitle {
        font-size: 1rem;
      }
      
      .section {
        padding: 25px 20px;
      }
      
      .contact-link {
        padding: 10px 25px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Sobre o Book Club</h1>
      <p class="subtitle">Descubra nossa paixão por literatura e a comunidade que construímos juntos</p>
    </header>

    <div class="about-content">
      <section class="section floating">
        <h2>Nossa Missão</h2>
        <p>
          No Book Club, nossa missão é transformar a experiência de leitura em uma jornada compartilhada. 
          Conectamos mentes curiosas através da magia das palavras, criando um espaço onde cada história 
          ganha vida através da troca de ideias e perspectivas.
        </p>
      </section>

      <section class="section floating" style="animation-delay: 0.5s;">
        <h2>Nossa Visão</h2>
        <p>
          Aspiramos ser mais que um clube do livro - queremos ser um movimento cultural que inspire 
          novas gerações de leitores. Visualizamos um mundo onde a literatura seja acessível a todos, 
          servindo como ponte entre culturas e catalisadora de mudanças positivas.
        </p>
      </section>

      <section class="section floating" style="animation-delay: 1s;">
        <h2>Nossos Valores</h2>
        <ul class="values-list">
          <li><strong>Comunidade:</strong> Cultivamos conexões significativas entre leitores de todas as origens.</li>
          <li><strong>Diversidade:</strong> Celebramos vozes plurais e histórias que representam a riqueza humana.</li>
          <li><strong>Excelência:</strong> Buscamos sempre o melhor em nossas seleções e discussões literárias.</li>
          <li><strong>Inovação:</strong> Reimaginamos constantemente a experiência do clube do livro para o século XXI.</li>
          <li><strong>Acessibilidade:</strong> Trabalhamos para remover barreiras ao mundo da leitura.</li>
        </ul>
      </section>

      <section class="section floating" style="animation-delay: 1.5s;">
        <h2>Por Que Participar?</h2>
        <p>
          Ao se juntar ao Book Club, você desbloqueia uma experiência de leitura enriquecida:
        </p>
        <ul class="values-list">
          <li><strong>Curadoria especializada:</strong> Receba recomendações sob medida para seu gosto literário.</li>
          <li><strong>Clubes temáticos:</strong> Participe de grupos focados em seus gêneros favoritos.</li>
          <li><strong>Encontros com autores:</strong> Conversas íntimas com escritores consagrados e emergentes.</li>
          <li><strong>Eventos exclusivos:</strong> Festivais literários, noites de autógrafos e workshops criativos.</li>
          <li><strong>Benefícios:</strong> Descontos em livrarias parceiras e acesso antecipado a lançamentos.</li>
        </ul>
      </section>
    </div>

    <footer>
      <p>Pronto para começar sua jornada literária conosco?</p>
      <a href="mailto:contato@bookclub.com" class="contact-link">Entre em Contato</a>
    </footer>

    <div class="book-icon book-icon-1">📚</div>
    <div class="book-icon book-icon-2">✨</div>
  </div>
</body>
</html>