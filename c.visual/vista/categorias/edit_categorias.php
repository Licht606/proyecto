<?php
$id = $materias = $descripcion = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["materias"])) $materias = $dataToView["data"]["materias"];
if(isset($dataToView["data"]["descripcion"])) $descripcion = $dataToView["data"]["descripcion"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="inicio.php?controlador=categorias&action=list">Volver a las categorias</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="inicio.php?controlador=categorias&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>materia</label>
			<input class="form-control" type="text" name="materias" value="<?php echo $materias; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Descripción</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="descripcion"><?php echo $descripcion; ?></textarea>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="inicio.php?controlador=categorias&action=list">Cancelar</a>
	</form>
</div>