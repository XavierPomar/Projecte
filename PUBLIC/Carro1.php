<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rural Shisha</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="CSS/fullestil.css">
</head>
<body>
  <div class="container">

<?php

include '../CONFIG/configBD.php';
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if($conn -> connect_error){
  die("Connection failed: " . $conn->connect_error);
}


session_start();
if(!isset($_SESSION['carro'])){
    $_SESSION['carro'] = array();
}

if(isset($_POST['id'])){
    $nomP = $_POST['id'];
}

else{
    $nomP = "";
}

if($nomP!= ''){
    $_SESSION['carrp'][]=$nomP;
}

for($i = 0; $i < count($_SESSION['carro']); $i++){
  echo $_SESSION['carro'][$i]. '<br>';
}





$id_post = $_POST['id'];
$sql = "SELECT id, nom, descripcio, preu FROM product where id = $id_post";
$result = $conn->query($sql);

    if($result -> num_rows > 0){
      while($row = $result -> fetch_assoc()){
    ?>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="IMG/<?php echo $row['id'];?>.jpg" class="d-block w-100" alt="...">
            <div style="float: right; width: 29%; margin-right: 90px" class="col-sm-12">
            <h1 class ="card-title"><?php echo $row['nom']; ?></h1>
            <h3 class ="card-text"><?php echo $row['preu']; ?></h3>
          </div>
        </div>
    </div>
</div>

    <a href="Llista.php"><button class="btn btn-primary stretched-link" style="float : right; margin-right: 150px;">Torna</button></a>

    <a href="Carrito.php"><button class="btn btn-primary stretched-link" style="float : right; margin-right: 350px;">Afegir al Carro</button></a>
    <?php
      }
    }  
$conn->close();
?>

</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html> 
