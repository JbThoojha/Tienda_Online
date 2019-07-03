<?php
require_once 'model/usuario.php';

class inicioController{

    private $model;

    public function __construct(){
        $this->model = new usuario();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/inicio/Bienvenido.php';

    }
}
