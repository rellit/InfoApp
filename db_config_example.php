<?php
	$user = '';
	$pass = '';
	$db = "";
	$host = 'localhost';
	
	try{
		$db = mysql_connect($host, $user,$pass);
	} catch (Exception $e) {
    		echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
	}
	mysql_select_db("mirror_info") or die ("Geht nicht");
	mysql_query("SET NAMES 'utf8'");
?>
