<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rural Shisha</title>
  <link rel="shortcut icon" href="IMG/logo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/fullestil.css">
</head>
<body id="b">
<div class="container">
    <div class="row">

   <?php

   include '../CONFIG/configBD.php';
   include 'capçalera.html';
   $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, nom, descripcio, preu FROM product";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<div class='col-sm-6 col-md-4' id='div1'>";
            echo "<div class='card text-center'id='c' >";
                echo "<img class='card-img-top' src='IMG/Cachimba/".$row["id"].".jpg' alt='".$row["nom"]."'>";
                 echo  "<div class='card-body'>";
                    echo "<h5 class='card-title'> ".$row["nom"]."</h5>";
                     echo "<p class='card-text'>".$row["preu"]." € </p>";
                echo "</div>";
                 echo "<div class='card-footer'>";
                  echo "<button class='btn btn-dark'>";
                   echo "<a href='Detalls.php?id=".$row["id"]."&nom=".$row["nom"]."&descripcio=".$row["descripcio"]."&preu=".$row["preu"]."'>Detalls</a>";
                 echo "</button>";
                 echo "</div>";
             echo "</div>";
        echo "</div>";
    }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    </div>
<?php
include 'footer.html';
?>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>
