<?php
include_once("function.php");
$idval=$_POST['idval'];
$cityname=htmlentities($_POST['cityname'],ENT_QUOTES);
mysql_query("update `city` set `cityname`='$cityname' where `id`='$idval'")or die(mysql_error());
header("location:addcity.php");
?>