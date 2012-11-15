<?php session_start(); 
 include("../config.php");
 $username=$_SESSION['username'];
	 if(count($_SESSION) == 0)
	 {
	   header("Location:index.php");
	 }
?>
<style type="text/css">
.list_wrapper{
	width:800px; float:left; border:1px solid #E1E1E1; margin-left:30px;
}
.list_main{ width:800px; float:left; line-height:20px;}
.list_no{width:50px; float:left;border-right:1px solid #E1E1E1;border-bottom:1px solid #E1E1E1;line-height:20px;}
.list_name{width:150px; float:left;border-right:1px solid #E1E1E1;border-bottom:1px solid #E1E1E1;line-height:20px;}
.list_mail{width:245px; float:left;border-right:1px solid #E1E1E1;border-bottom:1px solid #E1E1E1;line-height:20px;}
.list_jdate{width:125px; float:left;border-right:1px solid #E1E1E1;border-bottom:1px solid #E1E1E1;line-height:20px;}
.list_status{width:125px; float:left;border-right:1px solid #E1E1E1;border-bottom:1px solid #E1E1E1;line-height:20px;}
.list_edit{width:100px; float:left;border-bottom:1px solid #E1E1E1;line-height:20px;}
</style>
<div class="list_wrapper">
<div class="list_main">
<div class="list_no" >No</div>
<div class="list_name" >Name</div>
<div class="list_mail" >Mail id</div>
<div class="list_jdate" >Join Date</div>
<div class="list_status">User Status</div>
<div class="list_edit" >Edit/ Delete </div>
</div>
<div class="list_main">
<?php
        $i=0;
        $queryse=mysql_query("SELECT `first_name`,`last_name`,`mail_id`,`create_date`,`user_status` FROM `sm_user_registor` WHERE user_status=0 AND admin_user=0 ");
		while($selectval= mysql_fetch_array($queryse)) 
	    { 
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
<div style="width:95px; float:left; line-height:30px; "><img src="images/edit.jpg" height="13px" width="13px">/ <img src="images/delete.jpg" height="13px" width="13px"></div>

<?php } ?>
</div></div>
