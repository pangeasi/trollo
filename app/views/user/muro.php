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
    ?>
</ul>

<ul class="secciones">
    <?php
        foreach($secciones as $seccion){
            echo 
            "<li class='seccion'><h3>".$seccion['seccion']."</h3>
            <ul>";
            foreach($tarjetas as $tarjeta){
                if($tarjeta['seccion'] === $seccion['seccion']){
                    echo "<li id='". $tarjeta['id']."' class='tarjetas' alt='". $tarjeta['seccion']."'><h3>".$tarjeta['titulo']."</h3><p>". substr($tarjeta['descripcion'],0,80) ."...</p>

                    </li>";
                }
            }
            echo 
            "</ul>
            </li>";
        }


    ?>
</ul>
<div class="dropBack"></div>
<div class="fondoBlack">

<?php

    foreach($tarjetas as $tarjeta){
    
        echo "
        <div class='tarjetaAbierta' id='id". $tarjeta['id'] ."'>
        <h2>". $tarjeta['titulo'] ."</h2>
        <p>". $tarjeta['descripcion'] ."</p>
        </div>
        ";
    
    }
?>
</div>


<script>
      
    $('.muro>a').each(function(){
        $(this).attr('href',$(this).attr('alt'))
        
    })
    let idTarjeta;
    $('.tarjetas')
        .click(function(){
            idTarjeta = $(this).attr('id')
            console.log(idTarjeta)
            $('.fondoBlack').show();
            $('#id'+idTarjeta).show();
            $('.dropBack').show();
        })
    $('.tarjetaAbierta').on("click",function(){
        console.log("dejate abierta!!!")
    })
    $('.dropBack').on("click",function(){
        $('.fondoBlack').hide();
        $('#id'+idTarjeta).hide();
        $('.dropBack').hide();
    })

</script>