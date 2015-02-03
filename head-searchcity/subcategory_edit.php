<?php
include_once("function.php");
chk_login();
$id=$_GET['id'];
$qallscat=mysql_query("select * from `subcategory` where `id`='$id'")or die(mysql_error());
$rallscat=mysql_fetch_array($qallscat);
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
										Edit Sub-Category
								</div>
								<div id="content2">
										<form method="post" action="subcategory_update.php">
										<table class="table">
											<tr>
												<td>
													Category
												</td>
												<td>
													<input type="hidden" name="idval" value="<?php echo $id;?>" class="form" />
													<select name="category" class="form" style="height:30px;">
														<?php
														$qallcat=mysql_query("select * from `category`")or die(mysql_error());
														while($rallcat=mysql_fetch_array($qallcat))
														{
															?>
														<option value="<?php echo $rallcat['id'];?>" <?php if($rallscat['catid']==$rallcat['id']) echo 'selected';?>><?php echo $rallcat['category'];?></option>
														<?php
														}
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td>Sub category</td>
												<td>
													<input type="text" name="subcategory" class="form" value="<?php echo $rallscat['subcategory'];?>" required/>
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