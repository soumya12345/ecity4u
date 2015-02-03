<?php
include_once('database.php');
$email=$_POST['email'];
$pass=md5($_POST['pass']);

$qwery=mysql_query("select * from `login` where `username`='$email' and `password`='$pass'")or die(mysql_error());
if(mysql_num_rows($qwery)==0)
{
    $msg='Wrong Email/ Password';
}
else{
    $qwe=mysql_query("select * from `user` where `email`='$email' and `password`='$pass'")or die(mysql_error());
    $res=mysql_fetch_array($qwe);
    $_SESSION['user_name']=$res['name'];
}
header("location:index.php?msg=$msg");
?>