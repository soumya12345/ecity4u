<?php
include_once("function.php");
$agentname=make_safe($_POST['agentname']);
$contact=make_safe($_POST['contact']);
$email=make_safe($_POST['email']);
$address=make_safe($_POST['address']);

$idval=$_POST['idval'];

$password=md5(make_safe($_POST['password']));


mysql_query("update `user` set `name`='$agentname',`contact`='$contact',`password`='$password',`address`='$address',`status`='1' where `id`='$idval'")or die(mysql_error());

mysql_query("update `login` set `password`='$password' where `username`='$email' and `status`='1'")or die(mysql_error());

header("location:addagent.php");
?>