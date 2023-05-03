<?php 
class Home extends Controllers{
	public function __construct() {
    parent::__construct();
   
}


	public function home($parems) {
		$this->views->getView($this,"home");
	}

	public function datos($params){
		echo " Dato  recibido : ".$params;
	}

	public function carrito($params){
		$carrito = $this->model->getCarrito($params);
		echo $carrito;
	}
}

 ?>