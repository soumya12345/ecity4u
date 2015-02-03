<?php
include_once("function.php");
chk_login();
if(isset($_POST['submit']))
{
    $agentid=$_POST['agentid'];
    $fromdate=date('Y-m-d',strtotime($_POST['fromdate']));
    $todate=date('Y-m-d',strtotime($_POST['todate']));
    $sql="select * from `product` where `insertby`='$agentid' and date(`date`)>='$fromdate' and date(`date`)<='$todate'";
}else
{
    $sql='select * from `product`';
}
$qallproduct=mysql_query($sql)or die(mysql_error());
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-ui.js"></script>
       
<script type="text/javascript">
    $(function(){
	
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
  });
</script>
</head>

<body>

<!--------------top bar -------->
 <div id="top_bar">
 		<div id="top_box">
				<h2 style="margin-top:0px; padding-top:8px; font-family:Arial, Helvetica, sans-serif; color:#f5f5f5;">Admin Panel</h2>
		</div>
 </div>
 <!--------------top bar end-------->

 <div id="main_bar">
 		<div id="main_box">
				<?php
				include_once("leftbar.php");
				?>
				<div id="right_box" style="width:808px;">
						<div class="headline">
								<a href="">Dashboard </a> 
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										View Agent Report
								</div>
								<div id="content2" style="font-family:arial; font-size:14px;">
								    <div style="width:98%; float: left; margin-left: 1%;">
									Search By Agent Name
                                                                        <form method="post" action="#">
                                                                        <select name="agentid" style="padding: 3px; height: 30px;">
                                                                            <option>--Choose Agent--</option>
                                                                            <?php
                                                                            $qallagent=mysql_query("select * from `user` where `status`='1'")or die(mysql_error());
                                                                            while($rallagent=mysql_fetch_array($qallagent))
                                                                            {
                                                                                ?>
                                                                                <option value="<?php echo $rallagent['id'];?>"><?php echo $rallagent['name'];?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select> &nbsp; &nbsp;
									From: <input type="text" name="fromdate" id="datepicker" class="form" style="width: 150px;"/> &nbsp; &nbsp; To: <input type="text" id="datepicker1" name="todate" class="form" style="width: 150px;"/> &nbsp; &nbsp;                                                                        <input type="submit" value="Submit" name="submit" class="button" />
                                                                        </form>
                                                                        
                                                                        <h2 style="color: #08C; font-weight:normal;">
                                                                            <?php if(isset($_POST['submit'])){
                                                                                echo 'Total Insert by '.getagentname($agentid).' is '.mysql_num_rows($qallproduct);
                                                                            }
                                                                            ?>
                                                                        </h2>
								    </div>
									<table class="table1" cellpadding="5">
										<tr class="tr1">
												<th>Location name</th>
												<th>Contact</th>
												<th>Image</th>
												<th>Insert By</th>
                                                                                                <th>Date</th>
										<th colspan="2">Action</th>
										</tr>
										</table>
									<div style="width: 98%;height: 400px;float: left;overflow: auto;">
									    <table class="table1" cellpadding="5">
										<?php
										$insertby='';
										while($rallproduct=mysql_fetch_array($qallproduct))
										{
										    if($rallproduct['insertby']==0)
										    {
											$insertby='Admin';
										    }
										    else{
											$insertby=getagentname($rallproduct['insertby']);
										    }
										?>
										<tr>
											<td><?php echo $rallproduct['productname'];?></td>
											<td><?php echo $rallproduct['contact'].'<br/>'.$rallproduct['email'];?></td>
											<td>
											<img src="<?php echo $rallproduct['image'];?>" style="width: 80px;height: auto;"/>
											</td>
											<td>
											    <?php echo $insertby;?>
											</td>
                                                                                        <td>
                                                                                            <?php echo date('l d m Y' ,strtotime($rallproduct['date']));?>
                                                                                        </td>
											<td>
											<a href="product_edit.php?id=<?php echo $rallproduct['id'];?>"><img src="img/edit.png"></a>
											</td>
											<td>
											<a href="product_delete.php?id=<?php echo $rallproduct['id'];?>"><img src="img/delete.png"></a>
											</td>
										</tr>
										<?php
										}
										?>
									</table>
									</div>
								</div>
						</div>
				</div>
		</div>
 </div>
  <!--------------content bar end-------->

<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
			&copy;Copy Right All Rights Reserved 2014	
		</div>
 </div>
  <!--------------footer end---------> 
  
   
</body>
</html>