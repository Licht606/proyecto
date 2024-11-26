<div class="row">
	<form class="form" action="inicio.php?controlador=op_respuesta&action=delete" method="POST">
		<input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar esta opcion de respuesta?:</b>
			<i><?php echo $dataToView["data"]["nombre"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="inicio.php?controlador=op_respuesta&action=list">Cancelar</a>
	</form>
</div>