<!DOCTYPE html>
<html>
	<?php flush(); ?>
	<head>
		<title>Luahelp Pastebin - <?php echo $page; ?></title>
		
		<!-- meta tags -->
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/geshi.css" />
		
		<!--[if lt IE 9]>
		<script src="//ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
		<![endif]-->
	</head>
	<?php flush(); ?>
	<body>
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
					echo ('<a href="./index.php?login">Login (Google)</a>');
					echo ('<a href="./index.php?login&amp;provider=steam">Login (Steam)</a>');
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
	       <?php flush(); ?>
		<section id="main">
		<?php flush(); ?>
