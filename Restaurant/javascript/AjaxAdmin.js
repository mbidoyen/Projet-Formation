
$("#AdminEmail").on('change', Afficher);

function Afficher(){

    let info = document.getElementById('AdminEmail').value;
    console.log(info);

    $.ajax({
        type : "POST",
        url : "../admin/InformationAdmin.php",
        data : { info : info},

        success: function(data){
            $('#Afficher').html(data);
        }
    });
}

 
