<?php
include_once("function.php");
chk_login();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript">
		function delete_data(vals){					
					$.ajax({
					        url:"ajax_checksubcategory.php?id="+vals,
						success:function(result){
										//alert(result);
										if (result==1) {
										alert("There exist some  Subsubcategory under this Subcategory  so you can't delete this.");	
										}
										else if(result==0){				
										var con=confirm("Do you want to delete?");
										if(con){
										window.location="subcategory_delete.php?id="+vals;
										}				
										}
						}
						
					});
			
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
								<a href="">Dashboard </a> /
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Add Sub-Category
								</div>
								<div id="content2" style="min-height:350px;">
									
										<form method="post" action="subcategory_insert.php">
											<table class="table">
												<tr>
												<td> Category</td>
												<td>
														<select name="category" class="form" style="height:30px;">
															<?php
															$qallcat=mysql_query("select * from `category`")or die(mysql_error());
															while($rallcat=mysql_fetch_array($qallcat))
															{
																?>
															<option value="<?php echo $rallcat['id'];?>"><?php echo $rallcat['category'];?></option>
															<?php
															}
															?>
														</select>
													</td>
												</tr>
												 <tr>
													<td>Sub category</td>
													<td>
														<input type="text" name="subcategory" class="form"  required/>
													</td>
												</tr>
												<tr> 
												<td>&nbsp;</td> 
												<td><input type="submit" name="submit" value="Add" class="button" ></td> 
												</tr>
												
											</table>  
										</form>
										
										<h2 class="head3">
											View all Sub category
										</h2>
										<table class="table1" cellpadding="5">
											<tr class="tr1">
												<th>Subcategory</th>
												<th>Category</th>
												<th colspan="2">Action</th>
											</tr>
											</table>
									<div style="width: 98%;height: 300px;float: left;overflow: auto;">
									    <table class="table1" cellpadding="5">
											<?php
											$qallscat=mysql_query("select * from `subcategory`")or die(mysql_error());
											while($rallscat=mysql_fetch_array($qallscat))
											{
												?>
												<tr>
													<td>
														<?php echo $rallscat['subcategory'];?>
													</td>
													<td>
														<?php echo categoryname($rallscat['catid']);?>
													</td>
													<td>
														<a href="subcategory_edit.php?id=<?php echo $rallscat['id'];?>"><img src="img/edit.png"></a>
													</td>
													<td onClick="delete_data(<?php echo $rallscat['id'];?>)">
														<img src="img/delete.png" >
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