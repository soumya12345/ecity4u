<?php
include_once("function.php");
$subcatid=$_GET['subcatid'];
$selectsubcatid=$_GET['selectsubcatid'];
$qwery=mysql_query("select * from `subsubcategory` where `subcategory`='$subcatid'")or die(mysql_error());
?>
<select name="subsubcategory" class="form" style="height:30px;" id="subsubcategory">
    <option value="">--choose--</option>
<?php
while($res=mysql_fetch_array($qwery))
{
?>
<option value="<?php echo $res['id'];?>" <?php if($res['id']==$selectsubcatid) echo 'selected';?>><?php echo $res['subsubcategory'];?></option>
<?php
}
?>
</select>