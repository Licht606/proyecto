<?php 

require_once 'modelo/oprespuesta.php';

class op_respuestaController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'list_op_respuesta';
		$this->page_title = '';
		$this-> op_respuestaObj = new Oprespuesta();
	}

	/* List all op_respuesta */
	public function list(){
		$this->page_title = 'list_op_respuesta';
        $this->view = 'list_op_respuesta';
		return $this-> op_respuestaObj->getOp_respuesta();
	}

	/* Load op_respuesta for edit */
	public function edit($id = null){
		$this->page_title = 'lista de op_respuesta';
		$this->view = 'edit_op_respuesta';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this-> op_respuestaObj->getOp_respuestaById($id);
	}

	/* Create or update op_respuesta */
	public function save(){
		$this->view = 'edit_op_respuesta';
		$this->page_title = 'lista de op_respuesta';
		$id = $this-> op_respuestaObj->save($_POST);
		$result = $this-> op_respuestaObj->getOp_respuestaById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'eliminar op_respuesta';
		$this->view = 'confirm_delete_op_respuesta';
		return $this-> op_respuestaObj->getOp_respuestaById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de op_respuesta';
		$this->view = 'delete_op_respuesta';
		return $this-> op_respuestaObj->deleteOp_respuestaById($_POST["id"]);
	}

}

?>