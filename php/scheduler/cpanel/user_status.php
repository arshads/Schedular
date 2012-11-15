<?php
  session_start();
  include( "../config.php");
  
  if($_REQUEST['task']=="userlist")
  {
        $userid=$_REQUEST['userid'];
	    $status=$_REQUEST['status'];
		  
		$updquery=mysql_query("UPDATE `sm_user_registor` SET user_status='$status' WHERE id='$userid'");
		if($updquery)
		{
		  echo $res=$status;
		}else {
		  echo $res=0;
		}
  } 
 if($_REQUEST['task']=="grouplist")
 {
       $grpid=$_REQUEST['userid'];
	   $status=$_REQUEST['status'];
	   
	   $updquery=mysql_query("UPDATE `sm_user_group` SET group_status='$status' WHERE group_id='$grpid'");
	   if($updquery)
		{ 
		   if($status==0)
		   {
		     $stat=2;
		   } else {
		     $stat=3;
		   }
		  echo $res=$stat;
		}else {
		  echo $res=3;
		}
 
 }
 if($_REQUEST['task']=="schedulelist")
 {
       $schid=$_REQUEST['userid'];
	   $status=$_REQUEST['status'];
	   
	   $updquery=mysql_query("UPDATE `sm_meeting_request` SET status='$status' WHERE meeting_id='$schid'");
	   if($updquery)
		{
				$result = mysql_query("SELECT `meeting_id`,`meeting_date`,`start_time`,`end_time`,`topic`,`agenda`,`status`,`location` FROM `sm_meeting_request`");
				$items =10; // number of items per page.
				if(!isset($_REQUEST['p']))
				{
				  $all = 2;
				  $_REQUEST['p']=0;
				}
				 else 
				{
				   $all = $_REQUEST['p'];
				} 
				 $num_rows = mysql_num_rows($result);
				if($all == "all"){
					$items = $num_rows;
				}
				$nrpage_amount = $num_rows/$items;
				$page_amount = ceil($num_rows/$items);
				$page_amount = $page_amount-1;
				$page = $_REQUEST['p'];
				if($page < "1"){
					$page = "0";
				}
				$p_num = $items*$page;
				//end paging code
				// Query that you would like to SHOW
			
				$queryse = mysql_query("SELECT `meeting_id`,`meeting_date`,`start_time`,`end_time`,`topic`,`agenda`,`status`,`location` FROM `sm_meeting_request` ORDER BY 'group_id' ASC LIMIT $p_num , $items");
					         
				$i=0;
				//$queryse=mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=0 AND admin_user=0 ");
				$count=mysql_num_rows($queryse);
				if($count!="")
				{
					while($selectval= mysql_fetch_array($queryse)) 
					{
						$met_id=$selectval['meeting_id'];	 
						$met_date=$selectval['meeting_date'];
						$start_time=$selectval['start_time'];
						$end_time=$selectval['end_time'];
						$topic=$selectval['topic'];
						$agenda=strip_tags($selectval['agenda']);
						$status=$selectval['status'];
						$location=$selectval['location'];
						$i++;
			?>  <div class="list_main">
				<div class="grp_id" ><?php echo $met_id; ?></div>
				<div class="grp_name" style="text-align:center"><span class="tooltip" data-tooltip="<?php echo $location; ?>"><?php echo $met_date; ?></span></div>
				<div class="grp_own" ><span class="tooltip" data-tooltip="<?php echo $agenda; ?>"><?php echo $topic; ?></span></div>
				<div class="grp_date"><?php echo $start_time.'&'.$end_time; ?></div>
				<div class="grp_sta" > <?php if($status==1) {?><a href="#" onClick="uesr_status(<?php echo $met_id; ?>,0,'schedulelist')"><img src="images/activate.jpg" height="15px" width="15px"></a> <?php } else { ?><a href="#" onClick="uesr_status(<?php echo $met_id; ?>,1,'schedulelist')"><img src="images/deactivate.jpg" height="15px" width="15px"></a> <?php } ?> </div>
				<div class="grp_del" ><!--img src="images/edit.jpg" height="13px" width="13px"-->
				&nbsp;<a href="#" OnClick="delete_user(<?php echo $met_id; ?>,0,'schedulelist');"><img src="images/delete.jpg" height="13px" width="13px"></a></div>
                </div> 
			<?php    } 
			     } else {
				              echo "Record not found";
				     }  
		} else {
			  echo "Value Not Updated";
		}
 
 }
?>
