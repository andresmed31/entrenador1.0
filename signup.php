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
    $message = 'Lo sentimos, debió haber un problema al crear su cuenta';
  }else{
    $message= "";
  }

?>


<?php require 'partials/head.php' ?>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Suscríbete</h1>
    <span><a href="login.php">Ingresa</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Ingresa tu correo">
      <input name="password" type="password" placeholder="Ingresa una clave">
      <input name="confirm_password" type="password" placeholder="Confirma tu clave">
      <input type="submit" value="Registrarme">
    </form>

  </body>
</html>