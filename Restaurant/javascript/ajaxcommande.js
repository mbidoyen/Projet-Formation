function RecupererNomProduit(){
   let Nom = document.getElementById('produits').value
   console.log(Nom);

    $.ajax({
        type: "POST",
        url: '../commande/AfficherArticles.php',
        data : {Article : Nom},
        success: function(data){
            $('#showarticles').html(data);
        }
    });
}

$('#produits').on('change', RecupererNomProduit);


