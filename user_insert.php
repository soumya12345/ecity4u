<?php
include_once('database.php');
$name=htmlentities($_POST['name'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$contact=htmlentities($_POST['contact'],ENT_QUOTES);
$address=htmlentities($_POST['address'],ENT_QUOTES);
$password=md5(htmlentities($_POST['password'],ENT_QUOTES));

$qwery=mysql_query("select * from `user` where `email`='$email' and `status`='0'")or die(mysql_error());
if(mysql_num_rows($qwery)==0)
{
mysql_query("insert into `user` set `name`='$name',`email`='$email',`contact`='$contact',`password`='$password',`address`='$address'")or die(mysql_error());

mysql_query("insert into `login` set `username`='$email',`password`='$password'")or die(mysql_error());
}
else
{
    $msg='Emailid allready exist.';
}
header("location:index.php?msg=$msg");
?>