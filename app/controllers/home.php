<?php
class Home extends Controller {
    public function index() {
        // load views
        require APP . 'views/templates/header.php';
        require APP . 'views/home/index.php';
        require APP . 'views/templates/footer.php';
    }
    public function muro(){
        session_start();
        $muros = $this->model->query("SELECT * FROM muro,usuarios_muros WHERE id_muro=id AND id_usuarios = :user_id",array("user_id"=>$_SESSION['user_id'][0]));
        // load views
        
        require APP . 'views/templates/header.php';
        require APP . 'views/user/muro.php';
        require APP . 'views/templates/footer.php';
    }


}
?>