<?php
require_once 'Controller.php';
require_once __DIR__.'/../models/Factura.php';
require_once __DIR__.'/../models/Apoderado.php';

class FacturaController extends Controller {
    public function index() {
        $model = new Factura();
        $apModel = new Apoderado();
        $filtros = [
            'apoderado_id' => $_GET['apoderado_id'] ?? null,
            'mes' => $_GET['mes'] ?? null,
            'estado' => $_GET['estado'] ?? null
        ];
        $facturas = $model->allFiltered($filtros);
        $apoderados = $apModel->all();
        $this->render('facturas/index', ['facturas'=>$facturas,'apoderados'=>$apoderados,'filtros'=>$filtros]);
    }

    public function generar() {
        $mes = date('n');
        $año = date('Y');
        $model = new Factura();
        $model->generarMensualidad($mes, $año);
        header('Location: ./?controller=facturas');
    }

    public function show() {
        $model = new Factura();
        $factura = $model->find($_GET['id']);
        $this->render('facturas/show', ['factura'=>$factura]);
    }

    public function registrarPago() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Factura();
            $model->registrarPago($_POST['factura_id'], $_POST['monto']);
        }
        header('Location: ./?controller=facturas&action=show&id=' . $_POST['factura_id']);
    }
}
?>
