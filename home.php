<?php
include_once('database.php');
if(isset($_GET['cat']))
{
    $cat=$_GET['cat'];
    $subcat=$_GET['subcat'];
    $subcatype=$_GET['subcatype'];
    $city=$_GET['city'];
    $_SESSION['city']=$city;
    $sql="select * from `product` where `category` like '%$cat,%' and `chcategory` like '%$subcat,%' and `chtype` like '%$subcatype,%' and `city`='$city'";
    $qwery=mysql_query("select `icon`  from `category` where `id`='$cat'")or die(mysql_error());
    $resicon=mysql_fetch_array($qwery);
    //echo $sql;
    
    $address=cityname($city).',+Odisha+,+India';
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
$output= json_decode($geocode);
$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;
//echo $lat.'-------'.$long;
}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

<title>..:Everything:..</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="style1.css" />
<link href='http://fonts.googleapis.com/css?family=Princess+Sofia' rel='stylesheet' type='text/css'>
 <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
 
 <link href="responsive.css" rel="stylesheet" />
<link href="style2.css" rel="stylesheet" type="text/css" />
<style>
    #header{ width:100%; height:100px; background-color: gray; text-align: center; font-family: fantasy; font-size: 80px;}
.map {  height: -moz-calc(100% - 120px);
    height: -webkit-calc(100% - 120px);
    height: calc(100% - 120px); border: 0px; margin-top: 120px; float:left;  padding: 0px;}
 </style>
 <script src="https://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
 <script type="text/javascript">
 var icon = new google.maps.MarkerImage("mapicon.png",
 new google.maps.Size(68, 68), new google.maps.Point(<?=$lat;?>,<?=$long;?>),
 new google.maps.Point(32, 16));
 var center = null;
 var map = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 var markers=new Array();
 function addMarker(lat, lng, info,slno,mapicon) {
    //console.log(lat+'----'+lng);
	  var pt = new google.maps.LatLng(lat, lng);
	  bounds.extend(pt);
	  var marker = new google.maps.Marker({
	  position: pt,
	  icon: mapicon,
	  map: map,
	  draggable: false,
	  animation: google.maps.Animation.DROP
	  });
	  if (typeof slno !== "undefined") {
	   marker.set("id",slno);
	  markers.push(marker);
	  }
	  
	  var popup = new google.maps.InfoWindow({
	  content: info,
	  maxWidth: 600
	  });
	  google.maps.event.addListener(marker, "click", function() {
	  if (currentPopup != null) {
	  currentPopup.close();
	  currentPopup = null;
	  }
	  popup.open(map, marker);
	  currentPopup = popup;
	  });
	  google.maps.event.addListener(popup, "closeclick", function() {
	  map.panTo(center);
	  currentPopup = null;
	  });
 }
 function initMap() {
 map = new google.maps.Map(document.getElementById("map"), {
 center: new google.maps.LatLng(<?=$lat;?>,<?=$long;?>),
 zoom: 4,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 zoomControl: true,
 zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL
    },
 mapTypeControl: false,
 mapTypeControlOptions: {
 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
 },
 navigationControl: true,
 navigationControlOptions: {
 style: google.maps.NavigationControlStyle.SMALL
 }
 });
 <?
  $query = mysql_query($sql)or die(mysql_query());
  if(mysql_num_rows($query)>0)
  {
 while($res_map=mysql_fetch_array($query))
{
$lat1=$res_map['lat'];
$lon1=$res_map['lng'];
$name1=$res_map['productname'];
$mapicon='head-searchcity/'.$resicon['icon'];
$prid=$res_map['id'];
$de='<div style="width:auto;height:auto;float:left;"><div style="width:100px;height:auto;float:left;font-weight:bold;">'.$name1.'<span style="float:left;margin-top:60px;font-weight:normal;"><a href=detail.php?id='.$prid.' target="_blank" style="color:blue;">More Detail..</a></span></div><div style="width:100px;height:auto;float:right;margin-right:10px;"><img src="head-searchcity/'.$res_map['image'].'" style="width:100%;"></div></div>';
echo ("addMarker($lat1, $lon1,'$de','','$mapicon');");
 }
  }
  else
  {
    echo ("addMarker($lat,$long);");
  }
 ?>
 
 center = bounds.getCenter();
 map.fitBounds(bounds);
 map.setZoom(14);
 }
    </script>
	<!--[if lt IE 8]>
   <style type="text/css">
   li a {display:inline-block;}
   li a {display:block;}
   </style>
   <![endif]-->
   
   <script type="text/javascript">
      function getmap(catid,subcat,subtype) {
        
	 var searchIDs = $("#menu input:checkbox:checked").map(function(){
            return $(this).val();
            }).get(); // <----
         
          console.log(searchIDs);
          
map = new google.maps.Map(document.getElementById("map"), {
//center: new google.maps.LatLng(20.2960587,85.8245398),
 zoom: 8,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 zoomControl: true,
 zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL
    },
 mapTypeControl: false,
 mapTypeControlOptions: {
 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
 },
 navigationControl: true,
 navigationControlOptions: {
 style: google.maps.NavigationControlStyle.SMALL
 }
 });

if (searchIDs.length==0) {
    addMarker(<?=$lat;?>,<?=$long;?>);
    center = bounds.getCenter();
 map.fitBounds(bounds);
  map.setZoom(14);
}
else
{
   for (var ind = 0; ind < searchIDs.length; ++ind) {
    var inform=searchIDs[ind].split(",");
$.ajax({url:"ajax_getlatlng.php?catid="+inform[0]+"&subid="+inform[1]+"&subtype="+inform[2],
       success:function(results)
       {
	var latlng=results.split("|");
	for (var index = 0; index < latlng.length; ++index) {
	 var lattlngg=latlng[index].split(",");
	 if (lattlngg[0]!='') {
	  addMarker(lattlngg[0], lattlngg[1],lattlngg[2],index,lattlngg[3]);
	 	 }
	}
     	
center = bounds.getCenter();
 map.fitBounds(bounds);
  map.setZoom(14);
       }
});
 
    }
}
 
 
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("placebar").innerHTML=xmlhttp.responseText;
    $("#content-2").mCustomScrollbar({
					horizontalScroll:true,
					callbacks:{
						onScroll:function(){ 
							$("."+this.attr("id")+"-pos").text(mcs.left);
							
						}
					}
				});
				
    }
  }
xmlhttp.open("GET","ajax_getplace.php?catid="+catid+"&subid="+subcat+"&subtype="+subtype,true);
xmlhttp.send();


}

function getmap1(val) {
map = new google.maps.Map(document.getElementById("map"), {
 //center: new google.maps.LatLng(20.2960587,85.8245398),
 zoom: 8,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 zoomControl: true,
 zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL
    },
 mapTypeControl: false,
 mapTypeControlOptions: {
 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
 },
 navigationControl: true,
 navigationControlOptions: {
 style: google.maps.NavigationControlStyle.SMALL
 }
 });

var inform=val.split(",");
//console.log(inform);
$.ajax({url:"ajax_getlatlng.php?catid="+inform[0]+"&subid="+inform[1]+"&subtype="+inform[2],
       success:function(results)
       {
	//console.log(results);
	var latlng=results.split("|");
	for (var index = 0; index < latlng.length; ++index) {
	 var lattlngg=latlng[index].split(",");
	 if (lattlngg[0]!='') {
	  addMarker(lattlngg[0], lattlngg[1],lattlngg[2],index,lattlngg[3]);
	 	 }
	}
     	
center = bounds.getCenter();
 map.fitBounds(bounds);
  map.setZoom(14);
       }
});


 
 
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("placebar").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_getplace.php?catid="+inform[0]+"&subid="+inform[1]+"&subtype="+inform[2],true);
xmlhttp.send();

}

function getmapindividual(idval,catid) {
    
    map = new google.maps.Map(document.getElementById("map"), {
 //center: new google.maps.LatLng(20.2960587,85.8245398),
 zoom: 8,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 zoomControl: true,
 zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL
    },
 mapTypeControl: false,
 mapTypeControlOptions: {
 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
 },
 navigationControl: true,
 navigationControlOptions: {
 style: google.maps.NavigationControlStyle.SMALL
 }
 });
    
 $.ajax({url:"ajax_getmapindividual.php?id="+idval+"&catid="+catid,
	success:function(results)
	{ 
	    
	 var lattlngg=results.split(",");
	 addMarker(lattlngg[0],lattlngg[1],lattlngg[2],'',lattlngg[3]);
	 
center = bounds.getCenter();
 map.fitBounds(bounds);
 map.setZoom(14);
	}
  
 });
}
$(function(){
 $('.lasti').mouseover(function(){
  var idval=$(this).attr('lastid');
  if (typeof markers[idval] !== "undefined" ) {
  markers[idval].setIcon("red.png");
  }
  });
 
 $('.lasti').mouseout(function(){
  var idval=$(this).attr('lastid');
  var mapic=$(this).attr('mapicon');
   if (typeof markers[idval] !== "undefined" ) {
  markers[idval].setIcon(mapic);
   }
  });
 });

 function travelroot(){
  $('#travelbox').slideDown("slow");
 }
 
 
//calculate root
 $(document).ready(function() {
        // If the browser supports the Geolocation API
        if (typeof navigator.geolocation == "undefined") {
          $("#error").text("Your browser doesn't support the Geolocation API");
          return;
        }

        $("#calculateroute").click(function(event) {
          event.preventDefault();
	 
	  var fromad=$("#from").val();
	  var toad=$("#to").val();
	  
	  $.ajax({url:"ajax_gettiming.php?from="+fromad+"&to="+toad,
		 success:function(results)
		 {
		    $('#timing').html(results);
		 }
	  });
        });

});
 
function slidedetail(idval){
    $('#detail'+idval).slideToggle();
   
}
//calculate root

function hidetopbar(){
    if($(".fixed-bar").css('display') === 'none'){
        $('#map').css({height:'calc(100% - 120px)',height:'-webkit-calc(100% - 120px)',height:'-moz-calc(100% - 120px)',marginTop:'120px'});
	$(".twitter1").animate({
                    top:'162px'
                    },1000);
    }
    else{
      $('#map').css({height:'100%',marginTop:'0px'});
       $(".twitter1").animate({
                    top:'0px'
                    },1000);
    }
    $('.fixed-bar').slideToggle();

    
    
}
   </script>
   
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
	
		
		<style>
		  .content p:nth-child(even){color:#999; font-family:Georgia,serif; font-size:17px; font-style:italic;}
		.content p:nth-child(3n+0){color:#c96;}
		.content .content{width:100%; margin:0px; background:#252525; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; box-sizing:border-box;}
		.content .content .content{background:#191919;}
		#content-2{overflow:hidden; height:auto; padding:0px;}
		#content-2 p{float:left; width:300px; min-width:100px; margin-right:0px; background:rgba(0,0,0,0.3); padding:0px; -webkit-border-radius:3px; -moz-border-radius:3px; border-radius:3px;}
		#content-2 p:last-child{width:auto; margin-right:0;}
		</style>
		<link href="jquery.mCustomScrollbar.css" rel="stylesheet" />
		
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="jquery.multilevelpushmenu.css">
        <link rel="stylesheet" href="responsive1.css">
	<style>
	  .mobileleftbox {
    width: 100%;
    height: auto;
    float: left;
    padding: 1%;
    background: linear-gradient(rgb(222, 135, 29), rgb(240, 175, 79)) repeat scroll 0% 0% transparent;
    position: absolute;
    top: 140px;
    z-index: 999;
}
.fixed-bar .lasti ul li{
width:auto;
max-width:130px;
}
	</style>	
	
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
alert('<?=$_GET['msg'] ?>');
<?php
}
else{}
?>
	  </script>
	
	
	
</head>
<body onLoad="initMap()" style="width:100%; height: 100%;">

<?php
if(!isset($_SESSION['user_name']))
{
   ?>
<div id="login_box" class="register2" style="cursor: pointer;">
		Login
</div>

<div id="signin_box" class="register2" style="margin-top: 70px;cursor: pointer;">
		Signin
</div>
<?php
}
if(isset($_SESSION['user_name']))
{
   ?>
<div id="hover-menu" style="position:absolute; z-index:9999; right:0px; height:35px;">
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

     <div id="menu" style="position: absolute; z-index:9;">
            <nav>
                <h2><i class="fa fa-reorder"></i>All Categories</h2>
                <ul>
                     <li>
                        <a href="#" onClick="return travelroot();" style="width: 100%;height: 100%;">Travel</a>
                    </li>
		<?php
		$qallcat=mysql_query("select * from `category`")or die(mysql_error());
		while($rallcat=mysql_fetch_array($qallcat))
		{
			$qsub=mysql_query("select * from `subcategory` where `catid`='$rallcat[id]'")or die(mysql_error());
			?>
                    <li>
                        <a href="#"><img src="head-searchcity/<?php echo $rallcat['icon'];?>" style="width: 27px;height: auto; float: right;" /><?php echo $rallcat['category'];?></a>
                        <h2><img src="head-searchcity/<?php echo $rallcat['icon'];?>" style="width: 35px;height: auto; float: right;" /><?php echo $rallcat['category'];?></h2>
                        <ul>
			<?php
			while($rsub=mysql_fetch_array($qsub))
			{
				$qsubsub=mysql_query("select * from `subsubcategory` where `category`='$rallcat[id]' and `subcategory`='$rsub[id]'")or die(mysql_error());
                                $numrowsub=mysql_num_rows($qsubsub);
			?>
                            <li>
                                <a href="#" <?php if($numrowsub==0) {?>onclick="if($(this).next('input').is(':checked')){$(this).next('input').attr('checked',false);$(this).css('color','#fff');}else{$(this).next('input').attr('checked',true);$(this).css('color','rgb(235, 181, 45)');}return getmap(<?php echo $rallcat['id'];?>,<?php echo $rsub['id'];?>,'subcategory');"<?php } if($rallcat['id']==$cat && $rsub['id']==$subcat && $subcatype=='subcategory') { echo 'style="color:rgb(235, 181, 45)"'; }?>>
                                 <?php if($numrowsub==0) {?>
                                <input type="button" value="<?php $total=gettotalproduct($rallcat['id'],$rsub['id'],'subcategory',$city); echo $total;?>" style="width: 28px;border-radius:15px;background:rgb(235, 181, 45);color: #fff; height: 28px; float: right;border: none;" />
                                <?php
                                }
                                ?>
                                <?php echo $rsub['subcategory'];?>
                                </a>
                               
                                <input type="checkbox" <?php if($rallcat['id']==$cat && $rsub['id']==$subcat && $subcatype=='subcategory') echo 'checked';?> value="<?php echo $rallcat['id'];?>,<?php echo $rsub['id'];?>,subcategory" style="display: none;"/>
                                <?php
				if($numrowsub>0)
				{
				?>
				<h2><?php echo $rsub['subcategory'];?></h2>
                                <ul>
				<?php
				while($rsubsub=mysql_fetch_array($qsubsub))
				{
					$qsubch=mysql_query("select * from `subchcategory` where `category`='$rallcat[id]' and `subcategory`='$rsub[id]' and `subsubcategory`='$rsubsub[id]'")or die(mysql_error());
					$numrowsubch=mysql_num_rows($qsubch);
				?>
                                    <li>
                                        <a href="#" <?php if($numrowsubch==0) {?>onclick="if($(this).next('input').is(':checked')){$(this).next('input').attr('checked',false);$(this).css('color','#fff');}else{$(this).next('input').attr('checked',true);$(this).css('color','rgb(235, 181, 45)');}return getmap(<?php echo $rallcat['id'];?>,<?php echo $rsubsub['id'];?>,'subsubcategory');"<?php } if($rallcat['id']==$cat && $rsubsub['id']==$subcat && $subcatype=='subsubcategory') { echo 'style="color:rgb(235, 181, 45)"';}?>>
                                        <?php if($numrowsubch==0) {?>
                                        <input type="button" value="<?php $totals=gettotalproduct($rallcat['id'],$rsubsub['id'],'subsubcategory',$city); echo $totals;?>" style="width: 28px;border-radius:15px;background:rgb(235, 181, 45);color: #fff; height: 28px; float: right;border: none;" />
                                        <?php
                                        }
                                        ?>
                                        <?php echo $rsubsub['subsubcategory'];?>
                                        </a>
                                        
                                        <input type="checkbox" <?php if($rallcat['id']==$cat && $rsubsub['id']==$subcat && $subcatype=='subsubcategory') echo 'checked';?> value="<?php echo $rallcat['id'];?>,<?php echo $rsubsub['id'];?>,subsubcategory" style="display: none;"/>
                                        
					<?php
					if($numrowsubch>0)
					{
					?>
					<h2><?php echo $rsubch['subchcategory'];?></h2>
					<ul>
					<?php
					 while($rsubch=mysql_fetch_array($qsubch))
					{
					?>
					<li>
                                                <a href="#" onClick="if($(this).next('input').is(':checked')){$(this).next('input').attr('checked',false); $(this).css('color','#fff');}else{$(this).next('input').attr('checked',true);$(this).css('color','rgb(235, 181, 45)');}return getmap(<?php echo $rallcat['id'];?>,<?php echo $rsubch['id'];?>,'subchcategory');" <?php if($rallcat['id']==$cat && $rsubch['id']==$subcat && $subcatype=='subchcategory') { echo 'style="color:rgb(235, 181, 45)"';} ?>>
                                                 <input type="button" value="<?php $totalc=gettotalproduct($rallcat['id'],$rsubch['id'],'subchcategory',$city); echo $totalc;?>" style="width: 28px;border-radius:15px;background:rgb(235, 181, 45);color: #fff; height: 28px; float: right;border: none;" />
                                                <?php echo $rsubch['subchcategory'];?>
                                                </a>
                                                 <input type="checkbox" <?php if($rallcat['id']==$cat && $rsubch['id']==$subcat && $subcatype=='subchcategory') echo 'checked';?> value="<?php echo $rallcat['id'];?>,<?php echo $rsubch['id'];?>,subchcategory" style="display: none;"/>
                                        </li>
					<?php
					}
					?>
					</ul>
					<?php
					}
					?>
                                    </li>
                                <?php
				}
				?>
                                </ul>
				<?php
				}
				?>
                            </li>
                            <?php
			    }
			    ?>
                        </ul>
                    </li>
		    <?php
		}
		?>
                </ul>
            </nav>
        </div>
   <script src="jquery.multilevelpushmenu.min.js"></script>
        <script type="text/javascript" src="responsive.js"></script>

        <!-- Google Analytics -->
        <script type="text/javascript">

          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-45795667-3']);
          _gaq.push(['_setDomainName', 'make.rs']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
	 
	<div class="container demo-3">
            <div class="main">
				<div  class="fixed-bar" style="width:100%; background: #efefef; border: none;float: left;z-index:3; position: absolute; top: 0px; margin:0px; border-bottom:2px solid #000;" id="placebar">
					<!-- Elastislide Carousel -->
					<ul id="content-2" class="content" >
					 <?php
					 $query1=mysql_query($sql);
					 $i=0;
					   while($res_map1=mysql_fetch_array($query1))
					   {
					    $mapicon='head-searchcity/'.$resicon['icon'];
					       ?>
						<li class="lasti" style="float: left;padding: 10px;list-style-type:none; max-width:130px; text-align: center;" lastid="<?php echo $i;?>" mapicon="<?php echo $mapicon;?>"><a href="#" onClick="return getmapindividual(<?php echo $res_map1['id'];?>,<?php echo $cat;?>);"><img src="head-searchcity/<?php echo $res_map1['image'];?>" alt="image01"  width="70" height="70" style="border-radius:8px; border:2px solid #fff;-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black; outline:none;"/><br/><span style="max-width:130px;"><?php echo $res_map1['productname'];?></span></a></li>
					   <?php
					   $i++;
					   }
					   ?>
					</ul>
					<!-- End Elastislide Carousel -->
				</div>

				
	    </div>
	</div>
        
        <!-- custom scrollbars plugin -->
	<script src="jquery.mCustomScrollbar.concat.min.js"></script>
	<script>
		(function($){
			$(window).load(function(){
				$("#content-2").mCustomScrollbar({
					horizontalScroll:true,
					callbacks:{
						onScroll:function(){ 
							$("."+this.attr("id")+"-pos").text(mcs.left);
						}
					}
				});
				/*demo fn*/
				
				$(".output a[rel~='_mCS_2_scrollTo']").click(function(e){
					e.preventDefault();
					$("#content-1").mCustomScrollbar("scrollTo","#content-2");
					$("#content-2").mCustomScrollbar("scrollTo",$(this).attr("href"));
				});
			});
		})(jQuery);
	</script>
	<div class="mobileleftbox">
			    <table style="width:100%;">
				<tr>
				    <td>Location</td>
				    <td>
					
					<select style="padding:5px; border:1px solid #dedede;width:70%;" onChange="getmap1(this.value);">
					    <option value="">--choose--</option>
					    	 <?php
						$qwery=mysql_query("select * from `category`")or die(mysql_error());
						while($res=mysql_fetch_array($qwery))
						{
						    $qsub=mysql_query("select * from `subcategory` where `catid`='$res[id]'")or die(mysql_error());
						    while($rsub=mysql_fetch_array($qsub))
						    {
							$qsubsub=mysql_query("select * from `subsubcategory` where `category`='$res[id]' and `subcategory`='$rsub[id]'")or die(mysql_error());

							if(mysql_num_rows($qsubsub)==0)
							{
						?>
 <option value="<?php echo $res['id'];?>,<?php echo $rsub['id'];?>,subcategory" <?php if($res['id']==$cat && $rsub['id']==$subcat && $subcatype=='subcategory') echo "selected";?>><?php echo $rsub['subcategory'];?></option>
						<?php
							}else
							{
							while($rsubsub=mysql_fetch_array($qsubsub))
							{
							$qsubch=mysql_query("select * from `subchcategory` where `category`='$res[id]' and `subcategory`='$rsub[id]' and `subsubcategory`='$rsubsub[id]'")or die(mysql_error());

if(mysql_num_rows($qsubch)==0)
							 {
							?>
 <option value="<?php echo $res['id'];?>,<?php echo $rsubsub['id'];?>,subsubcategory" <?php if($res['id']==$cat && $rsubsub['id']==$subcat && $subcatype=='subsubcategory') echo "selected";?>><?php echo $rsubsub['subsubcategory'];?></option>
							<?php
							     }
							    else
							    {
								while($rsubch=mysql_fetch_array($qsubch))
								{
		
                ?>
								<option value="<?php echo $res['id'];?>,<?php echo $rsubch['id'];?>,subchcategory" <?php if($res['id']==$cat && $rsubch['id']==$subcat && $subcatype=='subchcategory') echo "selected";?>><?php echo $rsubsub['subchcategory'];?></option>
																		<?php
                
                }
																	  }
																       }
																 }
															      }
															   }
															   ?>
					    					</select>
				    </td>
				</tr>
			    </table>
	</div>
	<div class="show1" style="background:none;">
	<a href="#" class="button1 twitter1" style="position: absolute; right:20px; z-index:99999; top:162px; background:none; border:none; box-shadow:none;" onClick="return hidetopbar();"><img src="img/show.png" /></a>
	</div>
	

			<div class="rightbox" style="width:100%; height:100%; position: absolute; z-index:2; top:0px; left:0px; ">
			     <div id="map" class="map"></div>
			</div>
			
	 </div>	
			<div style="width: 40%;height: auto;left:30%; ; position: absolute;z-index:6;top: 150px;background: #fff;border-radius:5px;display: none;word-break: break-all;" id="travelbox">
			 <span style="width: 20px;height: 20px;float: right;color: #fff;cursor: pointer;" onClick="$('#travelbox').slideUp('slow');">
			  X
			 </span>
			 <h1>Travel Route</h1>
			    <table style="width:80%; padding: 1%; margin: auto; height: 150px;">
				<tr>
				    <td>From</td>
				    <td>
					<select id="from" name="from" class="textbox">
				    <option>--choose--</option>
				    <?php
				    $qwstop=mysql_query("select * from `busstoppage`")or die(mysql_error());
				    while($rwstop=mysql_fetch_array($qwstop))
				    {
				    ?>
				    <option value="<?php echo $rwstop['id'];?>"><?php echo $rwstop['stoppagename'];?></option>
				    <?php
				    }
				    ?>
					</select>
					</td>
				</tr>
				<tr>
				    <td>To</td>
				    <td>
					<select id="to" name="to" class="textbox">
				    <option>--choose--</option>
				    <?php
				    $qwstop=mysql_query("select * from `busstoppage`")or die(mysql_error());
				    while($rwstop=mysql_fetch_array($qwstop))
				    {
				    ?>
				    <option value="<?php echo $rwstop['id'];?>"><?php echo $rwstop['stoppagename'];?></option>
				    <?php
				    }
				    ?>
					</select>
					</td>
				</tr>
				<tr>
				    <td>&nbsp;</td>
				    <td><input type="button" id="calculateroute" value="View" class="submit" style="border:none;"/></td>
				    
				</tr>
			    </table>
			    
			<div style="width: 100%;height: 300px;float: left;margin-top: 1%;overflow: auto;">
			    <table style="width: 98%;padding: 1%;">
				<tr>
				    <th>Busname</th>
				    <th>Stoppage</th>
				    <th>Arrival Time</th>
				</tr>
				<tbody id="timing"></tbody>
			    </table>
			</div>
			
			
</body>
</html>
