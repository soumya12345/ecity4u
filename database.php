<?php
session_start();
$host='localhost';
$user='root';
$pass='';
$db='ecity4u_ecity';
$sql=mysql_connect($host,$user,$pass) or die('database not connected'.mysql_error());
mysql_select_db($db,$sql) or die('database not selected'.mysql_error());

function gettotalproduct($catid,$subcat,$subtype,$city)
{
    $qwery=mysql_query("select * from `product` where `category` like '%$catid,%' and `chcategory` like '%$subcat,%' and `chtype` like '%$subtype,%' and `city`='$city'")or die(mysql_error());
    return mysql_num_rows($qwery);
}
function cityname($cityid)
{
    $qwery=mysql_query("select `cityname` from `city` where `id`='$cityid'")or die(mysql_error());
    $res=mysql_fetch_array($qwery);
    return $res['cityname'];
}
?>
