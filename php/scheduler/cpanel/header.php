<?php
session_start();
$name=$_SESSION['usr_fname'].$_SESSION['usl_lname'];

if(count($_SESSION) == 0)
{
	header("Location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Schedule Admin Manager</title>
<link href="css/scheduleadmin.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/csshorizontalmenu.css" />
<script language="javascript" src="js/csshorizontalmenu.js" type="text/javascript"></script>
<script language="javascript" src="js/functions.js" type="text/javascript"></script>
<script language="javascript" src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
	    function get_details(getdata)
		{	
			$.ajax({
			type: "POST",
			url: "adminprocess.php",
			dataType: "html",
			data:{ task:getdata, p:0 }
			}).done(function( msg ) {
			document.getElementById("textmid").innerHTML =msg;
			});
		}
		function next_page(s,a)
		{
		 	
		 	var n;
			$.ajax({
			type: "POST",
			url: "adminprocess.php",
			data:{ task:a, p:s, n:1 }
			}).done(function( msg ) {
			document.getElementById("ajx_res").innerHTML =msg;
			});
		}
	    function delete_user(user_id)
		{	
			$.ajax({
			type: "POST",
			url: "delete_user.php",
			dataType: "html",
			data :{ userid:user_id }
			}).done(function( msg ) {
			document.getElementById("ajx_res").innerHTML =msg;
			});
		}	
	    function uesr_status(usrid,getdata)
		{	
			$.ajax({
			type: "POST",
			url: "user_status.php",
			dataType: "html",
			data :{ userid:usrid, status:getdata }
			}).done(function( msg ) {
				if(msg==1)
				{
				  get_details('blockedlist');
				} else {
				  get_details('userlist');
				}
				
				
			});
		}
       function user_edit(user_id)
		{	
			$.ajax({
			type: "POST",
			url: "user_profile.php",
			dataType: "html",
			data :{ userid:user_id }
			}).done(function( msg ) {
			document.getElementById("user_edit").innerHTML =msg;
			});
		}		
</script>
<style type="text/css">
.urlist_id{
	width:50px; float:left; border-right:1px solid #E1E1E1; line-height:30px;
}
.urlist_name{
	width:145px; float:left; text-align:left; border-right:1px solid #E1E1E1; padding-left:5px; line-height:30px;
}
.urlist_mail{
	width:240px; float:left; text-align:left; border-right:1px solid #E1E1E1; padding-left:5px; line-height:30px;
}
.urlist_date{
	width:120px; float:left; text-align:center;border-right:1px solid #E1E1E1; padding-left:5px; line-height:30px;
}
.urlist_stat{
	width:120px; float:left; text-align:center; border-right:1px solid #E1E1E1; padding-left:5px; padding-top:10px; line-height:30px;
}
.urlist_del{
	width:95px; float:left; line-height:30px;
}	

</style>
</head>
<body>
        <div class="body">
        	 <div id="top">
        	<div id="logo">
            </div>
				<div style="width: 200px; float: right; margin-top: 10px;">
				<?php if($name)
				{
					echo "Welcome &nbsp;" . $name.'&nbsp;<a href="logout.php">Logout</a>';
				}        ?>
				</div>
			</div>
        	<div class="body_link" id="top" style="height:32px;">
            	<!--menus-->
                	<div class="horizontalcssmenu">
                    	<ul id="cssmenu1">
                        	<li><A href="home.php" class="out" style="width:80px;">Home</A>
                            	
                            </li>
                            <li><A href="#" class="out" style="width:80px;">Users</A>
                            	<ul>
                                	<li><a href="#" class="out1" onClick="get_details('userlist');">Active User</a></li>
                                    <li><a href="#" class="out1" onClick="get_details('blockedlist');">Blocked User</a></li>
                                    <li><a href="#" class="out1">Sub menu3</a></li>
                                    <li><a href="#" class="out1">Sub menu4</a></li>
                                    <li><a href="#" class="out1">Sub menu5</a></li>
                                </ul>
                            </li>
                            <li><A href="#" class="out" style="width:80px;">Schedule </A>
                            	<ul>
                                	<li><a href="#" class="out1" onClick="">Sceduled Users</a></li>
                                    <li><a href="#" class="out1">Sub menu3</a></li>
                                    <li><a href="#" class="out1">Sub menu4</a></li>
                                    <li><a href="#" class="out1">Sub menu5</a></li>
                                </ul>
                            </li>
                            <li><A href="#" class="out" style="width:80px;">Group</A>
                            	<ul>
                                	<li><a href="#" class="out1" onCLick="">Group List</a></li>
                                    <li><a href="#" class="out1">Sub menu2</a></li>
                                    <li><a href="#" class="out1">Sub menu3</a></li>
                                    <li><a href="#" class="out1">Sub menu4</a></li>
                                    <li><a href="#" class="out1">Sub menu5</a></li>
                                </ul>
                            </li>
                            <!--li><A href="#" class="out" style="width:80px;">Menu5</A>
                            	<ul>
                                	<li><a href="#" class="out1">Sub menu1</a></li>
                                    <li><a href="#" class="out1">Sub menu2</a></li>
                                    <li><a href="#" class="out1">Sub menu3</a></li>
                                    <li><a href="#" class="out1">Sub menu4</a></li>
                                    <li><a href="#" class="out1">Sub menu5</a></li>
                                </ul>
                           </li-->
                        </ul>                                        	
                    </div>
                <!--end of menus-->
            </div>
     </div>
 </body>
</html>
