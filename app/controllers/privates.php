<?php
class Privates extends Controller {
    public function index() {
        // load views
        session_start();
        if(isset($_SESSION['user'])){
            require APP . 'views/templates/header.php';
            require APP . 'views/user/privates.php';
            require APP . 'views/templates/footer.php';
            
        }else{
            header("Location:/");
        }

    }

    public function name($name,$id){
        session_start();
        if(isset($_SESSION['user_id']) && $id == $_SESSION['user_id'][0]){
            require APP . 'views/templates/header.php';
            require APP . 'views/user/privates.php';
            require APP . 'views/templates/footer.php';
        }else{
            header("Location:/");
        }
    }

}
?>