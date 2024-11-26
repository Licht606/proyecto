<div class="row">
	<div class="col-md-12 text-right">
		<a href="inicio.php?controlador=categorias&action=edit" class="btn btn-outline-primary">Crear categoria</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $categorias){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $categorias['materias']; ?></h5>
					<div class="card-text"><?php echo nl2br($categorias['descripcion']); ?></div>
					<hr class="mt-1"/>
					<a href="inicio.php?controlador=categorias&action=edit&id=<?php echo $categorias['id']; ?>" class="btn btn-primary">Editar</a>
					<a href="inicio.php?controlador=categorias&action=confirmDelete&id=<?php echo $categorias['id']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen categorias.
		</div>
		<?php
	}
	?>
</div>