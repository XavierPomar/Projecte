<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rural Shisha</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="row row-cols-1 row-cols-md-3">

<?php
include '../CONFIG/configBD.php';
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if($conn -> connect_error){
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nom, preu FROM product";
$result = $conn->query($sql);

if($result->num_rows > 0){
  //output data of each row
while($row = $result->fetch_assoc()){
    ?>
  <div class="col mb-4">
    <div class="card">
      <img src="IMG/<?php echo $row['id'];?>.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h2 class="card-title" style="text-align : center"><?php echo $row['nom'];?></h2><br>
	<h2 class="card-text"><?php echo $row['preu'];?>€</h2>
	<a href="Detalls.php?id=<?php echo $row['id']; ?>"><button style="margin-left : 20px " class ="btn btn-primary stretched-link">Detalls</button></a>
      </div>
    </div>
  </div>
 <?php
  }
}else{
  echo " 0 results ";
}
$conn->close();
?>
</div>

</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>
