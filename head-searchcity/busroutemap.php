<?php
include_once("function.php");
chk_login();

$stoppage='';
$qwstop=mysql_query("select * from `busstoppage`")or die(mysql_error());
while($rwstop=mysql_fetch_array($qwstop))
{
$stoppage.='<option value='.$rwstop['id'].'>'.$rwstop['stoppagename'].'</option>';
}

?>
<html>
<head>
	<title>Admin</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
        function addcheckpoint() {
	    var stoppage='<?php echo $stoppage;?>';
           $('#checkpoint').append('<tr><td>Stoppage Name<br/><select name="checkpoint[]" class="form" style="height:30px;"><option>--choose--</option>'+stoppage+'</select></td><td>Arrival Time<br/><input type="time" name="checkpttime[]"></td></tr>');
        }
    </script>
    <script type="text/javascript">
	    function delete_data(vals){	
	var con=confirm("Do you want to delete?");
	if(con){
	window.location="routedelete.php?id="+vals;
	}
	}
	</script>
</head>
<body>
<!--------------top bar -------->
 <div id="top_bar">
 		<div id="top_box">
				<h2 style="margin-top:0px; padding-top:8px; font-family:Arial, Helvetica, sans-serif; color:#f5f5f5;">Admin Panel</h2>
		</div>
 </div>
 <!--------------top bar end-------->

 <div id="main_bar">
 		<div id="main_box">
				<?php
				include_once("leftbar.php");
				?>
				<div id="right_box" style="width:808px;">
						<div class="headline">
								<a href="">Dashboard </a> 
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Add Bus Route
								</div>
								<div id="content2">
									<form name="" action="route_insert.php" method="post">
									<table class="table">
				
									<tr>
											<td>From</td>
											<td>
											<select name="startpoint" class="form" style="height:30px;">
												<option>--choose--</option>
												<?php
												$qwstop=mysql_query("select * from `busstoppage`")or die(mysql_error());
												while($rwstop=mysql_fetch_array($qwstop))
												{
												?>
												<option value="<?php echo $rwstop['id'];?>"><?php echo $rwstop['stoppagename'];?></option>
												<?php
												}
												?>
											</select>
											</td>
										</tr>
										<tr>
											<td>To</td>
											<td>
											<select name="endpoint" class="form" style="height:30px;">
												<option>--choose--</option>
												<?php
												$qwstop=mysql_query("select * from `busstoppage`")or die(mysql_error());
												while($rwstop=mysql_fetch_array($qwstop))
												{
												?>
												<option value="<?php echo $rwstop['id'];?>"><?php echo $rwstop['stoppagename'];?></option>
												<?php
												}
												?>
											</select>
											</td>
										</tr>
										<tr>
											<td>Bus Name</td>
											<td><input type="text" name="busname" class="form"></td>
										</tr>
										<tr>
											<td>
											Stoppage Name<br/>
											<select name="checkpoint[]" class="form" style="height:30px;">
												<option>--choose--</option>
												<?php
												$qwstop=mysql_query("select * from `busstoppage`")or die(mysql_error());
												while($rwstop=mysql_fetch_array($qwstop))
												{
												?>
												
												<option value="<?php echo $rwstop['id'];?>"><?php echo $rwstop['stoppagename'];?></option>
												<?php
												}
												?>
											</select>
											</td>
											<td>Arrival Time<br/><input type="time" name="checkpttime[]"></td>
											</tr>
											<tbody id="checkpoint"></tbody>
											<tr>
											<td>&nbsp;
												
											</td>
											<td>
												<input type="button" value="Add more check point" onClick="return addcheckpoint();" class="button" style="width:auto;"/>
											</td>
										</tr>
										<tr>
									<td>&nbsp;</td>
											<td><input type="submit" name="submit" value="Save" class="button"></td>
										</tr>
									</table>
							</form>
							<h3 class="head3">All Bus Route</h3>
							<table class="table1" cellpadding="5">
							<tr class="tr1">
								<th>
								Bus Name
								</th>
								<th>
								Stoppage Name
								</th>
								<th>
								Arriavl Time
								</th>
								 <th colspan="2">
								Action
								</th>
							</tr>
							</table>
									<div style="width: 98%;height: 400px;float: left;overflow: auto;">
									    <table class="table1" cellpadding="5">
							<?php
							$qwery=mysql_query("select * from `busrootmap`")or die(mysql_error());
							while($res=mysql_fetch_array($qwery))
							{
								?>
								<tr>
								<td><?php echo $res['busname'];?></td>
								<td>
								   <?php echo $res['stoppagename'];?>
								</td>
								<td><?php echo $res['arriavaltime'];?></td>
								<td>
									<a href="routeedit.php?id=<?php echo $res['id'];?>">
									<img src="img/edit.png">
									</a>
								</td><td onClick="delete_data(<?php echo $res['id'];?>)"> 							
									<img src="img/delete.png">
									
								</td>
								</tr>
								<?php
							}
							?>
							</table>
									</div>
								</div>
						</div>
				</div>
		</div>
 </div>
  <!--------------content bar end-------->

<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
			&copy;Copy Right All Rights Reserved 2014	
		</div>
 </div>
  <!--------------footer end--------->
	
</body>
</html> 