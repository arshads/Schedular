<?php
  session_start();
  include( "config.php");
  

     /* Registration Process Start */
  
   if($_REQUEST['task']=="registor") 
    {
       $firstname=$_REQUEST['first_name'];
	   $lastname=$_REQUEST['last_name'];
	   $emailid=$_REQUEST['email_id'];
	   $mobilenumber=$_REQUEST['mobile_number'];
	   $username=$_REQUEST['user_name'];
	   $userpas=$_REQUEST['password1'];
	   /*if($_REQUEST['password1']==""){
	      $password=base64_encode($_SESSION['password1']);
	   } else {*/
	      $password=base64_encode($userpas);
	      /* }*/
	   $curdate=date("Y-m-d");
		   
	   $query=mysql_query("INSERT INTO `sm_user_registor` (first_name,last_name,mail_id,mobile_number,username,password,create_date) VALUES ('$firstname','$lastname','$emailid','$mobilenumber','$username','$password','$curdate')");
	   $usrid=mysql_insert_id();
	   if($query)
	   {
	        $headers = "MIME-Version: 1.0\n" ;
			$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
			$headers .= "From: Sender Name <nandakumar@tataelxsi.co.in>";
			$subject  = "Schedule Manager New User Registration";
			//$email    =  "<div style='background-color:yellow'>Thank you registoring schedule manager.</div> Please click the following link for account actination.<a href='http://10.75.15.120/scheduler/index.php?mstatus=active&usrid=$usrid'>Click the link of account activation</a><br/><br/> Username=$username <br/> Password=$userpas";
			$email  ="<div style='width:600px; float:left'>
						Thank you registoring schedule manager.<br/> <br/>
						Please click the following link for account actination.
						<a href='http://10.75.15.120/scheduler/index.php?mstatus=active&usrid=$usrid'>Click the link of account activation</a>
						Your login details given below <br/><br/>
						Username=$username <br/> 
						Password=$userpas
						<br><br><br><br>
						Regards ,<br><br>
						TATA ELXSI LIMITED <br>
						ITPB Road  Whitefield  Bangalore 560 048  India <br>
						Cell +91 8050 560680 <br>
						<a href='http://www.tataelxsi.com'>www.tataelxsi.com</a>
						</div>";
			$to = $emailid;
			$status= mail($to, $subject, $email, $headers);
	        header("Location:index.php?res=sus");
		  		 	  
	   } else {
	     //echo "not inserted"; 
	      header("Location:registration.php?res=fal");
	   }
    }   
	
	/* Registration Process End */
    	
   /* Registration Alter Start */
   
   if($_REQUEST['task']=="user_reg") 
    {
       $firstname=$_REQUEST['first_name'];
	    $lastname=$_REQUEST['last_name'];
	    $emailid=$_REQUEST['email_id'];
	    $mobnumber=$_REQUEST['mobile_number'];
		
	   

	   if($_REQUEST['password1']==""){
	      $password=$_SESSION['password'];
	   } else {
	      $password=base64_encode($_REQUEST['password1']); }
	   $curdate=date("Y-m-d");
	   $usernm=$_SESSION['username'];	
	
	   $requery=mysql_query("UPDATE `sm_user_registor` SET first_name='$firstname',last_name='$lastname',mail_id='$emailid',mobile_number='$mobnumber',password='$password',create_date='$curdate' WHERE username='$usernm'");
	   if($requery)
	   {
	     //echo "inserted";
		  header("Location:index.php?q=suc");
	   } 
    }    
   
   
   /* Registration Alter End */

  /* Login Process Start*/
  
     if($_REQUEST['task']=="login")
    {
		$user=$_REQUEST['username'];
		$pass=base64_encode($_REQUEST['password']);
		 		  
		$query=mysql_query("SELECT `id`,`username`,`password` FROM `sm_user_registor` WHERE username='$user' AND password='$pass' AND user_status=1");
		$selectval= mysql_fetch_array($query);
		$count=mysql_num_rows($query);
			
			if($count!=0)
			{
			   $_SESSION['usrid']=$selectval['id'];
			   $_SESSION['username']=$selectval['username'];
			   $_SESSION['password']=$selectval['password'];
			   $usrnam=$_SESSION['username'];
			   $passwrd=$_SESSION['password'];
			   $usrid=$_SESSION['usrid'];
			   $upquery=mysql_query("UPDATE `sm_user_registor` SET invalid_counter=0 WHERE username='$user'");
			   header("Location:index.php");
			} 
			else
			{
			 
			  $queryin=mysql_query("SELECT `invalid_counter` FROM `sm_user_registor` WHERE username='$user'");
		      $queryval= mysql_fetch_array($queryin);
			  $countin=mysql_num_rows($queryin);
			 
			  if($countin!=0)
				{
				  $wrngcnt=$queryval['invalid_counter'];
				  if($wrngcnt==3)
				    {
						 $upquery=mysql_query("UPDATE `sm_user_registor` SET user_status=0 AND invalid_counter=0 WHERE username='$user'");
						 header("Location:index.php?q=wrgclsd");
				    }else{
						 $curtot=$wrngcnt+1;
						 $upquery=mysql_query("UPDATE `sm_user_registor` SET invalid_counter='$curtot' WHERE username='$user' ");
						 header("Location:index.php?q=wrg&cnt=$curtot");
					}
			    } else {
			         header("Location:index.php?q=wrgclsd");
			   }
			  
			}
		  
   } 
   /* Login process End */	  


  /* Add users in Group */
   if($_REQUEST['task']=="add_group") 
    {
	   $group_name=$_REQUEST['sch_grpnm'];
	   $user_list=$_REQUEST['user_list'];
	   $grp_user = implode(";",$user_list);
	   $usrnae=$_SESSION['username'];
	   $curdae=date("Y-m-d");
	   
	   $query=mysql_query("INSERT INTO `sm_user_group` (group_name,user_email,created_by,created_date) VALUES ('$group_name','$grp_user','$usrnae','$curdae')");
	   if($query)
	   {
	     header("Location:index.php?q=suc");
	   }
	
	}
	
  /* Meeting Schedule Email */
  
  if($_REQUEST['task']=="mschdule")
  {
    $mtoadd=$_REQUEST['sch_toadd'];
	$grplist=$_REQUEST['sch_group_list'];
	$msubject=$_REQUEST['sch_subject'];
	$mlocation=$_REQUEST['sch_location'];
	$mstrdate=$_REQUEST['sch_meet_date'];
	$mstrtime=$_REQUEST['start_time'];
	$mendtime=$_REQUEST['end_time'];
	$mail_reminder=$_REQUEST['mail_reminder'];
	$mmessage=$_REQUEST['sch_message'];
	$usrnae=$_SESSION['usrid'];
	$curdae=date("Y-m-d");
	
	$headers = "MIME-Version: 1.0\n" ;
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "Reply-To: nandakumar@tataelxsi.co.in\r\n";
	$headers .= "Return-Path: nandakumar@tataelxsi.co.in\r\n";
	$headers .= "From : Sender Name <nandakumar@tataelxsi.co.in>\r\n";
	$headers .= "Cc:$grplist\r\n";
    /*$headers .= "BCC: hidden@special.com\r\n";*/
    $to = $mtoadd;
	echo $grplist;
	exit;
   /* $email ="<div style='width:500px; float:left; border: 1px solid; padding: 30px;margin: 10px;'>
                <div style='width:500px; float:left; margin-bottom:30px; text-align:center; font-size:20px; font-weight:bold;'>
				$msubject</div>  
				<div style='width:500px; float:left; margin-bottom:10px;'>
				<div style='width:200px; float: left; text-align: right; padding-right: 10;'>Location :</div>
				<div style='width:250px; float:left'>$mlocation</div>				</div>  
				<div style='width:500px; float:left; margin-bottom:10px;'>
				<div style='width:200px; float: left; text-align: right; padding-right: 10;'>Meeting Date :</div>
				<div style='width:250px; float:left'>$mstrdate</div>				</div>
				<div style='width:500px; float:left; margin-bottom:10px;'>
				<div style='width:200px; float: left; text-align: right; padding-right: 10;'>Meeting Start Time :</div>
				<div style='width:250px; float:left'>$mstrtime</div>				</div>
				<div style='width:500px; float:left; margin-bottom:10px;'>
				<div style='width:200px; float: left; text-align: right; padding-right: 10;'>Meeting End Time :</div>
				<div style='width:250px; float:left'>$mendtime</div>				</div>
				<div style='width:500px; float:left; margin-bottom:10px;'>
				<div style='width:200px; float: left; text-align: right; padding-right: 10; padding-top:10px;'>Message :</div>
				<div style='width:250px; float:left'>$mmessage</div>	
				</div>
    		</div>";
	$status= mail($to, $msubject, $email, $headers);
	
	$querymsch=mysql_query("INSERT INTO `sm_meeting_request` (meeting_date,start_time,end_time,topic,agenda,participents,location,reminder,hosted_by,hosted_date) VALUES ('$mstrdate','$mstrtime','$mendtime','$msubject','$mmessage','$mtoadd;$grplist','$mlocation','$mail_reminder','$usrnae','$curdae')");
	   if($querymsch)
	   { 
	      header("Location:call_schedule_manager.php?q=suc", true);
	   }
	*/
  
  }
  /*Upload Minutes of Meeting*/
  if($_REQUEST['task']=="uploadmom")
  {
        $target_path = "mom/";
		
		$filename=$_FILES['file']['name'];
        $usrid=$_SESSION['usrid'];
		$momid=$_REQUEST['momid'];
		$target_path = $target_path . basename($filename); 

		if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
			
		 $upquery=mysql_query("UPDATE `sm_meeting_request` SET remarks='$filename' WHERE meeting_id='$momid'");
         header("Location:index.php?q=suc");
		} else{
			echo "There was an error uploading the file, please try again!";
		}
	
  }
?>
