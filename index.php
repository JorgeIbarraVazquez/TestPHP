<?php
require_once("controlador/vacante.php");
if(isset($_GET['ref'])){
    VacanteController::getDetalle($_GET['ref']);
}else{
    VacanteController::index();
}
    
