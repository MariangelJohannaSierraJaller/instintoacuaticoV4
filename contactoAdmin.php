<?php
require 'Seguridad.php';
require 'conexion.php'
?>
<?php if (!empty($user)) : ?>
  <!DOCTYPE html>
  <html>

  <head>
  
    <title>Solicitudes de Contacto</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include("assets/head/links.html") ?>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/tabla.css" rel="stylesheet">
  </head>

  <body>
  <!-- ======= Header ======= -->
    <?php include("assets/head/headerRegistro.html") ?><!-- End Header -->

     <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Solicitudes de Contacto</h1>
      <center><h2><?php echo $user['name']; ?>, estas son las solicitudes de contacto que han hecho.</h2><center>

        </div>
           
      </div>
 
  </section><!-- End Hero -->

   <?php if (!empty($user) && $user['type'] == 1) : ?>
    <?php endif; ?>
    <br>
    <section id="contacto">
    <table class="content-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Mensaje</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $records = $con->prepare('SELECT * FROM contacto');
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['name']; ?></td>
            <td><?php echo $results['lastname']; ?></td>
            <td><?php echo $results['email']; ?></td>
            <td><?php echo $results['phone']; ?></td>
            <td><?php echo $results['message']; ?></td>
            <td>
              <a href='modificarContacto.php?id=<?php echo $results['id']; ?>'><button type='button' class="btn btn-success">Modificar</a>
              <a href="eliminarContacto.php?id=<?php echo $results['id']; ?>"><button type='button' class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>

  </body>

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
  <footer id="footer">
<?php include("assets/footer/footer.html") ?>
  </footer><!-- End Footer -->
  <?php include("assets/footer/links.html") ?>

</body>

</html>
