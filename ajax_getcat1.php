<?php
include_once('database.php');
$prof=$_GET['prof'];
$qwery=mysql_query("select * from `profession` where `id`='$prof'")or die(mysql_error());
$res=mysql_fetch_array($qwery);
$totalcombination=explode(",",$res['totalcombination']);
?>
<link href="css/jquery.selectbox.css" type="text/css" rel="stylesheet" />

		<script type="text/javascript">
		$(function () {
			$("#country_id6").selectbox();
		});
		</script>
<select name="category" id="country_id6" tabindex="1">
	    <option value="">-- Select --</option>
														 <?php
															   $qwery=mysql_query("select * from `category`")or die(mysql_error());
															   while($res=mysql_fetch_array($qwery))
															   {
															      $qsub=mysql_query("select * from `subcategory` where `catid`='$res[id]'")or die(mysql_error());
															      while($rsub=mysql_fetch_array($qsub))
															      {
																 $qsubsub=mysql_query("select * from `subsubcategory` where `category`='$res[id]' and `subcategory`='$rsub[id]'")or die(mysql_error());
$comb=$res['id'].'|'.$rsub['id'].'|subcategory';
																 if(mysql_num_rows($qsubsub)==0 && in_array($comb, $totalcombination))
																 {
																  ?>
 <option value="<?php echo $res['id'];?>,<?php echo $rsub['id'];?>,subcategory"><?php echo $rsub['subcategory'];?></option>
																  <?php
																 }else
																 {
																    while($rsubsub=mysql_fetch_array($qsubsub))
																       {
																	  $qsubch=mysql_query("select * from `subchcategory` where `category`='$res[id]' and `subcategory`='$rsub[id]' and `subsubcategory`='$rsubsub[id]'")or die(mysql_error());
$combs=$res['id'].'|'.$rsubsub['id'].'|subsubcategory';
if(mysql_num_rows($qsubch)==0 && in_array($combs, $totalcombination))
																	  {
																    ?>
 <option value="<?php echo $res['id'];?>,<?php echo $rsubsub['id'];?>,subsubcategory"><?php echo $rsubsub['subsubcategory'];?></option>
																    <?php
																	  }
																	  else
																	  {
																	     while($rsubch=mysql_fetch_array($qsubch))
																	     {
                                                                                                                                       $combsc=$res['id'].'|'.$rsubch['id'].'|subchcategory';
		if(in_array($combsc, $totalcombination))
                {
                ?>
																		<option value="<?php echo $res['id'];?>,<?php echo $rsubch['id'];?>,subchcategory"><?php echo $rsubsub['subchcategory'];?></option>
																		<?php
                }
                }
																	  }
																       }
																 }
															      }
															   }
															   ?>
													</select>