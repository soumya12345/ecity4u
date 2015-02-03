<?php
include_once("function.php");
chk_login();
$id=$_GET['id'];
mysql_query("delete from `product` where `id`='$id'")or die(mysql_query());
header("location:product.php");
?>