<?php
require 'Seguridad.php';
require 'conexion.php';

$message = '';
$class = '';

if (!empty($_POST['email'])) {
  $sql = "INSERT INTO registros (Service_Name, AR_Date, email) VALUES (:curso, :fechar, :email)";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':curso', $_POST['curso']);
  $fecha = date('Y-m-d');
  $stmt->bindParam(':fechar', $fecha);
  $stmt->bindParam(':email', $_POST['email']);
  if ($stmt->execute()) {
    $message = 'Tu solicitud ha sido registrada con éxito.';
    $class = "text-true";
  } else {
    $message = 'Tu solicitud no se pudo registrar.';
    $class = "text-false";
  }
}
?>

<?php if (!empty($user)) : ?>

 <!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Solicitar Servicio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<?php include("assets/head/links.html") ?>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/cuadros.css" rel="stylesheet">
</head>

<body>
   <!-- ======= Header ======= -->
   <?php include("assets/head/headerRegistro.html") ?><!-- End Header -->
     <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Solicitud de Servicio</h1>
          <h2>Realiza la solicitud del curso que deseas tomar</h2>
        </div>
             <?php if (!empty($message)) : ?>
      <div class="<?php echo $class; ?>">
        <p>
          <center><?= $message ?></center>
        </p>
      </div>
      <br></br>
    <?php endif; ?>
    <nav class="main">
    </nav>
    <div class="formulario">
       <form action="menu_ss.php" method="post">
        <input type="hidden" name="email" value="<?php echo $user['email'] ?> ">
        <select name="curso" required>
          <option value="">Seleccione</option>
          <option value="Matronatacion">Matronatación</option>
          <option value="Parvulos">Párvulos </option>
          <option value="Predeportivos">Predeportivos</option>
          <option value="Escolares">Escolares</option>
          <option value="Adultos ">Adultos </option>
        </select>
        <button type="submit" class="btn btn-success">Guardar</button>
      </form>
    </div>
  </body>


  </html>
      </div>
 
  </section><!-- End Hero -->


<?php else : ?>
  <!DOCTYPE html>
  <!--html cuando no se inicio sesion-->
  <html>

  <body>
    <script>
      setTimeout(alertFunc, 1000);

      function alertFunc() {
        location.replace("index.php")
      }
    </script>
  </body>

  </html>

<?php endif; ?>
<!-- ======= Footer ======= -->
  <?php include("assets/footer/footer.html") ?><!-- End Footer -->


  <?php include("assets/footer/links.html") ?>

</body>

</html>