<?php
require_once 'Controller.php';
require_once __DIR__.'/../models/FacturaDeportista.php';
require_once __DIR__.'/../models/Deportista.php';

class DeportistaFacturaController extends Controller {
    public function index() {
        $model = new FacturaDeportista();
        $totales = $model->totalesPorDeportista();
        $this->render('deportista_facturas/index', ['totales'=>$totales]);
    }

    public function show() {
        $model = new FacturaDeportista();
        $detalle = $model->porDeportista($_GET['id']);
        $this->render('deportista_facturas/show', ['detalle'=>$detalle]);
    }
}
?>
