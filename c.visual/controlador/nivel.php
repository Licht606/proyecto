<?php 

require_once 'modelo/nivel.php';

class nivelController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'list_nivel';
		$this->page_title = '';
		$this-> nivelObj = new Nivel();
	}

	/* List all nivel */
	public function list(){
		$this->page_title = 'nivel';
		return $this-> nivelObj->getNivel();
	}

	/* Load nivel for edit */
	public function edit($id = null){
		$this->page_title = 'lista de nivel';
		$this->view = 'edit_nivel';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this-> nivelObj->getNivelById($id);
	}

	/* Create or update nivel */
	public function save(){
		$this->view = 'edit_nivel';
		$this->page_title = 'lista de niveles';
		$id = $this-> nivelObj->save($_POST);
		$result = $this-> nivelObj->getNivelById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'eliminar nivel';
		$this->view = 'confirm_delete_nivel';
		return $this-> nivelObj->getNivelById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de nivel';
		$this->view = 'delete_nivel';
		return $this-> nivelObj->deleteNivelById($_POST["id"]);
	}

}

?>