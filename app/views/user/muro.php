<?php 
if(!empty($tarjetas)){
    echo "<h1>".strtoupper($muro[0]['nombre'])."</h1>";

}
elseif($name == ''){
    echo "<h1>Tus muros:</h1>";
}else{
    echo "<h1>".strtoupper($muro[0]['nombre'])."</h1><br>No hay tarjetas";
}
?>
<ul class="muros">
<?php
    foreach($muros as $muro){
        echo "<li class='muro'><a alt=". URL . "muro/" . $muro['permlink'] .">".$muro['nombre']."</a></li>";
    }
    foreach($tarjetas as $tarjeta){
        echo "<li class='tarjetas'><h3>".$tarjeta['titulo']."</h3><p>".$tarjeta['descripcion']."</p></li>";
    }

?>
</ul>

<script>
      
    $('.muro>a').each(function(){
        $(this).attr('href',$(this).attr('alt'))
        
    })

</script>