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
     $(document).ready(function () {
	 $('.check').bind('click',function(){
		var cli=$(this).children('input');
		cli.prop("checked", !cli.prop("checked"));
		if(cli.prop('checked'))
		{
		$(this).find('img').attr('src','check.png');
		}
		else
		{
		$(this).find('img').attr('src','uncheck.png');
		}
		});
     });
     
     
    $(function(){
	$('.box').click(function(){
			$(this).children('.dropdown').slideDown();
		});
    });
    
    function delete_data(vals){	
	var con=confirm("Do you want to delete?");
	if(con){
	window.location="profession_delete.php?id="+vals;
	}
	}
    function chkChk(){
    //var chkbox=document.getElementById('check').checked;
   var checkboxes = document.getElementsByName("subcat[]");
   var count=0;
    for (i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked == true) {
    count++;    
    }
    }
    if (count<=0) {
	alert("You have to checked atleast one checkbox...");
	 return false;
    }
    }
</script>

    
<style>
    .dropdown{
	display: none;
    }
</style>
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
										Add Profession
								</div>
								<div id="content2">
									<form method="post" action="profession_insert.php" onsubmit="return chkChk()">
									<table class="table">
										<tr>
											<td>
												Profession
											</td>
											<td>
												<input type="text" name="profession" class="form" required/>
											</td>
										</tr>
										
										<tr>
										<td>
											Link Category
										</td>
										<td>
											<ul style="list-style-type:none;  font-family: arial; font-size:16px; line-height:1.8;">
											
											<?php
											$qallcat=mysql_query("select * from `category`")or die(mysql_error());
											while($rallcat=mysql_fetch_array($qallcat))
											{
											$qsub=mysql_query("select * from `subcategory` where `catid`='$rallcat[id]'")or die(mysql_error());
											?>
												<li class="box" style="cursor:pointer;"><?php echo $rallcat['category'];?> 																	<ul style="list-style-type:none; font-size:16px;" class="dropdown">
												<?php
												while($rsub=mysql_fetch_array($qsub))
												{
													$qsubsub=mysql_query("select * from `subsubcategory` where `category`='$rallcat[id]' and `subcategory`='$rsub[id]'")or die(mysql_error());
													if(mysql_num_rows($qsubsub)==0)
													{
													?>
                                                                                                        
												<li class="check"><input type="checkbox" name="subcat[]" value="<?php echo $rallcat['id'].'|'.$rsub['id'].'|subcategory';?>" style="display: none;" id="check"/><img src="uncheck.png" id="checkbox<?php echo $rsub['id'];?>"/><?php echo $rsub['subcategory'];?></li>
												<?php
													}
													else
													{
													while($rsubsub=mysql_fetch_array($qsubsub))
													{
													   $qsubch=mysql_query("select * from `subchcategory` where `category`='$rallcat[id]' and `subcategory`='$rsub[id]' and `subsubcategory`='$rsubsub[id]'")or die(mysql_error());
													   if(mysql_num_rows($qsubch)==0)
													   {
														?>
														<li class="check" ><input type="checkbox" name="subcat[]" value="<?php echo $rallcat['id'].'|'.$rsubsub['id'].'|subsubcategory';?>" style="display: none;" id="check"/><img src="uncheck.png" id="checkbox<?php echo $rsubsub['id'];?>"/><?php echo $rsubsub['subsubcategory'];?></li>
														<?php
													   }
													   else
													   {
														 while($rsubch=mysql_fetch_array($qsubch))
														 {
														?>
														 <li class="check"><input type="checkbox" name="subcat[]" value="<?php echo $rallcat['id'].'|'.$rsubch['id'].'|subchcategory';?>" style="display: none;" id="check"/><img src="uncheck.png" id="checkbox<?php echo $rsubch['id'];?>"/><?php echo $rsubch['subchcategory'];?></li>
														 <?php
														 }
													   }
													}
													}
												}
												?>
											</ul>
												</li>
											<?php
											}
											?>
											</ul>
												
										</td>
										</tr>
										
										<tr>
											<td> 
												<input type="submit" value="Add" class="button" />
											</td>
										</tr>
									</table>
									</form>
									
									<h2 class="head3">View Profession</h2>
									<table class="table1" cellpadding="5">
										<tr class="tr1">
										<th>Profession name</th>
										<th colspan="2">Action</th>
										</tr>
									</table>
									<div style="width: 98%;height: 300px;float: left;overflow: auto;">
									    <table class="table1" cellpadding="5">
										<?php
										$qallproduct=mysql_query("select * from `profession`")or die(mysql_error());
										while($rallproduct=mysql_fetch_array($qallproduct))
										{
										?>
										<tr>
											<td><?php echo $rallproduct['profession'];?></td>
											<td>
											<a href="profession_edit.php?id=<?php echo $rallproduct['id'];?>"><img src="img/edit.png"></a>
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