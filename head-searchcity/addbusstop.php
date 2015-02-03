<?php
include_once("function.php");
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
    <script type="text/javascript">
	    function delete_data(vals){	
	var con=confirm("Do you want to delete?");
	if(con){
	window.location="busstop_delete.php?id="+vals;
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
										Add Bus Stoppage
								</div>
								<div id="content2">
									<form name="" action="busstop_insert.php" method="post">
											<table class="table">
												<tr>
													<td>Stoppage name</td>
													<td><input type="text" name="stoppage" class="form"></td>
												</tr>
												<tr>
													<td>&nbsp;</td>
													<td><input type="submit" name="submit" value="Save" class="button"></td>
												</tr>
											</table>
									</form>
									<h3 class="head3">All Stoppage</h3>
									<table class="table table1" cellpadding="5">
									<tr class="tr1">
										<th>
										Stoppage name
										</th>
										 <th colspan="2">
										Action
										</th>
									</tr>
									</table>
									<div style="width: 98%;height: 400px;float: left;overflow: auto;">
									    <table class="table1" cellpadding="5">
									<?php
									$qwery=mysql_query("select * from `busstoppage`")or die(mysql_error());
									while($res=mysql_fetch_array($qwery))
									{
										?>
										<tr>
										<td><?php echo $res['stoppagename'];?></td>
										<td>
											<a href="busstop_edit.php?id=<?php echo $res['id'];?>">
											<img src="img/edit.png">
											</a>
										</td>
										<td onClick="delete_data(<?php echo $res['id'];?>)">   
											
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