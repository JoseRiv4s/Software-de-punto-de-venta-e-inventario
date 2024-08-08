<?php

session_start();

if (isset($_SESSION['usuario'])) {

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>

    <?php require_once "menu.php"; ?>

</head>

<body>


    <div class="container">

        <h1>Categorias</h1>

        <div class="row">

            <div class="col-sm-4">
                <form id="frmCategorias">

                    <label>Categorias</label>
                    <input type="text" class="form-control input-sm" name="categoria" id="categoria">
                    <p></p>
                    <span class="btn btn-primary" id="btnAgregaCategoria">Agregar</span>

                </form>
            </div>

            <div class="col-sm-6">
                <div id="tablaCategoriaLoad"></div>
            </div>

        </div>

    </div>


    <!-- Modal para cambiar el dato de categoria -->
    <div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-sm" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR CATEGORIA</h4>
                </div>

                <div class="modal-body">

                    <form id="frmCategoriaU">
                        <input type="text" hidden="" id="idcategoria" name="idcategoria">
                        <label>Categoria</label>
                        <input type="text" id="categoriaU" name="categoriaU" class="form-control input-sm">
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" id="btnActualizaCategoria" class="btn btn-warning" data-dismiss="modal">Guardar</button>
                </div>

            </div>

        </div>

    </div>


</body>

</html>



<!-- Script para agregar categorias -->
<script type="text/javascript">

	$(document).ready(function () {

		$('#tablaCategoriaLoad').load('categorias/tablaCategorias.php');

		$('#btnAgregaCategoria').click(function () {

			vacios = validarFormVacio('frmCategorias');
			if (vacios > 0) {
				alertify.alert("Debes llenar todos los campos");
				return false;
			}


			datos = $('#frmCategorias').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url: "../procesos/categorias/agregaCategoria.php",
				success: function (r) {
					
					if (r==1) {

						//Esto vacia el formulario cuando se agrega una categoria
						$('#frmCategorias')[0].reset();

						$('#tablaCategoriaLoad').load('categorias/tablaCategorias.php');
					
						alert("Categoria Agregada");
					}else {
						alert("No se agrego la categoria");
					}
				}
			});
		});

	});

</script>


<!-- Script para actuliazar categorias -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnActualizaCategoria').click(function(){

			datos=$('#frmCategoriaU').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/categorias/actualizaCategoria.php",
				success:function(r){
					if(r==1){
						$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
						alert("Actualizado");
					}else{
						alert("no se pudo actaulizar");
					}
				}
			});
		});
	});
</script>


<!-- Script para eliminar categorias -->
<script type="text/javascript">
	function agregaDato(idCategoria,categoria){
		$('#idcategoria').val(idCategoria);
		$('#categoriaU').val(categoria);
	}

	function eliminaCategoria(idcategoria){
		alertify.confirm('¿Desea eliminar esta categoria?', function(){ 
			$.ajax({
				type:"POST",
				data:"idcategoria=" + idcategoria,
				url:"../procesos/categorias/eliminarCategoria.php",
				success:function(r){
					if(r==1){
						$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
						alert("Eliminado");
					}else{
						alert("No se pudo eliminar");
					}
				}
			});
		}, function(){ 
			alertify.error('Cancelo !')
		});
	}
</script>




<?php

} else {
    header("location:../index.php");
}

?>



