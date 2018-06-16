<?php
class Usuarios extends Controller {
    public function index() {
        
        $result = $this->model->query("SELECT * FROM user");
        
        // load views
        require APP . 'views/templates/header.php';
        require APP . 'views/user/list.php';
        require APP . 'views/templates/footer.php';
    }


}
?>