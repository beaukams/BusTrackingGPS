<?php

	//phpinfo();

	
    // $to .= 'wez@example.com';

    $sujet = 'Sujet de l\'email';
	$message = "Bonjour,<br />
	<strong>Ceci est un message html envoyé grâce à  php.</strong><br />
	merci :)";
	$destinataire = 'kamstelecom@hotmail.com';
	$headers = "From: \"expediteur moi\"<abdoulayekama@gmail.com>\n";
	$headers .= "Reply-To: moi@domaine.com\n";
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
	if(mail($destinataire,$sujet,$message,$headers))
	{
	        echo "L'email a bien été envoyé.";
	}
	else
	{
	        echo "Une erreur c'est produite lors de l'envois de l'email.";
	}


	


?>

