<?php
$server="campusclash.es.mysql";
$database = "campusclash_es";
$db_pass = 'T7tmn892AB3';
$db_user = 'campusclash_es';

mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
mysql_select_db($database) or die ("error2".mysql_error());
?>