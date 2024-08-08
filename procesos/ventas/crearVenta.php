
<?php

    session_start();
    require_once "../../class/Conexion.php";
    require_once "../../class/Ventas.php";

    $obj= new ventas();

    if(count($_SESSION['tablaComprasTemp'])==0){
        echo 0;
    }else{
        $result=$obj->crearVenta();
        unset($_SESSION['tablaComprasTemp']);
        echo $result;
    }

?>