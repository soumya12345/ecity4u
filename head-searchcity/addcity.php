<?php
include_once("function.php");
chk_login();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
	    function delete_data(vals){	
	var con=confirm("Do you want to delete?");
	if(con){
	window.location="city_delete.php?id="+vals;
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
										Add City
								</div>
								<div id="content2">
									<form method="post" action="city_insert.php">
									<table class="table">
										<tr>
											<td>
												City Name
											</td>
											<td>
												<input type="text" name="cityname" class="form" required/>
											</td>
										</tr>
										<tr>
											<td> 
												<input type="submit" value="Add" class="button" />
											</td>
										</tr>
									</table>
									</form>
									
									<h2 class="head3">View City</h2>
									<table class="table1" cellpadding="5">
										<tr class="tr1">
										<th>City Name</th>
										<th colspan="2">Action</th>
										</tr>
									</table>
									<div style="width: 98%;height: 300px;float: left;overflow: auto;">
									    <table class="table1" cellpadding="5">
										<?php
										$qallproduct=mysql_query("select * from `city`")or die(mysql_error());
										while($rallproduct=mysql_fetch_array($qallproduct))
										{
										?>
										<tr>
											<td><?php echo $rallproduct['cityname'];?></td>
											<td>
											<a href="city_edit.php?id=<?php echo $rallproduct['id'];?>"><img src="img/edit.png"></a>
											</td>
											<td onClick="delete_data(<?php echo $rallproduct['id'];?>)">
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