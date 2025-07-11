<?php
require_once 'Controller.php';
require_once __DIR__.'/../models/Deportista.php';
require_once __DIR__.'/../models/Apoderado.php';
require_once __DIR__.'/../models/Inscripcion.php';
require_once __DIR__.'/../models/Modalidad.php';

class DeportistaController extends Controller {
    public function index() {
        $model = new Deportista();
        $deportistas = $model->all();
        $this->render('deportistas/index', ['deportistas' => $deportistas]);
    }

    public function create() {
        $apModel = new Apoderado();
        $apoderados = $apModel->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Deportista();
            $model->create([
                'apoderado_id' => $_POST['apoderado_id'],
                'nombre' => $_POST['nombre'],
                'edad' => $_POST['edad']
            ]);
            header('Location: /?controller=deportistas');
            exit;
        }
        $this->render('deportistas/create', ['apoderados' => $apoderados]);
    }

    public function edit() {
        $model = new Deportista();
        $apModel = new Apoderado();
        $apoderados = $apModel->all();
        $deportista = $model->find($_GET['id']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->update($_GET['id'], [
                'apoderado_id' => $_POST['apoderado_id'],
                'nombre' => $_POST['nombre'],
                'edad' => $_POST['edad']
            ]);
            header('Location: /?controller=deportistas');
            exit;
        }
        $this->render('deportistas/edit', ['deportista' => $deportista, 'apoderados' => $apoderados]);
    }

    public function delete() {
        $model = new Deportista();
        $model->delete($_GET['id']);
        header('Location: /?controller=deportistas');
    }
}
?>
