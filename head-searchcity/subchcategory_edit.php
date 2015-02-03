<?php
include_once("function.php");
chk_login();
$id=$_GET['id'];
$qallscat=mysql_query("select * from `subchcategory` where `id`='$id'")or die(mysql_error());
$rallccat=mysql_fetch_array($qallscat);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
   <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var ca=<?php echo $rallccat['category'];?>;
            var subca=<?php echo $rallccat['subcategory'];?>;
             $.ajax({url:"ajax_getsubcategory.php?catid="+ca+"&subca="+subca,
                  success:function(reults)
                  {
                    $('#subcat').html(reults);
                  }
            
           });
        
        var subcatid=<?php echo $rallccat['subsubcategory'];?>;
         $.ajax({url:"ajax_getsubsubcategory.php?subcatid="+subca+"&selectsubcatid="+subcatid,
                  success:function(reults)
                  {
                    $('#subsubcat').html(reults);
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
        function getsubsubcategory(subcatid) {
            $.ajax({url:"ajax_getsubsubcategory.php?subcatid="+subcatid,
                  success:function(reults)
                  {
                    $('#subsubcat').html(reults);
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
var subsubcat=document.getElementById('subsubcategory').value;
if(subsubcat==''){
   alert("You have Choose a SubsubCategory...");
   document.getElementById('subsubcategory').focus();
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
										Add Sub-Child Category
								</div>
								<div id="content2">
										<form method="post" action="subchcategory_update.php" onsubmit="return checkCategory()">
												<table class="table">
													<tr>
														<td>
															Category
														</td>
														<td>
															<input type="hidden" name="idval" value="<?php echo $id;?>" class="form"/>
															<select name="category" onChange="return viewsubcategory(this.value);" class="form" style="height:30px;" id="category">
																<option value="">--choose--</option>
																<?php
																$qallcat=mysql_query("select * from `category`")or die(mysql_error());
																while($rallcat=mysql_fetch_array($qallcat))
																{
																	?>
																<option value="<?php echo $rallcat['id'];?>" <?php if($rallccat['category']==$rallcat['id']) echo 'selected';?>><?php echo $rallcat['category'];?></option>
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
														<td id="subsubcat">
														   
														</td>
													</tr>
													<tr>
														<td>Sub-Child Category</td>
														<td>
															<input type="text" name="subchcategory" class="form" required value="<?php echo $rallccat['subchcategory'];?>"/>
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