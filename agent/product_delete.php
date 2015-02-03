<?php
include_once("../head-searchcity/function.php");
$id=$_GET['id'];
mysql_query("delete from `product` where `id`='$id'")or die(mysql_query());
header("location:product.php");
?>