<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rural Shisha</title>
  <link rel="shortcut icon" href="IMG/logo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="CSS/fullestil.css">
</head>
<body>
<?php
session_start();
include 'capçalera.html';
?>
<div class="container";
    <div class="row">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col-5">Producto</th>
            <th scope="col-4">Precio</th>
            <th scope="col-3">Cantidad</th>
          </tr>
        </thead>
      <tbody>
        <?php
	    if(isset($_SESSION['carrito'])){
            include '../CONFIG/configBD.php';
	    $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            for( $x = 0 ; $x < count($_SESSION['carrito']) ; $x++){
	      $sql = "SELECT id, nom, preu FROM product WHERE id = ". $_SESSION['carrito'][$x][0] . ";";
              $result = $conn->query($sql);
	      if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  $nom = $row['nom'];
                  $id = $row['id'];
                  $preu = $row['preu'];
        ?>
          <tr>
            <th scope="row"><?php echo $id ?></th>
            <td><?php echo $nom ?></td>
            <td><?php echo $preu ?></td>
            <td><?php echo $_SESSION['carrito'][$x][1]?></td>
          </tr>
        <?php

                }
              }
            }
          }

        ?>

      </tbody>
    </table>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm">
      <a href='Llista.php' class='btn btn-dark btn-lg btn-block'>Seguir Comprando</a>
    </div>
    <div class="col-sm">
      <form action='destroy_sess.php'>
        <input type="submit" class="btn btn-info btn-lg btn-block" name="sessDestroy" value="Comprar"/>
      </form>
    </div>
  </div>
</div>
<?php
include 'footer.html';
?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html> 
