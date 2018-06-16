<?php
class Home extends Controller {
    public function index() {
        // load views
        require APP . 'views/templates/header.php';
        require APP . 'views/home/index.php';
        require APP . 'views/templates/footer.php';
    }


}
?>