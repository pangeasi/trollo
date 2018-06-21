      
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
    $('.seccion')
        .on("mouseenter",function(){
            $(this).find('.fa-plus').show();
        })
        .on("mouseleave",function(){
            $(this).find('.fa-plus').hide();
        })