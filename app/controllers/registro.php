<?php
class Registro extends Controller {
    public function index() {
        // load views
        require APP . 'views/templates/header.php';
        require APP . 'views/registro/index.php';
        require APP . 'views/templates/footer.php';


        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
            );
            
         }
        
         
        if ($response != null && $response->success && $pass == $repass) {
           // Válido
            $chekUser = $this->model->query("SELECT * FROM user WHERE nombre = :name",array("name"=>$usuario));
            
            if(count($chekUser)==1){
               
                exit( header("Location:/registro/error/300"));
            }
           try{
            $result = $this->model->query("INSERT INTO user (nombre, password, rol) VALUES (:name, :pass, :user)", array(
                "name" => $usuario,
                "pass" => $pass,
                "user" => "user"
            ));
           }catch(PDOException $e){
               echo $e;
           }
           echo $result;
           
            if($result == 1){
                
                session_start();
                if(!isset($_SESSION['user_id'])){
                    $_SESSION['user_id'] = array($this->model->lastInsertId(),$usuario);
                    header("Location:/privates/name/$usuario/".$_SESSION['user_id'][0]);
                }
            }else{
                header("Location:/registro/error/100");
            }
   
         } else {
           // Si el código no es válido
           if(isset($_POST['user']))header("Location:/registro/error/200");
         }

    }

    public function error($err){
        require APP . 'views/templates/header.php';
        require APP . 'views/registro/index.php';
        require APP . 'views/templates/footer.php';
    }



}
?>