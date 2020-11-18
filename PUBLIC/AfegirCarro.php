<?php
session_start();

if (isset($_GET['id'])){

    if (isset($_SESSION['carrito'])){


        $id_get = $_GET['id'];
        $cant = 1;
        $prod = false;

        for( $x = 0 ; $x < count($_SESSION['carrito']) ; $x++){
            if ($_SESSION['carrito'][$x][0] == $id_get){
                $_SESSION['carrito'][$x][1]++;
                $prod = true;
            }
        }

        if($prod == false){
            $product = array($id_get, $cant);

            array_push($_SESSION['carrito'], $product);
        }

    }else{
        $_SESSION['carrito'] = array();

        if(isset($_GET['id'])){
            $id_get = $_GET['id'];
            $cant = 1;

            $product = array($id_get, $cant);

            array_push($_SESSION['carrito'], $product);
        }
    }
}

header('Location: Carro.php');

?>
