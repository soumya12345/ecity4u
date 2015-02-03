<?php
include_once("function.php");
$username=make_safe($_POST['username']);
$password=md5(make_safe($_POST['password']));

$qwe=mysql_query("select *from `adminlogin` where `username`='$username' and `password`='$password'")or die(mysql_error());
if(mysql_num_rows($qwe)>0)
{
    $_SESSION['username']=$username;
    header("location:home.php");
}else{
    $msg='Wrong username or password.';
    header("location:index.php?msg=$msg");
}
?>