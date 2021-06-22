$("#button_inscription").click(function(){
    if($('#inscription').hasClass('show_block')){
        $('#inscription').removeClass('show_block')
        $('#inscription').addClass('hide');
    }else {
       $("#inscription").removeClass('hide');
       $('#inscription').addClass('show_block');
    }
});


   
