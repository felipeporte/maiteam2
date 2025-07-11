<?php
require_once __DIR__ . '/../controllers/ApoderadoController.php';
require_once __DIR__ . '/../controllers/DeportistaController.php';
require_once __DIR__ . '/../controllers/ClaseController.php';
require_once __DIR__ . '/../controllers/PagoController.php';
require_once __DIR__ . '/../controllers/FacturaController.php';

$controller = $_GET['controller'] ?? 'apoderados';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'apoderados':
        $ctrl = new ApoderadoController();
        break;
    case 'deportistas':
        $ctrl = new DeportistaController();
        break;
    case 'clases':
        $ctrl = new ClaseController();
        break;
    case 'pagos':
        $ctrl = new PagoController();
        break;
    case 'facturas':
        $ctrl = new FacturaController();
        break;
    default:
        $ctrl = new ApoderadoController();
}

if (method_exists($ctrl, $action)) {
    $ctrl->$action();
} else {
    echo 'Acción no válida';
}
?>
