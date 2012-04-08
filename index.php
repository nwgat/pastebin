<?php

$page = "Pastebin";
include "includes/common.php";
include "includes/page/header.php";


$form_token = uniqid();
$_SESSION['user_token'] = $form_token;

$alter = (int)$_GET[ "alter" ];
$isAlteration = ( $alter && ($alter>0) );
$edit = (int)$_GET[ "edit" ];
$isEdit = ( $edit && ($edit>0) );
$orig = array();

if( !empty( $alter ) )
{
  $orig = $db->SelectFirst( "snippets", "id = '$alter'" );
}
if( !empty( $edit ) )
{
  $orig = $db->SelectFirst( "snippets", "id = '$edit'" );
}
?>
<div id="pastearea" class="container-fluid">
    <div id="alert" class="alert alert-error hide fade in">
    <strong>Warning!</strong> Please remember to include some text in your paste!
    </div>
<?php if( !empty($alter) ): ?>
	<div id="alterinfo" class="alert alert-info">
		You are submitting an alteration of <a href="<?php echo $orig["id"]; ?>"><?php echo htmlentities($orig["sname"]); ?></a>.
	</div>
<?php endif; ?>
<?php if( !empty($edit) ): ?>
  <div id="alterinfo" class="alert alert-info">
    You are submitting an edit of <a href="<?php echo $orig["id"]; ?>"><?php echo htmlentities($orig["sname"]); ?></a>.
  </div>
<?php endif; ?>
  <form action="paste.php" method="post" id="pasteform" class="form-inline">
    <?php if( !empty( $alter ) ) { echo '<input type="hidden" name="alter" value="' . $alter . '" />'; } ?>
    <?php if( !empty( $edit ) ) { echo '<input type="hidden" name="edit" value="' . $edit . '" />'; } ?>
    <input type="hidden" name="user_token" value="<?php echo  $_SESSION['user_token'];  ?>" />
    <input type="hidden" name="shemail" value="<?php echo  $_SESSION['user_login'];  ?>" />
    <textarea rows="25" cols="90" name="code" id="code" style="width: 99%; height: 50%; margin-bottom: 5px; margin-top: 10px;"><?php if( !empty( $alter ) ) { echo htmlentities( $orig["code"] ); } if( !empty( $edit ) ) { echo htmlentities( $orig["code"] ); } ?></textarea>
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
    <input type="text" class="showTooltip" title="Your Name" name="nname" id="nname" placeholder="Your Name" size="45" <?php if(!empty($remembered_name)) {echo 'value="' . htmlentities($remembered_name) . '"';} else{echo 'placeholder="Your Name"';} ?>/>
    <input type="text" class="showTooltip" title="Paste Title" name="sname" id="sname"<?php if( !empty( $alter ) ) { echo ' value="Alteration of ' . htmlentities( $orig["sname"] ) . '"'; } elseif ( !empty($edit) ) {echo ' value="' . htmlentities( $orig["sname"] ) . '"';} else {echo ' placeholder="Paste Title"';} ?> size="45" />
    <i class="icon-lock" style="margin-top: 4px;"></i><input type="checkbox" class="checkbox-inline showTooltip" title="Private Paste?" name="private" value="1">
    <input name="website" type="hidden" id="website" title="Website" />
    <input name="email" type="text" id="email" style="display:none" value=""/>
		<p style="margin-top: 10px;"><button type="submit" id="submitbox" class="btn btn-success" name="paste">Paste Code</button>
		<?php if ( empty( $edit ) ){ echo '<button type="reset" class="btn">Reset Form</button></p>';}?>
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

}
catch(e)
{}
  </script>
<?php
include "includes/page/footer.php";
?>