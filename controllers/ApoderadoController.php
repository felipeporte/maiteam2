<?php
require_once 'Controller.php';
require_once __DIR__.'/../models/Apoderado.php';
require_once __DIR__.'/../models/Deportista.php';

class ApoderadoController extends Controller {
    public function index() {
        $model = new Apoderado();
        $apoderados = $model->all();
        $this->render('apoderados/index', ['apoderados' => $apoderados]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Apoderado();
            $model->create([
                'nombre' => $_POST['nombre'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono']
            ]);
            header('Location: /?controller=apoderados');
            exit;
        }
        $this->render('apoderados/create');
    }

    public function edit() {
        $model = new Apoderado();
        $apoderado = $model->find($_GET['id']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->update($_GET['id'], [
                'nombre' => $_POST['nombre'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono']
            ]);
            header('Location: /?controller=apoderados');
            exit;
        }
        $this->render('apoderados/edit', ['apoderado' => $apoderado]);
    }

    public function delete() {
        $model = new Apoderado();
        $model->delete($_GET['id']);
        header('Location: /?controller=apoderados');
    }
}
?>
