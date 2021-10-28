<?php
    require 'conexion.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Portafolio de Servicios</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<?php include("assets/head/links.html") ?>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/StylePortafolio.css" rel="stylesheet">

</head>

<body>

      <!-- ======= Header ======= -->
  <?php include("assets/head/headerHome.html") ?><!-- End Header -->

    <center><img src="assets/img/port.jpeg" width="100%"></center>
    <br>
    <center><h1>Portafolio de Servicios</h1></center>
    <center><a href="index.php"><img src="assets/img/hero-img.png" width="220px"></a></center>
    <div class="container">
        <?php
            $records = $con->prepare('SELECT * FROM galeria');
            $records->execute();
            while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="item">
                    <img src="<?php echo $results['url']; ?>" alt="<?php echo $results['service']; ?>" class="item-img">
                    <div class="item-text">
                        <h3><?php echo $results['service']; ?></h3>
                        <p><?php echo $results['description']; ?></p>
                    </div>
                </div>
        <?php } ?>
    </div>

<!-- ======= Footer ======= -->
  <?php include("assets/footer/footer.html") ?><!-- End Footer -->

  <?php include("assets/footer/links.html") ?>

</body>

</html>



