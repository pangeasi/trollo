<div class="content">
    <h1>Página principal</h1>

    <?php
        if(isset($_SESSION['user_id'])){
            echo "<a href=\"".URL."muro\">Ver tus muros</a>";
        }
    ?>
    
</div>