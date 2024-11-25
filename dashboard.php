<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
        }
        .header a {
            color: white;
            text-decoration: none;
            background-color: #ff4b5c;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
        }
        .header a:hover {
            background-color: #ff1f3f;
        }
        .container {
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .actions {
            margin-top: 20px;
        }
        .actions a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .actions a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Practica Desarrollo Web</h1>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h2>Bienvenido, <?php echo htmlspecialchars($username); ?> 👋</h2>
        <p>¡Has iniciado sesión exitosamente!</p>
    </div>
</body>
</html>