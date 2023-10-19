
<?php
require_once 'class/User.php';
session_start();

//$userSession = $_SESSION['user'];
//<link rel="stylesheet" href="assets/views/head.html">

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/styles/css/styles.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/fontawesome/css/all.min.css">
    <title>Dashboard</title>
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
              <img src="assets/img/avatar.jpg" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"><?php //echo $name; ?></h5>
              <p class="text-muted mb-1"><?php //echo $career; ?></p>
              <p class="text-muted mb-4"><?php //echo $address; ?></p>
              <div class="d-flex justify-content-center mb-2">

              </div>
            </div>
          </div>
</section>
<script src="assets/values/js/stringControl.js"></script>
<script>
        document.addEventListener("DOMContentLoaded", async () => {
            await stringControl.loadStrings();

            document.getElementById("txt-title").textContent = stringControl.getString("headView", "title");
            document.getElementById("btnSession").textContent = stringControl.getString("headView", "btnSession");
            
            // Mostrar el mensaje de error, si existe
            <?php if (isset($error)) { ?>
                const errorMessage = "<?php echo $error; ?>";
                document.getElementById("error-message").textContent = errorMessage;
            <?php } ?>
        });
    </script>
</html>