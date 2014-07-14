<!DOCTYPE html>
<html>
<?php flush(); ?>
<head>
  <title>Gparent's Pastebin - <?php echo $page; ?></title>
  

  <!-- meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Stephen Swires, HTF">

  <!-- bootstrap styles -->
  <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="./css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
  <!-- Include *at least* the core style and default theme -->
<link href="//cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/styles/shCore.min.css" rel="stylesheet" type="text/css" />
<link href="//cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/styles/shThemeDefault.min.css" rel="stylesheet" type="text/css" />

<link href="//cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/styles/shCoreFadeToGrey.min.css" rel="stylesheet" type="text/css" />

  <!-- pastebin styles -->
  <link href="./css/style.css" rel="stylesheet" type="text/css" />
 
  <!-- javascript -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/scripts/shCore.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/scripts/shAutoloader.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.9/jquery.transit.min.js" type="text/javascript"></script>

  
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
            <a class="brand" href="./">Gparent's Pastebin</a>
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
				<li><a href="ircs://irc.freenode.net/digitalocean">Join IRC</a></li>
				<li><a href="https://github.com/gparent/pastebin">GitHub</a></li>
				<li class="divider-vertical"></li>
             </ul>
			 
			<form class="navbar-search pull-left" action="browse" method="get">
				<input type="text" name="s" class="search-query" placeholder="Search" />
			</form>
			 
			 <?php
		if( empty( $_SESSION["user_login"] ) ) {?>
<ul class="nav pull-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href='./index.php?login'><img src='img/google.png' alt='Google'/> Login Via Google</a></li>
              </ul>
            </li>
          </ul>
<?php }
else{ ?>
<ul class="nav pull-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $remembered_name = findUserHandle(); echo (htmlentities($remembered_name));?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href='./user'>Your Pastes</a></li>
  <li><a href='./logout'>Logout</a></li>
              </ul>
            </li>
          </ul>
<?php } ?>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<div class="container-fluid">
  <div class="row-fluid">
      <div class="span12">
       <?php flush(); ?>
