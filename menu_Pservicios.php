<?php
require 'Seguridad.php';
require 'conexion.php';

$message = '';
$class = '';
$redig=False;

if (!empty($_POST['service']) && !empty($_POST['description'])) {
    $sql = "INSERT INTO galeria (service, description, url) VALUES (:service, :description, :url)";
    $stmt = $con->prepare($sql);
    
     $nombre=$_FILES['image']['name'];
    $archivo=$_FILES['image']['tmp_name'];

    $ruta="galeria";
    $ruta=$ruta."/".$nombre;

    move_uploaded_file($archivo,$ruta);
    
    $stmt->bindParam(':service', $_POST['service']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->bindParam(':url, $ruta');
    if ($stmt->execute()) {
        $message = 'Se creo el nuevo servicio de forma exitosa.';            
        $class = "text-true";
        $redig=True;
    } else {
        $message = 'No se ha podido crear el nuevo servicio.';
        $class = "text-false";
    }
}
?>

<?php if (!empty($user) && $user['type']==1) : ?>
  <!DOCTYPE html>
  <html>

  <head>

    <title>Crear Servicio</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include("assets/head/links.html") ?>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/cuadros.css" rel="stylesheet">
  </head>

  <body>
     <!-- ======= Header ======= -->
    <?php include("assets/head/headerRegistro.html") ?>
    <!-- End Header -->
    
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
            <h1>Nuevo Servicio</h1>
            <form action="menu_Pservicios.php" method="post" enctype="multipart/form-data">
                <input type="text" name="service" required placeholder="Nombre del Servicio">
                <input type="text" name="description" required placeholder="Descripcion del Servicio">
                <input type="file" name="image" required>
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
                location.replace("Pservicios.php")
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
