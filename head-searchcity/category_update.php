<?php
include_once("function.php");
$category=make_safe($_POST['category']);
$idval=$_POST['idval'];

$primage =$_FILES['img']['name'];
$ext1=end(explode(".", $primage)); 
 if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
		    { 
                        $folder="uploads/"; 
                        $prdouctimage = $folder.time().$primage; 
                        $im=$_FILES['img']['tmp_name']; 
                        $copied = copy($im, $prdouctimage); 
                     }
                     
if($primage!='')
{
mysql_query("update `category` set `category`='$category',`icon`='$prdouctimage' where `id`='$idval'")or die(mysql_error());
}else{
    mysql_query("update `category` set `category`='$category' where `id`='$idval'")or die(mysql_error());
}
header("location:category.php");
?>