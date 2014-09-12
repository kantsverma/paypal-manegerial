<?php
require_once ('lib/managerpaypal.php');

// Create the OpenFireUserService object.
$pofus = new ManagerPaypal();

// Add a new user to OpenFire and add him to a group
// if payment form is posted 
if($_POST){
	$result = $pofus->doPayment();
	
	echo '<pre>';
	print_r($result);
	echo '</pre>';

	// Check result if command is succesful
	if($result) {
		// Display result, and check if it's an error or correct response
		//save the transaction value in database and 
		echo ($result['result']) ? 'Success: ' : 'Error: ';
		echo $result['message'];
	} else {
		echo '<br/>Something went wrong, probably connection issues';
	}
}
?>
