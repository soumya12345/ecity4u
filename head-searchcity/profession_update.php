<?php
include_once("function.php");
$profession=make_safe($_POST['profession']);
$idval=$_POST['idval'];
$alltotal='';
foreach($_POST['subcat'] as $key=>$value)
{
    $alltotal.=$value.',';
}
mysql_query("update `profession` set `profession`='$profession' ,`totalcombination`='$alltotal' where `id`='$idval'")or die(mysql_error());
header("location:profession.php");
?>