var url=window.location.origin;
var c = $('meta[name="csrf-token"]').attr('content');
$(".notification-desplegado").click(function(){
   if($(this).attr('data-state')=='true'){
       $(".notification-desplegado").parent().children().eq(1).html('<li class="dropdown-item"></li>');
       $(this).attr('data-state', 'false');
   }else {
       $(this).attr('data-state', 'true');
       var id = $(".msj").attr('user');
       console.log(id);

       $.ajax({
           url: url + '/api/notifications',
           type: 'get',
           success: function (dataRestdataRest) {
               console.log(dataRestdataRest);
               var i;
               for(i=0;i<dataRestdataRest.length;i++){
                   $(".notification-desplegado").parent().children().eq(1).append('<li class="dropdown-item">' + dataRestdataRest[i].titulo + '</li>');

               }

           }
       });
   }

});
$(".enviar").click(function(){
    var id = 2;
    var texto = $(".texto").val();
    var self = this;
    console.log(texto);
    $.ajax({
        url: url + '/evnotificaciones',
        type: 'post',
        data: {texto:texto,
            id:id,
            _token: c
        },
        success: function (dataRestdataRest) {
            console.log(dataRestdataRest);

        }
    });
});