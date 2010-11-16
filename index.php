<?php
	
        session_start();
        $form_token = uniqid();
        $_SESSION['user_token'] = $form_token;

	$page = "Pastebin";
	
	include "includes/common.php";
	include "includes/page/header.php";
	
	$alter = (int)$_GET[ "alter" ];
	$orig = array();
	
	if( !empty( $alter ) )
	{
		$orig = $db->SelectFirst( "snippets", "id = '$alter'" );
	}

?>

			<h2>Paste Code</h2>
            
            <p>Use this to create a new paste, only the code field is required, the rest can be left blank.</p>
			
			<section id="pastearea">
				<form action="paste.php" method="post">
					<?php if( !empty( $alter ) ) { echo '<input type="hidden" name="alter" value="' . $alter . '" />'; } ?>

	  <input type="hidden" name="user_token" value="<?php echo  $_SESSION['user_token'];  ?>" />
					<label for="nname">Name:</label>
					<input type="text" name="nname" size="45" /><br />
					
					<label for="sname">Script Name:</label>
					<input type="text" name="sname"<?php if( !empty( $alter ) ) { echo ' value="Alteration of ' . htmlentities( $orig["sname"] ) . '"'; } ?> size="45" /><br />
					
					<label for="code">Code:</label>
					<textarea rows="25" cols="120" name="code"><?php if( !empty( $alter ) ) { echo htmlentities( $orig["code"] ); } ?></textarea><br />
                    
                    <label for="lang">Language:</label>
                    <select name="lang">
<?php

	$top_langs = $db->QueryArray( "SELECT language FROM snippets GROUP BY language ORDER BY COUNT(*) DESC LIMIT 10" );
	
	foreach( $top_langs as $k => $v )
	{
		echo '			<option value="' . $v["language"] . '">' . htmlentities( $langs["names"][$v["language"]] ) . '</option>' . "\r\n";			
	}

?>
                        <option value="luag">-</option>
<?php
	foreach( $langs["langs"] as $k => $v )
	{
		echo '			<option value="' . $v . '">' . htmlentities( $langs["names"][$v] ) . '</option>' . "\r\n";	
	}
?>
                    </select><br />
					
					<label for="keepfor">Keep For:</label>
					<select name="keepfor">
						<option value="-1">Forever</option>
						<option value="-1">-</option>
						<option value="12">12 hours</option>
						<option value="24">1 day</option>
						<option value="168">1 week</option>
						<option value="672">4 weeks</option>
					</select><br />

	  <input name="website" type="hidden" id="website" />
         <input name="email" type="text" id="email" style="display:none" value=""/>
					<input type="submit" id="submitbox" name="paste" value="Paste Code" />

				</form>
			</section>
		
<?php include "includes/page/footer.php"; ?>
