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
						
							$queryse = mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=1 AND admin_user=0 ORDER BY 'name' ASC LIMIT $p_num , $items");
					        
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
					<a href="#" onClick="uesr_status(<?php echo $user_id; ?>,0)"><img src="images/activate.jpg" height="15px" width="15px"></a></div>
					<div class="urlist_del">
					<!--a href="#" onClick="user_edit(<?php //echo $user_id; ?>)"><img src="images/edit.jpg" height="13px" width="13px"></a-->&nbsp;<a href="#" OnClick="delete_user(<?php echo $user_id; ?>);"><img src="images/delete.jpg" height="13px" width="13px"></a></div>

					<?php        } 
							  } else {
									  echo "Record not found";
								 } 
					?>
					</div>
					
				</div>
				<div style="width:500px; float:left;">
						<!-- call on Pagination with function-->
                     <?php   	if(!isset($_REQUEST['n'])){
			                 paging();  }?>
                    </div>
				
			</div>
		<?php
		}
        
        /* Blocked User List*/
        
		if($_REQUEST['task']=="blockedlist")
		{  ?>
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
			<div class="list_main">
			<?php
				$i=0;
				$queryse=mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=0 AND admin_user=0 ");
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
				<div style="width:50px; float:left; border-right:1px solid #E1E1E1; line-height:30px;"><?php echo $i; ?></div>
				<div style="width:145px; float:left; text-align:left; border-right:1px solid #E1E1E1; padding-left:5px; line-height:30px;"><?php echo $first_name. $last_name; ?></div>
				<div style="width:240px; float:left; text-align:left; border-right:1px solid #E1E1E1; padding-left:5px; line-height:30px;"><?php echo $mail_id; ?></div>
				<div style="width:120px; float:left; text-align:center;border-right:1px solid #E1E1E1; padding-left:5px; line-height:30px;"><?php echo $create_date; ?></div>
				<div style="width:120px; float:left; text-align:center; border-right:1px solid #E1E1E1; padding-left:5px; padding-top:10px; line-height:30px;"> <a href="#" onClick="uesr_status(<?php echo $user_id; ?>,1)"><img src="images/deactivate.jpg" height="15px" width="15px"></a> </div>
				<div style="width:95px; float:left; line-height:30px; "><!--img src="images/edit.jpg" height="13px" width="13px"-->&nbsp;<img src="images/delete.jpg" height="13px" width="13px"></div>

			<?php    } 
			     } else {
				              echo "Record not found";
				     }  ?>
			</div></div>
		
				
		<?php }
		
		/* */
		
		if($_REQUEST['task']=="user_reg")
		{
			
			
			
		}	
		
		 /*  Paging Funictionality */
		
		function paging()
		{
				$task="userlist";
				global $num_rows;
				global $page;
				global $page_amount;
				global $section;
				if($page_amount != "0"){
					echo "<div class=paging>";
						if($page != "0"){
							$prev = $page-1;
							echo "<a href=\"#\" onClick=\"next_page($prev,'userlist')\">Prev</a>";
						}
						for ( $counter = 0; $counter <= $page_amount; $counter += 1) {
							echo "<a href=\"#\" onClick=\"next_page($counter,'userlist')\">";
							echo $counter+1;
							echo "</a>";
						}
						if($page < $page_amount){
							$next = $page+1;
							echo "<a href=\"#\" onClick=\"next_page($next,'userlist')\">Next</a>";
						}
					echo "<a href=\"#\" onClick=\"next_page('all','userlist')\">View All</a>";
					echo "</div>";
				}
        }
		 
		
		?>
