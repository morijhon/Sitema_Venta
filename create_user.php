<?php
// create_user.php
$host = "localhost";
$user = "root";
$pass = "";
$db = "DB_Tienda";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Verificar si el correo ya existe
  $check = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
  $check->bind_param("s", $email);
  $check->execute();
  $result = $check->get_result();

  if ($result->num_rows > 0) {
    $error = "Este correo ya está registrado.";
  } else {
    // Crear nuevo usuario
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $hashed);

    if ($stmt->execute()) {
      $success = "Usuario creado correctamente ✅";
    } else {
      $error = "Error al crear el usuario.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear Usuario - Mi Tienda</title>
<style>
  body {
    font-family: 'Segoe UI', Roboto, Arial, sans-serif;
    background: radial-gradient(circle at top left, #0f2027, #203a43, #2c5364);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #fff;
    overflow: hidden;
  }

  .container {
    background: rgba(20, 20, 20, 0.85);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 20px;
    padding: 40px 50px;
    box-shadow: 0 0 25px rgba(0, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    width: 360px;
    text-align: center;
  }

  h2 {
    margin-bottom: 20px;
    font-size: 26px;
    color: #00e0ff;
  }

  label {
    display: block;
    text-align: left;
    margin-bottom: 12px;
    font-weight: 500;
    font-size: 14px;
    color: #d1d1d1;
  }

  input {
    width: 100%;
    padding: 10px 12px;
    border: none;
    border-radius: 8px;
    margin-top: 4px;
    margin-bottom: 16px;
    background: rgba(255,255,255,0.1);
    color: #fff;
    font-size: 15px;
    outline: none;
    transition: background 0.3s;
  }

  input:focus {
    background: rgba(255,255,255,0.2);
  }

  button {
    background: linear-gradient(135deg, #00e0ff, #0078ff);
    border: none;
    padding: 12px 18px;
    border-radius: 10px;
    color: #fff;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
    width: 100%;
    transition: transform 0.2s, box-shadow 0.3s;
  }

  button:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 15px rgba(0, 224, 255, 0.5);
  }

  p {
    margin-top: 20px;
  }

  a {
    color: #00e0ff;
    text-decoration: none;
    transition: color 0.2s;
  }

  a:hover {
    color: #fff;
  }

  .msg {
    font-size: 14px;
    margin-bottom: 15px;
  }

  .msg.error { color: #ff8080; }
  .msg.success { color: #80ffb3; }
</style>
</head>
<body>
  <div class="container">
    <h2>Crear Usuario</h2>

    <?php if (!empty($error)): ?>
      <p class="msg error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
      <p class="msg success"><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>

    <form method="POST" action="create_user.php">
      <label>Nombre:
        <input type="text" name="nombre" required>
      </label>
      <label>Correo:
        <input type="email" name="email" required>
      </label>
      <label>Contraseña:
        <input type="password" name="password" required>
      </label>
      <button type="submit">Crear usuario</button>
    </form>

    <p><a href="login.php">Volver al login</a></p>
  </div>
</body>
</html>

