<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto | Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variáveis CSS */
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --success: #4cc9f0;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.08);
            --shadow-lg: 0 10px 20px rgba(0,0,0,0.1), 0 6px 6px rgba(0,0,0,0.1);
            --shadow-xl: 0 15px 25px rgba(0,0,0,0.15), 0 5px 10px rgba(0,0,0,0.05);
        }

        /* Reset e Estilos Globais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', Roboto, sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        img {
            max-width: 65%;
            height: auto;
            object-fit: cover;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navbar Moderna */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            padding: 15px 5%;
            box-shadow: var(--shadow-sm);
            z-index: 1000;
            transition: var(--transition);
        }

        .navbar.scrolled {
            padding: 10px 5%;
            box-shadow: var(--shadow-md);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .logo-text {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 25px;
        }

        .nav-links a {
            font-weight: 500;
            position: relative;
            color: var(--dark);
            padding: 5px 0;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary);
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-icons i {
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .nav-icons i:hover {
            color: var(--secondary);
            transform: translateY(-3px);
        }

        .search-bar {
            position: relative;
            width: 300px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 30px;
            background: rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            padding-right: 40px;
        }

        .search-bar input:focus {
            outline: none;
            background: rgba(0, 0, 0, 0.08);
            box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.3);
        }

        .search-bar button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--secondary);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }

        /* Breadcrumb */
        .breadcrumb {
            padding: 30px 0;
            margin-top: 70px;
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: var(--gray);
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb span {
            margin: 0 5px;
            color: var(--gray);
        }

        /* Página de Produto */
        .product-page {
            padding: 40px 0;
        }

        .product-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .product-gallery {
            display: grid;
            grid-template-columns: 80px 1fr;
            gap: 15px;
        }

        .thumbnail-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            border: 1px solid #eee;
            border-radius: 5px;
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
        }

        .thumbnail:hover {
            border-color: var(--primary);
        }

        .thumbnail.active {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.3);
        }

        .main-image {
            width: 100%;
            height: 500px;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
        }

        .main-image img {
            max-height: 100%;
            object-fit: contain;
        }

        .product-info {
            position: sticky;
            top: 90px;
        }

        .product-title {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .product-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #ffc107;
        }

        .product-review-count {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .product-brand {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .product-price-container {
            margin: 25px 0;
            padding: 20px;
            background: rgba(67, 97, 238, 0.05);
            border-radius: 8px;
        }

        .current-price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
        }

        .old-price {
            font-size: 1.2rem;
            color: var(--gray);
            text-decoration: line-through;
            margin-left: 10px;
        }

        .discount-badge {
            display: inline-block;
            background: var(--secondary);
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-left: 10px;
        }

        .product-availability {
            color: #28a745;
            font-weight: 500;
            margin-top: 10px;
        }

        .product-actions {
            margin: 30px 0;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #ddd;
            background: none;
            font-size: 1.2rem;
            cursor: pointer;
            border-radius: 5px;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background: #f0f0f0;
        }

        .quantity-input {
            width: 60px;
            height: 40px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .add-to-cart {
            width: 100%;
            padding: 15px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .add-to-cart:hover {
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .wishlist-btn {
            width: 100%;
            padding: 15px;
            background: white;
            color: var(--dark);
            border: 1px solid #ddd;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .wishlist-btn:hover {
            background: #f8f9fa;
            border-color: var(--primary);
            color: var(--primary);
        }

        .product-delivery {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }

        .delivery-option {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .delivery-option i {
            color: var(--primary);
            font-size: 1.2rem;
        }

        .delivery-text strong {
            display: block;
            margin-bottom: 3px;
        }

        .delivery-text span {
            font-size: 0.9rem;
            color: var(--gray);
        }

        /* Product Tabs */
        .product-tabs {
            margin-top: 60px;
        }

        .tabs-header {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 30px;
        }

        .tab-btn {
            padding: 15px 25px;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            color: var(--gray);
        }

        .tab-btn.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        .tab-content {
            display: none;
            padding: 20px 0;
        }

        .tab-content.active {
            display: block;
        }

        .tab-content h3 {
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .tab-content p {
            margin-bottom: 15px;
            line-height: 1.8;
        }

        .tab-content ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .tab-content li {
            margin-bottom: 10px;
        }

        /* Related Products */
        .related-products {
            margin-top: 80px;
            padding: 40px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .section-title p {
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
        }

        .product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 30px;
    padding: 20px 0;
}

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .product-card-image {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .product-card-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: var(--transition);
        }

        .product-card:hover .product-card-image img {
            transform: scale(1.05);
        }

        .product-card-info {
            padding: 20px;
        }

        .product-card-title {
            font-weight: 600;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 3em;
        }

        .product-card-price {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .product-card-current-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
        }

        .product-card-old-price {
            font-size: 0.9rem;
            color: var(--gray);
            text-decoration: line-through;
        }

        .product-card-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .product-card-btn:hover {
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Newsletter */
        .newsletter {
            background: linear-gradient(135deg, #3a0ca3, #7209b7);
            color: white;
            padding: 60px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .newsletter::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
            animation: float 15s linear infinite;
        }

        .newsletter-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .newsletter p {
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter-form input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 30px 0 0 30px;
            font-size: 1rem;
        }

        .newsletter-form input:focus {
            outline: none;
        }

        .newsletter-form button {
            padding: 0 30px;
            background: var(--secondary);
            color: white;
            border: none;
            border-radius: 0 30px 30px 0;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-form button:hover {
            background: #ff0676;
        }

        /* Rodapé Moderno */
        .footer {
            background: var(--dark);
            color: white;
            padding: 80px 0 30px;
            position: relative;
        }

        .footer-wave {
            position: absolute;
            top: -100px;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="%23212529" opacity=".25"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" fill="%23212529" opacity=".5"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%23212529"/></svg>');
            background-size: cover;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-column h4 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--secondary);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            transition: var(--transition);
            display: inline-block;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .footer-social a:hover {
            background: var(--secondary);
            transform: translateY(-5px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
        }

        /* Responsividade */
        @media (max-width: 992px) {
            .product-container {
                grid-template-columns: 1fr;
            }
            
            .product-gallery {
                grid-template-columns: 1fr;
            }
            
            .thumbnail-list {
                flex-direction: row;
                order: 2;
                margin-top: 15px;
            }
            
            .nav-links {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-form input {
                border-radius: 30px;
                margin-bottom: 10px;
            }
            
            .newsletter-form button {
                border-radius: 30px;
                padding: 15px;
            }
            
            .tabs-header {
                overflow-x: auto;
                white-space: nowrap;
                padding-bottom: 10px;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 15px;
            }
            
            .logo-text {
                font-size: 1.2rem;
            }
            
            .search-bar {
                width: 200px;
            }
            
            .product-title {
                font-size: 1.5rem;
            }
            
            .current-price {
                font-size: 1.5rem;
            }
            
            .old-price {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar Moderna -->
    <nav class="navbar">
        <div class="logo">
            <img src="logo book.png" alt="Book Club Logo">
            <span class="logo-text">Book Club</span>
        </div>
        
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Pesquisar livros...">
            <button onclick="searchProducts()"><i class="fas fa-search"></i></button>
        </div>
        
        <ul class="nav-links">
            <li><a href="login.php">Login</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
        
        <div class="nav-icons">
            <a href="carrinho.php" class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count" id="cartCount">0</span>
            </a>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="container">
        <div class="breadcrumb">
            <a href="Book Club.php">Home</a>
            <span>/</span>
            <a href="#">Negócios</a>
            <span>/</span>
            <a href="#">Persuasão</a>
            <span>/</span>
            <span>Como Convencer Alguém em 90 Segundos</span>
        </div>
    </div>

    <!-- Página de Produto -->
    <section class="product-page">
        <div class="container">
            <div class="product-container">
                <!-- Galeria de Imagens -->
                <div class="product-gallery">
                    <div class="thumbnail-list">
                        <div class="thumbnail active" onclick="changeImage('a maquina.jpg')">
                            <img src="a maquina.jpg" alt="Capa do Livro">
                        </div>
                        <div class="thumbnail" onclick="changeImage('90s2.jpg')">
                            <img src="90s2.jpg" alt="Contra-capa do Livro">
                        </div>
                        <div class="thumbnail" onclick="changeImage('90s3.jpg')">
                            <img src="90s3.jpg" alt="Páginas internas">
                        </div>
                        <div class="thumbnail" onclick="changeImage('90s4.jpg')">
                            <img src="90s4.jpg" alt="Autor do Livro">
                        </div>
                    </div>
                    
                    <div class="main-image">
                        <img src="a maquina.jpg" alt="A Máquina Definitiva de Vendas" id="mainProductImage">
                    </div>
                </div>
                
                <!-- Informações do Produto -->
                <div class="product-info">
                    <h1 class="product-title">A Máquina Definitiva de Vendas</h1>
                    
                    <div class="product-meta">
                        <div class="product-rating">
                        <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="product-review-count">(42 avaliações)</span>
                        </div>
                        <span class="product-brand">Por Chet Holmes</span>
                    </div>
                    
                    <div class="product-price-container">
                        <span class="current-price">R$ 280,00</span>
                        <div class="product-availability">
                            <i class="fas fa-check-circle"></i> Disponível em estoque
                        </div>
                    </div>
                    
                    <div class="product-description">
                        <p>"A Máquina Definitiva de Vendas" é um guia prático e estratégico voltado para empreendedores, vendedores e gestores comerciais que desejam transformar seus processos de vendas em sistemas altamente previsíveis, escaláveis e lucrativos. Escrito por Chet Holmes, renomado consultor de negócios e especialista em vendas, o livro apresenta um modelo robusto baseado em disciplina, foco e execução consistente.</p>
                    </div>
                    
                    <div class="product-actions">
                        <div class="quantity-selector">
                            <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                            <input type="number" class="quantity-input" value="1" min="1" id="productQuantity">
                            <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                        </div>
                        
                        <button class="add-to-cart" onclick="addToCart()">
                            <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
                        </button>
                        
                        <button class="wishlist-btn" onclick="addToWishlist()">
                            <i class="far fa-heart"></i> Adicionar à Lista de Desejos
                        </button>
                    </div>
                    
                    <div class="product-delivery">
                        <div class="delivery-option">
                            <i class="fas fa-truck"></i>
                            <div class="delivery-text">
                                <strong>Entrega padrão</strong>
                                <span>Receba em 3 a 5 dias úteis</span>
                            </div>
                        </div>
                        
                        <div class="delivery-option">
                            <i class="fas fa-store"></i>
                            <div class="delivery-text">
                                <strong>Retirada em loja</strong>
                                <span>Disponível em 2 horas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Abas de Informações -->
            <div class="product-tabs">
                <div class="tabs-header">
                    <button class="tab-btn active" onclick="openTab('description')">Descrição</button>
                    <button class="tab-btn" onclick="openTab('details')">Detalhes</button>
                    <button class="tab-btn" onclick="openTab('reviews')">Avaliações</button>
                    <button class="tab-btn" onclick="openTab('shipping')">Frete & Devolução</button>
                </div>
                
                <div id="description" class="tab-content active">
                    <h3>Sobre este livro</h3>
                    <p>"A Máquina Definitiva de Vendas é mais do que um livro sobre vendas — é um manual estratégico para criar um sistema de vendas previsível, eficiente e escalável. Chet Holmes, autor renomado e consultor de grandes empresas como Warner Bros. e empresas da Fortune 500, ensina como transformar equipes medianas em máquinas de vendas de alta performance, através de disciplina, foco e melhorias constantes.<br></br>

Com base em décadas de experiência, Holmes apresenta métodos práticos para atrair os clientes certos, educar o mercado, criar autoridade e fechar mais negócios. Uma das estratégias centrais do livro é o conceito do “Dream 100”, que ensina como identificar e conquistar os clientes com maior potencial para seu negócio.<br></br>

O livro também mostra como o treinamento contínuo, o marketing de conteúdo e o gerenciamento eficaz do tempo são fatores decisivos para aumentar a produtividade e os lucros. Cada capítulo é repleto de dicas práticas, estudos de caso e táticas testadas em campo.<br></br>

Ideal para empreendedores, gestores comerciais, vendedores e profissionais de marketing, A Máquina Definitiva de Vendas é leitura obrigatória para quem quer escalar seus resultados com inteligência e consistência.</p>
                    
                    <p>O livro aborda:</p>
                    <ul>
                        <li>Ensina a construir um sistema de vendas eficiente e previsível</li>
                        <li>Destaca a importância da disciplina e treinamento contínuo</li>
                        <li>Apresenta o método Dream 100 para focar nos clientes mais valiosos</li>
                        <li>Mostra como usar marketing educativo para atrair e convencer</li>
                        <li>Ajuda a aumentar produtividade com foco e organização</li>
                        <li>Ensina a lidar com objeções e fechar mais vendas</li>
                        <li>Defende pequenas melhorias constantes em várias áreas para grandes resultados</li>
                    </ul>
                    
                </div>
                <div id="details" class="tab-content">
                    <h3>Detalhes do produto</h3>
                    <ul>
                        <li><strong>Autor:</strong> Chet Holmes</li>
                        <li><strong>Editora:</strong> Alta Books (1ª edição)</li>
                        <li><strong>Idioma:</strong> Português</li>
                        <li><strong>Encadernação:</strong> Brochura</li>
                        <li><strong>Número de páginas:</strong> 272</li>
                        <li><strong>ISBN-10:</strong> 8576085429</li>
                        <li><strong>ISBN-13:</strong> 8576085429</li>
                        <li><strong>Dimensões:</strong> 22,86 × 15,49 × 1,78 cm </li>
                        <li><strong>Peso:</strong> 272 g</li>
                        <li><strong>Data de publicação:</strong> 22 de outubro de 2014</li>
                    </ul>
                </div>
                
                <div id="reviews" class="tab-content">
                    <h3>Avaliações de clientes</h3>
                    <div class="review-summary">
                        <div class="overall-rating">
                            <span class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <span class="average-rating">4.5 de 5</span>
                            <span class="total-reviews">(128 avaliações)</span>
                        </div>
                        
                        <div class="rating-bars">
                            <div class="rating-bar">
                                <span>5 estrelas</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 65%;"></div>
                                </div>
                                <span>65%</span>
                            </div>
                            <div class="rating-bar">
                                <span>4 estrelas</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 20%;"></div>
                                </div>
                                <span>20%</span>
                            </div>
                            <div class="rating-bar">
                                <span>3 estrelas</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 8%;"></div>
                                </div>
                                <span>8%</span>
                            </div>
                            <div class="rating-bar">
                                <span>2 estrelas</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 4%;"></div>
                                </div>
                                <span>4%</span>
                            </div>
                            <div class="rating-bar">
                                <span>1 estrela</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 3%;"></div>
                                </div>
                                <span>3%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="customer-reviews">
                        <div class="review">
                            <div class="review-header">
                                <span class="review-author">Chet Holmes.</span>
                                <span class="review-date">15/05/2023</span>
                                <span class="review-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                            <div class="review-title">Transformador!</div>
                            <div class="review-content">
                                <p>Este livro mudou completamente minha abordagem em reuniões de negócios. As técnicas são práticas e realmente funcionam. Em menos de uma semana já estava vendo resultados nas minhas interações profissionais.</p>
                            </div>
                        </div>
                        
                        <div class="review">
                            <div class="review-header">
                                <span class="review-author">Ana P.</span>
                                <span class="review-date">02/04/2023</span>
                                <span class="review-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                            </div>
                            <div class="review-title">Bom, mas poderia ser mais profundo</div>
                            <div class="review-content">
                                <p>O livro traz boas ideias e conceitos úteis, mas senti falta de mais exemplos práticos e estudos de caso. Mesmo assim, valeu a pena pela perspectiva diferente sobre comunicação.</p>
                            </div>
                        </div>
                    </div>
                    
                    <button class="see-all-reviews">Ver todas as avaliações</button>
                </div>
                
                <div id="shipping" class="tab-content">
                    <h3>Opções de frete e devolução</h3>
                    <h4>Frete</h4>
                    <p>Oferecemos várias opções de envio para atender às suas necessidades. O prazo de entrega começa a contar a partir da confirmação do pagamento.</p>
                    
                    <ul>
                        <li><strong>Entrega Padrão:</strong> 3-5 dias úteis - R$ 9,90</li>
                        <li><strong>Entrega Expressa:</strong> 1-2 dias úteis - R$ 19,90</li>
                        <li><strong>Retirada em Loja:</strong> Disponível em 2 horas - Grátis</li>
                    </ul>
                    
                    <h4>Devolução</h4>
                    <p>Se você não estiver satisfeito com sua compra, pode devolver o produto em até 7 dias após o recebimento para obter um reembolso total. O produto deve estar em perfeitas condições, com todos os acessórios e embalagem originais.</p>
                    
                    <p>Para iniciar uma devolução, entre em contato com nosso atendimento ao cliente ou solicite a devolução diretamente em sua conta no site.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Produtos Relacionados -->
    <section class="related-products">
        <div class="container">
            <div class="section-title">
                <h2>Quem comprou este livro também se interessou por</h2>
                <p>Descubra outros títulos que podem te interessar</p>
            </div>
            
            <div class="product-grid">
                <!-- Produto 1 -->
                <div class="product-card">
                    <div class="product-card-image">
                        <a href="produto 2.php">
                            <img src="As-Armas-da-Persuas_o.jpg" alt="As Armas da Persuasão">
                        </a>
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">As Armas da Persuasão</h3>
                        <div class="product-card-price">
                            <span class="product-card-current-price">R$ 87,33</span>
                        </div>
                        <button class="product-card-btn" onclick="addToCartRelated('As Armas da Persuasão', 87.33)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 2 -->
                <div class="product-card">
                    <div class="product-card-image">
                        <a href="produto 1.php">
                            <img src="90s.jpg" alt="Como Convencer Alguém em 90 Segundos">
                        </a>
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">Como Convencer Alguém em 90 Segundos</h3>
                        <div class="product-card-price">
                            <span class="product-card-current-price">R$ 33,17</span>
                            <span class="product-card-old-price">R$  39,90</span>
                        </div>
                        <button class="product-card-btn" onclick="addToCartRelated('Como Convencer Alguém em 90 Segundos', 33.17)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 3 -->
                <div class="product-card">
                    <div class="product-card-image">
                        <a href="produto 6.php">
                            <img src="o poder do habito.jpg" alt="O Poder do Hábito">
                        </a>
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">O Poder do Hábito</h3>
                        <div class="product-card-price">
                            <span class="product-card-current-price">R$ 44,90</span>
                        </div>
                        <button class="product-card-btn" onclick="addToCartRelated('O Poder do Hábito', 44.90)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 4 -->
                <div class="product-card">
                    <div class="product-card-image">
                        <a href="produto.php">
                            <img src="mindset.jpg" alt="Mindset">
                        </a>
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">Mindset</h3>
                        <div class="product-card-price">
                            <span class="product-card-current-price">R$ 39,90</span>
                        </div>
                        <button class="product-card-btn" onclick="addToCartRelated('Mindset', 39.90)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h3>Assine nossa newsletter</h3>
                <p>Receba as últimas novidades, promoções e dicas de leitura diretamente no seu e-mail.</p>
                <form class="newsletter-form" onsubmit="subscribeNewsletter(event)">
                    <input type="email" placeholder="Seu melhor e-mail" required>
                    <button type="submit">Assinar</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Rodapé Moderno -->
    <footer class="footer">
        <div class="footer-wave"></div>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h4>ATENDIMENTO</h4>
                    <ul class="footer-links">
                        <li><a href="Central de Ajuda.php">Central de Ajuda</a></li>
                        <li><a href="como comprar.php">Como Comprar</a></li>
                        <li><a href="formas de pagamento.php">Métodos de Pagamento</a></li>
                        <li><a href="Garantia book club.php">Garantia Book Club</a></li>
                        <li><a href="Devolução e Reembolso.php">Devolução e Reembolso</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>SOBRE NÓS</h4>
                    <ul class="footer-links">
                        <li><a href="Sobre nós.php">Sobre Nós</a></li>
                        <li><a href="Politicas de privacidade.php">Política de Privacidade</a></li>
                        <li><a href="Programa de afiliados.php">Programa de Afiliados</a></li>
                        <li><a href="Ofertas.php">Ofertas</a></li>
                        <li><a href="Book club BLOG.php">Book Club BLOG</a></li>
                        <li><a href="Imprensa.php">Imprensa</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>VENDAS</h4>
                    <ul class="footer-links">
                        <li><a href="Criar E-book.php">Crie seu E-book</a></li>
                        <li><a href="vender livro usado.php">Vender livro usado</a></li>
                        <li><a href="E-book com IA.php">E-book com IA</a></li>
                        <li><a href="audio-book com IA.php">Audio-book com IA</a></li>
                    </ul>
                    
                    <div class="footer-social">
                        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Book Club. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Atualizar contador do carrinho
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cartCount').textContent = totalItems;
        }

        // Adicionar ao carrinho
        function addToCart() {
            const name = "Gatilhos Mentais";
            const price = 60.70;
            const quantity = parseInt(document.getElementById('productQuantity').value);
            
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item => item.name === name);
            
            if (existingProduct) {
                existingProduct.quantity += quantity;
            } else {
                cart.push({ name, price, quantity });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            
            showNotification(`${name} foi adicionado ao carrinho!`, 'success');
        }

        // Adicionar produto relacionado ao carrinho
        function addToCartRelated(name, price) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item => item.name === name);
            
            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push({ name, price, quantity: 1 });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            
            showNotification(`${name} foi adicionado ao carrinho!`, 'success');
        }

        // Adicionar à lista de desejos
        function addToWishlist() {
            const name = "Como Convencer Alguém em 90 Segundos";
            const price = 33.17;
            
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            const existingProduct = wishlist.find(item => item.name === name);
            
            if (!existingProduct) {
                wishlist.push({ name, price });
                localStorage.setItem('wishlist', JSON.stringify(wishlist));
                showNotification(`${name} foi adicionado à sua lista de desejos!`, 'success');
            } else {
                showNotification('Este produto já está na sua lista de desejos!', 'info');
            }
        }

        // Mostrar notificação
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.backgroundColor = type === 'success' ? '#4BB543' : '#2196F3';
            notification.style.color = 'white';
            notification.style.padding = '15px 25px';
            notification.style.borderRadius = '5px';
            notification.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
            notification.style.zIndex = '1000';
            notification.style.animation = 'slideIn 0.5s, fadeOut 0.5s 2.5s forwards';
            notification.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i> ${message}`;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Alterar quantidade
        function increaseQuantity() {
            const quantityInput = document.getElementById('productQuantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('productQuantity');
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }

        // Alterar imagem principal
        function changeImage(src) {
            document.getElementById('mainProductImage').src = src;
            
            // Atualizar thumbnails ativas
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            event.currentTarget.classList.add('active');
        }

        // Abas de informações
        function openTab(tabId) {
            // Esconder todos os conteúdos
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Desativar todos os botões
            const tabButtons = document.querySelectorAll('.tab-btn');
            tabButtons.forEach(button => button.classList.remove('active'));
            
            // Mostrar conteúdo selecionado
            document.getElementById(tabId).classList.add('active');
            
            // Ativar botão selecionado
            event.currentTarget.classList.add('active');
        }

        // Assinar newsletter
        function subscribeNewsletter(event) {
            event.preventDefault();
            const email = event.target.querySelector('input').value;
            
            // Simular armazenamento (em um caso real, seria uma chamada AJAX)
            let subscribers = JSON.parse(localStorage.getItem('newsletterSubscribers')) || [];
            if (!subscribers.includes(email)) {
                subscribers.push(email);
                localStorage.setItem('newsletterSubscribers', JSON.stringify(subscribers));
                showNotification('Obrigado por assinar nossa newsletter!', 'success');
            } else {
                showNotification('Este e-mail já está cadastrado!', 'info');
            }
            
            event.target.reset();
        }

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Atualizar contador ao carregar a página
        document.addEventListener('DOMContentLoaded', updateCartCount);

        // Adicionar animação CSS dinamicamente
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes fadeOut {
                from { opacity: 1; }
                to { opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>