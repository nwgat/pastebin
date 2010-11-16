<?php

include "includes/common.php";

session_start(); 

if($_POST['user_token'] == $_SESSION['user_token']) 
{

	$sname = $_POST["sname"]; // script name
	$nname = $_POST["nname"]; // poster name
	$code = $_POST["code"]; // code. actually required.
	$lang = $_POST["lang"];
	$alter = $_POST["alter"];

	$errors = array();

	#check the page that submits is belong to our domain or not
	if(strpos('localhost', $_SERVER['HTTP_REFERER'])==false)
	{
	die ('This page can be processed from this domain only.');
	}

	#check user is bot or not
	if(isset($_POST['website']) and !$_POST['website']=='')
	{
	die('You are spam bot.');
	}
 
	#check user is bot or not
	if(isset($_POST['email']) and !$_POST['email']=='')
	{
	die('You are spam bot.');
	}
	
	if( !empty( $code ) && $code != "" )
	{

		if( empty( $lang ) )
			$lang = "text";
               
			
		$paste = array();
		$paste[ "sname" ] = $sname;
		$paste[ "nname" ] = $nname;
		$paste[ "code" ] = $code;
		$paste[ "language" ] = $lang;
		$paste[ "deleteafter" ] = (int)$_POST["keepfor"];
		
		if( !empty( $alter ) )
			$paste[ "alter" ] = (int)$alter;
		
		$db->SimpleInsert( "snippets", $paste );
	
		$id = $db->InsertID();
		unset($_SESSION['user_token']);  
		if( $id != false )
		{
                     unset($_SESSION['user_token']);
                     session_destroy(); 
			header( "Location: $id\r\n" );
			return;
		}
	}
}
 else 
{
	unset($_SESSION['user_token']);
	session_destroy();
	die( "Your request has expired, please go back and resubmit! " );
}
	
include "includes/page/header.php";
?>

<h2>Failed to Paste</h2>
<p>Your paste was not entered. This could be because you didn't enter any code, or could be to do with a database error. Please <a href="javascript:history.back(1)">go back</a> and try again.</p>

<?php include "includes/page/footer.php"; ?>
