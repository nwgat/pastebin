<?php
	
	$page = "Recent Activity";
	
	include "includes/common.php";
	include "includes/page/header.php";

	$snippets_list = $db->QueryArray( "SELECT id, sname, nname, language, friendly_name, time FROM snippets, languages WHERE snippets.language = languages.lang_id AND snippets.private='0' ORDER BY id DESC LIMIT 15", $db );	
	
?>

			<h3>Recently Pasted Code</h3>
			<p>Showing the last <?php echo count($snippets_list); ?> pastes in the database. <a href="browse">Browse all</a></p>
			
			<article id="last15">
				<ul>
<?php


	if( $snippets_list && count($snippets_list) > 0 )
	{
		foreach( $snippets_list as $k => $v )
		{
			$sname = htmlentities( $v["sname"] );
			$nname = htmlentities( $v["nname" ] );
			
			if( $sname == "" )
				$sname = "<em>Untitled </em>";
			if( $nname == "" )
				$nname = "Anonymous Coward";
				
				
			echo '<li><span class="titler"><a href="' . $v["id"] . '">' . $sname . '</a> by ' . $nname . '</span> <span class="langr">' . $v["friendly_name"] . ', ' . $v["time"] . '</span></li>';
		}
	}
	else
		echo '<li><span class="titler">No pastes found in the database.</span></li>';
	
?>
				</ul>
			</article>
			
			<h3>Popular Languages</h3>
			
			<article id="popular">
				<ol>
<?php
	$top_langs = $db->QueryArray( "SELECT language, COUNT(*) AS langcount, friendly_name FROM snippets, languages WHERE snippets.language = languages.lang_id GROUP BY language ORDER BY langcount DESC LIMIT 5" );
	
	foreach( $top_langs as $k => $v )
	{
		echo '<li>' . $v['friendly_name'] . ' <span class="langr">(' . $v[1] . ' pastes)</li>';	
	}
?>
                </ol>	
			</article>
		
<?php include "includes/page/footer.php"; ?>