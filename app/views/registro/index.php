<div class="login">
    <form action="/registro" method="post">
        <div class="content">
            <label for="user">Usuario: </label><input type="text" name="user">
            <label for="user">Contraseña: </label><input type="password" name="pass">
            <label for="user">Repite Contraseña: </label><input type="password" name="repass">
        </div>
        <div class="g-recaptcha" data-sitekey="tu-key"></div>
        <br>
        <input type="submit" value="Registrame!">
        <?php if($err == 100){echo "<p class='error content'>No se pudo registrar</p>"; }?>
        <?php if($err == 200){echo "<p class='error content'>El captcha no funciona</p>"; }?>
    </form>
    <?php
     require_once "includes/recaptchalib.php";
     $secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
     $response = null;
     $usuario=$_POST['user'];
     $pass=md5($_POST['pass']);
     $repass=md5($_POST['repass']);
     // comprueba la clave secreta
     $reCaptcha = new ReCaptcha($secret);
    ?>
    </div>