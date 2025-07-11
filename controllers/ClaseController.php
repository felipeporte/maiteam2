<?php
require_once 'Controller.php';
require_once __DIR__.'/../models/Inscripcion.php';
require_once __DIR__.'/../models/Deportista.php';
require_once __DIR__.'/../models/Modalidad.php';

class ClaseController extends Controller {
    public function index() {
        $model = new Inscripcion();
        $inscripciones = $model->all();
        $this->render('clases/index', ['inscripciones' => $inscripciones]);
    }

    public function create() {
        $depModel = new Deportista();
        $modalModel = new Modalidad();
        $deportistas = $depModel->all();
        $modalidades = $modalModel->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Inscripcion();
            $model->create([
                'deportista_id' => $_POST['deportista_id'],
                'modalidad_id' => $_POST['modalidad_id']
            ]);
            header('Location: ./?controller=clases');
            exit;
        }
        $this->render('clases/create', ['deportistas' => $deportistas, 'modalidades' => $modalidades]);
    }

    public function delete() {
        $model = new Inscripcion();
        $model->delete($_GET['id']);
        header('Location: ./?controller=clases');
    }
}
?>
