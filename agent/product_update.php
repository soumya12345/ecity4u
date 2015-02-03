<?php
include_once("../head-searchcity/function.php");
$city=make_safe($_POST['city']);
$product=make_safe($_POST['product']);
$contact=make_safe($_POST['contact']);
$email=make_safe($_POST['email']);
//echo $_POST['description'];
$description=htmlentities($_POST['description'],ENT_QUOTES);

//echo $description;
$category='';
$chcat='';
$chtype='';
$alltotal='';
foreach($_POST['subcat'] as $key=>$value)
{
    $alltotal.=$value.',';
    $subcat=explode("|",$value);
    $category.=$subcat[0].',';
    $chcat.=$subcat[1].',';
    $chtype.=$subcat[2].',';
}

//echo $category.'----'.$chcat;
$primage =$_FILES['img']['name'];
$ext1=end(explode(".", $primage)); 
 if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
		    { 
                        $folder="../head-searchcity/uploads/"; 
                        $prdouctimage = $folder.time().$primage; 
                        $im=$_FILES['img']['tmp_name']; 
                        $copied = copy($im, $prdouctimage); 
                     }
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$idval=$_POST['idval'];
if($primage!='')
{
    mysql_query("update `product` set `productname`='$product',`city`='$city',`contact`='$contact',`email`='$email',`image`='$prdouctimage',`description`='$description',`category`='$category',`chcategory`='$chcat',`chtype`='$chtype',`totalcombination`='$alltotal',`lat`='$lat',`lng`='$lng',`insertby`='".$_SESSION['agent_slno']."' where `id`='$idval'")or die(mysql_error());
}else{
     mysql_query("update `product` set `productname`='$product',`city`='$city',`contact`='$contact',`email`='$email',`description`='$description',`category`='$category',`chcategory`='$chcat',`chtype`='$chtype',`totalcombination`='$alltotal',`lat`='$lat',`lng`='$lng',`insertby`='".$_SESSION['agent_slno']."' where `id`='$idval'")or die(mysql_error());
}

header("location:product.php");
?>