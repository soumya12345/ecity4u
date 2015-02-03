<?php
include_once("function.php");
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$subsubcategory=$_POST['subsubcategory'];
$subchcategory=make_safe($_POST['subchcategory']);
mysql_query("insert into `subchcategory` set `category`='$category',`subcategory`='$subcategory',`subsubcategory`='$subsubcategory',`subchcategory`='$subchcategory'")or die(mysql_error());
header("location:subchcategory.php");
?>