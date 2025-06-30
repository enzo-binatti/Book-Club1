<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php?user_type=admin");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Book Club</title>
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
            background-color: #3a0ca3;
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
            background-color: #4361ee;
        }

        .sidebar .nav-link.active {
            background-color: #4cc9f0;
            color: #3a0ca3;
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

        .stats-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .stats-card h3 {
            margin-bottom: 10px;
            color: #3a0ca3;
        }

        .stats-card p {
            font-size: 24px;
            font-weight: bold;
            color: #4cc9f0;
        }

        .recent-activity {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .activity-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h2>Book Club Admin</h2>
        </div>
        <nav class="mt-4">
            <a href="dashboard.php" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="users.php" class="nav-link">
                <i class="fas fa-users"></i> Usuários
            </a>
            <a href="products.php" class="nav-link">
                <i class="fas fa-book"></i> Produtos
            </a>
            <a href="orders.php" class="nav-link">
                <i class="fas fa-shopping-cart"></i> Pedidos
            </a>
            <a href="blog.php" class="nav-link">
                <i class="fas fa-blog"></i> Blog
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
            <h2>Dashboard</h2>
            <div class="user-info">
                <img src="../../assets/default-avatar.png" alt="Admin">
                <span><?php echo htmlspecialchars($_SESSION['admin_name']); ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <h3>Total de Usuários</h3>
                    <p id="total-users">0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <h3>Total de Produtos</h3>
                    <p id="total-products">0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <h3>Pedidos Pendentes</h3>
                    <p id="pending-orders">0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <h3>Novos Comentários</h3>
                    <p id="new-comments">0</p>
                </div>
            </div>
        </div>

        <div class="recent-activity mt-4">
            <h3>Atividades Recentes</h3>
            <div id="recent-activities">
                <!-- Atividades serão carregadas via JavaScript -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulação de dados (substitua por chamadas reais à API)
        const stats = {
            totalUsers: 1500,
            totalProducts: 350,
            pendingOrders: 45,
            newComments: 12
        };

        // Atualiza os números das estatísticas
        document.getElementById('total-users').textContent = stats.totalUsers;
        document.getElementById('total-products').textContent = stats.totalProducts;
        document.getElementById('pending-orders').textContent = stats.pendingOrders;
        document.getElementById('new-comments').textContent = stats.newComments;
    </script>
</body>
</html>
