<?php
include_once("function.php");
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$subsubcategory=make_safe($_POST['subsubcategory']);
$idval=$_POST['idval'];
mysql_query("update `subsubcategory` set `category`='$category',`subcategory`='$subcategory',`subsubcategory`='$subsubcategory' where `id`='$idval'")or die(mysql_error());
header("location:subsubcategory.php");
?>