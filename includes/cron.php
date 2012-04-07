<?php

include "common.php";

// run database query to delete old pastes
$db->Query( "DELETE FROM snippets WHERE deleteafter > 0 AND NOW() > DATE_ADD(`time`, INTERVAL `deleteafter` HOUR)");

// check to see if we have any new languages to add to the database


?>