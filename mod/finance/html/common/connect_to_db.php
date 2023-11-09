<?php
// This is Credential File. You Can ignore DocumentRoot.
	require '../../../credential.php';

/* Define of Valiables.
	$db_connect -> Database connect instance.
	$db_host -> Database Host IP Address.
	$db_user -> Database User.
	$db_password -> Database User's Password.
	$db_name -> Database's Name.
*/

	$db_connect = new mysqli($db_host, $db_user, $db_password, $db_name);

	if ($db_connect->connect_error) {
		echo $db_connect->connect_error;
	        exit();
	} else {
		$db_connect->set_charset("utf8");
	}
?>
