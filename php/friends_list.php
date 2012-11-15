<?php session_start(); 
 include("config.php");
 $username=$_SESSION['username'];
	 if(count($_SESSION) == 0)
	 {
	   header("Location:index.php");
	 }


echo '<div class="process_box">
<div class="reg_head" > Friends List </div>
<div style="width:690px; float:left; border:1px solid black; margin:15px 0 15px 20px; border-radius:10px; "> 
<div style="width:690px; float:left; border-bottom:1px solid black;"> 
<div style="width:50px; float:left; text-align:center; "> No </div>
<div style="width:220px; float:left;"> Name </div>
<div style="width:210px; float:left;"> Mobile Number </div>
<div style="width:210px; float:left;"> Email Id </div>
</div>';
  $i=0;
        $queryse=mysql_query("SELECT `first_name`,`last_name`,`mail_id`,`mobile_number`,`username`,`password` FROM `sm_user_registor` WHERE username!='$username' AND user_status=1");
		while($selectval= mysql_fetch_array($queryse)) 
	    { 
		$first_name=$selectval['first_name'];
        $last_name=$selectval['last_name'];
        $mail_id=$selectval['mail_id'];
        $mobile_number=$selectval['mobile_number'];
		$i++;
		
echo '<div style="width:690px; float:left; "> 
<div style="width:50px; float:left; text-align:center;">'.$i.'</div>
<div style="width:220px; float:left;"> '.$first_name.$last_name.' </div>
<div style="width:210px; float:left;"> '.$mobile_number.' </div>
<div style="width:210px; float:left;"> '.$mail_id.' </div>
</div>';
  }
echo '</div>
</div>';