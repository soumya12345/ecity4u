<?php
include_once("function.php");
chk_login();
$id=$_GET['id'];
$qallproduct=mysql_query("select * from `user` where `id`='$id'")or die(mysql_error());
$res=mysql_fetch_array($qallproduct);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false //disable key press
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
										Add Agent
								</div>
								<div id="content2">
                                                                    <?php
                                                                    if(isset($_GET['msg'])){ echo $_GET['msg'];}
                                                                    ?>
									<form method="post" action="agent_update.php">
									<table class="table">
										<tr>
											<td>
												Agent Name
											</td>
											<td>
                                                                                            <input type="hidden" name="idval" value="<?php echo $id;?>" />
												<input type="text" name="agentname" class="form" readonly value="<?php echo $res['name'];?>"/>
											</td>
										</tr>
                                                                                <tr>
											<td>
												Password
											</td>
											<td>
												<input type="password" name="password" class="form" value="<?php echo $res['password'];?>"/>
											</td>
										</tr>
                                                                                <tr>
											<td>
												Contact Number
											</td>
											<td>
												<input type="tel" name="contact" class="form" value="<?php echo $res['contact'];?>" onkeypress="return numbersonly(event)" required/>
											</td>
										</tr>
                                                                                <tr>
											<td>
												Email
											</td>
											<td>
												<input type="email" name="email" class="form" value="<?php echo $res['email'];?>" readonly/>
											</td>
										</tr>
                                                                                <tr>
											<td>
												Address
											</td>
											<td>
												<textarea name="address" class="form" style="height: 80px;" required><?php echo $res['address']; ?></textarea>
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