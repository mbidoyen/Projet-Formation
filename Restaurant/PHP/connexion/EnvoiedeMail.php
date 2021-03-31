<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare

(
    'SELECT * FROM clients WHERE email = ?'
);

$query->execute([$_POST['email']]);

if($recupclient = $query->fetch()){

    var_dump($recupclient);

    function createtoken($taille){ // fonction qui crée un code aléatoire alphanumérique avec $taille pour la longueur du code.
       
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
    
       for ($i=0; $i < $taille; $i++) {
           $token .= $codeAlphabet[random_int(0, $max-1)];
       }
    
       return $token;
    }
    
    
    $token = createtoken(12);
    echo $token;
    
    $query = $pdo->prepare
    
    (
        'INSERT INTO lost_password VALUES (? , ?)'
    );
    
    $passwordMd5 = md5($token);
    $query->execute([$passwordMd5, $recupclient['email']]);
    
    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    
    
    //Load Composer's autoloader
    
    
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->setLanguage('fr', '../../PHPMailer/language/');
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'm.bidoyen@gmail.com';                     //SMTP username
        $mail->Password   = 'LEnny16092012!';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('ne-pas-repondre@PHPmailer.fr', 'Test PHPMailer');
        $mail->addAddress($recupclient['email']);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Test Changement mot de passe';
        $mail->Body    = '<a href="http://localhost:8080/Restaurant/PHP/connexion/modifiermdp.php?id='.$recupclient['id_client'].'&amp;token='.$token.'">Cliquez ici pour modifier votre mot de passe</a>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    header('Location: Mailenvoyee.php');

}
else{
    header('Location: ../connexion/login.php');
}


?>