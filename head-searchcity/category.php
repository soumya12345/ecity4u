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
					        url:"ajax_checkcategory.php?id="+vals,
						success:function(result){
										//alert(result);
										if (result==1) {
										alert("There exist some  Subcategory under this Category  so you can't delete this.");	
										}
										else if(result==0){				
										var con=confirm("Do you want to delete?");
										if(con){
										window.location="category_delete.php?id="+vals;
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
										Add Category
								</div>
								<div id="content2" style="min-height:350px;">
									
										<form method="post" action="category_insert.php" enctype="multipart/form-data">
											<table class="table">
												<tr>
												<td> Category</td>
												<td> <input type="text" name="category" class="form" required /></td>
												</tr>
												<tr>
												<td>Icon</td>
												<td> <input type="file" name="img" required /></td>
												</tr>
												<tr> 
												<td>&nbsp;</td> 
												<td><input type="submit" name="submit" value="Add" class="button" ></td> 
												</tr>
												
											</table>  
										</form>
										
										<h2 class="head3">View all category</h2>
										<table class="table1" cellpadding="5">
													<tr class="tr1">
															<th>Category</th>
															<th colspan="2">Action</th>
													</tr>
										</table>
									<div style="width: 98%;height: 300px;float: left;overflow: auto;">
									    <table class="table1" cellpadding="5">
													<?php
															$qallcat=mysql_query("select * from `category`")or die(mysql_error());
															while($rallcat=mysql_fetch_array($qallcat))
															{
																?>
																<tr>
																	<td>
																		<?php echo $rallcat['category'];?>
																	</td>
																	<td>
																		<a href="category_edit.php?id=<?php echo $rallcat['id'];?>"><img src="img/edit.png"></a>
																	</td>
																	<td onClick="delete_data(<?php echo $rallcat['id'];?>)">
																	<img src="img/delete.png" >
																	</td>
																</tr>
																<?php
																}
																?>
													
													<tr>
													
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