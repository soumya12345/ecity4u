<?php
include_once('database.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>..:Everything:..</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="style1.css" />
<link href='http://fonts.googleapis.com/css?family=Princess+Sofia' rel='stylesheet' type='text/css'>
 <script src="jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="menu1.js" type="text/javascript">
$.noConflict();
jQuery(document).ready(function($) {
});
</script>
<script type="text/javascript">
		function train(){
		  var to=$("#to").val();
		   var from=$("#from").val();
		   $.ajax({url:"traintime.php?to="+to+'&frm='+from,success:function(result){
                $("#show").html(result);
                }
		});
		}
	</script>
<style>
    #map_canvas {width: 500px;height: 400px;}
    #header{ width:100%; height:100px; background-color: gray; text-align: center; font-family: fantasy; font-size: 80px;}
</style>	
</head>
<body>
    <div id="header">
	Complete
	</div>
	<div id="container" style="height:auto; margin-top:20px; margin-bottom: 20px;">
		<div id="container_content" style="height:0px;">
			<div class="leftbox">
			    
			    <div id='cssmenu'>
				<ul>
				   <li><a href='index.php'><span>Home</span></a></li>
				   <li><a href='bus_timing.php'><span>BUS Timing</span></a></li>
				   <li><a href='train_timing.php'><span>TRAIN Timing</span></a></li>
				   <li class='active has-sub'><a href='#'><span></span></a></li>
			    </div>			
			</div>
			<div class="rightbox">
			   <div style="text-align: center; font-family: fantasy;">Train Timing</div>
			   <table>
			      <tr>
				 <td>To</td>
				 <td><input type="text" name="to" id="to" required/></td>
			      </tr>
			      <tr>
				 <td>From</td>
				 <td><input type="text" name="from" id="from" required/></td>
			      </tr>
			      <tr>
				 <td colspan="2" align="center"><input type="submit" name="submit" value="submit" onClick="train()"></td>
			      </tr>
			      <tbody id="show"></tbody>
			   </table>
			</div>
		</div>
	</div>
</body>
</html>
