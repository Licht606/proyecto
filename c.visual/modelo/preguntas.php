<?php 

class preguntas {

	private $table = 'preguntas';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all notes */
	public function getPreguntas(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get note by id */
	public function getPreguntasById($id){
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
		$enunciado= $id_nivel = $id_categoria = "";

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualPregunta = $this->getPreguntasById($param["id"]);
			if(isset($actualPregunta["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$enunciado = $actualPregunta["enunciado"];
				$id_nivel = $actualPregunta["id_nivel"];
				$id_categoria = $actualPregunta["id_categoria"];
			}
		}

		/* Received values */
		if(isset($param["enunciado"])) $enunciado = $param["enunciado"];
		if(isset($param["id_categoria"]))$id_categoria = $param["id_categoria"];
		if(isset($param["id_nivel"])) $id_nivel = $param["id_nivel"];
	

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET enunciado=?, id_nivel=?, id_categoria=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$enunciado, $id_nivel , $id_categoria, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (enunciado, id_nivel, id_categoria) values(?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$enunciado, $id_nivel, $id_categoria]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}

	/* Delete note by id */
	public function deletePreguntasById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>