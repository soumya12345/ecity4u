<?php
include_once("../head-searchcity/function.php");
$username=make_safe($_POST['username']);
$password=md5(make_safe($_POST['password']));

$qwe=mysql_query("select * from `login` where `username`='$username' and `password`='$password' and `status`='1'")or die(mysql_error());
if(mysql_num_rows($qwe)>0)
{
    $qwery=mysql_query("select * from `user` where `email`='$username' and `password`='$password' and `status`='1'")or die(mysql_error());
    $res=mysql_fetch_array($qwery);
    $_SESSION['agent_name']=$res['name'];
    $_SESSION['agentname']=$username;
    $_SESSION['agent_slno']=$res['id'];
    //echo $res['name'].'-----'.$_SESSION['agent_name'];
    header("location:home.php");
}else{
    $msg='Wrong username or password.';
    header("location:index.php?msg=$msg");
}
?>