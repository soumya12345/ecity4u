<?php
include_once("function.php");
$id=$_GET['id'];
$qwery=mysql_query("select * from `busstoppage` where `id`='$id'")or die(mysql_error());
$rstop=mysql_fetch_array($qwery);
chk_login();
 ?>
<html>
<head>
  	<title>Admin</title>
   <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
        function addcheckpoint() {
           $('#checkpoint').append('<tr><td>Check Point</td><td><input type="text" name="checkpt[]"></td></tr>');
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
										Edit Bus Stoppage
								</div>
								<div id="content2">
										<form name="" action="busstop_update.php" method="post">
												<table class="table">
														<tr>
															<td>Stoppage name
															<input type="hidden" name="idval" value="<?php echo $id;?>" class="form" />
															</td>
															<td><input type="text" name="stoppage" value="<?php echo $rstop['stoppagename'];?>" class="form" /></td>
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