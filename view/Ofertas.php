<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ofertas - Book Club</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #6C5CE7;
      --primary-dark: #4B44B2;
      --secondary: #00CEFF;
      --accent: #FF7675;
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
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    header {
      text-align: center;
      padding: 60px 0 40px;
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

    .books-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 30px;
      padding: 30px 0 60px;
    }

    .book-card {
      background: var(--white);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: var(--transition);
      position: relative;
    }

    .book-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .book-badge {
      position: absolute;
      top: 15px;
      right: 15px;
      background: var(--accent);
      color: white;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      z-index: 2;
    }

    .book-image {
      height: 300px;
      background-size: cover;
      background-position: center;
      position: relative;
    }

    .book-image::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 50%;
      background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
    }

    .book-info {
      padding: 20px;
    }

    .book-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      margin-bottom: 5px;
      color: var(--primary-dark);
      font-weight: 600;
    }

    .book-author {
      color: var(--text-light);
      margin-bottom: 15px;
      font-size: 0.9rem;
    }

    .book-price {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .current-price {
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--accent);
      margin-right: 10px;
    }

    .original-price {
      font-size: 1rem;
      color: var(--text-light);
      text-decoration: line-through;
    }

    .add-to-cart {
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
    }

    .add-to-cart:hover {
      opacity: 0.9;
      transform: translateY(-2px);
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

    .book-card {
      animation: fadeIn 0.6s ease-out forwards;
      opacity: 0;
    }

    .book-card:nth-child(1) { animation-delay: 0.1s; }
    .book-card:nth-child(2) { animation-delay: 0.2s; }
    .book-card:nth-child(3) { animation-delay: 0.3s; }
    .book-card:nth-child(4) { animation-delay: 0.4s; }
    .book-card:nth-child(5) { animation-delay: 0.5s; }
    .book-card:nth-child(6) { animation-delay: 0.6s; }

    /* Responsive */
    @media (max-width: 768px) {
      h1 {
        font-size: 2.2rem;
      }
      
      .books-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
      }
      
      .book-image {
        height: 250px;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.8rem;
      }
      
      .subtitle {
        font-size: 1rem;
      }
      
      .books-grid {
        grid-template-columns: 1fr;
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
      <h1>Ofertas Especiais</h1>
      <p class="subtitle">Descubra nossos melhores descontos em livros selecionados</p>
    </header>

    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Busque por título, autor ou gênero..." oninput="filterBooks()">
    </div>

    <div class="books-grid" id="bookList">
      <div class="book-card" data-title="O Senhor dos Anéis" data-author="J.R.R. Tolkien" data-genre="Fantasia">
        <div class="book-badge">-37%</div>
        <div class="book-image" style="background-image: url('https://m.media-amazon.com/images/I/51EstVXM1UL._SY425_.jpg');"></div>
        <div class="book-info">
          <h3 class="book-title">O Senhor dos Anéis</h3>
          <p class="book-author">J.R.R. Tolkien</p>
          <div class="book-price">
            <span class="current-price">R$ 49,90</span>
            <span class="original-price">R$ 79,90</span>
          </div>
          <button class="add-to-cart" onclick="addToCart('O Senhor dos Anéis', 49.90)">Adicionar ao Carrinho</button>
        </div>
      </div>

      <div class="book-card" data-title="Harry Potter e a Pedra Filosofal" data-author="J.K. Rowling" data-genre="Fantasia">
        <div class="book-badge">-33%</div>
        <div class="book-image" style="background-image: url('https://m.media-amazon.com/images/I/51UoqRAxwEL._SY425_.jpg');"></div>
        <div class="book-info">
          <h3 class="book-title">Harry Potter e a Pedra Filosofal</h3>
          <p class="book-author">J.K. Rowling</p>
          <div class="book-price">
            <span class="current-price">R$ 39,90</span>
            <span class="original-price">R$ 59,90</span>
          </div>
          <button class="add-to-cart" onclick="addToCart('Harry Potter e a Pedra Filosofal', 39.90)">Adicionar ao Carrinho</button>
        </div>
      </div>

      <div class="book-card" data-title="1984" data-author="George Orwell" data-genre="Ficção Distópica">
        <div class="book-badge">-34%</div>
        <div class="book-image" style="background-image: url('https://m.media-amazon.com/images/I/71kxa1-0mfL._SY425_.jpg');"></div>
        <div class="book-info">
          <h3 class="book-title">1984</h3>
          <p class="book-author">George Orwell</p>
          <div class="book-price">
            <span class="current-price">R$ 29,90</span>
            <span class="original-price">R$ 45,00</span>
          </div>
          <button class="add-to-cart" onclick="addToCart('1984', 29.90)">Adicionar ao Carrinho</button>
        </div>
      </div>

      <div class="book-card" data-title="Dom Quixote" data-author="Miguel de Cervantes" data-genre="Clássico">
        <div class="book-badge">-33%</div>
        <div class="book-image" style="background-image: url('https://m.media-amazon.com/images/I/71YHDP+3k+L._SY425_.jpg');"></div>
        <div class="book-info">
          <h3 class="book-title">Dom Quixote</h3>
          <p class="book-author">Miguel de Cervantes</p>
          <div class="book-price">
            <span class="current-price">R$ 59,90</span>
            <span class="original-price">R$ 89,90</span>
          </div>
          <button class="add-to-cart" onclick="addToCart('Dom Quixote', 59.90)">Adicionar ao Carrinho</button>
        </div>
      </div>

      <div class="book-card" data-title="Orgulho e Preconceito" data-author="Jane Austen" data-genre="Romance">
        <div class="book-badge">-30%</div>
        <div class="book-image" style="background-image: url('https://m.media-amazon.com/images/I/71Q1tPupKjL._SY425_.jpg');"></div>
        <div class="book-info">
          <h3 class="book-title">Orgulho e Preconceito</h3>
          <p class="book-author">Jane Austen</p>
          <div class="book-price">
            <span class="current-price">R$ 34,90</span>
            <span class="original-price">R$ 49,90</span>
          </div>
          <button class="add-to-cart" onclick="addToCart('Orgulho e Preconceito', 34.90)">Adicionar ao Carrinho</button>
        </div>
      </div>

      <div class="book-card" data-title="O Pequeno Príncipe" data-author="Antoine de Saint-Exupéry" data-genre="Infantil">
        <div class="book-badge">-25%</div>
        <div class="book-image" style="background-image: url('https://m.media-amazon.com/images/I/71I6+kVxbLL._SY425_.jpg');"></div>
        <div class="book-info">
          <h3 class="book-title">O Pequeno Príncipe</h3>
          <p class="book-author">Antoine de Saint-Exupéry</p>
          <div class="book-price">
            <span class="current-price">R$ 22,90</span>
            <span class="original-price">R$ 29,90</span>
          </div>
          <button class="add-to-cart" onclick="addToCart('O Pequeno Príncipe', 22.90)">Adicionar ao Carrinho</button>
        </div>
      </div>
    </div>

    <footer>
      <p>Precisa de ajuda com sua compra?</p>
      <a href="mailto:vendas@bookclub.com" class="contact-link">Fale com nosso time</a>
    </footer>
  </div>

  <script>
    function filterBooks() {
      const searchTerm = document.getElementById('searchInput').value.toLowerCase();
      const books = document.querySelectorAll('.book-card');
      
      books.forEach(book => {
        const title = book.getAttribute('data-title').toLowerCase();
        const author = book.getAttribute('data-author').toLowerCase();
        const genre = book.getAttribute('data-genre').toLowerCase();
        
        if (title.includes(searchTerm) || author.includes(searchTerm) || genre.includes(searchTerm)) {
          book.style.display = 'block';
        } else {
          book.style.display = 'none';
        }
      });
    }

    function addToCart(title, price) {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      const existingItem = cart.find(item => item.title === title);
      
      if (existingItem) {
        existingItem.quantity += 1;
      } else {
        cart.push({
          title: title,
          price: price,
          quantity: 1
        });
      }
      
      localStorage.setItem('cart', JSON.stringify(cart));
      
      // Feedback visual
      const button = event.target;
      button.textContent = '✔ Adicionado!';
      button.style.backgroundColor = '#00B894';
      setTimeout(() => {
        button.textContent = 'Adicionar ao Carrinho';
        button.style.backgroundColor = '';
      }, 2000);
    }
  </script>
</body>
</html>