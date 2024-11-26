<div class="row">
	<div class="col-md-12 text-right">
		<a href="inicio.php?controlador=preguntas&action=edit" class="btn btn-outline-primary">Crear pregunta</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $preguntas){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $preguntas['enunciado']; ?></h5>
					<div class="card-text"><?php echo nl2br($preguntas['id_nivel']); ?></div>
                    <div class="card-text"><?php echo nl2br($preguntas['id_categoria']); ?></div>
					<hr class="mt-1"/>
					<a href="inicio.php?controlador=preguntas&action=edit&id=<?php echo $preguntas['id']; ?>" class="btn btn-primary">Editar</a>
					<a href="inicio.php?controlador=preguntas&action=confirmDelete&id=<?php echo $preguntas['id']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen pregunta.
		</div>
		<?php
	}
	?>
</div>