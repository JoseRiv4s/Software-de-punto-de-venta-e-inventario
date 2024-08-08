<?php 

	require_once "../../class/Conexion.php";
	require_once "../../class/Ventas.php";

	$c= new conectar();
	$conexion=$c->conexion();

	$obj= new ventas();

	$sql="SELECT id_venta,fechaCompra,id_cliente FROM ventas group by id_venta";

	$result=mysqli_query($conexion,$sql); 
	?>


<h4>Ventas</h4>

<div class="row">

    <div class="col-sm-1"></div>

    <div class="col-sm-10">

        <div class="table-responsive">

            <table class="table table-hover table-condensed table-bordered" style="text-align: center;">

                <caption>
                    <label>Ventas</label>
                </caption>

                <tr>
                    <td>Folio</td>
                    <td>Fecha</td>
                    <td>Cliente</td>
                    <td>Total de compra</td>
                    <td>Factura</td>
                    <td>Reporte</td>
                </tr>

                <?php while($ver=mysqli_fetch_row($result)): ?>

                <tr>

                    <td> <?php echo $ver[0] ?> </td>
                    <td> <?php echo $ver[1] ?> </td>

                    <td>

                        <?php
                        
                            if($obj->nombreCliente($ver[2])==" ") {
                                echo "Sin cliente";
                            }else{
                                echo $obj->nombreCliente($ver[2]);
                            }

                        ?>

                    </td>


                    <td>

                        <?php
                        
                            echo "$".$obj->obtenerTotal($ver[0]);

                        ?>

                    </td>


                    <td>

                        <a href="../procesos/ventas/crearFactura.php? idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-print"></span>
                        </a>

                    </td>

                    
                    <td>

                        <a href="../procesos/ventas/crearReporte.php? idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
                           <span class="glyphicon glyphicon-signal"></span>
                        </a>

                    </td>

                    
                </tr>

                <?php endwhile; ?>

            </table>

        </div>

    </div>

    <div class="col-sm-1"></div>

</div>