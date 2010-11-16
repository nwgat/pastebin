<?php

	include "includes/common.php";
	include "includes/geshi/geshi.php";
	
	$cid = (int)$_GET["id" ];
	
	$result = $db->SelectFirst( "snippets", "id = '$cid'" );
	$altres = array();
	
	if( $result[ "alter" ] > -1 )
	{
		$altres = $db->SelectFirst( "snippets", "id = '$result[alter]'" );
	}
	
	$showCodeButtons = true;
	$page = "View Code";
	$lang = $result["language" ];
	
	include "includes/page/header.php";

?>

			<h2><?php if( empty( $result['sname'] ) ) { echo "Untitled"; } else { echo htmlentities( $result['sname'] ); } // kill me now ?></h2>
            <?php echo '<span class="langr">'; if( !empty( $result['nname' ] ) ) { echo 'By ' . htmlentities( $result["nname"] ) . ' - '; }  echo $langs["names"][ $result["language"] ] . ', ' . $result["time"] . '</span>'; ?>
			
			<article id="code">
<?php

	$geshi =& new GeSHi( $result["code"], $lang );
	$geshi->set_header_type( GESHI_HEADER_DIV );
	$geshi->enable_line_numbers( GESHI_FANCY_LINE_NUMBERS, 1 );
	$geshi->set_overall_style( 'font-size: 10pt; font-family: Tahoma, Geneva, sans-serif; color: #000066; border: 1px solid #d0d0d0; background-color: #f0f0f0;', true );
	$geshi->set_code_style( 'background: #f0f0f0; color: #000020;', 'background: #ececec; color: #000020;' );
	$geshi->set_link_styles( GESHI_LINK, 'color: #000060; text-decoration: none' );
	$geshi->set_link_styles( GESHI_HOVER, 'background-color: #f0f000;' );
	
	echo $geshi->parse_code();
?>
			</article>
			
			<div class="langr" id="stringtools">
				MD5: <?php echo md5( $result["code"] ); ?>, SHA1: <?php echo sha1( $result["code"] ); ?>
			</div>
            
			<?php if( count( $altres ) > 0 ) { ?>
				<div id="info">
					This is an alteration of <a href="view.php?id=<?php echo $altres["id"]; ?>"><?php echo htmlentities( $altres["sname"] ); ?></a>
				</div>
			<?php } ?>
		
<?php include "includes/page/footer.php"; ?>

