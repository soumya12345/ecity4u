<?php
include_once('database.php');
$id=$_GET['id'];
$catid=$_GET['catid'];
$qwery=mysql_query("select `icon`  from `category` where `id`='$catid'")or die(mysql_error());
$resicon=mysql_fetch_array($qwery);
$mapicon='head-searchcity/'.$resicon['icon'];

$sql="select * from `product` where `id`='$id'";
$query = mysql_query($sql);
$res_map=mysql_fetch_array($query);

$lat1=$res_map['lat'];
$lon1=$res_map['lng'];
$idval=$res_map['id'];
$desc='<div style="width:auto;height:auto;float:left;"><div style="width:100px;height:auto;float:left;font-weight:bold;">'.$res_map['productname'].'<span style="float:left;margin-top:60px;font-weight:normal;"><a href=detail.php?id='.$idval.' target="_blank" style="color:blue;">More Detail..</a></span></div><div style="width:100px;height:auto;float:right;margin-right:10px;"><img src="head-searchcity/'.$res_map['image'].'" style="width:100%;"></div></div>';
$variable=$lat1.','.$lon1.','.$desc.','.$mapicon;
 echo $variable;
?>