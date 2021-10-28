<?php
require 'Seguridad.php';
require 'conexion.php';

$message = '';
$class = '';
$redig=False;

if (!empty($_POST['nombres']) && !empty($_POST['rol']) && !empty($_POST['telefono'])) {
    $sql = "INSERT INTO instructores (nombres, rol, telefono) VALUES (:nombres, :rol, :telefono)";
    $stmt = $con->prepare($sql);
    
    
    $stmt->bindParam(':nombres', $_POST['nombres']);
    $stmt->bindParam(':rol', $_POST['rol']);
    $stmt->bindParam(':telefono', $_POST['telefono']);

    if ($stmt->execute()) {
        $message = 'Se insertó el/la nuevo(a) instructor(a) de forma exitosa.';            
        $class = "text-true";
        $redig=True;
    } else {
        $message = 'No se insertó el/la nuevo(a) instructor(a) de forma exitosa.';
        $class = "text-false";
    }
}
?>

<?php if (!empty($user) && $user['type']==1) : ?>
  <!DOCTYPE html>
  <html>

  <head>

    <title>Insertar Instructor</title>
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
        </div>
              <?php if (!empty($message)) : ?>
            <div class="<?php echo $class; ?>">
                <p>
                    <center><?= $message ?></center>
                </p>
            </div>
            <br></br>
        <?php endif; ?>
        <div class="formulario">
            <h1>Nuevo Instructor(a)</h1>
            <form action="instructoresAdmin.php" method="post" enctype="multipart/form-data">
                <input type="text" name="nombres" required placeholder="Nombre completo">
                <input type="text" name="rol" required placeholder="Rol que va a desempeñar">
                <input type="text" name="telefono" required placeholder="Téléfono">

                <br>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </body>
    <?php if ($redig==True) : ?>
    <script>
            setTimeout(alertFunc, 3000);

            function alertFunc() {
                location.replace("institucional.php")
            }
    </script>
    <?php endif; ?>
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
