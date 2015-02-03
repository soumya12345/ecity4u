<?php
include_once("function.php");
$idval=$_POST['idval'];
$stoppage=htmlentities($_POST['stoppage'],ENT_QUOTES);
mysql_query("update `busstoppage` set `stoppagename`='$stoppage' where `id`='$idval'")or die(mysql_error());
header("location:addbusstop.php");
?>