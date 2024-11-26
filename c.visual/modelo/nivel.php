<?php 

class Nivel {

	private $table = 'nivel';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all notes */
	public function getNivel(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get note by id */
	public function getNivelById($id){
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
		$puntaje = $id_user = "";

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualNivel = $this->getNivelById($param["id"]);
			if(isset($actualNivel["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$puntaje = $actualNivel["puntaje"];
				$id_user = $actualNivel["id_user"];
			}
		}

		/* Received values */
		if(isset($param["puntaje"])) $puntaje = $param["puntaje"];
		if(isset($param["nombre"])) $nombre = $param["nombre"];
		if(isset($param["id_user"])) $id_user = $param["id_user"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET puntaje=?, id_user=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$puntaje, $id_user , $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (puntaje, id_user) values(?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$puntaje, $id_user]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}

	/* Delete note by id */
	public function deleteNivelById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>