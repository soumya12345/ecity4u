<?php
include_once("function.php");
chk_login();
$id=$_GET['id'];
$qallscat=mysql_query("select * from `subsubcategory` where `id`='$id'")or die(mysql_error());
$rallscat=mysql_fetch_array($qallscat);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
   <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var ca=<?php echo $rallscat['category'];?>;
            var subca=<?php echo $rallscat['subcategory'];?>;
            $.ajax({url:"ajax_getsubcategory.php?catid="+ca+"&subca="+subca,
                  success:function(reults)
                  {
                    $('#subcat').html(reults);
                  }
            
           });
        });
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
								<a href="">Dashboard </a> 
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Add Sub-Sub Category
								</div>
								<div id="content2">
										<form method="post" action="subsubcategory_update.php" onsubmit="return checkCategory()">
												<table class="table">
													<tr>
														<td>
															Category
														</td>
														<td>
															<input type="hidden" name="idval" value="<?php echo $id;?>" class="form"/>
															<select name="category" onChange="return viewsubcategory(this.value);" class="form" id="category" style="height:30px;">
																<option value="">--choose--</option>
																<?php
																$qallcat=mysql_query("select * from `category`")or die(mysql_error());
																while($rallcat=mysql_fetch_array($qallcat))
																{
																	?>
																<option value="<?php echo $rallcat['id'];?>" <?php if($rallscat['category']==$rallcat['id']){ echo 'selected';}?>><?php echo $rallcat['category'];?></option>
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
															<input type="text" name="subsubcategory" value="<?php echo $rallscat['subsubcategory'];?>" required class="form"/>
														</td>
													</tr>
													<tr>
														<td>
															<input type="submit" value="Update" class="button"/>
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