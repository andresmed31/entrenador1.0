<?php

// prepare
// bindParam
// execute
// fetch  PDO::FETCH_ASSOC
// PDO::FETCH_ASSOC











  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && PDO::FETCH_ASSOC($_POST['password'], $results['password'])){
      $_SESSION['user_id'] = $results['id'];
      header("Location: index.php");
    } else {
      $message = 'Lo sentimos, esos datos no coinciden';
    }
  }


?>

<?php require 'partials/head.php' ?>
<div class="container">
  <div class="row">
    <?php require 'partials/header.php'; ?>
  </div>
  <div class="row d-flex">
    <div class="col-4 justify-content-center"">
      <h1>Ingresa =></h1>
      <div class="d-grid gap-2">
        <a class="btn btn-primary mt-5" href="signup.php">Suscríbete</a>
      </div>
      <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
      <?php endif; ?>
    </div>
    <div class="col-2">
    </div>
    <div class="col-5">
      <form class=""action="login.php" method="POST">
        <div class="row mt-5">
          <input name="email" type="text" placeholder="Ingresa tu correo o nombre de usuario">
        </div>
        <div class="row mt-5">
          <input name="password" type="password" placeholder="Ingresa tu clave">
        </div>
        <div class="row mt-5">
          <input class="btn btn-primary" type="submit" value="Entrar">
        </div>
      </form>
    </div>
    <div class="col-1">
    </div>




    


  </div>
    
</div>
</body>
</html>