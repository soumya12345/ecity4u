<?php
include_once("function.php");
$category=make_safe($_POST['category']);

$primage =$_FILES['img']['name'];
$ext1=end(explode(".", $primage)); 
 if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
		    { 
                        $folder="uploads/"; 
                        $prdouctimage = $folder.time().$primage; 
                        $im=$_FILES['img']['tmp_name']; 
                        $copied = copy($im, $prdouctimage); 
                     }
                     
mysql_query("insert into `category` set `category`='$category',`icon`='$prdouctimage'")or die(mysql_error());
header("location:category.php");
?>