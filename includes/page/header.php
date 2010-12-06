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
			  	echo ('<a href="./index?login">Login</a>');
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
		<?php flush(); ?>
