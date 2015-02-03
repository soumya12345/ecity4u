<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-EN">
<head>
	
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
	
	<ul id="menu1">
		<li>
			<?php
			$fet=mysql_query("select * from `category` where `did`='0'") or die(mysql_error());
			while($res=mysql_fetch_array($fet))
			{ $id=$res['id'];
			?>
			<a href="#"><?php echo $res['category'];?></a>
			<ul>
				<?php
				$fet1=mysql_query("select * from `category` where `did`='$id'");
				while($res1=mysql_fetch_array($fet1))
				{   $sid=$res1['id'];
				?>
				<li>
					<a href="#" onclick="window.location.href='index.php?cat=<?php echo $sid;?>'"><?php echo $res1['category'];?></a>
					<ul>
						<?php
						$fet2=mysql_query("select * from `destination` where `subcategory`='$sid'");
						while($res2=mysql_fetch_array($fet2))
						{ $slno=$res2['slno'];
						?>
						<li>
							<a href="index.php?slno=<?php echo $res2['slno'];?>"><?php echo $res2['name'];?></a>
						</li><?php }?>
					</ul>
					
				</li><?php }?>
			</ul><?php }?>
		</li>
	</ul>
</body>
</html>

