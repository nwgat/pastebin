<?php
chdir(dirname(__FILE__)); // change dir to file

chdir( "../" ); // change cwdir to pastebin root

include "./includes/common.php";

// run database query to delete old pastes
$db->Query( "DELETE FROM snippets WHERE deleteafter > 0 AND NOW() > DATE_ADD(`time`, INTERVAL `deleteafter` HOUR)");

?>