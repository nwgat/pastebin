<script src="./js/shCore.js" type="text/javascript"></script>
<script src="./js/shAutoloader.js" type="text/javascript"></script>
<script>
SyntaxHighlighter.autoloader.apply(null, 
  'applescript            ./js/shBrushAppleScript.js',
  'actionscript3          ./js/shBrushAS3.js',
  'bash shell             ./js/shBrushBash.js',
  'coldfusion cf          ./js/shBrushColdFusion.js',
  'cpp c                  ./js/shBrushCpp.js',
  'c# c-sharp csharp      ./js/shBrushCSharp.js',
  'css                    ./js/shBrushCss.js',
  'delphi pascal          ./js/shBrushDelphi.js',
  'diff patch pas         ./js/shBrushDiff.js',
  'erl erlang             ./js/shBrushErlang.js',
  'groovy                 ./js/shBrushGroovy.js',
  'java                   ./js/shBrushJava.js',
  'jfx javafx             ./js/shBrushJavaFX.js',
  'js jscript javascript  ./js/shBrushJScript.js',
  'lua 					  ./js/shBrushLua.js',
  'perl pl                ./js/shBrushPerl.js',
  'php                    ./js/shBrushPhp.js',
  'text plain             ./js/shBrushPlain.js',
  'py python              ./js/shBrushPython.js',
  'ruby rails ror rb      ./js/shBrushRuby.js',
  'sass scss              ./js/shBrushSass.js',
  'scala                  ./js/shBrushScala.js',
  'sql                    ./js/shBrushSql.js',
  'vb vbnet               ./js/shBrushVb.js',
  'xml xhtml xslt html    ./js/shBrushXml.js'
);
SyntaxHighlighter.all();
</script>

<?php
	
	include "includes/common.php";
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
		  if (empty($altres["sname"]))
  		  {
    		$altres["sname"] = "Untitled";
 		  }
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
			
			<article class="well code">
<?php
echo ("<pre class ='brush: ".$lang."'>".htmlentities( $result['code'] )."</pre>");
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

