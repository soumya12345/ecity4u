<?php
include_once("function.php");
$stoppage=htmlentities($_POST['stoppage'],ENT_QUOTES);
mysql_query("insert into `busstoppage` set `stoppagename`='$stoppage'")or die(mysql_error());
header("location:addbusstop.php");
?>