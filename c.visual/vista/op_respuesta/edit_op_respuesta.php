<?php
$id = $enunciado = $es_correcta = $id_pregunta = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["enunciado"])) $enunciado = $dataToView["data"]["enunciado"];
if(isset($dataToView["data"]["es_correcta"])) $es_correcta = $dataToView["data"]["es_correcta"];
if(isset($dataToView["data"]["id_pregunta"])) $id_pregunta = $dataToView["data"]["id_pregunta"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="inicio.php?controlador=op_respuesta&action=list">Volver a las op_respuesta</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="inicio.php?controlador=op_respuesta&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>anunciado</label>
			<input class="form-control" type="text" name="enunciado" value="<?php echo $enunciado; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>es_correcta</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="es_correcta"><?php echo $es_correcta; ?></textarea>
		</div>
        <div class="form-group mb-3">
			<label>id_pregunta</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="id_pregunta"><?php echo $id_pregunta; ?></textarea>
</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="inicio.php?controlador=op_respuesta&action=list">Cancelar</a>
	</form>
</div>