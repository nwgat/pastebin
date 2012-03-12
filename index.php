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
<section id="pastearea">
  <form action="paste.php" method="post" id="pasteform">
    <?php if( !empty( $alter ) ) { echo '<input type="hidden" name="alter" value="' . $alter . '" />'; } ?>
    <input type="hidden" name="user_token" value="<?php echo  $_SESSION['user_token'];  ?>" />
    <input type="hidden" name="shemail" value="<?php echo  $_SESSION['user_login'];  ?>" />
    <textarea rows="25" cols="90" name="code" id="code"><?php if( !empty( $alter ) ) { echo htmlentities( $orig["code"] ); } ?></textarea>
    <select name="lang" id="lang">
      <?php

      $top_langs = $db->QueryArray( "SELECT language FROM snippets GROUP BY language ORDER BY COUNT(*) DESC LIMIT 10" );
      
      foreach( $top_langs as $k => $v )
      {
        echo '      <option value="' . $v["language"] . '">' . htmlentities( $langs["names"][$v["language"]] ) . '</option>' . "\r\n";      
      }

      ?>
      <option value="glua">-</option>
      <?php
      foreach( $langs["langs"] as $k => $v )
      {
        echo '      <option value="' . $v . '">' . htmlentities( $langs["names"][$v] ) . '</option>' . "\r\n";  
      }
      ?>
    </select>
    <select name="keepfor" id="keepfor">
      <option value="-1">Forever</option>
      <option value="12">12 hours</option>
      <option value="24">1 day</option>
      <option value="168">1 week</option>
      <option value="672">4 weeks</option>
    </select>
    <input type="text" name="nname" id="nname" size="45" <?php if(!empty($remembered_name)) {echo 'value="' . htmlentities($remembered_name) . '"';} else{echo 'value="Anonymous Coward"';} ?>/>
    <input type="text" name="sname" id="sname"<?php if( !empty( $alter ) ) { echo ' value="Alteration of ' . htmlentities( $orig["sname"] ) . '"'; } else {echo 'value="Untitled"';} ?> size="45" />
    <img class="icon-lock"><input type="checkbox" name="private" description="Private Paste?" value="1">
    <input name="website" type="hidden" id="website" />
    <input name="email" type="text" id="email" style="display:none" value=""/>
    <input type="submit" id="submitbox" name="paste" value="Paste Code" />

  </form>
</section>

<?php
include "includes/page/footer.php";
?>