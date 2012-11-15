<?php session_start(); 
 include("config.php");
 $username=$_SESSION['username'];
	 if(count($_SESSION) == 0)
	 {
	   header("Location:index.php");
	 }
?>
<div class="process_box">
<div class="reg_head" > List Groups </div>
<div style="width:690px; float:left; border:1px solid black; margin:15px 0 15px 20px; border-radius:10px; "> 
<div style="width:690px; float:left; border-bottom:1px solid black;"> 
<div style="width:40px; float:left; text-align:center; "> No </div>
<div style="width:150px; float:left;"> Group Name </div>
<div style="width:100px; float:left;"> Created Date </div>
<div style="width:400px; float:left;"> User Email </div>
</div>
<?php 
  $i=0;
        $queryse=mysql_query("SELECT `group_name`,`created_date`,`user_email` FROM `sm_user_group` WHERE created_by='$username' AND group_status=1")or mysql_error() ;
		$count=mysql_num_rows($queryse);
		if($count!=0) {
		while($selectval= mysql_fetch_array($queryse)) 
	    { 
		$group_name=$selectval['group_name'];
        $created_date=$selectval['created_date'];
        $user_email=$selectval['user_email'];
        $i++;
	?>	
<div style="width:690px; float:left; "> 
<div style="width:40px; float:left; text-align:center;"><?php echo $i; ?></div>
<div style="width:150px; float:left;"> <?php echo $group_name; ?> </div>
<div style="width:100px; float:left;"> <?php echo $created_date; ?> </div>
<div style="width:400px; float:left; word-wrap:break-word;"> <?php echo $user_email; ?> </div>
</div>
 <?php  } }else {?>
 <div style="width:690px; float:left; text-align:center; min-height:100px; margin-top:50px; "> Groups Not Available;  </div>
 <?php } ?>
</div>
<div style="width:690px; float:left; margin:10px 0 10px 20px;"><a href="#" onClick="show_addgroup()">Add Group</a></div>
</div>