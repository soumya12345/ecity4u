<?php
include_once("database.php");
$id=$_GET['id'];
$qwe=mysql_query("select * from `product` where `id`='$id'") or die (mysql_error());
while($res=mysql_fetch_array($qwe)){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Particle - free css template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<style>
body{
    margin: 0px;
    padding: 0px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color: #644f40;
}
#logo_bar{ width:100%; height:auto; float:left;}
#logo_content{ width:960px; margin:auto; }
#logo_box{ width:940px; height:auto; float:left; background:#3292bc; padding:10px; border-bottom:3px solid #e7b52e;}
#logo{ width:200px; height:auto; float:left;}

#articles_main{ width:960px; margin:auto;}
.articles_box{ width:580px; height:auto; float:left; padding:10px; border-bottom:1px dotted #ccc;}
.articles_link{ width:100%; height:auto; float:left; color: #f3542c; font-size:12px;}
#articles_left{ width:600px; height:auto; float:left; 
background:#fff; border-radius:5px 5px; border: 1px solid #d1c7b8; box-shadow: 0 1px 3px rgba(0,0,0,0.15);}


.description_box1{width:660px; font-size:11px; line-height:1.8; font-weight:bold; float:left; padding:10px; border-bottom:1px dotted #ccc;}
.number{ font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#fff; padding:0px; border-radius:3px 3px; text-align:center; background:#f3522c; }
.button3:focus{ outline:none; border:1px solid #ccc;}

#footer_bar{ width:100%; height:auto; float:left;}
#footer_box{ width:960px; margin:auto;}
#footer_content{ width:940px; height:auto; float:left; padding:10px; background:#3292bc; margin-top:20px;}
.input{ width:250px; height:20px; float:left; border:1px solid #ccc;}
</style>
</head>
<body>
<div id="logo_bar">
		<div id="logo_content">
				<div id="logo_box">
						<div id="logo">
								<img src="images/logo.png"  />
						</div>
				</div>
		</div>
</div>
<div id="articles_main">
		<div id="articles_left" style="width:960px; margin-top:15px; min-height:500px;">
				<div class="articles_box" style="width:940px;">
						<div class="head2" style="width:940px;">
								<div class="date" style="width:150px; float:left; background:none; margin-right:20px;">
										<img src="<?php echo $res['image']; ?>" style="width:100%;"/>
								</div>
								<h1 style="color:#4e595d; font-size:22px; color: #CB122B; margin-top:0px; margin-bottom:5px;"><?php echo $res['productname']; ?></h1>
								<div style="width:700px; height:auto; float:left; font-size:13px; color: #644f40; font-weight:normal;">
										<?php
										$qry=mysql_query("select * from `city` where `id`='$res[city]'")or die (mysql_error());
										$rs=mysql_fetch_array($qry);
										?>
										<span><?php echo $res['productname']; ?></span><br />
										<span><?php echo $res['contact']; ?>,
                                                                                      <?php echo $res['email']; ?>,
										      <?php echo $rs['cityname']; ?>,
										      <?php echo htmlspecialchars_decode ($res['description']); ?>
                                                                                </span>
								</div>
                                                                <?php } ?>
						</div>
				</div>
				
				<div class="articles_box" style="width:940px;">
						<div class="articles_link" style="color: #644f40;">
								<form name="form" action="insert_review.php">
								<table style="width:100%; font-weight:bold; height:200px;">
									    
										<tr>
												<td>Name<br /><input type="text" name="name" value="" class="input"  />
												    <input type="hidden" name="hid" value="<?php echo $id; ?>">
												</td>
										</tr>
										<tr>
												<td>Review<br /><textarea class="input" name="review" style="height:50px;"></textarea></td>
										</tr>
										<tr>
												<td>Rating<br /><img src="images/star.png" width="100" /></td>
										</tr>
										<tr>
												<td> <input type="submit" name="submit" value="Submit" class="button" ></td>
										</tr>
                                                                        
								</table>
								</form>
						</div>
				</div>		
		</div>
		
</div>
</div>

<div id="footer_bar">
		<div id="footer_box">
				<div id="footer_content">
				</div>
		</div>
</div>

</body>
</html><?php
include_once("database.php");
$id=$_GET['id'];
$qwe=mysql_query("select * from `product` where `id`='$id'") or die (mysql_error());
while($res=mysql_fetch_array($qwe)){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Particle - free css template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="style1.css" />
<style>
body{
    margin: 0px;
    padding: 0px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color: #644f40;
}
#logo_bar{ width:100%; height:auto; float:left;}
#logo_content{ width:960px; margin:auto; }
#logo_box{ width:940px; height:auto; float:left; background:#3292bc; padding:10px; border-bottom:3px solid #e7b52e;}
#logo{ width:200px; height:auto; float:left;}

#articles_main{ width:960px; margin:auto;}
.articles_box{ width:580px; height:auto; float:left; padding:10px; border-bottom:1px dotted #ccc;}
.articles_link{ width:100%; height:auto; float:left; color: #f3542c; font-size:12px;}
#articles_left{ width:600px; height:auto; float:left; 
background:#fff; border-radius:5px 5px; border: 1px solid #d1c7b8; box-shadow: 0 1px 3px rgba(0,0,0,0.15);}


.description_box1{width:660px; font-size:11px; line-height:1.8; font-weight:bold; float:left; padding:10px; border-bottom:1px dotted #ccc;}
.number{ font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#fff; padding:0px; border-radius:3px 3px; text-align:center; background:#f3522c; }
.button3:focus{ outline:none; border:1px solid #ccc;}

#footer_bar{ width:100%; height:auto; float:left;}
#footer_box{ width:960px; margin:auto;}
#footer_content{ width:940px; height:20px; float:left; padding:10px; background:#3292bc; margin-top:20px;}
.input{ width:250px; height:20px; float:left; border:1px solid #ccc;}
</style>
</head>
<body>
<div id="logo_bar">
		<div id="logo_content">
				<div id="logo_box">
						<div id="logo">
								<img src="images/logo.png"  />
						</div>
				</div>
		</div>
</div>
<div id="articles_main">
		<div id="articles_left" style="width:960px; margin-top:15px; min-height:500px;">
				<div class="articles_box" style="width:940px;">
						<div class="head2" style="width:940px;">
								<div class="date" style="width:150px; float:left; background:none; margin-right:20px;">
										<img src="<?php echo $res['image']; ?>" style="width:100%;"/>
								</div>
								<h1 style="color:#4e595d; font-size:22px; color: #CB122B; margin-top:0px; margin-bottom:5px;"><?php echo $res['productname']; ?></h1>
								<div style="width:700px; height:auto; float:left; font-size:13px; color: #644f40; font-weight:normal;">
										<?php
										$qry=mysql_query("select * from `city` where `id`='$res[city]'")or die (mysql_error());
										$rs=mysql_fetch_array($qry);
										?>
										<span><?php echo $res['productname']; ?></span><br />
										<span><?php echo $res['contact']; ?>,
                                                                                      <?php echo $res['email']; ?>,
										      <?php echo $rs['cityname']; ?>,
										      <?php echo htmlspecialchars_decode ($res['description']); ?>
                                                                                </span>
								</div>
                                                                <?php } ?>
						</div>
				</div>
				
				<div class="articles_box" style="width:940px;">
						<div class="articles_link" style="color: #644f40;">
								<form name="form" action="insert_review.php">
								<table style="width:100%; font-weight:bold; height:200px;">
										<tr>
										    <td>
											<?php
											    $msg=$_GET['msg'];
											    echo $msg;
											?>
										    </td>
										</tr>
										<tr>
												<td>Name<br /><input type="text" name="name" value="" class="input" required  />
                                                                                                    <input type="hidden" name="hid" value="<?php echo $id; ?>">
                                                                                                </td>
										</tr>
										<tr>
												<td>Review<br /><textarea class="input" name="review" style="height:50px;" required></textarea></td>
										</tr>
										<tr>
												<td>Rating<br /><img src="images/star.png" width="100" /></td>
										</tr>
										<tr>
										    <td><input type="submit" name="submit" value="Submit" class="button" ></td>
										</tr>
                                                                        
								</table>
								</form>
						</div>
				</div>		
		</div>
		
</div>
</div>

<div id="footer_bar">
		<div id="footer_box">
				<div id="footer_content">
				</div>
		</div>
</div>

</body>
</html>