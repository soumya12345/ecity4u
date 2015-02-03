<?php
include_once("function.php");
$category=$_POST['category'];
$subcategory=make_safe($_POST['subcategory']);
mysql_query("insert into `subcategory` set `catid`='$category',`subcategory`='$subcategory'")or die(mysql_error());
header("location:subcategory.php");
?>