<!DOCTYPE html>
<hmtl>
<head></head>
<body>

<form action="wishlist.php" method="post">
        Producte: <input type="text" name="product"> <br>
        <input type="submit" value="Enviar">
</form>

<p>---------------------------------------------------------------</p>

</body>
</hmtl>

<?php

session_start();
if(!isset($_SESSION['list'])){
	$_SESSION['list'] = array();
}

if(isset($_POST['product'])){
	$nom = $_POST['product'];
}

else{
	$nom = "";
}

if($nom!=''){
	$_SESSION['list'][]=$nom;
}

for($i = 0; $i < count($_SESSION['list']); $i++){
echo $_SESSION['list'][$i] . '<br>';

}

?>
