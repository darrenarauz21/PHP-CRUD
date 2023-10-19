<?php
 
// Destruye todas las variables de sesión
session_unset();

// Destruye la sesión
if (session_id() != '') {
    session_destroy();
}


// Redirige al usuario a la página de inicio de sesión 
header("Location: ../index.php");
exit();
?>