<?php
$id = $enunciado = $id_nivel = $id_categoria = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["enunciado"])) $enunciado = $dataToView["data"]["enunciado"];
if(isset($dataToView["data"]["id_nivel"])) $id_nivel = $dataToView["data"]["id_nivel"];
if(isset($dataToView["data"]["id_categoria"])) $id_categoria = $dataToView["data"]["id_categoria"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="inicio.php?controlador=preguntas&action=list">Volver a los preguntases</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="inicio.php?controlador=preguntas&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>enunciado</label>
			<input class="form-control" type="text" name="enunciado" value="<?php echo $enunciado; ?>" />
		</div>
		<label>id_nivel</label>
		<input class="form-control" type="text" name="id_nivel" value="<?php echo $id_nivel; ?>" />
        <label>id_categoria</label>
		<input class="form-control" type="text" name="id_categoria" value="<?php echo $id_categoria; ?>" />
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="inicio.php?controlador=preguntas&action=list">Cancelar</a>
	</form>
</div>