<?php
require 'Seguridad.php';
require 'conexion.php'
?>
<?php if (!empty($user)) : ?>
  <!DOCTYPE html>
  <html>

  <head>

    <title>Reportes</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include("assets/head/links.html") ?>
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/tabla.css" rel="stylesheet">
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
          <h1>Administración de Reportes</h1>
          <center><h2><?php echo $user['name']; ?>, estos son los reportes.</h2><center>
        </div>
        
      </div>
 
  </section><!-- End Hero -->
    

    <?php if (!empty($user) && $user['type'] == 1) : ?>
    <?php endif; ?>
    <section id="adminserv">
   
    
  </section>

  </body>
  <li><a href="excel/form_consulta_solicitud.php">Reportes en Excel</a></li>
  </html>
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
