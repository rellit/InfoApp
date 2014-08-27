<!DOCTYPE html> 
<html> 
	<head> 

</head> 
<body> 

<div data-role="page" id="edit_info" data-dom-cache="false">

	<div data-role="header">
    <a href="index.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-back">Zurück</a>
	<h1>Info bearbeiten</h1>
    <a onClick="$('#save').submit()" class="ui-btn-right ui-btn ui-btn-b ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-check">Speichern</a>
	</div><!-- /header -->

	<div data-role="content">	
	
		<?php
			require("db_config.php");
			
			function printColors($color){
				$selected = 'rgb(0,0,0)'==$color?'selected':'';
				echo "		<option $selected value='rgb(0,0,0)'>Schwarz</option>";
				$selected = 'rgb(255,255,255)'==$color?'selected':'';
				echo "		<option $selected value='rgb(255,255,255)'>Weiß</option>";
				$selected = 'rgb(53,152,219)'==$color?'selected':'';
				echo "		<option $selected value='rgb(53,152,219)'>Blau</option>";
				$selected = 'rgb(241,196,15)'==$color?'selected':'';
				echo "		<option $selected value='rgb(241,196,15)'>Gelb</option>";
				$selected = 'rgb(190,195,199)'==$color?'selected':'';
				echo "		<option $selected value='rgb(190,195,199)'>Grau</option>";
				$selected = 'rgb(46,205,113)'==$color?'selected':'';
				echo "		<option $selected value='rgb(46,205,113)'>Grün</option>";
				$selected = 'rgb(155,88,181)'==$color?'selected':'';
				echo "		<option $selected value='rgb(155,88,181)'>Lila</option>";
				$selected = 'rgb(213,84,1)'==$color?'selected':'';
				echo "		<option $selected value='rgb(213,84,1)'>Orange</option>";
				$selected = 'rgb(231,75,60)'==$color?'selected':'';
				echo "		<option $selected value='rgb(231,75,60)'>Rot</option>";
				$selected = 'rgb(27,188,155)'==$color?'selected':'';
				echo "		<option $selected value='rgb(27,188,155)'>Türkis</option>";
			}
			
			$id = isset($_GET['id'])?$_GET['id']:-1;
			$query = "SELECT * FROM info WHERE id = $id";
			$result = mysql_query($query);
			
			$id=-1;
			$von="";
			$bis="";
			$info="";
			$color="#000000";
			$bg_color="#FFFFFF";
			
			if($result){
				$row = mysql_fetch_object($result);
				if($row){
					$id=$row->id;
					$von=$row->von;
					$bis=$row->bis;
					$info=$row->info;
					$color=$row->color;
					$bg_color=$row->bg_color;
				}
			}
					echo "<form id='save' action='save.php' method='GET'>";
					echo "		<input type=\"hidden\" name='action' value='save'>";
					echo "		<input type=\"hidden\" name='id' value='$id'>";
					
					echo "		<label for='von'>Anzeigen von:</label>";
					echo "		<input type=\"text\" data-role=\"date\" id='von' name=\"von\"value='$von'>";
					
					echo "		<label for='bis'>Anzeigen bis:</label>";
					echo "		<input type=\"text\" data-role=\"date\" id='bis' name=\"bis\"value='$bis'>";
					
					echo "		<label for='info'>Info Text:</label>";
					echo "		<input type='text' data-clear-btn='true' name='info' id='info' value='$info'>";
					
					echo "		<label for='color'>Textfarbe</label>";
					echo "		<select name='color' id='color' value='$color'>";
					printColors($color);
					echo "		</select>";

					echo "		<label for='bg_color'>Hintergrund</label>";
					echo "		<select name='bg_color' id='bg_color' value='$bg_color'>";
					printColors($bg_color);
					echo "		</select>";
					
					echo "</form>";
					
					
			
		?>	
		<script>
			
		</script>
	
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>