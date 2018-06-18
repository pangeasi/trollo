<?php 
if(!empty($tarjetas)){
    echo "<h1>".strtoupper($name)."</h1>";

}
elseif($name == ''){
    echo "<h1>Tus muros:</h1>";
}else{
    echo "<h1>".strtoupper($name)."</h1><br>No hay tarjetas";
}
?>
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