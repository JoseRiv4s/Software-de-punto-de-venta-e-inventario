
<?php
 
    require_once "../../class/Conexion.php";
    require_once "../../class/Usuarios.php";


    $obj= new usuarios();

    $pass=sha1($_POST['password']);
    $datos=array(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['usuario'],
        $pass
    );

    echo $obj->registroUsuario($datos);
 
 ?>