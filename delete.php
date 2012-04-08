<?php

	include "includes/common.php";
	
	$shemail = $_SESSION['user_login'];
	
	if ( empty($shemail) )
	{
		header('Location: ./');
	}

	$did = (int)$_GET["id" ];
	$db->Query( "DELETE FROM snippets WHERE id='" . $did . "' AND shemail='" .$shemail. "'")
	header("Location: ./user?delete\r\n");
	?>