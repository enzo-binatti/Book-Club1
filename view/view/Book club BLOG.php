<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Book Club</title>
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
      --white: #FFFFFF;
      --bg: #F9F9FF;
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
    }

    .container {
      max-width: 900px;
      margin: 0 auto;
      padding: 0 20px;
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
      margin-bottom: 15px;
      line-height: 1.2;
    }

    .subtitle {
      font-size: 1.2rem;
      color: var(--text-light);
      max-width: 700px;
      margin: 0 auto;
    }

    .search-bar {
      margin: 30px auto;
      max-width: 600px;
      position: relative;
    }

    .search-bar input {
      width: 100%;
      padding: 15px 20px;
      border: none;
      border-radius: 50px;
      font-size: 1rem;
      box-shadow: var(--shadow);
      transition: var(--transition);
      padding-left: 50px;
    }

    .search-bar input:focus {
      outline: none;
      box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.2);
    }

    .search-bar::before {
      content: '🔍';
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.2rem;
    }

    .blog-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 30px;
      padding: 40px 0 60px;
    }

    .blog-card {
      background: var(--white);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: var(--transition);
    }

    .blog-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .blog-image {
      height: 200px;
      background-size: cover;
      background-position: center;
      position: relative;
    }

    .blog-image::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 50%;
      background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
    }

    .blog-content {
      padding: 25px;
    }

    .blog-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: var(--primary-dark);
    }

    .blog-meta {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      color: var(--text-light);
      font-size: 0.9rem;
    }

    .blog-author {
      font-weight: 600;
      color: var(--primary);
      margin-right: 10px;
    }

    .blog-date {
      opacity: 0.8;
    }

    .blog-excerpt {
      color: var(--text-light);
      margin-bottom: 20px;
    }

    .read-more {
      display: inline-block;
      padding: 12px 25px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      text-decoration: none;
      border-radius: 50px;
      font-weight: 600;
      transition: var(--transition);
      box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
    }

    .read-more:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(108, 92, 231, 0.4);
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

    .blog-card {
      animation: fadeIn 0.6s ease-out forwards;
      opacity: 0;
    }

    .blog-card:nth-child(1) { animation-delay: 0.1s; }
    .blog-card:nth-child(2) { animation-delay: 0.2s; }
    .blog-card:nth-child(3) { animation-delay: 0.3s; }
    .blog-card:nth-child(4) { animation-delay: 0.4s; }

    /* Responsive */
    @media (max-width: 768px) {
      h1 {
        font-size: 2.2rem;
      }
      
      .blog-grid {
        gap: 25px;
        padding: 30px 0;
      }
      
      .blog-content {
        padding: 20px;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.8rem;
      }
      
      .subtitle {
        font-size: 1rem;
      }
      
      .contact-link {
        padding: 10px 25px;
      }
      
      .blog-image {
        height: 180px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Blog do Book Club</h1>
      <p class="subtitle">Descubra artigos, resenhas e novidades do mundo literário</p>
    </header>

    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Busque por título, autor ou assunto..." oninput="filterPosts()">
    </div>

    <div class="blog-grid" id="postList">
      <div class="blog-card" data-title="O Peso das Palavras" data-author="Ana Silva" data-tags="literatura análise">
        <div class="blog-image" style="background-image: url('https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
        <div class="blog-content">
          <h3 class="blog-title">O Peso das Palavras</h3>
          <div class="blog-meta">
            <span class="blog-author">Por Ana Silva</span>
            <span class="blog-date">20/10/2025</span>
          </div>
          <p class="blog-excerpt">
            Nesta postagem, exploramos como as palavras podem transformar emoções e conectar pessoas através da literatura. Uma análise profunda do poder da linguagem na construção de mundos imaginários.
          </p>
          <a href="#" class="read-more" onclick="readMore('O Peso das Palavras')">Continuar Lendo</a>
        </div>
      </div>

      <div class="blog-card" data-title="Dicas para Ler Mais em 2025" data-author="João Almeida" data-tags="produtividade hábitos">
        <div class="blog-image" style="background-image: url('https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
        <div class="blog-content">
          <h3 class="blog-title">Dicas para Ler Mais em 2025</h3>
          <div class="blog-meta">
            <span class="blog-author">Por João Almeida</span>
            <span class="blog-date">15/10/2025</span>
          </div>
          <p class="blog-excerpt">
            Descubra estratégias práticas para incorporar mais leitura na sua rotina diária. Métodos comprovados para aumentar seu ritmo de leitura sem perder o prazer da experiência literária.
          </p>
          <a href="#" class="read-more" onclick="readMore('Dicas para Ler Mais em 2025')">Continuar Lendo</a>
        </div>
      </div>

      <div class="blog-card" data-title="Resenha: O Senhor dos Anéis" data-author="Mariana Costa" data-tags="resenha fantasia">
        <div class="blog-image" style="background-image: url('https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
        <div class="blog-content">
          <h3 class="blog-title">Resenha: O Senhor dos Anéis</h3>
          <div class="blog-meta">
            <span class="blog-author">Por Mariana Costa</span>
            <span class="blog-date">10/10/2025</span>
          </div>
          <p class="blog-excerpt">
            Uma análise crítica da obra-prima de J.R.R. Tolkien e seu impacto na cultura pop. Exploramos os temas profundos por trás da jornada épica pela Terra-média e sua relevância atual.
          </p>
          <a href="#" class="read-more" onclick="readMore('Resenha: O Senhor dos Anéis')">Continuar Lendo</a>
        </div>
      </div>

      <div class="blog-card" data-title="Eventos Literários de Novembro" data-author="Equipe Book Club" data-tags="eventos comunidade">
        <div class="blog-image" style="background-image: url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
        <div class="blog-content">
          <h3 class="blog-title">Eventos Literários de Novembro</h3>
          <div class="blog-meta">
            <span class="blog-author">Por Equipe Book Club</span>
            <span class="blog-date">05/10/2025</span>
          </div>
          <p class="blog-excerpt">
            Confira os eventos literários que acontecerão em novembro e participe da comunidade! Desde encontros com autores até clubes de leitura temáticos, temos opções para todos os gostos.
          </p>
          <a href="#" class="read-more" onclick="readMore('Eventos Literários de Novembro')">Continuar Lendo</a>
        </div>
      </div>
    </div>

    <footer>
      <p>Quer contribuir com nosso blog?</p>
      <a href="mailto:blog@bookclub.com" class="contact-link">Envie seu artigo</a>
    </footer>
  </div>

  <script>
    function filterPosts() {
      const searchTerm = document.getElementById('searchInput').value.toLowerCase();
      const posts = document.querySelectorAll('.blog-card');
      
      posts.forEach(post => {
        const title = post.getAttribute('data-title').toLowerCase();
        const author = post.getAttribute('data-author').toLowerCase();
        const tags = post.getAttribute('data-tags').toLowerCase();
        
        if (title.includes(searchTerm) || author.includes(searchTerm) || tags.includes(searchTerm)) {
          post.style.display = 'block';
        } else {
          post.style.display = 'none';
        }
      });
    }

    function readMore(title) {
      // Em uma implementação real, isso redirecionaria para a página do post
      alert(`Você selecionou o post: "${title}"\n\nEm um site real, você seria redirecionado para a página completa do artigo.`);
      return false; // Previne o comportamento padrão do link
    }
  </script>
</body>
</html>