<?php
	
	include "includes/common.php";
	include "includes/geshi/geshi.php";
	
	$cid = (int)$_GET["id" ];
	
	$result = $db->SelectFirst( "snippets, languages", "snippets.language = languages.lang_id AND snippets.id = '$cid'" );
	if (is_null($result))
	{
		header( 'Location: /' ) ;
	}
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
		$postdate = strtotime( $result["time"] );
		$expiredate = $postdate + ( $result["deleteafter"] * 3600 );
		
		$seconds_left = ($expiredate-date("U"));
		
		if( $seconds_left <= 0 )
			$expires = 'This paste has expired and is pending deletion.';
		else
		{
			$expires = 'This paste expires in ';

			if( $seconds_left >= 86400 )
			{
				$days_left = floor($seconds_left/86400);
				
				$expires .= $days_left . getPlural( $days_left, ' day', ' days' );
			}
			else
			{
				$hours_left = floor($seconds_left/3600);
				$hours_secleft = floor($seconds_left/60)%60;
		
				$expires .= ($hours_left>0 ? $hours_left . getPlural( $hours_left, ' hour', ' hours' ) : '' ) . ( $hours_secleft>0 ?  ' and ' . $hours_secleft . getPlural( $hours_secleft, ' minute', ' minutes' ) : '' );
			}
			
			$expires .= ' from now.';
		}
	}
	
	include "includes/page/header.php";

?>

			<?php if(!empty($expires)): ?>
			<div id="expire" class="alert alert-info">
				<?php echo $expires; ?>
			</div>
			<?php endif; ?>
			
			<h2><?php if( empty( $result['sname'] ) ) { echo "Untitled"; } else { echo htmlentities( $result['sname'] ); } // kill me now ?></h2>
			<span class="langr" id="codedesc">
			<p>
            <?php
				
				if( !empty( $result['nname' ] ) )
					echo 'By ' . htmlentities( $result["nname"] ) . ' - ';
				
				echo htmlentities( $result['friendly_name'] ) . ', ' . $result["time"] . '.';
			
				if( count( $altres ) > 0 )
					echo ' Based on <a href="view.php?id=' . $altres["id"] . '">' . htmlentities( $altres["sname"] ) . '</a> ' . ( !empty($altres["nname"]) ? 'by ' . htmlentities($altres["nname"]) : '');
			?>
			</p>
			</span>
			
			<article id="code" class="well">
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
			<article id="alterations">
				<h3>Code Alterations</h3>
				<ul>
					<?php foreach( $alterations as $ak => $av ) { ?>
						<li><a href="./<?php echo $av["id"]; ?>"><?php echo htmlentities( $av["sname"] ); ?></a> by <?php echo ( !empty($av["nname"]) ? htmlentities($av["nname"]) : "<em>Anonymous Coward</em>"); ?>. <span class="langr"><?php echo $av["time"]; ?></span></li>
					<?php } ?>
				</ul>
			</article>
			<?php } ?>
		
<?php include "includes/page/footer.php"; ?>

