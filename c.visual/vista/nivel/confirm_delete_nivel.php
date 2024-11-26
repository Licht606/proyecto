<div class="row">
	<form class="form" action="inicio.php?controlador=nivel&action=delete" method="POST">
		<input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar este nivel?:</b>
			<i><?php echo $dataToView["data"]["id_user"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="inicio.php?controlador=nivel&action=list">Cancelar</a>
	</form>
</div>