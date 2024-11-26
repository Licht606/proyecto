<?php
$id = $puntaje = $id_user = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["puntaje"])) $puntaje = $dataToView["data"]["puntaje"];
if(isset($dataToView["data"]["id_user"])) $id_user = $dataToView["data"]["id_user"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="inicio.php?controlador=nivel&action=list">Volver a los niveles</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="inicio.php?controlador=nivel&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>puntaje</label>
			<input class="form-control" type="text" name="puntaje" value="<?php echo $puntaje; ?>" />
		</div>
		<label>id_user</label>
		<input class="form-control" type="text" name="id_user" value="<?php echo $id_user; ?>" />
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="inicio.php?controlador=nivel&action=list">Cancelar</a>
	</form>
</div>