<?php
include_once("database.php");
$to=$_GET['to'];
$from=$_GET['frm'];

$fet=mysql_query("select * from `traintiming` where `to`='$to' and `from`='$from'");
$n=mysql_numrows($fet);
?>
<tr>
    <td>Train </td>
    <td>To</td>
     <td>From</td>
      <td>Time</td>
</tr>
<?php
if($n>0){
while($res=mysql_fetch_array($fet)) {?>
<tr>
    <td><?php echo $res['name'];?></td>
     <td><?php echo $res['to'];?></td>
      <td><?php echo $res['from'];?></td>
       <td><?php echo $res['time'];?></td>
</tr><?php } } else {?>
<tr>
    <td><?php  echo "no records found"; }?></td>
</tr>