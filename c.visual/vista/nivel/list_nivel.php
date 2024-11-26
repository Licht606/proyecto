<div class="row">
	<div class="col-md-12 text-right">
		<a href="inicio.php?controlador=nivel&action=edit" class="btn btn-outline-primary">Crear nivel</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $nivel){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $nivel['puntaje']; ?></h5>
					<div class="card-text"><?php echo nl2br($nivel['id_user']); ?></div>
					<hr class="mt-1"/>
					<a href="inicio.php?controlador=nivel&action=edit&id=<?php echo $nivel['id']; ?>" class="btn btn-primary">Editar</a>
					<a href="inicio.php?controlador=nivel&action=confirmDelete&id=<?php echo $nivel['id']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen nivel.
		</div>
		<?php
	}
	?>
</div>