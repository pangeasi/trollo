<h1><?php if(!empty($tarjetas)){echo strtoupper($name) ;}else{echo "Tus muros <br> $name";} ?></h1>
<ul>
<?php
    foreach($muros as $muro){
        echo "<li class='muro'>".$muro['nombre']."</li>";
    }
    foreach($tarjetas as $tarjeta){
        echo "<li class='tarjetas'><h3>".$tarjeta['titulo']."</h3><p>".$tarjeta['descripcion']."</p></li>";
    }

?>
</ul>

<script>
    $('.muro').click(function(e){
        window.location="<?php echo URL ?>muro/" + $(this).text()
        console.log($(this).text())
    })
    
</script>