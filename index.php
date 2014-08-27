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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="jqmobile/jquery.mobile-1.4.3.css" />
<link rel="stylesheet" type="text/css" href="datepicker/mobipick.css" />
<script type="text/javascript" src="datepicker/xdate.js"></script>
<script type="text/javascript" src="datepicker/xdate.i18n.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="jqmobile/jquery.mobile-1.4.3.js"></script>
	<script type="text/javascript" src="datepicker/mobipick.js"></script>
	<script>
	$( document ).on( "pagecreate",function() {
	
		var p_von = $('#von');
		p_von.mobipick({
			locale: "de", //default is "en", english
			minDate: (new XDate()).addDays( 0 )
		});
		var p_bis = $('#bis');
		p_bis.mobipick({
			locale: "de", //default is "en", english
			minDate: (new XDate()).addDays( 0 )
		});
		
		
		p_von.on( "change", function() {
			p_bis.mobipick( "option", "minDate", p_von.mobipick( "option", "date" ) );
			p_bis.mobipick( "option", "date", p_von.mobipick( "option", "date" ) ).mobipick("updateDateInput");
		});
		
		p_bis.on( "change", function() {
			p_von.mobipick( "option", "maxDate", p_bis.mobipick( "option", "date" ) );
		});
	
	
	});


   

	</script>
</head> 
<body> 

<div id="main" data-role="page" data-dom-cache="false">

	<div data-role="header">
		<h1>Alle Infos</h1>
		
    <a href="edit.php" data-rel="dialog" class="ui-btn-right ui-btn ui-btn-b ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-check">Neu</a>
	</div><!-- /header -->

	<div data-role="content">	
		<?php
			require("db_config.php");
			require("save.php");
		?>
		<?php		
			
				
			$query = "SELECT * FROM info";
			$result = mysql_query($query);
			if($result){
				echo "<ol data-role=\"listview\" data-inset=\"true\" data-split-icon=\"delete\">";
				while($row = mysql_fetch_object($result)) {
					
					echo "<li>";
					echo "<a data-rel=\"dialog\" href='edit.php?id=$row->id'>$row->info</<a><a href='save.php?id=$row->id&action=delete'/>";
					echo "</li>";
				}
				echo "</ol>";
			}
		?>	
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>