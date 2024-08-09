<?php
session_start();
require_once "connection.php";

$sql = "SELECT * FROM tbl_users WHERE user_email = '".$_POST["email"]."' AND user_password = '".$_POST['password']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

if(mysqli_num_rows($result) > 0){
	if($row[6] == "Inactive"){
		$output = array(
			'status'        => 'inactive',
			'message'       => 'Cet utilisateur es inactif svp contactez votre administrateur.'
		);
	} else {
		$_SESSION['user_id']                 = $row[0];
		$_SESSION['user_created_by']         = $row[1];
		$_SESSION['user_last_update_by']     = $row[2];
		$_SESSION['user_full_name']          = $row[3];
		$_SESSION['user_email']              = $row[4];
		$_SESSION['user_gender']             = $row[5];
		$_SESSION['user_status']             = $row[6];
		$_SESSION['user_role']               = $row[7];
		$_SESSION['user_created_at']         = $row[9];
		$_SESSION['user_updated_at']         = $row[10];
	
		$output = array(
			'status'        => 'success'
		);
	}

} else {
	$output = array(
		'status'        => 'error',
		'message'       => ' Vous avez saisie soit le nom d utilisateur, soit le mot de passe avec erreur.'
	);
}

echo json_encode($output);

?>