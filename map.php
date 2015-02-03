<html>
<head>
      <style type="text/css">
#map { width: 96.5%;  height: 100%;min-height: 600px; border: 0px; padding: 0px;position: absolute; }
 </style>
 <script src="https://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
 <script type="text/javascript">
 var icon = new google.maps.MarkerImage("red.png",
 new google.maps.Size(32, 32), new google.maps.Point(0, 0),
 new google.maps.Point(16, 32));
 var center = null;
 var map = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 function addMarker(lat, lng, info) {
	  var pt = new google.maps.LatLng(lat, lng);
	  bounds.extend(pt);
	  var marker = new google.maps.Marker({
	  position: pt,
	  icon: icon,
	  map: map,
	  draggable: false,
          animation: google.maps.Animation.DROP
	  });
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
  $query = mysql_query($sql);
 $n=mysql_numrows($query);
 while($res_map=mysql_fetch_array($query))
{
$lat1=$res_map['latitude'];
$lon1=$res_map['longitude'];
$desc1=$res_map['detail'];
$name1=$res_map['name'];
echo ("addMarker($lat1, $lon1,'$name1<br/>Detail..<br/>$desc1<br/><a href=$res_map[name] target=&#34;_blank&#34;> ;<img src=tick.png></a>');");
 }		  
 ?>

 center = bounds.getCenter();
 map.fitBounds(bounds);

 }
    </script>
</head>
<body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
 <div id="map"></div>
</body>
</html>