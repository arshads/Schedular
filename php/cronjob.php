<?php
     /* Configuration file */
	 include( "config.php");
 
	 $queryin=mysql_query("SELECT `meeting_date`,`participents`,`topic`,`agenda`,`reminder`,`location`,`start_time`,`end_time` FROM `sm_meeting_request` WHERE meeting_id=47");
	 $countin=mysql_num_rows($queryin);
	 if($countin!=0)
	 {
		 while($queryval= mysql_fetch_array($queryin))
		 {
    		 $metdate=$queryval['meeting_date'];
			 $partpent=$queryval['participents'];
			 $topi=$queryval['topic'];
			 $agend=$queryval['agenda'];
			 $remind=$queryval['reminder'];
			 $loca=$queryval['location'];
			 $timezone = new DateTimeZone("Asia/Kolkata" );
			 $date = new DateTime();
			 $date->setTimezone($timezone );
		     $date->format('H:i:00');
		     $cu_time=  strtotime($date->format('H:i:00'));
		     $str_time=$queryval['start_time'];
		     $end_time=$queryval['end_time'];
			 $st_time=strtotime(substr($str_time,0,-3));
			 $en_time=strtotime(substr($end_time,0,-3));
			 $timediff=round(abs($st_time - $cu_time) / 60,2);
			 
			 if($timediff <= $remind) 
			 {
		            
			 /*$curdae=date("Y-m-d");
			 $datediff = (strtotime($metdate) - strtotime(date($curdae))) / (60 * 60 * 24);
			 
			 if($datediff<=$remind){ */
				 
				$headers = "MIME-Version: 1.0\n" ;
				$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
				$headers .= "Reply-To: nandakumar@tataelxsi.co.in\r\n";
				$headers .= "Return-Path: nandakumar@tataelxsi.co.in\r\n";
				$headers .= "From : Sender Name <nandakumar@tataelxsi.co.in>\r\n";
				/*$headers .= "Cc:$grplist\r\n";
				$headers .= "BCC: hidden@special.com\r\n";*/
				$subject = "Meeting Reminder";
				$to = $partpent;
				/* Reminder email part*/
				$email ="<div style='width:600px; float:left; border: 1px solid; padding: 30px;margin: 10px;'>
							<div style='width:600px; float:left; margin-bottom:30px; text-align:center; font-size:20px; font-weight:bold;'>
							$topi</div>  
							<div style='width:600px; float:left; margin-bottom:10px;'>
							<div style='width:250px; float: left; text-align: right; padding-right: 40;'>Location :</div>
							<div style='width:300px; float:left'>$loca</div>				</div>  
							<div style='width:600px; float:left; margin-bottom:10px;'>
							<div style='width:250px; float: left; text-align: right; padding-right: 40;'>Meeting Date :</div>
							<div style='width:300px; float:left'>$metdate</div>				</div>
							<div style='width:600px; float:left; margin-bottom:10px;'>
							<div style='width:250px; float: left; text-align: right; padding-right: 40;'>Meeting Start Time :</div>
							<div style='width:300px; float:left'>$str_time</div>				</div>
							<div style='width:600px; float:left; margin-bottom:10px;'>
							<div style='width:250px; float: left; text-align: right; padding-right: 40;'>Meeting End Time :</div>
							<div style='width:300px; float:left'>$end_time</div>				</div>
							<div style='width:600px; float:left; margin-bottom:10px;'>
							<div style='width:250px; float: left; text-align: right; padding-right: 40;'>Message :</div>
							</div>
							<div style='width:600px; float:left'>$agend</div>
						</div>";
				$status= mail($to, $subject, $email, $headers);
					 if($status){
						 echo "Email Send";
					 } else {
						 echo "Email Not Send";
					 }
			 }
		 }
	 }	 
?>
