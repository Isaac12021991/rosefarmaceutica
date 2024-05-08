<div id="div_producto">
	<select class="form-control input-sm input-medium selectpicker" onchange="info_producto_sin_lista_precio_almacen()" data-live-search="true" id="co_producto" name="co_producto">
	<option value="">Seleccione ...</option>
	<option value="crear">Crear ...</option>
	<?php foreach($lista_producto->result() as $row){

		if ($co_new_producto == $row->id):

		echo "<option selected='selected' value='".$row->id."'>".$row->nb_producto."</option>";

	   continue; endif;

	   echo "<option value='".$row->id."'>".$row->nb_producto."</option>";

	} ?>
	</select>
</div>
                                                
<script type="text/javascript">
  

    $('.selectpicker').selectpicker();

//Valida si el producto a agregar tiene disponibilidad en el inventario


</script>