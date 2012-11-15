<?php session_start(); 
 include("config.php");
 $username=$_SESSION['username'];
	 if(count($_SESSION) == 0)
	 {
	   header("Location:index.php");
	 }
?>
<div class="process_box">
<div class="reg_head" > Add Groups </div>
<form name="add_group" action="process.php?task=add_group" method="post">
<div style="width:300px; float:left; margin:30px; "> 
<div style="width:300px; float:left; margin:10px;"> 
<div style="width:150px; float:left; text-align:center;"> Group Name </div>
<div style="width:150px; float:left;"> <input type="text" name="sch_grpnm" id="sch_grpnm" required size="30"  > </div>
</div>
<div style="width:300px; float:left; margin:10px; "> 
<div style="width:150px; float:left; text-align:center;">User List</div>
<div style="width:150px; float:left;"> <select name="user_list[]" style="width:215px;" multiple="multiple">
   <?php 
        $queryse=mysql_query("SELECT `first_name`,`last_name`,`mail_id`,`mobile_number`,`username`,`password` FROM `sm_user_registor` WHERE username!='$username' AND user_status=1");
		while($selectval= mysql_fetch_array($queryse)) 
	    { 
		$first_name=$selectval['first_name'];
        $last_name=$selectval['last_name'];
        $mail_id=$selectval['mail_id'];
        $mobile_number=$selectval['mobile_number'];
	?>	
 <option value="<?php echo $mail_id; ?>"><?php echo $first_name.$last_name; ?> </option>
 <?php  } ?></select></div>
</div>
<div style="width:300px; float:left; margin:10px;"> 
<div style="width:150px; float:left; text-align:center;"> &nbsp; </div>
<div style="width:150px; float:left;"> <input type="submit" name="Add User"  > <input type="reset" name="Reset User"  > </div>
</div>
</div>
</form>
</div>