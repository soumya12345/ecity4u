<?php
echo "sssss";
include_once("database.php");
if(isset($_POST['submit'])){
$id=htmlentities($_POST['hid'],ENT_QUOTES);
echo $id;
$name=htmlentities($_POST['name'],ENT_QUOTES);
$review=htmlentities($_POST['review'],ENT_QUOTES);
echo "insert into `review` set `name`='$name',`review`='$review',`pid`='$id'";
$qwe=mysql_query("insert into `review` set `name`='$name',`review`='$review',`pid`='$id'")or die (mysql_error());
$msg="Successfully Submitted";
}
//header("location:detail.php?msg=$msg");
?>