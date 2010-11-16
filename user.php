<?php

	$page = "Your Pastes";
	include "includes/common.php";
	
	$shemail = $_SESSION['user_login'];
	
	if ( empty($shemail) )
	{
		header('Location: ./');
	}
	
	
	include "includes/page/header.php";
	
	$snippets_list = $db->QueryArray( "SELECT id, sname, nname, language, time FROM snippets WHERE shemail='".$shemail."' ORDER BY shemail DESC, id DESC");
	$num_code = count( $snippets_list );
	
?>

			<h3>Your Pasted Code</h3>
			
<?php
		echo "<p>You have <strong>" . $num_code . "</strong> paste";
		if( $num_code != 1 ) echo "s";
		echo " in the database.</p>";
?>

<?php if( $num_code > 0 ) { ?>			
			<article id="last15">
				<ul>
<?php
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
	}
?>
				</ul>
			</article>
			
		
<?php include "includes/page/footer.php"; ?>
