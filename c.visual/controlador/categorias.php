<?php 

require_once 'modelo/categorias.php';

class categoriasController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'list_categorias';
		$this->page_title = '';
		$this-> categoriasObj = new Categorias();
	}

	/* List all categoriass */
	public function list(){
		$this->page_title = 'categorias';
		return $this-> categoriasObj->getCategorias();
	}

	/* Load categorias for edit */
	public function edit($id = null){
		$this->page_title = 'lista de categorias';
		$this->view = 'edit_categorias';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this-> categoriasObj->getCategoriasById($id);
	}

	/* Create or update categorias */
	public function save(){
		$this->view = 'edit_categorias';
		$this->page_title = 'lista de categorias';
		$id = $this-> categoriasObj->save($_POST);
		$result = $this-> categoriasObj->getCategoriasById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'eliminar categorias';
		$this->view = 'confirm_delete_categorias';
		return $this-> categoriasObj->getCategoriasById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de categorias';
		$this->view = 'delete_categorias';
		return $this-> categoriasObj->deleteCategoriasById($_POST["id"]);
	}

}

?>