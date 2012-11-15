<?php
  session_start();
  include( "../config.php");
  /*$username=$_SESSION['username'];
	 if(count($_SESSION) == 0)
	 {
	   header("Location:index.php");
	 }
  */
    
   
  
   /* Login Process Start*/

		if($_REQUEST['task']=="login")
		{
			$user=$_REQUEST['username'];
			$pass=base64_encode($_REQUEST['password']);
			$query=mysql_query("SELECT `id`,`first_name`,`last_name`,`username`,`password` FROM `sm_user_registor` WHERE username='$user' AND password='$pass' AND user_status=1 AND admin_user=1");
			$selectval= mysql_fetch_array($query);
			$count=mysql_num_rows($query);

			if($count!=0)
				{
				   $_SESSION['usr_id']=$selectval['id'];
				   $_SESSION['usr_fname']=$selectval['first_name'];
				   $_SESSION['usl_lname']=$selectval['last_name'];
				   $_SESSION['username']=$selectval['username'];
				   
				   header("Location:home.php");
				} 
				else
				{
					header("Location:index.php?q=wrgclsd");
				}
		  
		} 
	   
   /* Login process End */	  
  
    /* Acitve User List */

		if($_REQUEST['task']=="userlist")
		{   
			if(!isset($_REQUEST['n'])){
			
			?>
			<div id="user_edit">
				<div class="list_wrapper" style="font-size:15px; line-height:30px;">  Active User List</div>
					<div class="list_wrapper">
						<div class="list_main">
							<div class="list_no" >Userid</div>
							<div class="list_name" >Name</div>
							<div class="list_mail" >Mail id</div>
							<div class="list_jdate" >Join Date</div>
							<div class="list_status">User Status</div>
							<div class="list_edit" > Delete </div>
						</div> 
			<?php  } ?>			
					<div class="list_main" id="ajx_res">
					<?php
					        $task=$_REQUEST['task'];
					        $result = mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=1 AND admin_user=0");
							$items =2; // number of items per page.
							if(!isset($_REQUEST['p']))
						    {
							  $all = 1;
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
						
							$queryse = mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=1 AND admin_user=0 ORDER BY 'id' ASC LIMIT $p_num , $items");
					        
							$i=0;
							/*$queryse=mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=1 AND admin_user=0");*/
							$count=mysql_num_rows($queryse);
							if($count!=0)
							{
								while($selectval= mysql_fetch_array($queryse)) 
								{ 
									$user_id=$selectval['id'];
									$first_name=$selectval['first_name'];
									$last_name=$selectval['last_name'];
									$mail_id=$selectval['mail_id'];
									$create_date=$selectval['create_date'];
									$user_status=$selectval['user_status'];
									$i++;
					?>
					<div class="urlist_id"><?php echo $user_id; ?></div>
					<div class="urlist_name"><?php echo $first_name. $last_name; ?></div>
					<div class="urlist_mail"><?php echo $mail_id; ?></div>
					<div class="urlist_date"><?php echo $create_date; ?></div>
					<div class="urlist_stat">
					<a href="#" onClick="uesr_status(<?php echo $user_id; ?>,0,'userlist')"><img src="images/activate.jpg" height="15px" width="15px"></a></div>
					<div class="urlist_del">
					<!--a href="#" onClick="user_edit(<?php //echo $user_id; ?>)"><img src="images/edit.jpg" height="13px" width="13px"></a-->
					&nbsp;<a href="#" OnClick="delete_user(<?php echo $user_id; ?>,1,'userlist');"><img src="images/delete.jpg" height="13px" width="13px"></a></div>

					<?php      } 
						    } else {
									  echo "Record not found";
								 } 
					?>
					</div>
					
				</div>
				<div style="width:500px; float:left;">
						<!-- call on Pagination with function-->
                     <?php   	if(!isset($_REQUEST['n'])){
					         $userlist="userlist";
			                 paging($userlist);  }?>
                    </div>
				
			</div>
		<?php
		}
        
        /* Blocked User List*/
        
		if($_REQUEST['task']=="blockedlist")
		{  
		  if(!isset($_REQUEST['n'])){
		  ?>
		  <div class="list_wrapper" style="font-size:15px; line-height:30px;">  Blocked User List</div>
			<div class="list_wrapper">
				<div class="list_main">
					<div class="list_no" >No</div>
					<div class="list_name" >Name</div>
					<div class="list_mail" >Mail id</div>
					<div class="list_jdate" >Join Date</div>
					<div class="list_status">User Status</div>
					<div class="list_edit" >Delete </div>
				</div>
			<?php } ?>	
			<div class="list_main" id="ajx_res">
			<?php
			    $task=$_REQUEST['task'];
				$result = mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=0 AND admin_user=0");
				$items =2; // number of items per page.
				if(!isset($_REQUEST['p']))
				{
				  $all = 1;
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
			
				$queryse = mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=0 AND admin_user=0 ORDER BY 'id' ASC LIMIT $p_num , $items");
					         
				$i=0;
				//$queryse=mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=0 AND admin_user=0 ");
				$count=mysql_num_rows($queryse);
				if($count!="")
				{
					while($selectval= mysql_fetch_array($queryse)) 
					{
						$user_id=$selectval['id'];	 
						$first_name=$selectval['first_name'];
						$last_name=$selectval['last_name'];
						$mail_id=$selectval['mail_id'];
						$create_date=$selectval['create_date'];
						$user_status=$selectval['user_status'];
						$i++;
			?>
				<div class="urlist_id" ><?php echo $i; ?></div>
				<div class="urlist_name" ><?php echo $first_name. $last_name; ?></div>
				<div class="urlist_mail" ><?php echo $mail_id; ?></div>
				<div class="urlist_date" ><?php echo $create_date; ?></div>
				<div class="urlist_stat" > <a href="#" onClick="uesr_status(<?php echo $user_id; ?>,1,'userlist')"><img src="images/deactivate.jpg" height="15px" width="15px"></a> </div>
				<div class="urlist_del" ><!--img src="images/edit.jpg" height="13px" width="13px"-->
				&nbsp;<a href="#" OnClick="delete_user(<?php echo $user_id; ?>,0,'userlist');"><img src="images/delete.jpg" height="13px" width="13px"></a></div>

			<?php    } 
			     } else {
				              echo "Record not found";
				     }  ?>
			</div>
			</div>
			<div style="width:500px; float:left;">
						<!-- call on Pagination with function-->
                     <?php   	if(!isset($_REQUEST['n'])){
								$userlist="blockedlist";			               
								paging($userlist); 
					 }?>
            </div>
			
		
				
		<?php }
		
		/* Active User Group List */
		
		if($_REQUEST['task']=="activegroup")
		{
			
			if(!isset($_REQUEST['n'])){
		  ?>

	
		  <div class="list_wrapper" style="font-size:15px; line-height:30px;"> Active Group List</div>
			<div class="list_wrapper">
				<div class="list_main">
					<div class="list_no" >GId</div>
					<div class="list_name" >GName</div>
					<div class="list_mail" >Owner</div>
					<div class="list_jdate" >Create Date</div>
					<div class="list_status">User Status</div>
					<div class="list_edit" >Delete </div>
				</div>
			<?php } ?>	
			<div class="list_main" id="ajx_res">
				<?php
			    $task=$_REQUEST['task'];
				$result = mysql_query("SELECT `group_id`,`group_name`,`user_email`,`created_by`,`created_date`,`group_status` FROM `sm_user_group` WHERE group_status=1");
				$items =2; // number of items per page.
				if(!isset($_REQUEST['p']))
				{
				  $all = 2;
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
			
				$queryse = mysql_query("SELECT `group_id`,`group_name`,`user_email`,`created_by`,`created_date`,`group_status` FROM `sm_user_group` WHERE group_status=1 ORDER BY 'group_id' ASC LIMIT $p_num , $items");
					         
				$i=0;
				//$queryse=mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=0 AND admin_user=0 ");
				$count=mysql_num_rows($queryse);
				if($count!="")
				{
					while($selectval= mysql_fetch_array($queryse)) 
					{
						$group_id=$selectval['group_id'];	 
						$group_name=$selectval['group_name'];
						$created_by=$selectval['created_by'];
						$mail_id=$selectval['user_email'];
						$create_date=$selectval['created_date'];
						$group_status=$selectval['group_status'];
						$i++;
			?>
				<div class="grp_id"><?php echo $group_id; ?></div>
				<div class="grp_name"><?php echo $group_name; ?></div>
				<div class="grp_own">
				 <span class="tooltip" data-tooltip="<?php echo $mail_id; ?>"><?php echo $created_by; ?></span>
				 </div>
				
				<div class="grp_date"><?php echo $create_date; ?></div>
				<div class="grp_sta"> <a href="#" onClick="uesr_status(<?php echo $group_id; ?>,0,'grouplist')"><img src="images/activate.jpg" height="15px" width="15px"></a> </div>
				<div class="grp_del"><!--img src="images/edit.jpg" height="13px" width="13px"-->
				&nbsp;<a href="#" OnClick="delete_user(<?php echo $group_id; ?>,1,'grouplist');"><img src="images/delete.jpg" height="13px" width="13px"></a></div>

			<?php    } 
			     } else {
				              echo "Record not found";
				     }  ?>
			</div>
			</div>
			<div style="width:500px; float:left;">
						<!-- call on Pagination with function-->
                     <?php   	if(!isset($_REQUEST['n'])){
								$userlist="activegroup";			               
								paging($userlist); 
					 }  ?>
            </div>
			
		<?php
				
		}


			/* Blocked User Group List */
		
		if($_REQUEST['task']=="blockedgroup")
		{
			
			if(!isset($_REQUEST['n'])){
		  ?>
		  <div class="list_wrapper" style="font-size:15px; line-height:30px;"> Blocked Group List</div>

			<div class="list_wrapper">
				<div class="list_main">
					<div class="list_no" >GId</div>
					<div class="list_name" >GName</div>
					<div class="list_mail" >Owner</div>
					<div class="list_jdate" >Create Date</div>
					<div class="list_status">User Status</div>
					<div class="list_edit" >Delete </div>
				</div>
			<?php } ?>	
			<div class="list_main" id="ajx_res">
			<?php
			    $task=$_REQUEST['task'];
				$result = mysql_query("SELECT `group_id`,`group_name`,`user_email`,`created_by`,`created_date`,`group_status` FROM `sm_user_group` WHERE group_status=0");
				$items =2; // number of items per page.
				if(!isset($_REQUEST['p']))
				{
				  $all = 2;
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
			
				$queryse = mysql_query("SELECT `group_id`,`group_name`,`user_email`,`created_by`,`created_date`,`group_status` FROM `sm_user_group` WHERE group_status=0 ORDER BY 'group_id' ASC LIMIT $p_num , $items");
					         
				$i=0;
				//$queryse=mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=0 AND admin_user=0 ");
				$count=mysql_num_rows($queryse);
				if($count!="")
				{
					while($selectval= mysql_fetch_array($queryse)) 
					{
						$group_id=$selectval['group_id'];	 
						$group_name=$selectval['group_name'];
						$created_by=$selectval['created_by'];
						$mail_id=$selectval['user_email'];
						$create_date=$selectval['created_date'];
						$group_status=$selectval['group_status'];
						$i++;
			?>
				<div class="grp_id" ><?php echo $group_id; ?></div>
				<div class="grp_name"><?php echo $group_name; ?></div>
				<div class="grp_own" ><?php echo $created_by; ?></div>
				<div class="grp_date"><?php echo $create_date; ?></div>
				<div class="grp_sta" > <a href="#" onClick="uesr_status(<?php echo $group_id; ?>,1,'grouplist')"><img src="images/deactivate.jpg" height="15px" width="15px"></a> </div>
				<div class="grp_del" ><!--img src="images/edit.jpg" height="13px" width="13px"-->
				&nbsp;<a href="#" OnClick="delete_user(<?php echo $group_id; ?>,0,'grouplist');"><img src="images/delete.jpg" height="13px" width="13px"></a></div>

			<?php    } 
			     } else {
				              echo "Record not found";
				     }  ?>
			</div>
			</div>
			<div style="width:500px; float:left;">
						<!-- call on Pagination with function-->
                     <?php   	if(!isset($_REQUEST['n'])){
								$userlist="blockedgroup";			               
								paging($userlist); 
					 }  ?>
            </div>
			
		<?php
					
		}
        
		/* Scheduling Email*/
		
		if($_REQUEST['task']=="scheduledemail")
		{
		   			if(!isset($_REQUEST['n'])){
		  ?>
		  <div class="list_wrapper" style="font-size:15px; line-height:30px;"> Meeting Request Email List</div>

			<div class="list_wrapper">
				<div class="list_main">
					<div class="list_no" >MeetId</div>
					<div class="list_name" >Date & Location</div>
					<div class="list_mail" >Topic</div>
					<div class="list_jdate" >Strat & End Time</div>
					<div class="list_status">User Status</div>
					<div class="list_edit" >Delete </div>
				</div>
			<?php } ?>	
			<div class="list_main" id="ajx_res">
			<?php
			    $task=$_REQUEST['task'];
				$result = mysql_query("SELECT `meeting_id`,`meeting_date`,`start_time`,`end_time`,`topic`,`agenda`,`status`,`location` FROM `sm_meeting_request`");
				$items =10; // number of items per page.
				if(!isset($_REQUEST['p']))
				{
				  $all = 2;
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
				     }  ?>
			</div>
			</div>
			<div style="width:500px; float:left;">
						<!-- call on Pagination with function-->
                     <?php   	if(!isset($_REQUEST['n'])){
								$userlist="scheduledemail";			               
								paging($userlist); 
					 }  ?>
            </div>
			
		<?php
     		
		}
		
		
		 /*  Paging Funictionality */
		
		function paging($resval)
		{
				//$task="userlist";
				global $num_rows;
				global $page;
				global $page_amount;
				global $section;
				if($page_amount != "0"){
					echo "<div class=paging>";
						if($page != "0"){
							$prev = $page-1;
							echo "<a href=\"#\" onClick=\"next_page($prev,'$resval')\">Prev</a>";
						}
						for ( $counter = 0; $counter <= $page_amount; $counter += 1) {
							echo "<a href=\"#\" onClick=\"next_page($counter,'$resval')\">";
							echo $counter+1;
							echo "</a>";
						}
						/*if($page < $page_amount){
							$next = $page+1;
							echo "<a href=\"#\" onClick=\"next_page($next,'$resval')\">Next</a>";
						}*/
						if($page < $page_amount){
					echo "<a href=\"#\" onClick=\"next_page('all','$resval')\">View All</a>";
					}
					echo "</div>";
				}
        }
		 
		
		?>
