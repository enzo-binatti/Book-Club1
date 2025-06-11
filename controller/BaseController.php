<?php
class BaseController {
    protected $viewPath = '../view';
    
    public function render($view, $data = []) {
        extract($data);
        require_once $this->viewPath . '/' . $view . '.php';
    }
    
    protected function redirect($path) {
        header('Location: ' . $path);
        exit();
    }
    
    protected function validateRequest($requiredFields = []) {
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field])) {
                throw new Exception("Campo obrigatório não encontrado: $field");
            }
        }
    }
}
