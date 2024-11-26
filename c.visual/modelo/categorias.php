<?php 

class Categorias {

	private $table = 'categorias';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all notes */
	public function getCategorias(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get note by id */
	public function getCategoriasById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save note */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$descripcion = $materias = "";

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualCategorias = $this->getCategoriasById($param["id"]);
			if(isset($actualCategorias["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$materias = $actualCategorias["materias"];
				$descripcion = $actualCategorias["descripcion"];
			}
		}

		/* Received values */
		if(isset($param["materias"])) $materias = $param["materias"];
		if(isset($param["descripcion"])) $descripcion = $param["descripcion"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET materias=?, descripcion=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$materias, $descripcion, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (materias, descripcion) values(?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$materias, $descripcion]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}

	/* Delete note by id */
	public function deleteCategoriasById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>