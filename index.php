<?php
include_once('database.php');
if(isset($_POST['submit']))
{
   $category=explode(",",$_POST['category']);
   $city=$_POST['city'];
   if($city=='')
   {
		echo "<script>alert('Please choose a city');</script>";
   }
   else
   {
   header("location:home.php?cat=$category[0]&subcat=$category[1]&subcatype=$category[2]&city=$city");
   }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<title>..:Everything:..</title>

   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="style1.css" />
<link href='http://fonts.googleapis.com/css?family=Princess+Sofia' rel='stylesheet' type='text/css'>
<link href="style2.css" rel="stylesheet" type="text/css" />
<link href="responsive.css" rel="stylesheet" type="text/css" />

<link href="css/jquery.selectbox.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
		<script type="text/javascript">
		$(function () {
			$("#country_id").selectbox();
			$("#country_id2").selectbox();
			$("#country_id3").selectbox();
			$("#country_id4").selectbox();
			$("#country_idcity").selectbox();
			$("#country_idcitym").selectbox();
		});
		</script>
		
		<script type="text/javascript" src="js/jquery-ui.js"></script>
 <script type="text/javascript">
	  $(function(){
		$("#login_box").click(function(){
		$('#form_box').show("slide", { direction: 'right' }, 500);
		});
		$("#stop").click(function(){
		$('#form_box').hide("slide", { direction: 'right' }, 500);
		});
		
		$("#signin_box").click(function(){
		$('#signinform_box').show("slide", { direction: 'right' }, 500);
		});
		$("#signin_stop").click(function(){
		$('#signinform_box').hide("slide", { direction: 'right' }, 500);
		});
	  });
	  
<?php
if($_GET['msg']!=''){
?>
alert('<?php echo $_GET['msg'] ?>');
<?php
}
else{}
?>

function getcategory(prof)
{
   $.ajax({url:"ajax_getcat.php?prof="+prof,
	  success:function(results)
	  {
	    $('#categoryid_desktop').html(results);
	  }
   });
}

function getcategory1(prof)
{
   $.ajax({url:"ajax_getcat1.php?prof="+prof,
	  success:function(results)
	  {
	    $('#categoryid_mobile').html(results);
	  }
   });
}
  </script>



</head>
<body>
   
<div id="login_box" class="register2" style="cursor: pointer;">
		Login
</div>

<div id="signin_box" class="register2" style="margin-top: 70px;cursor: pointer;">
		Signin
</div>
<?php
if(isset($_SESSION['user_name']))
{
   ?>
<div id="hover-menu">
   <span style="float:left;">Welcome <?php echo $_SESSION['user_name'];?></span>
	<span style="float:left; margin-left:10px;">
			<ul>
					<li><a href=""><img src="img/setting.png" width="20" height="20"/></a>
							<ul>
									<li> <a href="logout.php" style="text-align:center;">Logout</a></li>
									<li> <a href="logout.php">forgot password </a></li>
									
							</ul>
					</li>
			</ul>
	</span>
  
</div>
<?php
}
?>
<div id="signinform_box">
		<img src="images/close.png" id="signin_stop" width="20" height="20" style="position:absolute; z-index:9999;"/>
	    <form method="post" action="user_insert.php">
		<table style="width:97%;  font-family: 'Conv_MYRIADPRO-REGULAR'; font-size:15px; color:#fff; line-height:1.9; font-size:16px; margin-top:10px; margin-left:3%; text-shadow: 1px 1px 1px #000;">
				<tr>
						<td>Name <span style="color: red;font-size: 14px;">*</span></td>
						<td><input type="text" name="name" class="form" required></td>
				</tr>
				<tr>
						<td>Email <span style="color: red;font-size: 14px;">*</span></td>
						<td><input type="email" name="email" class="form" required></td>
				</tr>
				<tr>
						<td>Contact <span style="color: red;font-size: 14px;">*</span></td>
						<td><input type="tel" name="contact" class="form" required></td>
				</tr>
				<tr>
						<td>Address</td>
						<td><textarea name="address" class="form" style="height: 80px;"></textarea></td>
				</tr>
				<tr>
						<td>Password <span style="color: red;font-size: 14px;">*</span></td>
						<td>
						   <input type="password" id="password" name="password" class="form" required/>
						</td>
				</tr>
				<tr>
						<td>Re-Type Password <span style="color: red;font-size: 14px;">*</span></td>
						<td>
						   <input type="password" class="form"  onblur="if(this.value!=$('#password').val()){ alert('Wrong Password');this.value='';$(this).focus();}"/>
						</td>
				</tr>
				<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="submit" value="Submit" class="button" style="margin-left:40px; padding:3px; font-size:15px; margin-left:0px; background:#3292bc; border:1px solid #1b6681;	"  /></td>
				</tr>
		</table>
	    </form>
</div>

<div id="form_box">
		<img src="images/close.png" id="stop" width="20" height="20" style="position:absolute; z-index:9999;"/>
		<form method="post" action="check_login.php">
		<table style="width:97%;  font-family: 'Conv_MYRIADPRO-REGULAR'; font-size:15px; color:#fff; line-height:1.9; font-size:16px; margin-top:10px; margin-left:3%; text-shadow: 1px 1px 1px #000;">
				<tr>
						<td>Email</td>
						<td><input type="email" name="email" class="form" ></td>
				</tr>
				<tr>
						<td>Password</td>
						<td><input type="password" name="pass" class="form" ></td>
				</tr>
				<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="submit" value="Submit" class="button" style="margin-left:40px; padding:3px; font-size:15px; margin-left:0px; background:#3292bc; border:1px solid #1b6681;	"  /></td>
				</tr>
		</table>
		</form>
</div>
	<div id="main">
		<div id="content_bar">
				<div id="content">
						<h1 class="head">Welcome</h1>
						<p class="text p_box">
								If you're building a dynamic web application, start by setting up an application server and connecting to a database.
						</p>
						<div id="content_box">
						<form method="post" action="#">
						<table class="table1" style="text-align:right;">
								<tr>
										<td align="right" style="text-shadow:1px 1px 1px #000; text-transform:uppercase; font-family: 'Conv_Oswald-Regular'; font-weight:normal;">I am a</td>
										<td align="right">
												<select id="country_id" tabindex="1" name="first" style="width:300px;" onChange="return getcategory(this.value);">
														<option value="">-- Select --</option>
													 <?php
													 $qpro=mysql_query("select * from `profession`")or die(mysql_error());
													 while($rpro=mysql_fetch_array($qpro))
													 {
													    ?>
													 <option value="<?php echo $rpro['id'];?>"><?php echo $rpro['profession'];?></option>
													 <?php
													 }
													 ?>
													</select>
										</td>
								</tr>
								
								<tr>
										<td style="text-shadow:1px 1px 1px #000; text-transform:uppercase; font-family: 'bebas_neueregular'; font-family: 'Conv_Oswald-Regular'; font-weight:normal;">Looking For</td>
										<td align="right" id="categoryid_desktop">
												<select name="category" id="country_id2" tabindex="1">
														<option value="">-- Select --</option>
														
													</select>
										</td>
								</tr>
								<tr>
										<td style="text-shadow:1px 1px 1px #000; text-transform:uppercase; font-family: 'bebas_neueregular'; font-family: 'Conv_Oswald-Regular'; font-weight:normal;">At</td>
										<td align="right" >
												<select name="city" id="country_idcity" tabindex="1">
														<option value="">-- Choose City --</option>
														<?php
														  $qwecity=mysql_query("select * from `city`")or die(mysql_error());
														  while($rescity=mysql_fetch_array($qwecity))
														  {
														  ?>
														  <option value="<?php echo $rescity['id'];?>"><?php echo $rescity['cityname'];?></option>
														  <?php
														  }
														  ?>
												</select>
										</td>
								</tr>
								<tr>
										<td>&nbsp;</td>
										<td align="left"><input type="submit" name="submit" value="Submit" class="button" style="margin-left:40px;"  /></td>
								</tr>
						</table>
						</form>
						
						
						<form method="post" action="#">
						<table class="table2">
								<tr>
											<td style="text-transform:uppercase; font-family: 'Conv_Oswald-Regular'; font-weight:normal;">I am a</td>
								</tr>
								<tr>
										<td >
													<select id="country_id3" tabindex="1" name="first" style="width:300px;" onChange="return getcategory1(this.value);">
														<option value="">-- Select --</option>
													 <?php
													 $qpro=mysql_query("select * from `profession`")or die(mysql_error());
													 while($rpro=mysql_fetch_array($qpro))
													 {
													    ?>
													 <option value="<?php echo $rpro['id'];?>"><?php echo $rpro['profession'];?></option>
													 <?php
													 }
													 ?>
													</select>
										</td>
								</tr>
								
								<tr>
										<td style="text-transform:uppercase; font-family: 'bebas_neueregular'; font-family: 'Conv_Oswald-Regular'; font-weight:normal;">Looking For</td>
								</tr>
								<tr>
										<td id="categoryid_mobile">
												<select name="category" id="country_id4" tabindex="1">
														<option value="">-- Select --</option>
														
													</select>
										</td>
								</tr>
								<tr>
										<td style="text-transform:uppercase; font-family: 'bebas_neueregular'; font-family: 'Conv_Oswald-Regular'; font-weight:normal;">At</td>
								</tr>
								<tr>
										<td>
												<select name="city" id="country_idcitym" tabindex="1">
														<option value="">-- Choose City --</option>
														<?php
														  $qwecity=mysql_query("select * from `city`")or die(mysql_error());
														  while($rescity=mysql_fetch_array($qwecity))
														  {
														  ?>
														  <option value="<?php echo $rescity['id'];?>"><?php echo $rescity['cityname'];?></option>
														  <?php
														  }
														  ?>
													</select>
										</td>
								</tr>
								<tr style="height:50px;">
										<td align="left"><input type="submit" name="submit" value="Submit" class="button" style="background:#3292bc; border:1px solid #fff;" /></td>
								</tr>
						</table>
						</form>
						</div>
						<div style="width:100%; height:30px; float:right; margin-top:30px;">
								<div id="fb-root"></div>
								<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=586849551427999&version=v2.0";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>
														  <div class="fb-like" style="float:right; margin-top:5px;" data-href="https://www.facebook.com/pages/Citysearch/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
								
								<img src="img/g.png" width="28" height="28" class="google" style="float:right;margin-right:0px; margin-right:10px;" >
						</div>
				</div>
		</div>
</div>
</body>
</html>
