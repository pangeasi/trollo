<?php
class Home extends Controller {
    public function index() {
        $titlePage="Página principal";
        // load views
        require APP . 'views/templates/header.php';
        require APP . 'views/home/index.php';
        require APP . 'views/templates/footer.php';
    }
    public function muro($name){
        $titlePage="Tu muro";

        session_start();
        if(isset($_SESSION['user_id'])){
            if($name == ''){
                $muros = $this->model->query("SELECT * FROM muro,usuarios_muros WHERE id_muro=id AND id_usuarios = :user_id",array("user_id"=>$_SESSION['user_id'][0]));
            }else{
                $titlePage.=": " .$name;
                $tarjetas = $this->model->query("SELECT * FROM tarjetas,muro WHERE id_muro=muro.id AND (muro.nombre = :muroName AND id_user = :user_id)",array("muroName"=>$name,"user_id"=>$_SESSION['user_id'][0])) ;
            }
            


            // load views
            require APP . 'views/templates/header.php';
            require APP . 'views/user/muro.php';
            require APP . 'views/templates/footer.php';

        }else{
            header("Location:/");
        }

    }


}
?>