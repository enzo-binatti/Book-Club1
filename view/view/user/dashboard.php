<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php?user_type=user");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - Book Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background-color: #04a7a7;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            color: white;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
            border-radius: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: #00f7ff;
        }

        .sidebar .nav-link.active {
            background-color: #4cc9f0;
            color: #04a7a7;
        }

        .content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 15px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .profile-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .order-history {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item img {
            width: 60px;
            height: 80px;
            object-fit: cover;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h2>Book Club</h2>
        </div>
        <nav class="mt-4">
            <a href="dashboard.php" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i> Meu Perfil
            </a>
            <a href="orders.php" class="nav-link">
                <i class="fas fa-shopping-cart"></i> Meus Pedidos
            </a>
            <a href="favorites.php" class="nav-link">
                <i class="fas fa-heart"></i> Favoritos
            </a>
            <a href="reviews.php" class="nav-link">
                <i class="fas fa-comments"></i> Meus Comentários
            </a>
            <a href="address.php" class="nav-link">
                <i class="fas fa-map-marker-alt"></i> Endereços
            </a>
            <a href="settings.php" class="nav-link">
                <i class="fas fa-cog"></i> Configurações
            </a>
            <a href="logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </nav>
    </div>

    <div class="content">
        <div class="header">
            <h2>Meu Perfil</h2>
            <div class="user-info">
                <img src="../../assets/default-avatar.png" alt="Usuário">
                <span><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
            </div>
        </div>

        <div class="profile-section">
            <h3>Informações Pessoais</h3>
            <div class="row mt-4">
                <div class="col-md-6">
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Membro desde:</strong> <?php echo date('d/m/Y', strtotime($_SESSION['user_created_at'])); ?></p>
                </div>
            </div>
        </div>

        <div class="order-history mt-4">
            <h3>Histórico de Pedidos</h3>
            <div id="order-history">
                <!-- Histórico de pedidos será carregado via JavaScript -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulação de dados (substitua por chamadas reais à API)
        const recentOrders = [
            {
                id: 1,
                productImage: '../../assets/default-book.jpg',
                productName: 'O Senhor dos Anéis',
                orderDate: '2025-06-15',
                status: 'Entregue'
            },
            {
                id: 2,
                productImage: '../../assets/default-book.jpg',
                productName: 'Harry Potter e a Pedra Filosofal',
                orderDate: '2025-06-10',
                status: 'Em Trânsito'
            }
        ];

        // Carrega os pedidos recentes
        const orderHistory = document.getElementById('order-history');
        recentOrders.forEach(order => {
            const orderItem = document.createElement('div');
            orderItem.className = 'order-item';
            orderItem.innerHTML = `
                <img src="${order.productImage}" alt="${order.productName}">
                <div>
                    <h5>${order.productName}</h5>
                    <p>Data: ${new Date(order.orderDate).toLocaleDateString('pt-BR')}</p>
                    <p>Status: <span class="badge bg-${order.status === 'Entregue' ? 'success' : 'warning'}">${order.status}</span></p>
                </div>
            `;
            orderHistory.appendChild(orderItem);
        });
    </script>
</body>
</html>
