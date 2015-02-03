<?php
include_once('database.php');
if(isset($_GET['cat']))
{
    $cat=$_GET['cat'];
    $sql="select * from `destination` where `subcategory`='$cat'";
    $qwery=mysql_query("select `icon`  from `category` where `id`='$cat'")or die(mysql_error());
    $resicon=mysql_fetch_array($qwery);
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
  <link rel="stylesheet" href="styles.css">
 <link href="responsive.css" rel="stylesheet" />
<script src="menu1.js" type="text/javascript">
$.noConflict();
jQuery(document).ready(function($) {
});
</script>
<style>
    #map_canvas {width: 500px;height: 400px;}
    #header{ width:100%; height:100px; background-color: gray; text-align: center; font-family: fantasy; font-size: 80px;}
#map { width: 100%;  height: 100%; border: 0px; padding: 0px;}
 </style>
 <script src="https://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
 <script type="text/javascript">
 var icon = new google.maps.MarkerImage("mapicon.png",
 new google.maps.Size(68, 68), new google.maps.Point(0, 0),
 new google.maps.Point(32, 16));
 var center = null;
 var map = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 var markers=new Array();
 function addMarker(lat, lng, info,slno,mapicon) {
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
 center: new google.maps.LatLng(0, 0),
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
 while($res_map=mysql_fetch_array($query))
{
$lat1=$res_map['latitude'];
$lon1=$res_map['longitude'];
$desc1=$res_map['detail'];
$name1=$res_map['name'];
$mapicon='../admin/'.$resicon['icon'];
echo ("addMarker($lat1, $lon1,'$name1<br/>$desc1<br/><a href=detail.php target=&#34;_blank&#34;>More Detail..</a>','','$mapicon');");
 }		  
 ?>
 center = bounds.getCenter();
 map.fitBounds(bounds);

 }
    </script>
	<!--[if lt IE 8]>
   <style type="text/css">
   li a {display:inline-block;}
   li a {display:block;}
   </style>
   <![endif]-->
   
   <script type="text/javascript">
      function getmap(catid,mobileview) {
	
	//event.preventDefault();
   

map = new google.maps.Map(document.getElementById("map"), {
 center: new google.maps.LatLng(0, 0),
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

 if (mobileview=='mobileview') {
   $.ajax({url:"ajax_getlatlng.php?catid="+catid,
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
 
       }
});
 }
 else
 {

  var searchIDs = $("#cssmenu input:checkbox:checked").map(function(){
      return $(this).val();
    }).get(); // <----
  
    for (var ind = 0; ind < searchIDs.length; ++ind) {
$.ajax({url:"ajax_getlatlng.php?catid="+searchIDs[ind],
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
    }
  }
xmlhttp.open("GET","ajax_getplace.php?catid="+catid,true);
xmlhttp.send();

}

function getmapindividual(idval,catid) {
    
    map = new google.maps.Map(document.getElementById("map"), {
 center: new google.maps.LatLng(0, 0),
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
    
 $.ajax({url:"ajax_getmapindividual.php?id="+idval+"&catid="+catid,
	success:function(results)
	{ 
	    
	 var lattlngg=results.split(",");
	 addMarker(lattlngg[0],lattlngg[1],lattlngg[2],'',lattlngg[3]);
	 
center = bounds.getCenter();
 map.fitBounds(bounds);
	}
  
 });
}
$(function(){
 $('.lasti').mouseover(function(){
  var idval=$(this).attr('lastid');
  markers[idval].setIcon("red.png");
  });
 
 $('.lasti').mouseout(function(){
  var idval=$(this).attr('lastid');
  var mapic=$(this).attr('mapicon');
  markers[idval].setIcon(mapic);
  });
 });

 function hiderightbar() {
   var leftpostion=$('.leftbox').css('left');
   if (leftpostion=='0px') {
	$(".leftbox").animate({
	left:'-200px'
	},1000);
	
	$(".container").animate({
	left:'0px'
	},1000);
	
	$(".twitter").animate({
	left:'0px'
	},1000);
	
	$('.twitter').html('>');
   }else
   {
    $(".leftbox").animate({
	left:'0px'
	},1000);
    $(".container").animate({
	left:'200px'
	},1000);
    $(".twitter").animate({
	left:'200px'
	},1000);
    
    $('.twitter').html('<');
   }
 }
 
 function travelroot(){
  $('#travelbox').slideDown("slow");
 }
 
 
//calculate root
 function calculateRoute(from, to) {
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status)
          {
            if (status == google.maps.DirectionsStatus.OK)
            {
              new google.maps.DirectionsRenderer({
                map: map,
                directions: response
              });
            }
            else
              $("#error").append("Unable to retrieve your route<br />");
          }
        );
      }
 
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
 /*function busroute(busname,busid){
    $('#travelbox').slideUp("slow");
	    
	   $.ajax({url:"ajax_getcheckpoint.php?busname="+busname+"&busid="+busid,
		  success:function(results)
		 {
		  var chpnt=results.split("|");
		  for (var index1 = 0; index1 < chpnt.length; ++index1) {
		    if (typeof chpnt[index1] !== "undefined") {
			var nextch=parseInt(index1)+1;
			if (chpnt[index1]!='' && chpnt[nextch]!='') {
			calculateRoute(chpnt[index1],chpnt[nextch]);
			}
		   }
		     
		  }
		 }
	  });
 }*/
//calculate root
   </script>
   
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<script src="js/modernizr.custom.17475.js"></script>
		
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
		
</head>
<body onLoad="initMap()" style="width:100%; height: 100%;">
    
  
	<div  class="container demo-3" style="width:100%; margin:0px;">
		

            <div class="main" style="float: left;width:100%; margin:0px;">
				<div  class="fixed-bar" style="width:100%;background: #efefef; border: none;float: left;z-index:3; position: absolute; top: 0px; margin:0px;" id="placebar">
					<!-- Elastislide Carousel -->
					<ul id="content-2" class="content" style="background: #efefef; border: none;">
					 <?php
					 $query1=mysql_query($sql);
					 $i=0;
					   while($res_map1=mysql_fetch_array($query1))
					   {
					       ?>
						<li class="lasti" style="float: left;padding: 10px;" lastid="<?php echo $i;?>" mapicon="<?php echo $mapicon;?>"><a href="#" onClick="return getmapindividual(<?php echo $res_map1['slno'];?>,<?php echo $cat;?>);"><img src="../admin/<?php echo $res_map1['image'];?>" alt="image01"  width="100" height="100" style="border-radius:8px; border:2px solid #fff;-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black; outline:none;"/><br/><?php echo $res_map1['name'];?></a></li>
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
	<div class="show1">
	<a href="#" class="button1 twitter1" style="position: absolute; right:20px; z-index:99999; top:50px;" onClick="$('.fixed-bar').slideToggle();">Show/Hide Topbar</a>
	</div>
	
    
			<div class="leftbox" style="">
				<div id='cssmenu' style="height: 100%;">
				   <ul style="height: 100%;">
				      <li style="display: none;"><a href='index.php'><span>Home</span></a></li>
				      <?php
					   $fet=mysql_query("select * from `category` where `did`='0'") or die(mysql_error());
					   while($res=mysql_fetch_array($fet))
					   { $id=$res['id'];
				    ?>
				      <li class='active has-sub'><a href='#'><span><?php echo $res['category'];?></span></a>
					 <ul>
					  <li onClick="return travelroot();" style="background: #333; text-align: center; text-transform:uppercase; height:auto; font-size:16px; color: #fff !important; text-shadow:none;"><a href="#">
					  <span style="color: #fff !important;">Travel</span></a></li>
					   <?php
						   $fet1=mysql_query("select * from `category` where `did`='$id'");
						   
						   while($res1=mysql_fetch_array($fet1))
						   {   $sid=$res1['id'];
					   ?>
					    <li onClick="if($(this).find('input').is(':checked')){$(this).find('input').attr('checked',false);}else{$(this).find('input').attr('checked',true);}return getmap(<?php echo $sid;?>);"><a href="#">
					    <input type="checkbox" name="category" <?php if($sid==$cat) echo 'checked';?> value="<?php echo $sid;?>" style="float: left;"/>
					    <img src="../admin/<?php echo $res1['icon'];?>" style="width: 35px;height: auto; float: left; margin-top:-9px;"/>&nbsp;&nbsp;<span><?php echo $res1['category'];?></span></a>
					       <ul>
						   <?php
						   $i=0;
							   $fet2=mysql_query("select * from `destination` where `subcategory`='$sid'");
							   if(mysql_num_rows($fet2)==0)
							  {
							   while($res2=mysql_fetch_array($fet2))
							   { $slno=$res2['slno'];
						   ?>
						   
						  <li class='last'><a href='#'><span><?php echo $res2['name'];?></span></a></li>
						  <?php $i++;}
						   }?>
					       </ul>
					    </li><?php }
					   ?>
					 </ul>
				      </li><?php }?>
				   </ul>
				</div>
			</div>
			
			<div class="mobileleftbox">
			    <table style="width:100%;">
				<tr>
				    <td>Location</td>
				    <td>
					
					<select style="padding:5px; border:1px solid #dedede;width:70%;" onChange="getmap(this.value,'mobileview');">
					    <option value="">--choose--</option>
					    <?php
					   $fet=mysql_query("select * from `category` where `did`='0'") or die(mysql_error());
					   while($res=mysql_fetch_array($fet))
					   { $id=$res['id'];
					   
					   $fet1=mysql_query("select * from `category` where `did`='$id'");
						   
						   while($res1=mysql_fetch_array($fet1))
						   {   $sid=$res1['id'];
					    ?>
					    <option value="<?php echo $sid;?>"><?php echo $res1['category'];?></option>
					    <?php
						   }
					   }
					   ?>
					</select>
				    </td>
				</tr>
			    </table>
			</div>
			<div class="show">
			<a href="#" class="button twitter" style="position: absolute;  float: left;z-index:99999; left:200px; bottom:50%;" onClick="return hiderightbar();"><</a>
			</div>
			<div class="rightbox" style="width:100%; height:100%; position: absolute; z-index:2; top:0px; left:0px; ">
			     <div id="map"></div>
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
			
			</div>
</body>
</html>
