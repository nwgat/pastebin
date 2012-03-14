<!DOCTYPE html>
<html>
<?php flush(); ?>
<head>
  <title>Luahelp Pastebin - <?php echo $page; ?></title>
  

  <!-- meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/geshi.css" />
  <link href="./css/bootstrap.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <style type="text/css">
  body {
    padding-top: 60px;
    padding-bottom: 0px;
  }
  </style>
  <link href="./css/bootstrap-responsive.css" rel="stylesheet">

  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

      <!-- Le fav and touch icons -->
      <link rel="shortcut icon" href="images/favicon.ico">
      <link rel="apple-touch-icon" href="images/favicon.ico">
      <link rel="apple-touch-icon" sizes="72x72" href="images/favicon.ico">
      <link rel="apple-touch-icon" sizes="114x114" href="images/favicon.ico">
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
                 echo('<li><a href="index.php?alter='.$cid.'" class="lltab">Alter Code</a></li>');
               }
               ?>
             </ul>
             <?php

        if( !empty( $_SESSION["user_login"] ) ) // we're logged in
        {


           // Remember my name, use email if we haven't pasted before
          $remembered_name = "";
          
  if( !empty( $_SESSION["user_login"] ) ) // we're logged in
  {
    $last_snippet = $db->SelectFirst( "snippets", "shemail = '" . $_SESSION["user_login"] . "'", "nname, language", "ORDER BY id DESC LIMIT 1" );
    
    if( !empty($last_snippet["nname"]) ) // we've been here before, use the last name we used to 
    {
      $remembered_name = $last_snippet["nname"];
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
        
        $remembered_name = $_SESSION["steam_name"];
      }
      else
      {
        $email_split = explode( "@", $_SESSION["user_login"] );
        $remembered_name = $email_split[0];
      }
    }
  }
  
  echo ("<p class='navbar-text pull-right'>Logged in as <a href='./user'>".htmlentities($remembered_name)."</a></p>");
}
if( empty( $_SESSION["user_login"] ) ) {?>
<p class='navbar-text pull-right' id='loginbuttons'>
  <a href='./index.php?login'><img src='images/google.png' alt='Google' title='Login via Google' /></a>
  <a href='./index.php?login&amp;provider=steam'><img src='images/steam.png' alt='Steam Community' title='Login via Steam Community' /></a>
</p>
<?php } ?>



</div><!--/.nav-collapse -->
</div>
</div>
</div>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="hero-unit">
       <?php flush(); ?>