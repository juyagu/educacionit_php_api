<?php

session_start();

if( isset($_SESSION["access_token"]) or isset($_SESSION["emailAddress"]) or isset($_SESSION['sent']) ){
	unset($_SESSION["access_token"]);
	unset($_SESSION["emailAddress"]);
	unset($_SESSION['sent']);
	header("location: index.php");
}else{
	header("location: index.php");
}

?>