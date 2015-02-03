<?php
include_once("function.php");
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$subsubcategory=$_POST['subsubcategory'];
$subchcategory=make_safe($_POST['subchcategory']);
$idval=$_POST['idval'];
mysql_query("update `subchcategory` set `category`='$category',`subcategory`='$subcategory',`subsubcategory`='$subsubcategory',`subchcategory`='$subchcategory' where `id`='$idval'")or die(mysql_error());
header("location:subchcategory.php");
?>