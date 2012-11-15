<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Schedule Admin Manager</title>
<link href="css/scheduleadmin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
 <div class="main">
  <div id="top">
        	<div id="logo">
            </div>
  </div>
        <div class="body">
			<div style="width: 500px; float: left; margin-left: 350px;" >
				               <?php if(isset($_REQUEST['q']))
								   {  
										if($_REQUEST['q']=="wrgclsd")
										{  
											echo "Please Provide Valid Credential";
										} 
									} 
								?> 
			</div> 
         	<div style=" height:20px; width:900px; margin-top:50px;" align="center">
            	<span class="login_title_index" >ADMIN LOGIN</span>
            </div>
            <div class="mid_form" style="height:280px;">
                  <form name="form1" method="post" action="adminprocess.php?task=login"  > 
                    <table height="130" width="420"  cellpadding="0" cellspacing="0" border="0" align="center" 
                        style="padding-top:20px;">
                    	<tr height="25" valign="top">
                        	<td width="140" class="login_name">User Name</td>
                          	<td width="10" class="smalltext_form">:</td>
                          	<td width="252" colspan="3" class="smalltext_form">
                            	 	<input type="text" id="username"  name="username" required placeholder="Your user name here!"/></div>
			               	</td>
                        </tr>
                       <tr height="25" valign="top">
                        	<td class="login_name">Password</td>
                            <td class="smalltext_form">:</td>
                            <td class="smalltext_form" colspan="3">
                            <input type="password" id="password" name="password" required placeholder="Your password here!"/>
                            </td>
                        </tr>
                        <tr height="10" align="right">
                        	<td width="140" class="smalltext_form">&nbsp;</td>
                       	  <td width="10" class="smalltext_form"></td>
                            <td align="left">
                            <input type="submit" value="Sign In" class="button" /> 
				            <input type="reset" value="Reset" name="Reset" class="button" />
                            </td>
                        </tr>         
                    </table>
                   </form> 
               </div>
    </div>
  </div>
  <div style="width:100%; float:left;"><?php //include ("footer.php"); ?></div>
</div>
</body>
</html>
