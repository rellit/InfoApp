<!DOCTYPE html> 
<html> 
	<head> 
	<title>Spiegel Infos</title> 
	<meta name="mobile-web-app-capable" content="yes"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="icon" href="/Info/icon.png"/> 
	<link rel="shortcut icon" href="/Info/icon.png"/> 
	<link rel="apple-touch-icon" sizes="48x48" href="/Info/icon_48.png"/>
	<link rel="apple-touch-icon" sizes="72x72" href="/Info/icon_72.png"/>
	<link rel="apple-touch-icon" sizes="128x128" href="/Info/icon_128.png"/>
	<link rel="apple-touch-icon" sizes="196x196" href="/Info/icon_196.png"/>
</head> 
<body> <?php
	require("db_config.php");
			
	if(isset($_GET['action'])){
		
		$action = $_GET['action'];
				
		if($action=="save"){
		
			$id=$_GET['id'];
			$von=$_GET['von'];
			$bis=$_GET['bis'];
			$info=$_GET['info'];
			$color=$_GET['color'];
			$bg_color=$_GET['bg_color'];
			
			if($id==-1){
				$query = "INSERT INTO info (von, bis, info, color, bg_color) VALUES ('$von','$bis','$info','$color','$bg_color')";
				$result = mysql_query($query);
		
		
				echo 'INSERT';
			} else {
				$query = "UPDATE info set von='$von' , bis='$bis' , info='$info' , color='$color' , bg_color='$bg_color' where id = $id";
				$result = mysql_query($query);
		
		
				echo 'Update';
			}
		
			
		} else if($action=="delete"){
			$id=$_GET['id'];
			$query = "DELETE FROM info WHERE id = $id";
			$result = mysql_query($query);
			echo "DEL";
		}
		
		//Cleanup
		$query = "DELETE FROM info WHERE von < CURDATE()";
		$result = mysql_query($query);
		
		?>
		
		<script>
			window.location.replace('index.php')
		</script>
		
		<?php
		
		
	}
?>
</body>
</html>