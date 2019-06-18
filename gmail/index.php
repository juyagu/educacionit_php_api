<?php 
session_start();
include 'gService.php';
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <title>Gmail API</title>
</head>
<body>
<?php if( isset($_SESSION['access_token']) ) : // if user is logged in ?>

<div class="container">
  <h1>Hola! <?php echo $_SESSION["emailAddress"]; ?></h1>

  <?php
  if( isset($_SESSION['sent']) ){ // if message has been sent
    echo '<h3 style="color:red;">'.$_SESSION['sent'].'</h3>';
    unset($_SESSION['sent']);
  }
  ?>
  <form action="send.php" method="post">
    <div class="form-group col-4">
      <label for="">Subject</label>
      <input type="text" class="form-control" name="subject">
    </div>
    <div class="form-group col-4">
      <label for="">TO</label>
      <input type="text" class="form-control" name="to">
    </div>
    <hr>
    <div class="form-group">
      <label for="">Mensaje</label>
      <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
    </div>
    <input class="btn btn-success" type="submit" name="submit" value="Enviar">
  </form>
  <br>
  <p><a href="logout.php">Salir</a></p>
  <?php else : // if user is not logged in, show sign in link ?>


      <a href="<?php echo $login_url; ?>">Ingresá a Gmail</a>

<?php endif; ?>
</div>
</body>
</html>