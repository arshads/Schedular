<?php session_start(); 
 include("config.php");
 $username=$_SESSION['username'];
 $userid=$_SESSION['usrid'];
	 if(count($_SESSION) == 0)
	 {
	   header("Location:index.php");
	 }
	 
	 //print_r($_SERVER);
?>
<div class="process_box" >
<div class="reg_head" > Minutes of Meeting </div>

	<div class="list_wrapper" id="mom_upd">
<div class="list_main" >
					<div class="list_no" >MeetId</div>
					<div class="list_name" >Date </div>
					<div class="list_mail" >Topic / Upload MoM</div>
					<div class="list_jdate" >Strat & End Time</div>
					<div class="list_edit" >Delete </div>
				</div>
 <div class="list_main" >
 <?php 
        $queryse = mysql_query("SELECT `meeting_id`,`meeting_date`,`start_time`,`end_time`,`topic`,`agenda`,`status`,`location`,`remarks` FROM `sm_meeting_request` WHERE hosted_by='$userid'");
       	$i=0;
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
						$document=$selectval['remarks'];
						$i++;
			?>  <div class="list_main">
				<div class="grp_id" ><?php echo $met_id; ?></div>
				<div class="grp_name" style="text-align:center"><?php echo $met_date; ?> </div>
				<div class="grp_own" ><a href="#" onClick="mom_uplod(<?php echo $met_id; ?>);"><?php echo $topic; ?></a>&nbsp;&nbsp;<?php if($document!=""){ echo "<a href='http://localhost/scheduler/mom/$document' style='color:red;' target='blank'>View</a>"; } ?></div>
				<div class="grp_date"><?php echo $start_time.'&'.$end_time; ?></div>
				<div class="grp_del" ><a href="#" OnClick="delete_user(<?php echo $met_id; ?>,0,'schedulelist');"><img src="images/delete.jpg" height="13px" width="13px"></a></div>
                </div> 
			<?php    } 
			     } else {
				              echo "Record not found";
				     }  ?>	

            	</div>
			</div>

</div>