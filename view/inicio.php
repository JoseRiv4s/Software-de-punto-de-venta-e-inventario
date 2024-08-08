
<?php 

    session_start();

    if(isset($_SESSION['usuario'])){
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas e inventario</title>

    <?php  require_once"menu.php"; ?>

</head>
<body>
    
    <h1 style="text-align: center;">BIENVENIDO A TU SISTEMA DE PUNTO DE VENTA E INVENTARIO</h1>
    <br>
    <h3 style="text-align: center;">¡COMIENZA A REGISTRAR TU INFORMACIÓN!</h3>


</body>
</html>


<?php 

    }else{
        header("location:../index.php");
    }

?>




