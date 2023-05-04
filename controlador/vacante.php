<?php
require_once("modelo/vacante.php");
class VacanteController{
    private $model;
    public function __construct(){
        $this->model = new Vacante();
    }
    // mostrar
    static function index(){
        $vacantes   = new Vacante();
        $info       =   $vacantes->getVacantes();
        require_once("vista/vacantes.php");
    }

    static function getDetalle($referencenumber){
        $vacantes   = new Vacante();
        $info       =   $vacantes->getDetalle($referencenumber);
       
        echo  $info;
    }


}