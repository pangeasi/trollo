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
<?php session_start(); $id_user = $_SESSION['user_id'][0]; //id del usuario en una variable para enviarla por ajax ?>
<ul class="secciones">
    <?php
        foreach($secciones as $seccion){
            echo 
            "<li class='seccion'><h3>".$seccion['seccion']."</h3>
            <ul class='seccionTarjeta'>";
            foreach($tarjetas as $tarjeta){
                if($tarjeta['seccion'] === $seccion['seccion']){
                    echo "<li id='". $tarjeta['id']."' class='tarjetas' alt='". $tarjeta['seccion']."'><h3>".$tarjeta['titulo']."</h3><p>". substr($tarjeta['descripcion'],0,80) ."...</p>

                    </li>";
                }
            }
            echo 
            "</ul>
            <i class='fas fa-plus fa-lg' style='display:none'></i>
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


<script src="<?php echo URL; ?>js/muro.js"></script>
<script>
    let lastTarjeta;
    $('.fa-plus').click(function(){
        lastTarjeta = $(this).parent().find('.tarjetas').last()
        $(this).hide()
        $(this).parent().append('<br><input class="addTarjetaInput" type="text" placeholder="Titulo"><textarea class="addTarjetaTextArea" placeholder="Describe lo que sea..."></textarea>')
        $('input[type=text]').focus();
        
    })
    let titleTarjeta = false;
    let descTarjeta = false;
    $('.seccion').on("focusout",".addTarjetaInput",function(){
        if($('.addTarjetaInput').val() != ''){
            
            titleTarjeta = true;
        }else{


            titleTarjeta = false;
            setTimeout(() => {
                if(!descTarjeta){
                    $('<p id="mensaje" style="color : red">Tienes que poner un titulo</p>').insertAfter(lastTarjeta)
                    $('.addTarjetaInput').hide()
                    $('.addTarjetaTextArea').hide()
                }
            }, 100);
            setTimeout(() => {
                $("#mensaje").remove()
            }, 3000);

            
        }
        $('.seccion').on("focusout",".addTarjetaTextArea",function(){
            if(titleTarjeta || (titleTarjeta && descTarjeta)){

                var parametros = {
                    "titulo" : $('.addTarjetaInput').val(),
                    "descripcion" : $('.addTarjetaTextArea').val(),
                    "seccion" : $(lastTarjeta).attr('alt'),
                    "id_user" : <?php  echo $id_user?>,
                    "id_muro" : <?php echo $muro[0]['id'] ?>
                };
                $.ajax({
                    data:  parametros, //datos que se envian a traves de ajax
                    url:   "<?php echo URL; ?>add/tarjeta", //archivo que recibe la peticion
                    type:  'post', //método de envio
                    beforeSend: function () {
                            console.log("Procesando, espere por favor...");
                    },
                    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        console.log(response);
                        if(response == 1){

                            location.reload()
                        }
                    }
                });
            }
        })
        


    })


</script>