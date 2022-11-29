<?php

function connectToMatchesDB(){
	$dbConnection = mysqli_connect("localhost", "capstone599", "!LZwk0fHg#Mq",
"GNRU_MATCHES"); if (mysqli_connect_errno()){
die(mysqli_connect_error()); } return $dbConnection; } ?>
