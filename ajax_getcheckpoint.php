<?php
include_once('database.php');
$busname=$_GET['busname'];
$busid=$_GET['busid'];

$point='';
function stoppagename($id)
{
    $qbusstoppage=mysql_query("select `stoppagename` from `busstoppage` where `id`='$id'");
    $rbus=mysql_fetch_array($qbusstoppage);
    return $rbus['stoppagename'];
}

$qwery=mysql_query("select * from `busrootmap` where `busname` like '%$busname%' and `busid`='$busid'")or die(mysql_error());
while($res=mysql_fetch_array($qwery))
{
    $stoppagename=stoppagename($res['stoppagename']);
    $point.=$stoppagename.'|';
}

echo $point;
?>