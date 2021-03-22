<?php

include '../connexionBDD/connexionBDD.php';


    $info = $_POST['info'];

    $query = $pdo->prepare
        (
            'SELECT * FROM clients WHERE id_client = ?'
        );
        
        $query->execute([$info]);
        
        $Information = $query->fetch();
        
        if(empty($Information)){

        }else{
              echo "
      
            <table id='customers'>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Mail</th>
                <th class='select'>Select</th>
            </tr>

            <td>".$Information['prenom']."</td>
            <td>".$Information['nom']."</td>
            <td>".$Information['email']."</td>
            <td class='iconeadmin'><a title='Modifier un utilisateur' href='ModifierUtilisateur.php?idcompte=".$Information['id_client']."'><i class='fas fa-pen'></i></a></td>
           
            </table>";
        }

    
            
           
?>

            