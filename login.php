<?php
session_start();

require 'class/Database.php';
require 'class/User.php';

$db = new Database();
$user = new User($db->getConnection());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->login($username, $password)) {
        // Redirige al usuario después del inicio de sesión exitoso
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Iniciar Sesión</title>
</head>
<body>

    <form method="post" action="">
        <?php require_once 'assets/views/login_view.html' ?>
    </form>
    <script src="assets/values/js/stringControl.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", async () => {
            await stringControl.loadStrings();

            document.getElementById("txt-title").textContent = stringControl.getString("loginView", "title");
            document.getElementById("txt-user").textContent = stringControl.getString("loginView", "user");
            document.getElementById("txt-password").textContent = stringControl.getString("loginView", "password");
            document.getElementById("btn-login").textContent = stringControl.getString("loginView", "button");
            
            // Mostrar el mensaje de error, si existe
            <?php if (isset($error)) { ?>
                const errorMessage = "<?php echo $error; ?>";
                document.getElementById("error-message").textContent = errorMessage;
            <?php } ?>
        });
    </script>
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>
