<?php

$page = "Pastebin";
include "includes/common.php";
include "includes/page/header.php";


$form_token = uniqid();
$_SESSION['user_token'] = $form_token;

$alter = (int)$_GET[ "alter" ];
$isAlteration = ( $alter && ($alter>0) );
$orig = array();

if( !empty( $alter ) )
{
  $orig = $db->SelectFirst( "snippets", "id = '$alter'" );
}

?>
<div id="pastearea" class="container-fluid">
    <div id="alert" class="alert alert-error hide fade in">
    <strong>Warning!</strong> Please remember to include some text in your paste!
    </div>
  <form action="paste.php" method="post" id="pasteform" class="form-inline">
    <?php if( !empty( $alter ) ) { echo '<input type="hidden" name="alter" value="' . $alter . '" />'; } ?>
    <input type="hidden" name="user_token" value="<?php echo  $_SESSION['user_token'];  ?>" />
    <input type="hidden" name="shemail" value="<?php echo  $_SESSION['user_login'];  ?>" />
    <textarea rows="25" cols="90" name="code" id="code" style="width: 99%; height: 50%; margin-bottom: 5px; margin-top: 10px;"><?php if( !empty( $alter ) ) { echo htmlentities( $orig["code"] ); } ?></textarea>
    <select name="lang" id="lang" class="showTooltip" title="Syntax Highlighting">
      <?php

	  $langs = $db->QueryArrayIndexed( "SELECT * FROM languages ORDER BY friendly_name ASC" );
      $top_langs = $db->QueryArray( "SELECT language FROM snippets GROUP BY language ORDER BY COUNT(*) DESC LIMIT 10" );
      
      foreach( $top_langs as $k => $v )
      {
        echo '      <option value="' . $v["language"] . '">' . htmlentities( $langs[$v["language"]]['friendly_name'] ) . '</option>' . "\r\n";      
      }

      ?>
      <option value="glua">-</option>
      <?php
	  
      foreach( $langs as $k => $v )
      {
		$option_html_params = "";
	  
		if( isset( $_GET[$k] ) || ( !empty($orig) && $orig["language"] == $k ) )
			$option_html_params = ' selected="selected"';
		
        echo '      <option value="' . $k . '"' . $option_html_params . '>' . htmlentities( $langs[$k]['friendly_name'] ) . '</option>' . "\r\n";  
      }
      ?>
    </select>
    <select name="keepfor" id="keepfor" title="Keep Duration" class="showTooltip">
      <option value="-1">Forever</option>
      <option value="12">12 hours</option>
      <option value="24">1 day</option>
      <option value="168">1 week</option>
      <option value="672">4 weeks</option>
    </select>
    <input type="text" class="showTooltip" title="Nickname" name="nname" id="nname" size="45" <?php if(!empty($remembered_name)) {echo 'value="' . htmlentities($remembered_name) . '"';} else{echo 'value="Anonymous Coward"';} ?>/>
    <input type="text" class="showTooltip" title="Paste Title" name="sname" id="sname"<?php if( !empty( $alter ) ) { echo ' value="Alteration of ' . htmlentities( $orig["sname"] ) . '"'; } else {echo ' value="Untitled"';} ?> size="45" />
    <img class="icon-lock" style="padding-top: 4px; margin-top: 4px;"><input type="checkbox" class="checkbox-inline showTooltip" title="Private Paste?" name="private" value="1">
    <input name="website" type="hidden" id="website" title="Website" />
    <input name="email" type="text" id="email" style="display:none" value=""/>
		<p style="margin-top: 10px;"><button type="submit" id="submitbox" class="btn btn-primary" name="paste">Paste Code</button>
		<button type="reset" class="btn">Reset Form</button></p>
  </form>
</div>

<script type="text/javascript">
try
{
 $("#pasteform").submit(function() {
 if (document.getElementById("code").value == '')
    {
        $("#alert").show();
        return false;
    }
    else
    {
        $("#alert").alert('close');
        return true;
    }
    });

 $(".showTooltip").tooltip( );
}
catch(e)
{}
  </script>
<?php
include "includes/page/footer.php";
?>