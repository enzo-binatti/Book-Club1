<?php
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
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
            max-width: 100%;
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

        /* Banner Hero */
        .hero {
            margin-top: 70px;
            height: 500px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==');
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .hero-btn {
            display: inline-block;
            padding: 12px 30px;
            background: white;
            color: var(--primary);
            border-radius: 30px;
            font-weight: 600;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            color: var(--primary-dark);
        }

        .hero-image {
            position: absolute;
            right: 5%;
            bottom: 0;
            width: 40%;
            max-width: 500px;
            filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.3));
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* Seção de Destaques */
        .featured {
            padding: 80px 0;
            background: white;
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

        /* Galeria de Produtos Moderna */
        .product-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            padding: 20px 0;
        }

        .product-item {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: relative;
        }

        .product-item.hidden {
            display: none;
        }

        .product-item:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--secondary);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }

        .product-image {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: var(--transition);
        }

        .product-item:hover .product-image img {
            transform: scale(1.05);
        }

        .product-actions {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            opacity: 0;
            transform: translateY(10px);
            transition: var(--transition);
        }

        .product-item:hover .product-actions {
            opacity: 1;
            transform: translateY(0);
        }

        .product-action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
            color: var(--dark);
            transition: var(--transition);
        }

        .product-action-btn:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }

        .product-info {
            padding: 20px;
        }

        .product-category {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .product-title {
            font-weight: 600;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-rating {
            color: #ffc107;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .current-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
        }

        .old-price {
            font-size: 0.9rem;
            color: var(--gray);
            text-decoration: line-through;
        }

        .add-to-cart {
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

        .add-to-cart:hover {
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
            .hero {
                height: auto;
                padding: 100px 0;
                text-align: center;
            }
            
            .hero-content {
                max-width: 100%;
                padding: 0 20px;
            }
            
            .hero-image {
                position: relative;
                right: auto;
                width: 80%;
                margin: 40px auto 0;
            }
            
            .nav-links {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .product-gallery {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            }
            
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
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .hero p {
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
            <li><a href="<?php echo generateLink('login'); ?>">Login</a></li>
            <li><a href="<?php echo generateLink('cadastro'); ?>">Cadastro</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
        
        <div class="nav-icons">
            <a href="<?php echo generateLink('carrinho'); ?>" class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count" id="cartCount">0</span>
            </a>
        </div>
    </nav>

    <!-- Banner Hero -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Descubra seu próximo livro favorito</h1>
                <p>Milhares de títulos para expandir seus horizontes. Encontre inspiração, conhecimento e entretenimento em nossa coleção cuidadosamente selecionada.</p>
                <a href="#products" class="hero-btn">Explorar Livros</a>
            </div>
        </div>
    </section>

    <!-- Seção de Produtos -->
     
    <section class="featured" id="products">
        <div class="container">
            <div class="section-title">
                <h2>Nossos Best-sellers</h2>
                <p>Os livros mais amados pelos nossos leitores</p>
            </div>
            
            <div class="product-gallery" id="productGallery">
                <!-- Produto 1 -->
                <div class="product-item" data-name="Como Convencer Alguém em 90 Segundos" data-price="33.17">
                    <span class="product-badge">Mais vendido</span>
                    <div class="product-image">
                        <a href="produto.php">
                            <img src="90s.jpg" alt="Como Convencer Alguém em 90 Segundos">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Negócios</span>
                        <h3 class="product-title"><a href="produto.html">Como Convencer Alguém em 90 Segundos</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(128)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 33,17</span>
                            <span class="old-price">R$ 39,90</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 2 -->
                <div class="product-item" data-name="As Armas da Persuasão" data-price="87.33">
                    <div class="product-image">
                        <a href="produto.php">
                            <img src="As-Armas-da-Persuas_o.jpg" alt="As Armas da Persuasão">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Psicologia</span>
                        <h3 class="product-title"><a href="produto.html">As Armas da Persuasão</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(96)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 87,33</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 3 -->
                <div class="product-item" data-name="Gatilhos Mentais" data-price="60.70">
                    <span class="product-badge">Oferta</span>
                    <div class="product-image">
                        <a href="produto.php">
                            <img src="gatilhos mentais.jpg" alt="Gatilhos Mentais">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Marketing</span>
                        <h3 class="product-title"><a href="produto.php">Gatilhos Mentais</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(215)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 60,70</span>
                            <span class="old-price">R$ 79,90</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 4 -->
                <div class="product-item" data-name="A Máquina Definitiva de Vendas" data-price="280.00">
                    <div class="product-image">
                        <a href="produto.php">
                            <img src="a maquina.jpg" alt="A Máquina Definitiva de Vendas">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Vendas</span>
                        <h3 class="product-title"><a href="produto.html">A Máquina Definitiva de Vendas</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(42)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 280,00</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 5 -->
                <div class="product-item" data-name="A Arte Da Guerra" data-price="49.90">
                    <span class="product-badge">Clássico</span>
                    <div class="product-image">
                        <a href="produto.html">
                            <img src="a arte da guerra.webp" alt="A Arte Da Guerra">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Estratégia</span>
                        <h3 class="product-title"><a href="produto.html">A Arte Da Guerra</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(378)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 49,90</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 6 -->
                <div class="product-item" data-name="O Poder do Hábito" data-price="44.90">
                    <div class="product-image">
                        <a href="produto.php">
                            <img src="o poder do habito.jpg" alt="O Poder do Hábito">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Autoajuda</span>
                        <h3 class="product-title"><a href="produto.html">O Poder do Hábito</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(187)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 44,90</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 7 -->
                <div class="product-item" data-name="Mindset" data-price="39.90">
                    <span class="product-badge">Novo</span>
                    <div class="product-image">
                        <a href="produto.php">
                            <img src="mindset.jpg" alt="Mindset">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Desenvolvimento</span>
                        <h3 class="product-title"><a href="produto.html">Mindset</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(143)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 39,90</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 8 -->
                <div class="product-item" data-name="Os 7 Hábitos das Pessoas Altamente Eficazes" data-price="55.00">
                    <div class="product-image">
                        <a href="produto.php">
                            <img src="os 7.webp" alt="Os 7 Hábitos das Pessoas Altamente Eficazes">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Produtividade</span>
                        <h3 class="product-title"><a href="produto.html">Os 7 Hábitos das Pessoas Altamente Eficazes</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(256)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 55,00</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
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
                <form class="newsletter-form">
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
                        <li><a href="<?php echo generateLink('blog'); ?>">Book Club BLOG</a></li>
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
        function addToCart(button) {
            const productElement = button.closest('.product-item');
            const name = productElement.getAttribute('data-name');
            const price = parseFloat(productElement.getAttribute('data-price'));
            
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item => item.name === name);
            
            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push({ name, price, quantity: 1 });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            
            // Notificação visual
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.backgroundColor = '#4BB543';
            notification.style.color = 'white';
            notification.style.padding = '15px 25px';
            notification.style.borderRadius = '5px';
            notification.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
            notification.style.zIndex = '1000';
            notification.style.animation = 'slideIn 0.5s, fadeOut 0.5s 2.5s forwards';
            notification.innerHTML = `<i class="fas fa-check-circle"></i> ${name} foi adicionado ao carrinho!`;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Função de Pesquisa
        function searchProducts() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const products = document.querySelectorAll('.product-item');
            
            products.forEach(product => {
                const productName = product.querySelector('.product-title').innerText.toLowerCase();
                if (productName.includes(query)) {
                    product.classList.remove('hidden');
                } else {
                    product.classList.add('hidden');
                }
            });
        }
            // Adiciona evento de tecla para a busca
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        searchProducts();
      }
    });

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
