<?php
include_once('database.php');
$cat=$_GET['catid'];
$subid=$_GET['subid'];
$subtype=$_GET['subtype'];
$sql="select * from `product` where `category` like '%$cat,%' and `chcategory` like '%$subid,%' and `chtype` like '%$subtype,%' and `city`='".$_SESSION['city']."'";
$query = mysql_query($sql);
$variable='';
$qwery=mysql_query("select `icon`  from `category` where `id`='$cat'")or die(mysql_error());
$resicon=mysql_fetch_array($qwery);
$mapicon='head-searchcity/'.$resicon['icon'];
while($res_map=mysql_fetch_array($query))
{
$lat1=$res_map['lat'];
$lon1=$res_map['lng'];
$idval=$res_map['id'];
$desc='<div style="width:auto;height:auto;float:left;"><div style="width:100px;height:auto;float:left;font-weight:bold;">'.$res_map['productname'].'<span style="float:left;margin-top:60px;font-weight:normal;"><a href=detail.php?id='.$idval.' target="_blank" style="color:blue;">More Detail..</a></span></div><div style="width:100px;height:auto;float:right;margin-right:10px;"><img src="head-searchcity/'.$res_map['image'].'" style="width:100%;"></div></div>';
$variable.=$lat1.','.$lon1.','.$desc.','.$mapicon.'|';
 }
 echo $variable;
?>