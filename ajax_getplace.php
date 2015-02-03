<?php
include_once('database.php');
$cat=$_GET['catid'];
$subid=$_GET['subid'];
$subtype=$_GET['subtype'];
$qwery=mysql_query("select `icon`  from `category` where `id`='$cat'")or die(mysql_error());
$resicon=mysql_fetch_array($qwery);
$mapicon='head-searchcity/'.$resicon['icon'];

$sql="select * from `product` where `category` like '%$cat,%' and `chcategory` like '%$subid,%' and `chtype` like '%$subtype,%' and `city`='".$_SESSION['city']."'";
$query = mysql_query($sql);
?>


<ul id="content-2" class="content" style="background: #efefef; border: none;">
    <?php
    $i=0;
while($res_map=mysql_fetch_array($query))
{
    ?>

	<li class="lasti" style="float: left;padding: 10px; max-width:130px; list-style-type:none; text-align: center;" lastid="<?php echo $i;?>" mapicon="<?php echo $mapicon;?>"><a href="#" onclick="return getmapindividual(<?php echo $res_map['id'];?>,<?php echo $cat;?>);"><img src="head-searchcity/<?php echo $res_map['image'];?>" alt="image01" width="70" height="70" style="border-radius:8px; border:2px solid #fff;-webkit-box-shadow: 0 8px 6px -6px black; -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black; outline: none;"/><br/><?php echo $res_map['productname'];?></a></li>
<?php
$i++;
}
?>
</ul>



