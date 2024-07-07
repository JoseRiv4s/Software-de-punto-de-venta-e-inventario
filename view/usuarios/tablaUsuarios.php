
<?php

    require_once "../../class/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    $sql="SELECT id_usuario, nombre, apellido, email FROM usuarios";

    $result=mysqli_query($conexion,$sql);


?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">

    <caption>
        <label>USUARIOS</label>
    </caption>

    <tr>
        <td>NOMBRE</td>
        <td>APELLIDO</td>
        <td>USUARIO</td>
        <td>EDITAR</td>
        <td>ELIMINAR</td>
    </tr>

    <?php while($ver=mysqli_fetch_row($result)):?>

    <tr>

        <td> <?php echo $ver[1]?> </td>
        <td> <?php echo $ver[2]?> </td>
        <td> <?php echo $ver[3]?> </td>

        <td>

            <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaUsuarioModal" onclick="agregaDatosUsuario('<?php echo $ver[0];?>')" >
                <span class="glyphicon glyphicon-pencil"></span>
            </span>

        </td>

        <td>

            <span class="btn btn-danger btn-xs" onclick="eliminarUsuario('<?php echo $ver[0];?>')">
                <span class="glyphicon glyphicon-remove"></span>
            </span>

        </td>

    </tr>
    
    <?php endwhile?>

</table>