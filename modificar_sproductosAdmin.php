<?php
require 'Seguridad.php';
require 'conexion.php';

if (!empty($_GET['id'])) {
  $records = $con->prepare('SELECT * FROM productos WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
}

if (!empty($_GET['id']) && !empty($_GET['email']) && !empty($_GET['servicio']) && !empty($_GET['fecha']) && !empty($_GET['fechaentrega']) && !empty($_GET['horaentrega'])) {
  $sql = "UPDATE registros SET email=:email, servicio=:servicio, fecha=:fecha, fechaentrega=:fechaentrega, horaentrega=:horaentrega WHERE id = :id";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':email', $_GET['email']);
  $stmt->bindParam(':servicio', $_GET['servicio']);
  $stmt->bindParam(':fecha', $_GET['fecha']);
  $stmt->bindParam(':fechaentrega', $_GET['fechaentrega']);
  $stmt->bindParam(':horaentrega', $_GET['horaentrega']);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->execute();
  header('Location:  menu_productosAdmin.php');
}

?>
<?php if (!empty($user) && $user['type'] == 1) : ?>
  <!DOCTYPE html>
  <html>

  <head>

    <title>Modificar S. Producto</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
<?php include("assets/head/links.html") ?>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/styleLogin.css" rel="stylesheet">
  </head>

  <body>

    <?php include("assets/head/headerRegistro.html") ?>

    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Modificar Producto</h1>

        </div>
           
      </div>
 
     </section><!-- End Hero -->
      <center><img src="assets/img/burb.gif" alt="funny GIF" width="400px"></center>

    <div class="formulario">
      <?php if (!empty($_GET['id'])) : ?>
        <form action="menu_productosAdmin.php" method="get">

          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?> ">
          <label>Correo: </label>
          <input type="email" name="email" value="<?php echo $results['email'] ?>"><br>

          <label>Producto: </label>
          <select type="text" name="Service_Name" required>
            <option value="<?php echo $results['servicio'] ?>"><?php echo $results['servicio'] ?></option>
          </select>


          <label>Fecha de Registro: </label>
          <input type="text" name="fecha" value="<?php echo $results['fecha'] ?>"><br>

          <label>Fecha de entrega: </label>
          <input type="date" name="fechaentrega" step="1" min="2021-01-01" max="2023-12-31" value="<?php echo $results['fechaentrega'] ?>"><br>

          <label>Hora de entrega: </label>
          <input type="text" name="horaentrega" value="<?php echo $results['horaentrega'] ?>"><br>

        <?php endif; ?>
        <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>

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

<!--footer-->
<?php include("assets/footer/footer.html") ?>
<!--end footer>
  <?php include("assets/footer/links.html") ?>