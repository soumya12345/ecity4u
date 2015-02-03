<?php
include_once("function.php");
$idval=$_POST['idval'];
mysql_query("delete from `busstoppage` where `id`='$idval'")or die(mysql_error());
header("location:addbusstop.php");
?>