<?php
include_once('database.php');
$from=$_GET['from'];
$to=$_GET['to'];

function stoppagename($id)
{
    $qbusstoppage=mysql_query("select `stoppagename` from `busstoppage` where `id`='$id'");
    $rbus=mysql_fetch_array($qbusstoppage);
    return $rbus['stoppagename'];
}

$frompt=stoppagename($from);
    
$qwery=mysql_query("select * from (SELECT * FROM `busrootmap` WHERE `stoppagename`=$from) as b , (select stoppagename as endpt,busid from `busrootmap` WHERE `stoppagename`=$to ) as c where b.`busid` =c.`busid`")or die(mysql_error());
while($res=mysql_fetch_array($qwery))
{
    $busname=$res['busname'];
    $arrivaltime=$res['arriavaltime'];
    $stoppage=$res['busid'];
    $qst=mysql_query("select `frompoint`,`topoint` from `bustiming` where `busid`='$stoppage'");
    $rst=mysql_fetch_array($qst);
    
    $starting=stoppagename($rst['frompoint']);
    $ending=stoppagename($rst['topoint']);
    ?>
    
    <tr>
        <td>
            <span onclick="return slidedetail(<?php echo $res['id'];?>);" style="cursor: pointer;"><?php echo $busname.'('.$starting.' ---> '.$ending.' )';?></span>
        </td>
        <td>
            <?php echo $frompt;?>
        </td>
        <td>
            <?php echo $arrivaltime;?>
        </td>
    </tr>
    <tr id="detail<?php echo $res['id'];?>" style="display: none;">
        <td colspan="3">
        <table style="width: 100%;height: auto;float: left;">
            <tr>
                <th>Stoppage</th>
                <th>Arrival Time</th>
            </tr>
            <?php
            $qwer=mysql_query("select * from `busrootmap` where `busname` like '%$busname%' and `busid`='$stoppage'")or die(mysql_error());
while($rest=mysql_fetch_array($qwer))
{
    $stoppagename=stoppagename($rest['stoppagename']);
?>
            <tr>
                <td>
                    <?php echo $stoppagename;?>
                </td>
                <td>
                    <?php echo $rest['arriavaltime'];?>
                </td>
            </tr>
<?php
}
?>
        </table>
        </td>
    </tr>
    <?php
}
?>