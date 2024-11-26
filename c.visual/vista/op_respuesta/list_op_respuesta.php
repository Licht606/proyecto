<div class="row">
	<div class="col-md-12 text-right">
		<a href="inicio.php?controlador=op_respuesta&action=edit" class="btn btn-outline-primary">Crear opcion de respuesta</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $op_respuesta){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $op_respuesta['enunciado']; ?></h5>
					<div class="card-text"><?php echo nl2br($op_respuesta['es_correcta']); ?></div>
					<div class="card-text"><?php echo nl2br($op_respuesta['id_pregunta']); ?></div>
					<hr class="mt-1"/>
					<a href="inicio.php?controlador=op_respuesta&action=edit&id=<?php echo $op_respuesta['id']; ?>" class="btn btn-primary">Editar</a>
					<a href="inicio.php?controlador=op_respuesta&action=confirmDelete&id=<?php echo $op_respuesta['id']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen op_respuesta.
		</div>
		<?php
	}
	?>
</div>