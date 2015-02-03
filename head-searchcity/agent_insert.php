<?php
include_once("function.php");
$agentname=make_safe($_POST['agentname']);
$contact=make_safe($_POST['contact']);
$email=make_safe($_POST['email']);
$address=make_safe($_POST['address']);
$mailpassword=make_safe($_POST['password']);

$password=md5(make_safe($_POST['password']));

$qwery=mysql_query("select * from `user` where `email`='$email' and `status`='1'")or die(mysql_error());
if(mysql_num_rows($qwery)==0)
{
mysql_query("insert into `user` set `name`='$agentname',`email`='$email',`contact`='$contact',`password`='$password',`address`='$address',`status`='1'")or die(mysql_error());

mysql_query("insert into `login` set `username`='$email',`password`='$password',`status`='1'")or die(mysql_error());

$to =$email.',jyoti.sahoo@krititech.in';
$from="admin@ecity4u.com";
$subject = "Login Status";
$message = "Your Username -" .$email." and Password- ".$mailpassword." click on the below link to login to our site. \n http://www.ecity4u.com/agent"; 
$headers = "From: $from";
mail($to,$subject,$message,$headers);


$msg='Account Create Successfully.';
}
else
{
    $msg='Emailid allready exist.';
}
header("location:addagent.php?msg=$msg");
?>