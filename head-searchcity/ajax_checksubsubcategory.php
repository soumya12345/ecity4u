<?php
include_once("function.php");
$id=$_GET['id'];
$category=mysql_query("SELECT *FROM `subchcategory` where `subsubcategory`='$id' ")or die(mysql_error());
$res=mysql_num_rows($category);
if($res>0){   
     echo 1; 
}
else{
    echo 0;
}
?>