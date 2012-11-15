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
<link href="css/nav.css" rel="stylesheet" type="text/css" />
<!--link rel="stylesheet" type="text/css" href="css/csshorizontalmenu.css" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" /-->
<!--script language="javascript" src="js/csshorizontalmenu.js" type="text/javascript"></script>
<script language="javascript" src="js/functions.js" type="text/javascript"></script-->
<script language="javascript" src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<!--script language="javascript" src="js/jquery.colorbox.js" type="text/javascript" ></script-->
<script language="javascript" type="text/javascript">
		/*$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
		
				$(".callbacks").colorbox({
			
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});*/
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
		 	//alert(s);
			//alert(a);
		 	var n;
			$.ajax({
			type: "POST",
			url: "adminprocess.php",
			data:{ task:a, p:s, n:1 }
			}).done(function( msg ) {
			document.getElementById("ajx_res").innerHTML =msg;
			});
		}
	    function delete_user(user_id,getdata,usrdata)
		{	
			$.ajax({
			type: "POST",
			url: "delete_user.php",
			dataType: "html",
			data :{ task:usrdata, stats:getdata, userid:user_id }
			}).done(function( msg ) {
			document.getElementById("ajx_res").innerHTML =msg;
			});
		}	
	    function uesr_status(usrid,getdata,usrdata)
		{	
			$.ajax({
			type: "POST",
			url: "user_status.php",
			dataType: "html",
			data :{ task:usrdata, userid:usrid, status:getdata }
			}).done(function( msg ) {
			//alert(msg);
				if(msg==1)
				{
				  get_details('blockedlist');
				} else if(msg==0) {
				  get_details('userlist');
				} else if(msg==2)
				{
				  get_details('activegroup');
				} else if(msg==3)
				{
				  get_details('blockedgroup')
				} else {
				 document.getElementById("ajx_res").innerHTML =msg;
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
					<nav id="topNav">
                    	<ul>
                        	<li><a href="home.php" class="out" style="width:70px;">Home</a>
                            	
                            </li>
                            <li><a href="#" class="out" style="width:70px;" onClick="get_details('userlist');">Users</a>
                            	<ul>
                                	<li><a href="#" class="out1" onClick="get_details('userlist');">Active User</a></li>
                                    <li><a href="#" class="out1" onClick="get_details('blockedlist');">Blocked User</a></li>
                                    <!--li><a href="#" class="out1">Sub menu3</a></li>
                                    <li><a href="#" class="out1">Sub menu4</a></li>
                                    <li><a href="#" class="out1">Sub menu5</a></li-->
                                </ul>
                            </li>
                             <li><a href="#" class="out" style="width:85px;" onCLick="get_details('activegroup')">Group</a>
                            	<ul>
                                	<li><a href="#" class="out1" onCLick="get_details('activegroup')">Active Group</a></li>
                                    <li><a href="#" class="out1" onCLick="get_details('blockedgroup')">Blocked Group</a></li>
                                    <!--li><a href="#" class="out1">Sub menu3</a></li>
                                    <li><a href="#" class="out1">Sub menu4</a></li>
                                    <li><a href="#" class="out1">Sub menu5</a></li-->
                                </ul>
                            </li>
							<li><a href="#" class="out" style="width:85px;">Schedule </a>
                            	<ul>
                                	<li><a href="#" class="out1" onClick="get_details('scheduledemail')">Sceduled Users</a></li>
                                    <!--li><a href="#" class="out1">Sub menu3</a></li>
                                    <li><a href="#" class="out1">Sub menu5</a></li>
                                    <li><a href="#" class="out1">Sub menu4</a></li-->
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
                    </nav>						
                    </div>
                <!--end of menus-->
            </div>
     </div>
	 <script language="javascript" src="js/moderniz.js" type="text/javascript"></script>
	 <script type="text/javascript">
			(function($){
				
				//cache nav
				var nav = $("#topNav");
				
				//add indicator and hovers to submenu parents
				nav.find("li").each(function() {
					if ($(this).find("ul").length > 0) {
						$("<span>").text("^").appendTo($(this).children(":first"));

						//show subnav on hover
						$(this).mouseenter(function() {
							$(this).find("ul").stop(true, true).slideDown();
						});
						
						//hide submenus on exit
						$(this).mouseleave(function() {
							$(this).find("ul").stop(true, true).slideUp();
						});
					}
				});
			})(jQuery);
		</script>
 </body>
</html>
