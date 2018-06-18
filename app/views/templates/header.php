<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if(isset($titlePage)){ echo TITLE . " - " . $titlePage; }else{echo TITLE;} ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>css/style.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>

    <header>
        <h1><a href="<?php echo URL; ?>">TROLLO</a></h1>
        <div class="logReg">
            <?php
            session_start();
            if(isset($_SESSION['user_id'])){
                echo "<h4>".$_SESSION['user_id'][1]."</h4><a href='".URL.APP."functions/logout.php'>x</a>";
            }else{
                echo '<h4><a href="/login">Login</a></h4>';
                echo '<h4><a href="/registro">Registrate</a></h4>';
            }   
            ?>
        </div>
    </header>
