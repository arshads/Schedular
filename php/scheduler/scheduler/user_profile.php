<?php session_start(); 
 include("config.php");
 $username=$_SESSION['username'];
	 if(count($_SESSION) == 0)
	 {
	   header("Location:index.php");
	 }
 $queryse=mysql_query("SELECT `first_name`,`last_name`,`mail_id`,`mobile_number`,`username`,`password` FROM `sm_user_registor` WHERE username='$username' AND user_status=1");
		$selectval= mysql_fetch_array($queryse) or die ('Unable to run query:'.mysql_error());
	    $first_name=$selectval['first_name'];
        $last_name=$selectval['last_name'];
        $mail_id=$selectval['mail_id'];
        $mobile_number=$selectval['mobile_number'];
?>
<div class="process_box">
<div class="reg_head" > User Details </div>
<form name="registration_form" method="post" action="process.php?task=user_reg" >
<div class="reg_top">
<div class="reg_lable" > <label>First Name :</label></div>
<div class="reg_field" > <input type="text" name="first_name" id="first_name" required value="<?php echo $first_name; ?>" > </div>
</div>
<div class="reg_top">
<div class="reg_lable"> <label>Last Name :</label> </div>
<div class="reg_field"> <input type="text" name="last_name" id="last_name" required value="<?php echo $last_name; ?>"> </div>
</div>
<div class="reg_top">
<div class="reg_lable"> <label>Email Id :</label> </div>
<div class="reg_field"> <input type="email" name="email_id" id="email_id" required value="<?php echo  $mail_id;?>"> </div>
</div>
<div class="reg_top">
<div class="reg_lable"> <label>Mobile Number :</label> </div>
<div class="reg_field"> <input type="text" name="mobile_number" id="mobile_number"  required value="<?php echo $mobile_number; ?>"> </div>
</div>
<div class="reg_top">
<div class="reg_lable"> <label>Password : </label> </div>
<div class="reg_field"> <input type="password"  placeholder="Your password here!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="password1" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? 'Password must contain at least 6 characters, including UPPER/lowercase and numbers' : '');
  if(this.checkValidity()) form.pwd2.pattern = this.value;"> </div>
</div>
<div class="reg_top" >
<div class="reg_lable"> &nbsp;</div>
<div class="reg_field"> <button onclick="user_apd()">Update</button><!--input type="submit" name="submit" value="Update" -->  </div>
</div> </form>
</div>
