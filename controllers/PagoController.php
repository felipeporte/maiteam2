<?php
require_once 'Controller.php';
require_once __DIR__.'/../models/Pago.php';
require_once __DIR__.'/../models/Apoderado.php';

class PagoController extends Controller {
    public function index() {
        $model = new Pago();
        $pagos = $model->all();
        $this->render('pagos/index', ['pagos' => $pagos]);
    }

    public function create() {
        $apModel = new Apoderado();
        $apoderados = $apModel->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Pago();
            $model->create([
                'apoderado_id' => $_POST['apoderado_id'],
                'tipo' => $_POST['tipo'],
                'monto' => $_POST['monto'],
                'fecha' => $_POST['fecha']
            ]);
            header('Location: ./?controller=pagos');
            exit;
        }
        $this->render('pagos/create', ['apoderados' => $apoderados]);
    }

    public function delete() {
        $model = new Pago();
        $model->delete($_GET['id']);
        header('Location: ./?controller=pagos');
    }
}
?>
