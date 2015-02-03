<?php
include_once("function.php");
$category=$_POST['category'];
$subcategory=make_safe($_POST['subcategory']);
$idval=$_POST['idval'];
mysql_query("update `subcategory` set `catid`='$category',`subcategory`='$subcategory' where `id`='$idval'")or die(mysql_error());
header("location:subcategory.php");
?>