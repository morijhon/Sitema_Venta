<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_Tienda";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Error de conexión: ".$conn->connect_error); }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header("Location: e-comerce/login.html"); exit(); }
$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['password']) ? $_POST['password'] : '';
$stmt = $conn->prepare("SELECT id, email, password, nombre FROM usuarios WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($pass, $user['password'])) {
        $_SESSION['usuario'] = $user['nombre'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: e-comerce/index.php");
        exit();
    }
}
echo "<script>alert('Correo o contraseña incorrectos');window.location.href='e-comerce/login.html';</script>";
exit();
?>