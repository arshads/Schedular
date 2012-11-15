<?php
 session_start();
  include( "../config.php");
  $userid=$_REQUEST['userid'];
  $status=$_REQUEST['status'];
  
  $updquery=mysql_query("UPDATE `sm_user_registor` SET user_status='$status' WHERE id='$userid'");
  if($updquery)
  {
	  echo $res=$status;
  }else {
	  echo $res=0;
  }
?>
