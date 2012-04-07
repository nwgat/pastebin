<?php

	session_start();
	
	include "includes/config.php";
	include "includes/database/mysqli.database.php";
	include 'includes/openid.php';

	$db = new Database( $dbname, $dbhost, $dbuser, $dbpass );
	
	$showCodeButtons = false;

	function findUserHandle()
	{
		global $_SESSION, $db;
		
		if( !empty( $_SESSION["user_login"] ) ) // we're logged in
		{
			$last_snippet = $db->SelectFirst( "snippets", "shemail = '" . $_SESSION["user_login"] . "'", "nname, language", "ORDER BY id DESC LIMIT 1" );
			
			if( !empty($last_snippet["nname"]) ) // we've been here before, use the last name we used to 
			{
			  return $last_snippet["nname"];
			}
			else // use the first bit of our email address
			{
			  if( strstr( $_SESSION["user_login"], "steamcommunity.com" ) != FALSE )
			  {
				if( !isset( $_SESSION["steam_name"] ) )
				{
				  $steam_split = explode( "/", $_SESSION["user_login"] );
				  $steamid = $steam_split[count($steam_split)-1];
				  
				  $profile = simplexml_load_file( 'http://steamcommunity.com/profiles/' . $steamid . '/?xml=1' );
				  $_SESSION["steam_name"] = (string)$profile->steamID;
				}
				
				return $_SESSION["steam_name"];
			  }
			  else
			  {
				$email_split = explode( "@", $_SESSION["user_login"] );
				return $email_split[0];
			  }
			}
		}

		return "";
	}
	
	try 
	{
		if(!isset($_GET['openid_mode'])) 
		{
			if(isset($_GET['login'])) 
			{
				$openid = new LightOpenID;
				
				switch( $_GET["provider"] )
				{
					case "steam":
						$openid->identity = 'https://steamcommunity.com/openid/';
						break;
						
					default: // google
						$openid->identity = 'https://www.google.com/accounts/o8/id';
						$openid->required = array('contact/email');
				}

				header('Location: ' . $openid->authUrl());
			}
		}
		elseif($_GET['openid_mode'] == 'cancel') 
		{
			session_destroy();
			echo 'User has canceled authentication!';
		}
		else 
		{
			$openid = new LightOpenID;
			
			if ($openid->validate() && $openid->identity)
			{
				$userinfo = $openid->getAttributes();
				$_SESSION['user_login'] = ( isset( $userinfo['contact/email'] ) ? $userinfo['contact/email'] : $openid->__get("identity") ) ;
			}
		}
	}
	catch(ErrorException $e) 
	{
		echo $e->getMessage();
	}

?>