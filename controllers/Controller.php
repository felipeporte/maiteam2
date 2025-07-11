<?php
abstract class Controller {
    protected function render($view, $data = []) {
        extract($data);
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/' . $view . '.php';
        include __DIR__ . '/../views/footer.php';
    }
}
?>
