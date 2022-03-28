<?php

  require 'database.php';

  if(isset($_POST['password'])&&
    isset($_POST['confirm_password'])&&
    $_POST['password']==$_POST['confirm_password']){
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':email', $_POST['email']);
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $stmt->bindParam(':password', $password);
      session_start();
      if ($stmt->execute()) {
        $_SESSION['message'] = 'Usuario creado exitosamente';
      } else {
        $_SESSION['message'] = 'Lo sentimos, debió haber un problema al crear su cuenta';
      }
      header('Location: index.php');
    }
  }

  if(isset($_POST['email']) || isset($_POST['password']) || isset($_POST['confirm_password'])){
    $message = 'Ocurrió un problema al crear su cuenta, intente nuevamente';
  }else{
    $message= "";
  }
  
?>

<?php require 'partials/head.php' ?>
<?php require 'partials/header.php' ?>

      <div class="row">
        <div class="col-4">
          <h1>Suscríbete =></h1>
          <div class="d-grid gap-2">
            <a class="btn btn-primary mt-5" href="login.php">Ingresa</a>
          </div>
        </div>
        <div class="col-2">
        </div>
        <div class="col-5">
          <?php if(!empty($message)): ?>
            <div class="alert alert-danger" role="alert">
              <p> <?= $message ?></p>
            </div>
          <?php endif; ?>
          <form action="signup.php" method="POST">
            <div class="d-grid gap-2 mt-5">
              <input name="email" type="text" placeholder="Ingresa tu correo o nombre de usuario">
            </div>
            <div class="d-grid gap-2 mt-5">
              <input name="password" type="password" placeholder="Ingresa una clave">
            </div>
            <div class="d-grid gap-2 mt-5">
              <input name="confirm_password" type="password" placeholder="Confirma tu clave">
            </div>
            <div class="d-grid gap-2 mt-5">
              <input class="btn btn-primary" type="submit" value="Registrarme">
            </div>
          </form>
        </div>
        <div class="col-1">
        </div>
      </div>
    </div>
  </body>
</html>
