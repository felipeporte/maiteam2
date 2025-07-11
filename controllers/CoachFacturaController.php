<?php
require_once 'Controller.php';
require_once __DIR__.'/../models/FacturaCoach.php';
require_once __DIR__.'/../models/Coach.php';

class CoachFacturaController extends Controller {
    public function index() {
        $model = new FacturaCoach();
        $totales = $model->totalesPorCoach();
        $this->render('coach_facturas/index', ['totales'=>$totales]);
    }

    public function show() {
        $model = new FacturaCoach();
        $detalle = $model->porCoach($_GET['id']);
        $this->render('coach_facturas/show', ['detalle'=>$detalle]);
    }
}
?>
