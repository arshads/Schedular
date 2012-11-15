<?php
  session_start();
  include( "../config.php");
  $userid=$_REQUEST['userid'];
  
  $delquery=mysql_query("DELETE FROM `sm_user_registor` WHERE id='$userid'");
  if($delquery)
  {
	 ?>
	 <div class="list_main">
     <?php
        $i=0;
        $queryse=mysql_query("SELECT `id`,`first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=1 AND admin_user=0");
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
<div style="width:50px; float:left; border-right:1px solid #E1E1E1; line-height:30px;	"><?php echo $i; ?></div>
<div style="width:145px; float:left; text-align:left; border-right:1px solid #E1E1E1; padding-left:5px; line-height:30px;"><?php echo $first_name. $last_name; ?></div>
<div style="width:240px; float:left; text-align:left; border-right:1px solid #E1E1E1; padding-left:5px; line-height:30px;"><?php echo $mail_id; ?></div>
<div style="width:120px; float:left; text-align:center;border-right:1px solid #E1E1E1; padding-left:5px; line-height:30px;"><?php echo $create_date; ?></div>
<div style="width:120px; float:left; text-align:center; border-right:1px solid #E1E1E1; padding-left:5px; padding-top:10px; line-height:30px;"><?php if($user_status==1) {  ?> <img src="images/activate.jpg" height="15px" width="15px"> <?php  } else { ?> <img src="images/deactivate.jpg" height="15px" width="15px"> <?php }?></div>
<div style="width:95px; float:left; line-height:30px; "><img src="images/edit.jpg" height="13px" width="13px">/<a href="#" OnClick="delete_user(<?php echo $user_id; ?>);"><img src="images/delete.jpg" height="13px" width="13px"></a></div>
<?php } ?>
</div>
<?php  } else {
	  echo "Value Not Deleted";
  }
?>
