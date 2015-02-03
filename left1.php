<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-EN">
<head>
	<link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Simple JQuery Collapsing menu</title>
	<!--[if lt IE 8]>
   <style type="text/css">
   li a {display:inline-block;}
   li a {display:block;}
   </style>
   <![endif]-->
</head>
<body>
	
<div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <?php
	$fet=mysql_query("select * from `category` where `did`='0'") or die(mysql_error());
	while($res=mysql_fetch_array($fet))
	{ $id=$res['id'];
 ?>
   <li class='active has-sub'><a href='#'><span><?php echo $res['category'];?></span></a>
      <ul>
	<?php
		$fet1=mysql_query("select * from `category` where `did`='$id'");
		while($res1=mysql_fetch_array($fet1))
		{   $sid=$res1['id'];
	?>
         <li class='has-sub'><a href="#"><span><?php echo $res1['category'];?></span></a>
            <ul>
		<?php
			$fet2=mysql_query("select * from `destination` where `subcategory`='$sid'");
			while($res2=mysql_fetch_array($fet2))
			{ $slno=$res2['slno'];
		?>
               <li class='last'><a href='inde1.php?slno=<?php echo $res2['slno'];?>'><span><?php echo $res2['name'];?></span></a></li><?php }?>
            </ul>
         </li><?php }?>
      </ul>
   </li><?php }?>
</ul>
</div>
</body>
</html>

