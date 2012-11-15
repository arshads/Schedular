 <div class="reg_main">
<div class="rege_head" > Registration Form! </div>
<form name="registration_form" method="post" action="process.php?task=registor" >
<div class="rege_top">
<div class="rege_lable" > <label>First Name :</label></div>
<div class="rege_field" > <input type="text" name="first_name" id="first_name" placeholder="Your first name here!" required> </div>
</div>
<div class="rege_top">
<div class="rege_lable"> <label>Last Name :</label> </div>
<div class="rege_field"> <input type="text" name="last_name" id="last_name" placeholder="Your last name here!" required> </div>
</div>
<div class="rege_top">
<div class="rege_lable"> <label>Email Id :</label> </div>
<div class="rege_field"> <input type="email" name="email_id" id="email_id" placeholder="me@example.com!" required> </div>
</div>
<div class="rege_top">
<div class="rege_lable"> <label>Mobile Number :</label> </div>
<div class="rege_field"> <input type="text" name="mobile_number" id="mobile_number" placeholder="9987677899" pattern="[-0-9]+" required> </div>
</div>
<div class="rege_top">
<div class="rege_lable"> <label> User Name : </label> </div>
<div class="rege_field"> <input type="text" name="user_name" id="user_name" placeholder="Your user name here!" required> </div>
</div>
<div class="rege_top">
<div class="rege_lable"> <label>Password : </label> </div>
<div class="rege_field"> <input type="password" required placeholder="Your password here!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="password1" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? 'Password must contain at least 6 characters, including UPPER/lowercase and numbers' : '');
  if(this.checkValidity()) form.pwd2.pattern = this.value;"> </div>
</div>
<div class="rege_top">
<div class="rege_lable"><label> Retype Password :</label> </div>
<div class="rege_field"> <input type="password" required placeholder="Your retype password here!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="password2"                                           
onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');"></div>
</div>
<div class="rege_top" >
<div class="rege_lable"> &nbsp;</div>
<div class="rege_field"> <input type="submit" name="submit" value="Submit" class="button" ><input type="reset" name="reset" id="Reset" class="button"> </div>
</div> </form>
</div>