<!DOCTYPE html>
<html>
<?php flush(); ?>
<head>
  <title>Luahelp Pastebin - <?php echo $page; ?></title>
  

  <!-- meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Stephen Swires, HTF">

  <!-- bootstrap styles -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/bootstrap-responsive.min.css" rel="stylesheet">

  <!-- pastebin styles -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/geshi.css" />
  
  <!-- javascript -->
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="apple-touch-icon" href="favicon.ico">
  <link rel="apple-touch-icon" sizes="72x72" href="favicon.ico">
  <link rel="apple-touch-icon" sizes="114x114" href="favicon.ico">
</head>

    <body>
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="./">Luahelp Pastebin</a>
            <div class="nav-collapse">
              <ul class="nav">
                <?php 
                if ($page=="Recent Activity")
                { 
                  echo('<li class="active"><a href="./recent">Recent</a></li>');
                }
                else 
                {
                  echo('<li><a href="./recent">Recent</a></li>');
                }
                if( $showCodeButtons == true ) {
                 echo('<li><a href="./?alter='.$cid.'" class="lltab">Alter Code</a></li>');
				 echo('<li><a href="./'.$cid.'?plain" class="lltab">View Plain Text</a></li>');
               }
               ?>
				<li class="divider-vertical"></li>
				<li><a href="irc://irc.gamesurge.net/luahelp">Join IRC</a></li>
				<li><a href="https://github.com/harderthanfire/-luahelp-Pastebin">GitHub</a></li>
				<li class="divider-vertical"></li>
             </ul>
			 
			<form class="navbar-search pull-left" action="browse" method="get">
				<input type="text" name="s" class="search-query" placeholder="Search" />
			</form>
			 
			 <?php

        if( !empty( $_SESSION["user_login"] ) ) // we're logged in
		{
			$remembered_name = findUserHandle();
			echo ("<p class='navbar-text pull-right'>Logged in as <a href='./user'>".htmlentities($remembered_name)."</a></p>");
		}
		
		if( empty( $_SESSION["user_login"] ) ) {?>
<p class='navbar-text pull-right' id='loginbuttons'>
  <a href='./index.php?login'><img src='img/google.png' alt='Google' title='Login via Google' /></a>
  <a href='./index.php?login&amp;provider=steam'><img src='img/steam.png' alt='Steam Community' title='Login via Steam Community' /></a>
</p>
<?php } ?>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<div class="container-fluid">
  <div class="row-fluid">
      <div class="span12">
       <?php flush(); ?>