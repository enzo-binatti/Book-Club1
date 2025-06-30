<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho | Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variáveis CSS consistentes com o site principal */
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #4525f7;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #ffffff;
            --success: #4cc9f0;
            --danger: #dc3545;
            --warning: #ffc107;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.08);
            --shadow-lg: 0 10px 20px rgba(0,0,0,0.1), 0 6px 6px rgba(0,0,0,0.1);
            --shadow-xl: 0 15px 25px rgba(0,0,0,0.15), 0 5px 10px rgba(0,0,0,0.05);
        }

        /* Reset e estilos globais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Poppins', 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Efeito de partículas */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        /* Navbar */
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
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            width: 40px;
            height: 40px;
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
            color: var(--dark);
            padding: 5px 0;
            position: relative;
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

        .cart-icon {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--secondary);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }

        /* Container principal */
        .cart-container {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 100px 20px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Card do carrinho */
        .cart-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            box-shadow: var(--shadow-xl);
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s 0.3s forwards;
        }

        @keyframes fadeInUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Cabeçalho */
        .cart-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .cart-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .cart-header p {
            color: var(--dark); /* Changed from --gray for better contrast */
            font-size: 1.1rem;
        }

        /* Conteúdo do carrinho */
        .cart-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        @media (max-width: 992px) {
            .cart-content {
                grid-template-columns: 1fr;
            }
        }

        /* Lista de itens */
        .cart-items {
            list-style: none;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr auto;
            gap: 20px;
            padding: 20px;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .cart-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .cart-item-image {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-item-details {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .cart-item-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .cart-item-price {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .cart-item-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
        }

        .remove-item {
            background: none;
            border: none;
            color: var(--danger);
            cursor: pointer;
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .remove-item:hover {
            transform: scale(1.2);
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: none;
            background: var(--primary);
            color: white;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background: var(--primary-dark);
            transform: scale(1.1);
        }

        .quantity-value {
            min-width: 30px;
            text-align: center;
        }

        /* Resumo do pedido */
        .order-summary {
            background: rgba(255, 255, 255, 0.8);
            padding: 25px;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            height: fit-content;
            position: sticky;
            top: 120px;
        }

        .order-summary h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--dark);
            border-bottom: 2px solid var(--primary);
            padding-bottom: 10px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .summary-total {
            font-weight: 700;
            font-size: 1.2rem;
            border-top: 2px solid var(--primary);
            padding-top: 15px;
            margin-top: 15px;
        }

        .checkout-btn {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .checkout-btn:hover {
            background: linear-gradient(90deg, var(--secondary), var(--primary));
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .empty-cart {
            text-align: center;
            padding: 40px;
            grid-column: 1 / -1;
        }

        .empty-cart i {
            font-size: 3rem;
            color: var(--dark); /* Changed from --gray for better contrast */
            margin-bottom: 20px;
        }

        .empty-cart p {
            font-size: 1.2rem;
            color: var(--dark); /* Changed from --gray for better contrast */
            margin-bottom: 20px;
        }

        .continue-shopping {
            display: inline-block;
            padding: 12px 25px;
            background: var(--primary);
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .continue-shopping:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Efeitos extras */
        .cart-card::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(45deg, var(--primary), var(--secondary), var(--primary-dark));
            z-index: -1;
            border-radius: 20px;
            opacity: 0.7;
            animation: gradientRotate 8s ease infinite;
            background-size: 200% 200%;
        }

        @keyframes gradientRotate {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .cart-item {
                grid-template-columns: 80px 1fr;
            }
            
            .cart-item-actions {
                grid-column: 1 / -1;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        @media (max-width: 576px) {
            .cart-card {
                padding: 30px 20px;
            }
            
            .cart-header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>

    <nav class="navbar">
        <div class="logo">
            <img src="logo book.png" alt="Book Club Logo">
            <span class="logo-text">Book Club</span>
        </div>
        
        <ul class="nav-links">
            <li><a href="Book Club.php">Início</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
        </ul>
        
        <a href="carrinho.php" class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count" id="cartCount">0</span>
        </a>
    </nav>

    <div class="cart-container">
        <div class="cart-card">
            <div class="cart-header">
                <h1>Seu Carrinho</h1>
                <p>Revise seus itens antes de finalizar a compra</p>
            </div>

            <div class="cart-content">
                <ul class="cart-items" id="cartItems">
                    </ul>

                <div class="order-summary">
                    <h3>Resumo do Pedido</h3>
                    
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="subtotal">R$ 0,00</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>Frete</span>
                        <span id="shipping">Grátis</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>Descontos</span>
                        <span id="discount">R$ 0,00</span>
                    </div>
                    
                    <div class="summary-row summary-total">
                        <span>Total</span>
                        <span id="total">R$ 0,00</span>
                    </div>
                    
                    <button class="checkout-btn" id="checkoutBtn">
                        <i class="fas fa-credit-card"></i> Finalizar Compra
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Inicializa partículas
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    }
                },
                "opacity": {
                    "value": 0.3,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 2,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.2,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 1,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": true,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 0.5
                        }
                    },
                    "push": {
                        "particles_nb": 4
                    }
                }
            },
            "retina_detect": true
        });

        // Mapeamento de imagens para os livros
        const bookImages = {
            "Como Convencer Alguém em 90 Segundos": "90s.jpg",
            "A Arte Da Guerra": "a arte da guerra.webp",
            "A Máquina Definitiva de Vendas": "a maquina.jpg",
            "As Armas da Persuasão": "As-Armas-da-Persuas_o.jpg",
            "Gatilhos Mentais": "gatilhos mentais.jpg",
            "Hábitos Atômicos": "habitos.jpg",
            "Mindset": "mindset.jpg",
            "O Poder do Hábito": "o poder do habito.jpg",
            "Os 7 Hábitos das Pessoas Altamente Eficazes": "os 7.webp"
        };

        // Carrega o carrinho do localStorage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartItemsElement = document.getElementById('cartItems');
        const cartCountElement = document.getElementById('cartCount');
        const subtotalElement = document.getElementById('subtotal');
        const totalElement = document.getElementById('total');
        const checkoutBtn = document.getElementById('checkoutBtn');

        // Atualiza o contador do carrinho
        function updateCartCount() {
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            cartCountElement.textContent = totalItems;
        }

        // Renderiza os itens do carrinho
        function renderCart() {
            cartItemsElement.innerHTML = '';
            
            if (cart.length === 0) {
                cartItemsElement.innerHTML = `
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Seu carrinho está vazio</p>
                        <a href="Book Club.php" class="continue-shopping">Continuar Comprando</a>
                    </div>
                `;
                checkoutBtn.disabled = true;
                return;
            } else {
                checkoutBtn.disabled = false; // Enable checkout button if cart is not empty
            }

            let subtotal = 0;

            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                
                // Obtém a imagem correspondente ao livro ou usa uma imagem padrão
                // Added a default image for clarity if a book image isn't found
                const imageName = bookImages[item.name] || 'images/default-book.jpg'; 

                const li = document.createElement('li');
                li.className = 'cart-item';
                li.innerHTML = `
                    <img src="${imageName}" alt="${item.name}" class="cart-item-image">
                    <div class="cart-item-details">
                        <h3 class="cart-item-title">${item.name}</h3>
                        <p class="cart-item-price">R$ ${item.price.toFixed(2)}</p>
                    </div>
                    <div class="cart-item-actions">
                        <button class="remove-item" onclick="removeItem(${index})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <div class="quantity-control">
                            <button class="quantity-btn" onclick="updateQuantity(${index}, -1)">-</button>
                            <span class="quantity-value">${item.quantity}</span>
                            <button class="quantity-btn" onclick="updateQuantity(${index}, 1)">+</button>
                        </div>
                    </div>
                `;
                cartItemsElement.appendChild(li);
            });

            // Atualiza os totais
            subtotalElement.textContent = `R$ ${subtotal.toFixed(2)}`;
            totalElement.textContent = `R$ ${subtotal.toFixed(2)}`; // Assuming total is same as subtotal for now
            
            // Atualiza contador
            updateCartCount();
        }

        // Remove item do carrinho
        function removeItem(index) {
            cart.splice(index, 1);
            saveCart();
            renderCart();
        }

        // Atualiza quantidade do item
        function updateQuantity(index, change) {
            cart[index].quantity += change;
            
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }
            
            saveCart();
            renderCart();
        }

        // Salva carrinho no localStorage
        function saveCart() {
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        // Finaliza a compra
        checkoutBtn.addEventListener('click', () => {
            // Simulação de checkout
            alert('Compra finalizada com sucesso! Obrigado por comprar no Book Club.');
            cart = [];
            saveCart();
            renderCart();
        });

        // Renderiza o carrinho ao carregar a página
        document.addEventListener('DOMContentLoaded', renderCart);
    </script>
</body>
</html>