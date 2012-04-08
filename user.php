<?php

	$page = "Your Pastes";
	include "includes/common.php";
	
	$shemail = $_SESSION['user_login'];
	
	if ( empty($shemail) )
	{
		header('Location: ./');
	}
	
	
	include "includes/page/header.php";
	if( isset($_GET["delete"]) )
	{
	?>
		<div id="alterinfo" class="alert alert-info">
	The paste was deleted
	</div>
	<?php
	}
	$snippets_list = $db->QueryArray( "SELECT id, sname, nname, friendly_name, time FROM snippets, languages WHERE snippets.language = languages.lang_id AND shemail='".$shemail."' ORDER BY shemail DESC, id DESC");
	$num_code = count( $snippets_list );
	
?>

			<h3>Your Pasted Code</h3>
			
<?php
		if( $num_code > 0 )
		{
			echo "<p>You have <strong>" . $num_code . "</strong> paste";
			if( $num_code != 1 ) echo "s";
			echo " in the database. The most recent paste is shown first.</p>";
		}
		else echo "<p>You have not pasted anything yet, or all of your pastes have expired.</p>";
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
					
					
				echo '<li><span class="titler"><a href="' . $v["id"] . '">' . $sname . '</a> by ' . $nname . '</span> <span class="langr">' . $v["friendly_name"] . ' ' . $v["time"] . '</span><a href="./?edit=' .$v["id"] . '"class="showTooltip" title="Edit Paste"><i class ="icon-pencil icon-white" style="margin-left: 5px; margin-top: 3px;"></i></a><a href="./delete?id=' . $v["id"] . '"class="showTooltip" title="Delete Paste"><i class="icon-remove icon-white" style="margin-left: 5px; margin-top: 3px;"></i></a></li>';
			}
		}
	}
?>
				</ul>
			</article>
		
<?php include "includes/page/footer.php"; ?>
