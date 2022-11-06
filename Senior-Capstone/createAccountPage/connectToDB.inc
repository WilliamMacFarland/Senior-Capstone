<?php

function connectToDB(){
	$dbConnection = mysqli_connect("sql213.epizy.com", "epiz_32559812", "4srwNwdKNy7Fe", "epiz_32559812_user_info");
	if (mysqli_connect_errno()){
		die(mysqli_connect_error());
	}
	return $dbConnection;
}


?>
