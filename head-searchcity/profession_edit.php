<?php
include_once("function.php");
chk_login();
$id=$_GET['id'];
$qwery=mysql_query("select * from `profession` where `id`='$id'")or die(mysql_error());
$res=mysql_fetch_array($qwery);
$totalcombination=explode(",",$res['totalcombination']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jquery.min.js"></script>

<script type="text/javascript">
    $(function(){
	$('.box').click(function(){
			$(this).children('.dropdown').slideDown();
		});
    });
    
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
									<form method="post" action="profession_update.php" onsubmit="return chkChk()">
									<table class="table">
										<tr>
											<td>
												Profession
											</td>
											<td>
                                                                                            <input type="hidden" name="idval" value="<?php echo $id;?>" />
												<input type="text" name="profession" value="<?php echo $res['profession'];?>" class="form"/>
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
                                                                                                        
												<li onClick="if($(this).children('input').is(':checked')){$(this).children('input').attr('checked',false);}else{$(this).children('input').attr('checked',true);}"><input type="checkbox" name="subcat[]" value="<?php echo $rallcat['id'].'|'.$rsub['id'].'|subcategory';?>" <?php $comb=$rallcat['id'].'|'.$rsub['id'].'|subcategory'; if (in_array($comb, $totalcombination)){ echo 'checked="checked"';}?>/><?php echo $rsub['subcategory'];?></li>
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
														<li onClick="if($(this).children('input').is(':checked')){$(this).children('input').attr('checked',false);}else{$(this).children('input').attr('checked',true);}"><input type="checkbox" name="subcat[]" value="<?php echo $rallcat['id'].'|'.$rsubsub['id'].'|subsubcategory';?>" <?php $combs=$rallcat['id'].'|'.$rsubsub['id'].'|subsubcategory'; if (in_array($combs, $totalcombination)) {echo 'checked="checked"';}?>/><?php echo $rsubsub['subsubcategory'];?></li>
														<?php
													   }
													   else
													   {
														 while($rsubch=mysql_fetch_array($qsubch))
														 {
														?>
														 <li onClick="if($(this).children('input').is(':checked')){$(this).children('input').attr('checked',false);}else{$(this).children('input').attr('checked',true);}"><input type="checkbox" name="subcat[]" value="<?php echo $rallcat['id'].'|'.$rsubch['id'].'|subchcategory';?>" <?php $combsc=$rallcat['id'].'|'.$rsubch['id'].'|subchcategory';if (in_array($combsc, $totalcombination)){ echo 'checked="checked"';}?>/><?php echo $rsubch['subchcategory'];?></li>
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