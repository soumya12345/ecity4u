<?php
include_once("function.php");
$id=$_GET['id'];
mysql_query("delete from `user` where `id`='$id'")or die(mysql_error());
mysql_query("delete from `login` where `id`='$id'")or die(mysql_error());
header("location:addagent.php");
?>