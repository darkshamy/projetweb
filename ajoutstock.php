<?php

include_once "../core/stockC.php";
include_once "../entites/stock.php";
include "Nexmo/src/NexmoMessage.php" ;
/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('ab6c700a ','42SPnpozq5EXjwb0');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '216960255109', 'Prosysteme', 'Nouveau produit a ajouter dans le stcok  ' );

	// Step 3: Display an overview of the message
	

	// Done!

if(isset($_POST['Ajouter'])){
	 $nexmo_sms->displayOverview($info);
$soi=new stock($_POST['quantite'],$_POST['unite'],$_POST['description'],$_POST['codeprod']);
ajouter($soi);

}

header('LOCATION:astock.html');
?>