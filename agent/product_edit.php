<?php
include_once("../head-searchcity/function.php");
agent_chk_login();
$id=$_GET['id'];
$qallproduct=mysql_query("select * from `product` where `id`='$id'")or die(mysql_error());
$rallproduct=mysql_fetch_array($qallproduct);
$totalcombination=explode(",",$rallproduct['totalcombination']);
?>

<!DOCTYPE html>
<html>
<head>
     <title>Admin</title>
   <link href="../head-searchcity/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../head-searchcity/jquery.min.js"></script>
    
         <!-- html editor-->
      <link type="text/css" href="../head-searchcity/css/jquery.simple-dtpicker.css" rel="stylesheet" />
      <script src="../head-searchcity/js/setup.js" type="text/javascript"></script>
      <script src="../head-searchcity/js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
     
      <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
	    
	     $('.check').bind('click',function(){
		var cli=$(this).children('input');
		cli.prop("checked", !cli.prop("checked"));
		if(cli.prop('checked'))
		$(this).find('img').attr('src','../head-searchcity/check.png');
		else
		$(this).find('img').attr('src','../head-searchcity/uncheck.png');
		});
        });
    </script>
<!-- html editor-->
<script type="text/javascript">
    $(function(){
	$('.box').click(function(){
			$(this).children('.dropdown').slideDown();
		});
    });
</script>

<!--google map-->  
<script src="https://maps.google.com/maps?file=api&amp;v=2&amp;key="
      type="text/javascript"></script>
    <script type="text/javascript">
 function load(a,b) {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(a,b);
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat").value = center.lat();
        document.getElementById("lng").value = center.lng();

	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
       document.getElementById("lat").value = point.lat();
       document.getElementById("lng").value = point.lng();

        });
      }
    }
    
function loadmap()
{
    var cityname=$("#city option:selected").text();
     var geocoder =  new google.maps.Geocoder();
    geocoder.geocode( { 'address': cityname+',Odisha,India'}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
	   // console.log(results[0].geometry.location.lat()+'-----------------'+results[0].geometry.location.lng());
	    load(results[0].geometry.location.lat(),results[0].geometry.location.lng());
            
          } else {
            alert("Something got wrong " + status);
          }
        });
}    
    </script>
</head>

<body onLoad="load(<?php echo $rallproduct['lat'];?>,<?php echo $rallproduct['lng'];?>);">

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
										Add Location
								</div>
								<div id="content2">
										<form method="post" action="product_update.php" enctype="multipart/form-data">
												<table class="table">
													<tr>
														<td>
															Location name
														</td>
														<td>
															<input type="hidden" name="idval" class="form" value="<?php echo $id;?>"/>
															<input type="text" name="product" class="form" value="<?php echo $rallproduct['productname'];?>"/>
														</td>
													</tr>
													<tr>
										    <td>
											    City
										    </td>
										    <td>
											<select name="city" id="city" class="form" style="height: 35px;" onchange="return loadmap();">
											    <option>--Choose--</option>
											    <?php
											    $qwecity=mysql_query("select * from `city`")or die(mysql_error());
											    while($rescity=mysql_fetch_array($qwecity))
											    {
											    ?>
											    <option value="<?php echo $rescity['id'];?>" <?php if($rescity['id']==$rallproduct['city']) echo "selected";?>><?php echo $rescity['cityname'];?></option>
											    <?php
											    }
											    ?>
											</select>
										    </td>
										</tr>
													<tr>
														<td>
															<img src="<?php echo $rallproduct['image'];?>" style="width: 100px;height: auto; border:3px solid #f3f3f3;"/>
														</td>
													</tr>
													<tr>
														<td>Image</td>
														<td>
															<input type="file" name="img"/>
														</td>
													</tr>
													<tr>
														<td>
															Contact
														</td>
														<td>
															<input type="tel" name="contact" class="form" value="<?php echo $rallproduct['contact'];?>"/>
														</td>
													</tr>
													<tr>
														<td>
															Email
														</td>
														<td>
															<input type="email" name="email" class="form" value="<?php echo $rallproduct['email'];?>"/>
														</td>
													</tr>
													<tr>
														<td>
															Description
														</td>
														<td>
														   <textarea name="description" class="tinymce" class="form" style="height:60px;"><?php echo $rallproduct['description'];?></textarea>
														</td>
													</tr>
													<tr>
													<td>
														Category
													</td>
													<td>
														<ul style="list-style-type:none;  font-family: arial; font-size:16px; line-height:1.8; font-size:14px; padding:0px; margin:0px;">
														
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
															<li class="check"><input type="checkbox" name="subcat[]" value="<?php echo $rallcat['id'].'|'.$rsub['id'].'|subcategory';?>" <?php $comb=$rallcat['id'].'|'.$rsub['id'].'|subcategory';?> style="display: none;" <?php if (in_array($comb, $totalcombination)) {echo 'checked="checked"';}?>/><img src="<?php if (in_array($comb, $totalcombination)){ echo '../head-searchcity/check.png';}else{ echo '../head-searchcity/uncheck.png';}?>" /><?php echo $rsub['subcategory'];?></li>
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
																	<li class="check"><input type="checkbox" name="subcat[]" value="<?php echo $rallcat['id'].'|'.$rsubsub['id'].'|subsubcategory';?>" <?php $combs=$rallcat['id'].'|'.$rsubsub['id'].'|subsubcategory';if (in_array($combs, $totalcombination)) {echo 'checked="checked"';}?> style="display: none;"/><img src="<?php if (in_array($combs, $totalcombination)){ echo '../head-searchcity/check.png';}else{ echo '../head-searchcity/uncheck.png';}?>" /><?php echo $rsubsub['subsubcategory'];?></li>
																	<?php
																   }
																   else
																   {
																	 while($rsubch=mysql_fetch_array($qsubch))
																	 {
																	?>
																	 <li class="check"><input type="checkbox" name="subcat[]" value="<?php echo $rallcat['id'].'|'.$rsubch['id'].'|subchcategory';?>" <?php $combsc=$rallcat['id'].'|'.$rsubch['id'].'|subchcategory';if (in_array($combsc, $totalcombination)){ echo 'checked="checked"';}?> style="display: none;"/><img src="<?php if (in_array($combsc, $totalcombination)){ echo '../head-searchcity/check.png';}else{ echo '../head-searchcity/uncheck.png';}?>" /><?php echo $rsubch['subchcategory'];?></li>
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
													<td colspan="2">
														<input type="hidden" name="lat" id="lat" class="form" />
														<input type="hidden" name="lng" id="lng" class="form" />
														<div id="map" style="width:580px; height:300px;"></div>
													</td>
													
													</tr>
													<tr>
														<td> 
															<input type="submit" value="Add" class="button" />
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