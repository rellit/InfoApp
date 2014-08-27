<?php
	require("db_config.php");
			
	$query = "SELECT * FROM info WHERE CURDATE() between von and bis";
	$result = mysql_query($query);
	if($result){
		echo "[\n";
		$first = true;
		while($row = mysql_fetch_object($result)) {
			if(!$first)
				echo ",\n";
			echo "\t{\n";
			$info = $row->info;
			echo "\t\t\"info\": \"$info\",\n";
			echo "\t\t\"color\": \"$row->color\",\n";
			echo "\t\t\"bg_color\": \"$row->bg_color\"\n";
			echo "\t}";
			$first = false;
		}
		echo "\n]";
	}
?>
