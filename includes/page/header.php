<!DOCTYPE html>
<html>
	<head>
              <meta charset="UTF-8">
		<title>Luahelp Pastebin - <?php echo $page; ?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />

              <!--[if lt IE 9]>
                  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
              <![endif]-->
	</head>
	<body>

<?php

include 'includes/openid.php';
session_start();

try 
{
	if(!isset($_GET['openid_mode'])) 
    	{
        	if(isset($_GET['login'])) 
		{
			$openid = new LightOpenID;
	                $openid->identity = 'https://www.google.com/accounts/o8/id';
            		$openid->required = array('contact/email');
            		header('Location: ' . $openid->authUrl());
		}
	}

	elseif($_GET['openid_mode'] == 'cancel') 
 	{
        	echo 'User has canceled authentication!';
 	}
 
	else 
	{
        	$openid = new LightOpenID;
		if ($openid->validate() && $openid->identity)
		{
        		$userinfo = $openid->getAttributes();
			$_SESSION['user_login'] = $userinfo['contact/email'];
		}
  	}
}
catch(ErrorException $e) 
{
    echo $e->getMessage();
}

?>
		<header>
			<nav>
                          <?php if( $showCodeButtons == true ) { ?>
				<a href="index.php?alter=<?php echo $cid; ?>" class="lltab">Alter Code</a>
                          <?php } ?>
				<a href="./">Home</a>
				<a href="./recent">Recent Activity</a>
                          <?php 
			  if (!$_SESSION['user_login'])
			  {
			  	echo ('<a href="" onclick="document.loginForm.submit();return false;">Login<form name="loginForm" action="?login" method="post">
			  	</form></a>');
			  }

			  else
			  {
				echo ("<a href='./user'>Your Pastes</a>");
			  	echo ("<a href='./logout'>Logout</a>");
			  }
			  ?>
			</nav>
			       <h1><a href="./">Luahelp - <?php echo $page; ?></a></h1> 
		</header>
		<section id="main">
