
<?php 

    session_start();

    if(isset($_SESSION['usuario'])){
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>

    <?php  require_once"menu.php"; ?>

</head>
<body>
    
    <div class="container">
        <h1>Venta de productos</h1>

        <div class="row">

            <div class="col-sm-12">

                <span class="btn btn-default" id="ventaProductosBtn">Vender</span>
                <span class="btn btn-default" id="ventasBtn">Ventas</span>

            </div>

        </div>

        <div class="row">
            
            <div class="col-sm-12">

                <div id="ventaProductos"></div>
                <div id="ventas"></div>

            </div>
            
        </div>

    </div>

</body>
</html>

<script type="text/javascript">

    $(document).ready(function(){

        $('#ventaProductosBtn').click(function(){
            esconderSeccionVenta();
            $('#ventaProductos').load('ventas/ventasDeProductos.php');
            $('#ventaProductos').show();
        });

        
        $('#ventasBtn').click(function(){
            esconderSeccionVenta();
            $('#ventas').load('ventas/ventasyReportes.php');
            $('#ventas').show();
        });

    });

    function esconderSeccionVenta(){
        $('#ventaProductos').hide();
        $('#ventas').hide();
    }

</script>


<?php 

    }else{
        header("location:../index.php");
    }

?>