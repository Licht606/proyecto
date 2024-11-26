<?php 

require_once 'modelo/preguntas.php';

class preguntasController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'list_preguntas';
		$this->page_title = '';
		$this-> preguntaObj = new Preguntas();
	}

	/* List all pregunta */
	public function list(){
		$this->page_title = 'preguntas';
		return $this-> preguntaObj->getPreguntas();
	}

	/* Load pregunta for edit */
	public function edit($id = null){
		$this->page_title = 'lista de preguntas';
		$this->view = 'edit_preguntas';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this-> preguntaObj->getPreguntasById($id);
	}

	/* Create or update pregunta */
	public function save(){
		$this->view = 'edit_preguntas';
		$this->page_title = 'lista de preguntas';
		$id = $this-> preguntaObj->save($_POST);
		$result = $this-> preguntaObj->getPreguntasById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'eliminar pregunta';
		$this->view = 'confirm_delete_preguntas';
		return $this->preguntaObj->getPreguntasById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de preguntas';
		$this->view = 'delete_pregunta';
		return $this->preguntaObj->deletePreguntasById($_POST["id"]);
	}

}

?>