<?php 

class Oprespuesta {

	private $table = 'op_respuesta';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all notes */
	public function getOp_respuesta(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get note by id */
	public function getOp_respuestaById($id){
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
		$enunciado = $es_correcta = $id_pregunta = "";

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualOp_respuesta = $this->getOp_respuestaById($param["id"]);
			if(isset($actualOp_respuesta["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$es_correcta = $actualOp_respuesta["es_correcta"];
                $id_pregunta = $actualOp_respuesta["id_pregunta"];
				$enunciado = $actualOp_respuesta["enunciado"];
			}
		}

		/* Received values */
		if(isset($param["es_correcta"])) $es_correcta = $param["es_correcta"];
        if(isset($param["id_pregunta"])) $es_correcta = $param["id_pregunta"];
		if(isset($param["enunciado"])) $enunciado = $param["enunciado"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET es_correcta=?, enunciado=?, id_pregunta=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$es_correcta, $enunciado, $id_pregunta, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (es_correcta, enunciado, id_pregunta) values(?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$es_correcta, $enunciado, $id_pregunta]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}

	/* Delete note by id */
	public function deleteOp_respuestaById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>