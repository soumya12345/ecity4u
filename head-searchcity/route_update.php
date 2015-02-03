<?php
include_once("function.php");
$idval=$_POST['idval'];
$busname=htmlentities($_POST['busname'],ENT_QUOTES);

$checkpoint=htmlentities($_POST['checkpoint'],ENT_QUOTES);
$checkpttime=$_POST['checkpttime'];

mysql_query("update `busrootmap` set `busname`='$busname',`stoppagename`='$checkpoint',`arriavaltime`='$checkpttime' where `id`='$idval'")or die(mysql_error());
header("location:busroutemap.php");
?>