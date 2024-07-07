
<?php
    
    session_start();
    require_once "../../class/Conexion.php";
    require_once "../../class/Usuarios.php";


    $obj= new usuarios();

    $datos=array(
        $_POST['usuario'],
        $_POST['password']
    );

    echo $obj->loginUser($datos);
 
 ?>