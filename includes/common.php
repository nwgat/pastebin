<?php

	include "includes/config.php";
	include "includes/database/mysql.database.php";

	$db = new Database( $dbname, $dbhost, $dbuser, $dbpass );
	
	$showCodeButtons = false;
	
	function DeleteExpired( $db )
	{
			// delete after x days code
			$cd = date( "U" ); // current time as unix timestamp.
	
			$limitedsnippits = $db->SelectArray( "snippets", "deleteafter > '0'" );
	
			foreach( $limitedsnippits as $k => $hold )
			{
					$delsec = $hold["deleteafter"] * 3600; // get this in seconds.
					
					if( $hold["timestamp"] + $delsec < $cd )
					{
							$db->Query( "DELETE FROM snippets WHERE id = '" . $hold["sid"] . "'", $db );
					}
			}
			// end delete after x days
	}
	
	function GetLangsList( )
	{
			// loop through the avaliable languages for syntax highlighting
			if (!($dir = @opendir(dirname(__FILE__) . "/geshi/geshi"))) {
					echo '<option>Could not find lists of languages!</option>';
			}
	
			$langs = array();
	
			while ( $file = readdir($dir) )
			{
					if ( $file == '..' || $file == '.' || !stristr($file, '.') || $file == 'css-gen.cfg' || $file == ".svn" ) continue;
					$lang = substr($file, 0,  strpos($file, '.'));
					include( "geshi/geshi/$file" );
					$lang_names[ $lang ] = $language_data["LANG_NAME"];
				$langs[] = $lang;
			}
			
			closedir($dir);
			sort($langs, SORT_STRING);
	
			$returnv[ "langs" ] = $langs;
			$returnv[ "names" ] = $lang_names;
			
			return $returnv;
	}
	
	DeleteExpired( $db );
	$langs = GetLangsList();

?>