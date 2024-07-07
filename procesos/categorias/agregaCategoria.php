
<?php
    
    session_start();
    require_once "../../class/Conexion.php";
    require_once "../../class/Categorias.php";

    $fecha=date("Y-m-d");
    $idusuario=$_SESSION['iduser'];
    $categoria=$_POST['categoria'];



    $datos=array(

        $idusuario,
        $categoria,
        $fecha

    );

    $obj= new categorias();
    
    echo $obj->agregaCategoria($datos);

?>