<?php
include_once("function.php");
chk_login();
$id=$_GET['id'];
$qcat=mysql_query("select * from `category` where `id`='$id'")or die(mysql_error());
$rcat=mysql_fetch_array($qcat);
?>
<!DOCTYPE html>
<html>
<head>
   <title>Admin</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
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
										Edit Category
								</div>
								<div id="content2">
									<form method="post" action="category_update.php" enctype="multipart/form-data">
									<table class="table">
										<tr>
											<td>
												Category
											</td>
											<td>
												<input type="hidden" name="idval" value="<?php echo $id;?>" class="form"/>
												<input type="text" name="category" value="<?php echo $rcat['category'];?>" required class="form"/>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<img src="<?php echo $rcat['icon'];?>" style="width: 60px;height: auto; border:3px solid #f3f3f3;" />
											</td>
										</tr>
										<tr>
											<td>
												Icon
											</td>
											<td>
												<input type="file" name="img" />
											</td>
										</tr>
										<tr>
											<td>
												<input type="submit" value="Update" class="button" />
											</td>
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