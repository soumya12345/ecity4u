<?php
include_once("function.php");
$profession=make_safe($_POST['profession']);
$alltotal='';
foreach($_POST['subcat'] as $key=>$value)
{
    $alltotal.=$value.',';
}
mysql_query("insert into `profession` set `profession`='$profession' ,`totalcombination`='$alltotal'")or die(mysql_error());
header("location:profession.php");
?>