$("#mensagem").keyup(function(){
    if($(this).val().length >= 151){
        $(this).val( $(this).val().substr(0, 151) );
    } else {
        $("#contador").text(0+$(this).val().length+"/150");
    }
});