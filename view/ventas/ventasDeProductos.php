<h4>Vender</h4>

<div class="row">

    <div class="col-sm-4">

        <form id="frmVentasProductos">

            <label for="">Selecciona Cliente</label>
            <select class="form-control input-sm" id="clienteVenta" name="clienteVenta">
                <option value="A">Seleccionar</option>
            </select>


            <label for="">Producto</label>
            <select class="form-control input-sm" id="productoVenta" name="productoVenta">
                <option value="A">Seleccionar</option>
            </select>


            <label for="">Descripción</label>
            <textarea name="" id="" class="form-control input-sm" cols="30" rows="10"></textarea>


            <label for="">Cantidad</label>
            <input type="text" class="form-control input-sm" id="" name="">


            <label for="">Precio</label>
            <input type="text" class="form-control input-sm" id="" name="">


            <p></p>
            <span class="btn btn-primary" id="btnAgregaVenta">Vender</span>


        </form>

    </div>

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $('#clienteVenta').select2();
        $('#productoVenta').select2(); 

    });

</script>