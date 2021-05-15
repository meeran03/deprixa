



$(document).ready(function(){
    
    
         

    
    
    function fetch_data(){
        
        $.ajax({
            url:"mundial_out.php",
            method:"GET",
              beforeSend: function(){
                 $("#mundial").html("<div class='well text-center'>Cargando información...</div>");
               },
            success: function(data){
                $("#mundial").html(data);
                
                    $(document).ready(function() {
                      if (sessionStorage.scrollTop != "undefined") {
                        $(window).scrollTop(sessionStorage.scrollTop);
                      }
                    });

                
            }
        })
        
    }
    
    fetch_data();
    
    $(document).on('click', '.update', function(){
        
        sessionStorage.scrollTop =$(document).scrollTop();
        
        var s = $(this).closest(".container-score");
        var us = $(this).closest(".update-score");
        var a = $(s).find(".bet_a");
        var b = $(s).find(".bet_b");

        $.ajax({
            url:"mundial_in.php",
            method:"POST",
             beforeSend: function(){
                 $("#mundial").html("<div class='well text-center'>Cargando información...</div>");
               },
            data: { sort : s[0].id, bet_a : a[0].value, bet_b : b[0].value},
            dataType: "text",
            success:function(data){
                
                data = data.trim();
                
                if(data === "0"){
                    ohSnap('Alguno de tus marcadores estan vac&iacute;os', {color: 'red'});   
                }else if(data === "2"){
                    ohSnap('&#161;Ok&#33; Tu marcador ya fue actualizado', {color: 'yellow'});
                }else if(data === "1"){
                    ohSnap('&#161;Genial&#33; Tu marcador ya fue asignado', {color: 'green'});
                }else if(data === "3"){
                    ohSnap('Lo sentimos, tu apuesta tiene que ser 15 minutos antes del encuentro', {color: 'red'});
                }
                fetch_data();
            }
        });
        
        
    })
    
    
})