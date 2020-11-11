<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rural Shisha</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php
include '../CONFIG/configBD.php';
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if($conn -> connect_error){
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nom FROM product";
$result = $conn->query($sql);

if($result->num_rows > 0){
  //output data of each row
  while($row = $result->fetch_assoc()){
    ?>
  <img src="IMG/<?php echo $row['id'];?>.jpg" alt="...">
    <?php echo $row['nom'];?>
    <a href="Detalls.php?id=<?php echo $row['Id'];?>"><button class="btn btn-primary stretched-link">Detalls</button></a>
    <?php
  }
}else{
  echo " 0 results ";
}
$conn->close();
?>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html> 
