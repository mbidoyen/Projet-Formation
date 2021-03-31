$('.envoyer').on('click', EmailInconnu);

function EmailInconnu(){
    let email = $('#email').val();
    $.get('../connexion/emailinconnu.php?id='+email, recup);
}

function recup(recupBase){
    $('#emailunknown').html(recupBase);
}