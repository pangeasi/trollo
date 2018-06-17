<?php

class Application {
    private $url_controller = null;
    private $url_action = null;
    private $url_params = null;

    public function __construct() {
        // crea un array con las partes de la URL en $url
        $this->splitUrl();
        // si no hay controlador en la URL entonces carga la página principal
        if (!$this->url_controller) {
            require APP . 'controllers/home.php';
            $page = new Home();
            $page->index();
        } elseif (file_exists(APP . 'controllers/' . $this->url_controller . '.php')) {
            // Chequea controller:
            // si lo hay, lo carga y lo crea
            // ejemplo: si el controller es "car", entonces: $this->car = new car();
            require APP . 'controllers/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();
            // chequea si hay metodo:
            if (method_exists($this->url_controller, $this->url_action)) {
                if (!empty($this->url_params)) {
                    // llama al metodo y le pasa los parametros
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    // Si no hay parametros solo llama al metodo, $this->home->method();
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                if (strlen($this->url_action) == 0) {
                    // si no hay url_action: llama por defecto a index() del controlador
                    $this->url_controller->index();
                }
                else {
                    header('location: ' . URL . 'problem');
                }
            }
        } else {
            require APP . 'controllers/home.php';
            $page = new Home();
            if (method_exists($page, $this->url_controller)) {
                exit($page->{$this->url_controller}());
            }else{
                header('location: ' . URL . 'problem');
            }
            
            
        }
    }

    private function splitUrl() {
        if (isset($_GET['url'])) {

            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;
            // elimina el controlador y la acción split URL
            unset($url[0], $url[1]);
            // almacena los parametros
            $this->url_params = array_values($url);
            // Debugging.
            //echo 'Controller: ' . $this->url_controller . '<br>';
            //echo 'Action: ' . $this->url_action . '<br>';
            //echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
        }
    }

}

?>