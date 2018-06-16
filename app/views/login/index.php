<div class="login">
    <h4>Identificate para entrar:</h4>
    <form action="/login/logging" method="post">
    <label for="user">Usuario: </label><input type="text" name="user">
    <label for="passwd">Contraseña: </label><input type="password" name="passwd">
    <input type="submit" value="login">
    </form>
    <?php
    if(isset($_GET['url']) && $_GET['url'] == 'login/badLogin'){
        
        echo "<p class=\"error\">fallo la autentificación</p>";
    }
    ?>
    <br>
    <a href="/registro">Registrate!</a>
</div>
