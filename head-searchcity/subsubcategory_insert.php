<?php
include_once("function.php");
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$subsubcategory=make_safe($_POST['subsubcategory']);
mysql_query("insert into `subsubcategory` set `category`='$category',`subcategory`='$subcategory',`subsubcategory`='$subsubcategory'")or die(mysql_error());
header("location:subsubcategory.php");
?>