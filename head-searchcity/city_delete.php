<?php
include_once("function.php");
$idval=$_GET['id'];
mysql_query("delete from `city` where `id`='$idval'")or die(mysql_error());
header("location:addcity.php");
?>