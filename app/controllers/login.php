<?php
class Login extends Controller {
    public function index() {
        // load views
        require APP . 'views/templates/header.php';
        require APP . 'views/login/index.php';
        require APP . 'views/templates/footer.php';
    }

    public function logging() {
        
        if(isset($_POST['user'])){
            
            $pass = md5($_POST['passwd']);
            $user = $_POST['user'];
            
            // $result = $this->model->login($pass,$user);
            try{
                $result = $this->model->query("SELECT * FROM usuarios WHERE password = :pass AND nombre = :user",array("pass" => $pass,"user" => $user));
            }catch(PDOException $e){
                echo $e;
            }
            
            if(count($result) == 1){
                //echo($result[0]['id']);
                session_start();
                if(!isset($_SESSION['user_id'])){
                    $_SESSION['user_id'] = array($result[0]['id'],$user);
                    header("Location:/privates/name/$user/".$result[0]['id']);
                }
            }else{
                header('location:/login/badLogin');
                //var_dump($result) ;
            }
        }else{
            header('location:/login/badLogin');
        }
    }

    public function badLogin(){

        require APP . 'views/templates/header.php';
        require APP . 'views/login/index.php';
        require APP . 'views/templates/footer.php';

    }

}
?>