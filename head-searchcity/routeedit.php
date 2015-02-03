<?php
include_once("function.php");
chk_login();
$id=$_GET['id'];
$qroot=mysql_query("select * from `busrootmap` where `id`='$id'")or die(mysql_error());
$root=mysql_fetch_array($qroot);

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
    <script src="jquery.min.js"></script>
    <script type="text/javascript">
        function addcheckpoint() {
           var stoppage='<?php echo $stoppage;?>';
           $('#checkpoint').append('<tr><td>Stoppage Name<br/><select name="checkpoint[]"><option>--choose--</option>'+stoppage+'</select></td><td>Arrival Time<br/><input type="time" name="checkpttime[]"></td></tr>');
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
										Edit Bus Route
								</div>
								<div id="content2">
										<form name="" action="route_update.php" method="post">
											<table class="table">
											   <tr>
													<td>Bus Name</td>
													<td>
										<input type="hidden" name="idval" value="<?php echo $id;?>" class="form"/>
										<input type="text" name="busname" value="<?php echo $root['busname'];?>" class="form" readonly></td>
												</tr>
												<tr>
													<td>
										Stoppage Name<br/>
										<select name="checkpoint" class="form" style="height:30px;">
											<option>--choose--</option>
											<?php
											$qwstop=mysql_query("select * from `busstoppage`")or die(mysql_error());
											while($rwstop=mysql_fetch_array($qwstop))
											{
											?>
											<option value="<?php echo $rwstop['id'];?>" <?php if($root['stoppagename']==$rwstop['id']) echo 'selected="selected"';?>><?php echo $rwstop['stoppagename'];?></option>
											<?php
											}
											?>
										</select>
										</td>
													<td>Arrival Time<br/><input type="time" name="checkpttime" value="<?php echo $root['arriavaltime'];?>" class="form"></td>
												</tr>
												
												<tr>
										<td>&nbsp;</td>
													<td><input type="submit" name="submit" value="Update" class="button"></td>
												</tr>
											</table>
											</form>
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