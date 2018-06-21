<?php

class add extends Controller {
    public function index() {
        $titlePage="Página principal";
        // load views
        require APP . 'views/templates/header.php';
        require APP . 'views/home/index.php';
        require APP . 'views/templates/footer.php';
    }

    public function tarjeta(){
        $titulo= $_POST['titulo'];
        $desc = $_POST['descripcion'];
        $seccion = $_POST['seccion'];
        $id_muro = $_POST['id_muro'];
        $id_user = $_POST['id_user'];

        $lastPosition = $this->model->query('SELECT posicion FROM tarjetas ORDER BY posicion desc LIMIT 1');
        $lastPosition = $lastPosition[0]['posicion'];
        $result = $this->model->query('INSERT INTO tarjetas (id_user,id_muro,seccion,titulo,descripcion,posicion) VALUES (:id_user,:id_muro,:seccion,:titulo,:descripcion,:posicion)',array(
            'id_user' => $id_user,
            'id_muro' => $id_muro,
            'seccion' => $seccion,
            'titulo' => $titulo,
            'descripcion' => $desc,
            'posicion' => $lastPosition+1
        ));
        if($result == 1){
            echo 1;
        }else{
            echo 0;
        }
        
    }
}
?>