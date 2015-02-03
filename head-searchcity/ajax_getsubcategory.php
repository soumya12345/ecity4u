<?php
include_once("function.php");
$catid=$_GET['catid'];
$subca=$_GET['subca'];
$qwery=mysql_query("select * from `subcategory` where `catid`='$catid'")or die(mysql_error());
?>
<select name="subcategory" onchange="return getsubsubcategory(this.value);" class="form" style="height:30px;" id="subcategory">
    <option value="">--choose--</option>
<?php
while($res=mysql_fetch_array($qwery))
{
?>
<option value="<?php echo $res['id'];?>" <?php if($res['id']==$subca) echo 'selected';?>><?php echo $res['subcategory'];?></option>
<?php
}
?>
</select>