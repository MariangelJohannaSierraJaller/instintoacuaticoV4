<?php
require 'Seguridad.php';
?>
<?php if (!empty($user)) : ?>
  <!DOCTYPE html>
  <html>

  <head>

    <title>Datos de Usuario</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include("assets/head/links.html") ?>

    <!-- Template Main CSS File -->
    <link href="assets/css/styleRegistro.css" rel="stylesheet">
    <link href="assets/css/tabla.css" rel="stylesheet">
  </head>

  <body>
    <!-- ======= Header ======= -->
    <?php include("assets/head/headerRegistro.html") ?>
    <!-- End Header -->


    <!-- ======= hero Section ======= -->
    <section id="hero">

      <div class="container">

        <?php if (!empty($user)) : ?>
          <center>
            <h1> Te damos la bienvenida <?php echo $user['name']; ?></h1>
          </center>
          <center><h2>Si te devuelves al menú principal, puedes darle en el botón "Iniciar Sesión" y tu sesión seguirá activa.</h2></center>
          
          <section id="mppal">
            <center>
            <h2>Datos de Usuario</h2>
          </center>
          <table class="content-table">
            <thead>
              <tr>
                <th>Correo</th>
                <th>Nombre(s)</th>
                <th>Apellido(s)</th>
                <th>Telefono</th>
                <th>Direccion</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['lastname']; ?></td>
                <td><?php echo $user['phone']; ?></td>
                <td><?php echo $user['direction']; ?></td>
                <td>
                </td>
              </tr>
            <tbody>
          </table>
        </tbody>
        <?php endif; ?>
      </div>

    </section><!-- End hero -->
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



   <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

         <center><img src="assets/img/clavado.gif" alt="funny GIF" width="200px"></center>

        <div class="row">
          <div class="col-xl-4 col-lg-5" data-aos="fade-up">
            <div class="content"><body style="text-align: justify;">
              <h3>Gracias por crear tu cuenta en Instinto Acuático</h3>
              <p>
                Para nosotros es muy importante que utilices los espacios que disponemos para que conozcas nuestra academia. Aquí tienes la oportunidad de acceder a espacios tales como:
              </p>

            </div>
          </div>
          <div class="col-xl-8 col-lg-7 d-flex">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0"><body style="text-align: justify;">
                    <i class="bx bx-file"></i>
                    <h4>Solicitud de Servicios</h4>
                    <p>Realiza solicitud de los cursos que quieras tomar.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0"><body style="text-align: justify;">
                    <i class="bx bx-chat"></i>
                    <h4>Solicitud de Contacto</h4>
                    <p>Dejános tu mensaje y te estableceremos un contacto contigo.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0"><body style="text-align: justify;">
                    <i class="bx bx-photo-album"></i>
                    <h4>Material Exclusivo</h4>
                    <p>Disfruta del material que creamos para tí.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

       <!-- ======= tablero Section ======= -->
  <section id="tablero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Tablero de Curiosidades</h1>
        </div>
      </div>
 
  </section><!-- End tablero -->

        <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/tablero.png" width="100%">
              </div>
              <div class="card-body">
                <h5 class="card-title">¿Por qué las manos en el agua funcionan como las alas de un aeroplano?</h5>
                <!--<p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p-->
                <p class="card-text">Como fuente de propulsión, las manos constituyen un elemento de fácil control para la técnica del nadador, y por lo tanto representan un elemento importante a mejorar para el nadador competitivo.
Las manos de un nadador se asemejan a las alas de un aeroplano, en la manera como estas generan fuerza mientras se mueven a través del agua.</p>
            <a href="tablero.php #details">Leer más</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/tablero1.png" width="100%">
              </div>
              <div class="card-body">
                <h5 class="card-title">Ejercicios de respiración para los más pequeños.</h5>
                <p class="card-text">Trabajar la respiración con los niños es, a partes iguales, divertido y beneficioso para todos. Para ellos, porque aprenden a controlar sus emociones, practican su capacidad de atención y focalización. Además, los ejercicios de respiración para niños les ayudan a relajarse y tomar conciencia de su propio cuerpo y sus procesos</p>
                <a href="tablero.php #values">Leer más</a>
              </div>
            </div>
          </div>

            <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <?php
            $records = $con->prepare('SELECT * FROM noticias');
            $records->execute();
            while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
              <div class="card-img">
                <img src="<?php echo $results['url']; ?>" alt="<?php echo $results['titulo']; ?>" width="100%">
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $results['titulo']; ?></h5>
                <p class="fst-italic text-center"></p>
                <p class="card-text"><?php echo $results['descripcion']; ?></p>
              </div>
            </div>
            <?php } ?>
          </div>

        </div>

      </div>
    </section><!-- End Events Section -->


  <!-- ======= Footer ======= -->
  <?php include("assets/footer/footer.html") ?>
  <!-- End Footer -->
  <?php include("assets/footer/links.html") ?>
</body>

</html>