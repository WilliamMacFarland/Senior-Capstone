<?php

function connectToInfoDB(){
	$dbConnection = mysqli_connect("localhost", "capstone599", "!LZwk0fHg#Mq",
"GNRU_USER_INFO"); if (mysqli_connect_errno()){
die(mysqli_connect_error()); } return $dbConnection; } ?>
