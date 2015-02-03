<?php
include_once("function.php");
$cityname=htmlentities($_POST['cityname'],ENT_QUOTES);
mysql_query("insert into `city` set `cityname`='$cityname'")or die(mysql_error());
header("location:addcity.php");
?>