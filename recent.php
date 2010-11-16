<?php
	
	$page = "Recent Activity";
	
	include "includes/common.php";
	include "includes/page/header.php";
	
?>

			<h3>Recently Pasted Code</h3>
			
			<article id="last15">
				<ul>
<?php

	$snippets_list = $db->QueryArray( "SELECT id, sname, nname, language, time FROM snippets ORDER BY id DESC LIMIT 15", $db );

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
	
?>
				</ul>
			</article>
			
			<h3>Popular Languages</h3>
			
			<article id="popular">
				<ol>
<?php
	$top_langs = $db->QueryArray( "SELECT language, COUNT(*) AS langcount FROM snippets GROUP BY language ORDER BY langcount DESC LIMIT 5" );
	
	foreach( $top_langs as $k => $v )
	{
		echo '<li>' . $langs["names"][ $v["language"] ] . '</li>';	
	}
?>
                </ol>	
			</article>
		
<?php include "includes/page/footer.php"; ?>