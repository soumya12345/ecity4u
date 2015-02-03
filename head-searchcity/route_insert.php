<?php
include_once("function.php");
$busname=htmlentities($_POST['busname'],ENT_QUOTES);
$startpoint=htmlentities($_POST['startpoint'],ENT_QUOTES);
$endpoint=htmlentities($_POST['endpoint'],ENT_QUOTES);
mysql_query("insert into `bustiming` set `buname`='$busname',`frompoint`='$startpoint',`topoint`='$endpoint',`time`='".$_POST['checkpttime'][0]."'")or die(mysql_error());
$busid=mysql_insert_id();
$checkpoint='';
foreach($_POST['checkpoint'] as $key=>$value)
{
    $check=htmlentities($value,ENT_QUOTES);
    $arrivaltime=$_POST['checkpttime'][$key];
    mysql_query("insert into `busrootmap` set `busname`='$busname',`busid`='$busid',`stoppagename`='$check',`arriavaltime`='$arrivaltime'")or die(mysql_error());
}
header("location:busroutemap.php");
?>