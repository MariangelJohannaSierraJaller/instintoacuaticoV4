<?php
  require 'sesion.php';
  require 'conexion.php';
  
  $message = '';
  $tipo = '';
  
  if ( !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['phone'])  && !empty($_POST['direction'])  && !empty($_POST['password'])){
		$records = $con->prepare('SELECT id, email FROM usuarios WHERE email = :email');
		$records->bindParam(':email', $_POST['email']);
		
		if ($records->execute()){
			$results = $records->fetch(PDO::FETCH_ASSOC);
			$correo=$_POST['email'];
			if ($correo==$results['email']) {
				$repetido=True;
			} else{
				$repetido=False;
			}
		} else {
			$repetido=False;
		}
		
		if($repetido==False){
			$sql = "INSERT INTO usuarios (email, name, lastname, phone, direction, password, type) VALUES (:email, :name, :lastname, :phone, :direction, :password, :type)";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':email', $_POST['email']);
			$stmt->bindParam(':name', $_POST['name']);
			$stmt->bindParam(':lastname', $_POST['lastname']);
			$stmt->bindParam(':phone', $_POST['phone']);
			$stmt->bindParam(':direction', $_POST['direction']);
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$stmt->bindParam(':password', $password);
			$type=0;
			$stmt->bindParam(':type', $type);
			
			
			if ($stmt->execute()) {
			  $message = 'Tu cuenta ha sido creada con éxito.';
			  $tipo="success";
			  $records = $con->prepare('SELECT id FROM usuarios WHERE email = :email');
			  $records->bindParam(':email', $_POST['email']);
			  if ($records->execute()){
				$results = $records->fetch(PDO::FETCH_ASSOC);
				$_SESSION['autentificado'] = $results['id'];
			  }
			} else {
			  $message = 'Ha ocurrido un error creando tu cuenta, inténtalo de nuevo.';
			  $tipo="error";
			}				
		}else{
			$message = $correo.' -Este email actualmente está vinculado a una cuenta.';
			$tipo="error";
		}
 
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inicio de Sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">

    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php if (!empty($message)): ?>
    <script>
      Swal.fire({icon:"<?php echo($tipo); ?>",title:"<?php echo($message); ?>",timer:"6000",timerProgressBar:"true"});
    </script>
  <?php endif; ?>
  
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/img/regis.png" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <a href="index.php"><img src="assets/img/foot.png" alt="logo" class="logo"></a>
              </div>
              <p class="login-card-description">Registro</p>
              <form action="SignUp.php" method="post">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="name" class="sr-only">Nombre(s)</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre(s)" required>
                  </div>
                  <div class="form-group">
                    <label for="lastname" class="sr-only">Apellido(s)</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Apellido(s)" required>
                  </div>
                  <div class="form-group">
                    <label for="lastname" class="sr-only">Teléfono/Celular</label>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Teléfono/Celular" required>
                  </div>
                  <div class="form-group">
                    <label for="text" class="sr-only">Dirección</label>
                    <input type="direction" name="direction" id="phone" class="form-control" placeholder="Dirección" required>
                  </div>
                  <div class="form-group mb-7">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Registrarse" required>
                </form>
                <p class="login-card-footer-text">¿Ya tienes una cuenta? <a href="Login.php" class="text-reset">Inicia Sesión</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name'])): ?>
      <?php if($repetido==False): ?>
        <script>
          setTimeout(alertFunc, 4000);
          function alertFunc() {
            location.replace("menu_ppal.php")
          }
        </script>
      <?php endif; ?>
    <?php endif; ?>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
