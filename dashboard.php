
<?php
session_start();
require_once 'class/User.php';
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['codusuario'])) {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: login.php"); // Cambia "login.php" al nombre de tu página de inicio de sesión
    exit();
}
// El usuario ha iniciado sesión, puedes acceder a la información del usuario desde las variables de sesión
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/styles/css/styles.css">
    <link rel="stylesheet" href="assets/styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/fontawesome/css/all.min.css">
    <script src="assets/values/js/stringControl.js"></script>
</head>
<section style="background-color: #eee;"> 
    <div class="container py-5">
        <div class="row">
            <?php include 'assets/views/head.html'?>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="assets/img/avatar.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?php echo $nombre, ' ', $apellido; ?></h5>
                        <p class="text-muted mb-1"><?php echo '@',$usuario; ?></p>
                        <div class="d-flex justify-content-center mb-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </section>
    
    <script>
        document.addEventListener("DOMContentLoaded", async () => {
            await stringControl.loadStrings();

            document.getElementById("txt-title").textContent = stringControl.getString("headView", "title");
            document.getElementById("btnSession").textContent = stringControl.getString("headView", "btnSession");
            document.getElementById("txt-class").textContent = stringControl.getString("dashboardView", "title");
            document.getElementById("btn-crud").textContent = stringControl.getString("headView", "btnCrud");
            
            
            // Mostrar el mensaje de error, si existe
            <?php if (isset($error)) { ?>
                const errorMessage = "<?php echo $error; ?>";
                document.getElementById("error-message").textContent = errorMessage;
            <?php } ?>
        });
    </script>
</html>
