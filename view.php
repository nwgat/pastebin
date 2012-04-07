<?php
	
	include "includes/common.php";
	include "includes/geshi/geshi.php";
	
	$cid = (int)$_GET["id" ];
	
	$result = $db->SelectFirst( "snippets, languages", "snippets.language = languages.lang_id AND snippets.id = '$cid'" );
	$altres = array();
	
	if( $result[ "alter" ] > -1 )
	{
		$altres = $db->SelectFirst( "snippets", "id = '$result[alter]'" );
	}
	
	// plain text view mode
	if( isset($_GET["plain"]) )
	{
		header("Content-Type: text/plain");
		echo $result["code"];
		
		exit;
	}
	
	$alterations = $db->SelectArray( "snippets", "`alter` = '$result[id]'" );
	
	$showCodeButtons = true;
	$page = "View Code";
	$lang = $result["language" ];
	
	$expires = "";
	
	if( $result["deleteafter"] > 0 )
	{
		$postdate = strtotime( $result["time"] . ' GMT' );
		$expiredate = $postdate + ( $result["deleteafter"] * 3600 );
		
		$seconds_left = ($expiredate-date("U"));
		
		if( $seconds_left <= 0 )
			$expires = 'Expired, pending deletion.';
		else
			$expires = 'Expires ' . ( $seconds_left >= 86400 ? floor($seconds_left/86400) . ' day(s)' :  floor($seconds_left/3600) . ' hour(s)' ) . ' from now.';
	}
	
	include "includes/page/header.php";

?>

			<h2><?php if( empty( $result['sname'] ) ) { echo "Untitled"; } else { echo htmlentities( $result['sname'] ); } // kill me now ?></h2>
			<span class="langr" id="codedesc">
			<p>
            <?php
				
				if( !empty( $result['nname' ] ) )
					echo 'By ' . htmlentities( $result["nname"] ) . ' - ';
				
				echo htmlentities( $result['friendly_name'] ) . ', ' . $result["time"] . '. ' . $expires;
			
				if( count( $altres ) > 0 )
					echo ' Based on <a href="view.php?id=' . $altres["id"] . '">' . htmlentities( $altres["sname"] ) . '</a> ' . ( !empty($altres["nname"]) ? 'by ' . htmlentities($altres["nname"]) : '');
			?>
			</p>
			</span>
			
			<article id="code">
<?php

	$geshi =& new GeSHi( $result["code"], $lang );
	$geshi->set_header_type( GESHI_HEADER_DIV );
	$geshi->enable_line_numbers( GESHI_FANCY_LINE_NUMBERS, 1 );
	$geshi->enable_classes();
	$geshi->set_overall_class('mycode');
	echo $geshi->parse_code();
?>
			</article>
			
			<?php if( count( $alterations ) > 0 ) { ?>
				<h3>Code Alterations</h3>
				<ul>
					<?php foreach( $alterations as $ak => $av ) { ?>
						<li><a href="./<?php echo $av["id"]; ?>"><?php echo htmlentities( $av["sname"] ); ?></a> by <?php echo ( !empty($av["nname"]) ? htmlentities($av["nname"]) : "<em>Anonymous Coward</em>"); ?></li>
					<?php } ?>
				</ul>
			<?php } ?>
		
<?php include "includes/page/footer.php"; ?>

