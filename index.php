<?php
  session_start();
  require 'database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);//
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
  function usuarioCreado(){
    if(isset($_SESSION['message'])){
      $creado= $_SESSION['message'];
      $_SESSION['message']=null;
      return $creado;
    }
  }
?>

<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-4 alin">
      <h1>Ejercita el organo más importante que tienes</h1>
    </div>
    <div class="col-2"></div>
    <div class="col-5 align-self-center">
      <?php if(!empty($user)): ?>
        <h3>Bienvenido <?= $user['email']; ?></h3>
        <a href="logout.php">
          Cerrar sesión
        </a>
      <?php else: ?>
        <?=usuarioCreado()?>
        <div class="d-grid gap-2" top12="espacio1">
          <a class="btn btn-primary" href="login.php">Ingresa</a>
        </div>
        <div class="d-grid gap-2">

        </div>
        <div class="d-grid gap-2" top12="espacio1">
          <a class="btn btn-primary" href="signup.php">Suscríbete</a>
        </div>
      <?php endif; ?>
      <?php if(!empty($user)): ?>
        <?php include 'app.php'; ?>
        <form action="index.php" method="post">
          <button name="digitos" value="2">suma x 2 dígitos</button>
          <button name="digitos" value="3">suma x 3 dígitos</button>
          <button name="digitos" value="4">suma x 4 dígitos</button>
        </form>
        <form action="calculador.php" method="post">
          <input type="number" name="res" id="" autofocus>
          <input type="submit" value="Calcular">
        </form>
      <?php endif; ?>
    </div>
    <div class="col-1"></div>
  </div>
</div>
</body>
</html>





