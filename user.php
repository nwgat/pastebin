<?php

	$page = "Your Pastes";
	include "includes/common.php";
	include "includes/page/header.php";
	
?>

			<h3>Your Pasted Code</h3>
			
			<article id="last15">
				<ul>
<?php
	if (!$_SESSION['user_login'])
	{
	header('Location: ./');
	}
	else
	{
	$shemail = $_SESSION['user_login'];
	$snippets_list = $db->QueryArray( "SELECT * FROM snippets WHERE shemail='".$shemail."'ORDER BY shemail DESC, id DESC");
	
	if( $snippets_list )
	{
		foreach( $snippets_list as $k => $v )
		{
			$sname = htmlentities( $v["sname"] );
			$nname = htmlentities( $v["nname" ] );
			
			if( $sname == "" )
				$sname = "<em>Untitled</em>";
			if( $nname == "" )
				$nname = "Anonymous Coward";
				
				
			echo '<li><span class="titler"><a href="' . $v["id"] . '">' . $sname . '</a> by ' . $nname . '</span> <span class="langr">' . $langs["names"][ $v["language"] ] . ', ' . $v["time"] . '</span></li>';
		}
	}
	
}?>
				</ul>
			</article>
			
		
<?php include "includes/page/footer.php"; ?>
