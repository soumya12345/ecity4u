<?php
include_once("function.php");
$id=$_GET['id'];
mysql_query("delete from `busrootmap` where `id`='$id'")or die(mysql_error());
header("location:busroutemap.php");
?>