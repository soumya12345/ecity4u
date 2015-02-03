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
        function viewsubcategory(catid) {
           $.ajax({url:"ajax_getsubcategory.php?catid="+catid,
                  success:function(reults)
                  {
                    $('#subcat').html(reults);
                  }
            
           });
        }
    </script>
        <script type="text/javascript">
		function delete_data(vals){					
					$.ajax({
					        url:"ajax_checksubsubcategory.php?id="+vals,
						success:function(result){
										//alert(result);
										if (result==1) {
										alert("There exist some  Subchildcategory under this Subsubcategory  so you can't delete this.");	
										}
										else if(result==0){				
										var con=confirm("Do you want to delete?");
										if(con){
										window.location="subsubcategory_delete.php?id="+vals;
										}				
										}
						}
						
					});
			
		}
</script>
<script type="text/javascript">
function checkCategory(){
 var cat=document.getElementById('category').value;
 //alert(cat);
 if (cat=='') {
    alert("You have Choose a Category...");
    document.getElementById('category').focus();
    return false;
 }
var subcat=document.getElementById('subcategory').value;
if(subcat==''){
   alert("You have Choose a SubCategory...");
   document.getElementById('subcategory').focus();
   return false;
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
								<a href="">Dashboard </a> /
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Add Sub-Sub Category
								</div>
								<div id="content2" style="min-height:350px;">
										<form method="post" action="subsubcategory_insert.php" onsubmit="return checkCategory()">
												<table class="table">
													<tr>
														<td>
															Category
														</td>
														<td>
															<select name="category" onChange="return viewsubcategory(this.value);" class="form" style="height:30px;" id="category">
																<option value="">--choose--</option>
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
														<td id="subcat">
														   
														</td>
													</tr>
													<tr>
														<td>Sub-Sub Category</td>
														<td>
															<input type="text" name="subsubcategory" class="form" required/>
														</td>
													</tr>
													<tr>
														<td>
															<input type="submit" value="Submit" class="button" />
														</td>
													</tr>
												</table>
												</form>
												<h2 class="head3">
													View all Sub Sub category
												</h2>
												<table class="table1" cellpadding="5">
													<tr class="tr1">
														<th>Sub-Sub category</th>
														<th>Category</th>
														<th>Sub-Category</th>
														<th colspan="2">Action</th>
													</tr>
													</table>
									<div style="width: 98%;height: 300px;float: left;overflow: auto;">
									    <table class="table1" cellpadding="5">
													<?php
													$qallscat=mysql_query("select * from `subsubcategory`")or die(mysql_error());
													while($rallscat=mysql_fetch_array($qallscat))
													{
														?>
														<tr>
															<td>
																<?php echo $rallscat['subsubcategory'];?>
															</td>
															<td>
																<?php echo categoryname($rallscat['category']);?>
															</td>
															<td>
																<?php echo subcategoryname($rallscat['subcategory']);?>
															</td>
															<td>
																<a href="subsubcategory_edit.php?id=<?php echo $rallscat['id'];?>"><img src="img/edit.png"></a>
															</td>
															<td onClick="delete_data(<?php echo $rallscat['id'];?>)">
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