<?php
// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', 'stismael03', 'login_sis');

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Procesar el formulario al enviarlo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar contraseña

    // Verificar si el usuario o correo ya existe
    $query = $conexion->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $query->bind_param('ss', $username, $email);
    $query->execute();
    $query->store_result();

    if ($query->num_rows > 0) {
        // Usuario o correo ya registrado
        echo "<script>alert('Usuario o correo ya registrado. Intenta con otro.'); window.location.href='register.html';</script>";
    } else {
        // Insertar el nuevo usuario
        $query = $conexion->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $query->bind_param('sss', $username, $email, $password);

        if ($query->execute()) {
            // Redirigir a la página de inicio de sesión
            echo "<script>alert('Registro exitoso. Inicia sesión.'); window.location.href='login.html';</script>";
        } else {
            echo "<script>alert('Hubo un error al registrar. Inténtalo de nuevo.'); window.location.href='register.html';</script>";
        }
    }

    $query->close();
}

$conexion->close();
?>