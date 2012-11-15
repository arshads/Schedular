<?php session_start();
include( "config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Schedule Manager</title>
<meta charset="UTF-8">
<meta name="description" content="Geek-only friendly, W3C-compliant, CSS3- and HTML5-based website template with a Creative Commons Attribution-Share Alike 3.0 Unported License.">
<meta name="robots" content="index,follow,noarchive">
<link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" />
<link media="screen" rel="stylesheet" href="css/style.css">
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<link media="screen" rel="stylesheet" href="css/msg_ style.css" />
    <link rel="stylesheet" media="screen" type="text/css" href="css/custom.css" />
    <link rel="stylesheet" media="screen" type="text/css" href="css/spacegallery.css" />
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/spacegallery.js"></script>
    <script type="text/javascript" src="js/layout.js"></script>
<script src="js/jquery.alerts.js" type="text/javascript"></script>
<!--script src="js/modernizr.custom.72111.js" type="text/javascript"></script-->
<style type="text/css">
			.no-cssanimations .rw-wrapper .rw-sentence span:first-child{
				opacity: 1;
</style>
<!--script src="js/jquery.marquee.js" type="text/javascript"></script-->
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript">
		var j = jQuery.noConflict();
		j(document).ready(function(){
			j(".ajax").colorbox();
			j(".group1").colorbox({rel:'group1'});
			j(".callbacks").colorbox({
			onOpen:function(){ alert('onOpen: colorbox is about to open'); },
			onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
			onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
			onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
			onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});

			//Example of preserving a JavaScript event for inline calls.
			j("#click").click(function(){ 
			j('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
			});
		});
		
		 // Display user profile
		 
		function user_profile()
		{	
			j.ajax({
			type: "POST",
			url: "user_profile.php",
			dataType: "html"
			}).done(function( msg ) {
			document.getElementById("middel_part").innerHTML =msg;
			});
		}
		
         
		 // Display friends list 
		
		function friends_list()
		{	
			j.ajax({
			type: "POST",
			url: "friends_list.php",
			dataType: "html"
			}).done(function( msg ) {
			document.getElementById("middel_part").innerHTML =msg;
			});
		}
		
		// Display Group list 
		
		function list_group()
		{	
			j.ajax({
			type: "POST",
			url: "list_group.php",
			dataType: "html"
			}).done(function( msg ) {
			document.getElementById("middel_part").innerHTML =msg;
			});
		}
		
		function show_addgroup()
		{	
			j.ajax({
			type: "POST",
			url: "add_group.php",
			dataType: "html"
			}).done(function( msg ) {
			document.getElementById("middel_part").innerHTML =msg;
			});
		}
		 // Display Schedule manager
		
		function schedule_manager()
		{
		    j.ajax({
			type: "POST",
			url: "call_schedule_manager.php",
			dataType: "html"
			}).done(function( msg ) {
			document.getElementById("middel_part").innerHTML =msg;
			});
		
		}
		
		// Display Meeting Request
		
		function mom_list()
		{   
		    j.ajax({
			type: "POST",
			url:"minutesofmeeting.php",
			dataType: "html"
			}).done(function( msg ) {
			document.getElementById("middel_part").innerHTML =msg;
			});
		}
		// Mom upload
		
		function mom_uplod(moid)
		{   
		    j.ajax({
			type: "POST",
			url:"uploadmom.php",
			dataType: "html",
			data:{ momid:moid }
			}).done(function( msg ) {
			document.getElementById("mom_upd").innerHTML =msg;
			});
		}
</script>
</head>
<body>
	<div id="a">
		<div style="width:941px; height:20px; margin:10px 0px; background-color: #D9D9D9; border-radius: 10px; padding-left:10px; padding-bottom: 2px;" >
			<div style="width:400px; float:left;"> Today : <?php echo date("l,F j, Y"); ?></div>
			<div style="width:400px; float:right; text-align: right; padding-right: 14px;"> 
			<?php if(isset($_SESSION['username'])) {
			?>
			Welcome <?php echo $_SESSION['username'] ?> | <a class='ajax' href="logout.php"> Logout </a>
			<?php
			} else { ?>
			<a class='ajax' href="login.php">Login </a> | <a class='ajax' href="registration.php">Register</a>
			<?php  } ?>
		    </div>
		</div>
		<header>
			<a href="/" title="Go to Homepage"><strong>Tata Elxsi</strong></a>
		</header>
		<div style="background: -webkit-gradient(radial, 430 50, 0, 430 50, 492, from(#0098CC), to(#fff));height: 20px; margin-bottom: 8px;border-radius: 10px;">
			<marquee behavior="scroll" direction="left" scrollamount="4" width="940"><p>Tata Elxsi Schedule Manager << Tata Elxsi Portal Development << Tata Elxsi Multi-Party WebConference</p></marquee>
		</div>
		<div id="b">
			<!--Return Messages Strat-->
			<?php     
			if(isset($_REQUEST['q'])|| isset($_REQUEST['res'])|| isset($_REQUEST['mstatus'])) { ?>
				<!--div class="alert_msg" id="alert_msg"-->
					<section class="rw-wrapper">
						<h2 class="rw-sentence"> 
							<div class="rw-words rw-words-1">
								<?php 
								if(isset($_REQUEST['q']))
								{  
									if($_REQUEST['q']=="wrg")
									{ 
										$remin=3-$_REQUEST['cnt'];
										if($remin!=0){
											/*for($i=0;$i<4;$i++){
												echo '<span>You have only '.$remin.' chance to provide correct login credentials.</span>'; 
											}*/ ?>
										<script type="text/JavaScript">
										 jkAlert("You have only  <?php echo $remin; ?> chance to provide correct login credentials.");
										</script>
										<?php } else { 
											/*for($i=0;$i<4;$i++){
												echo '<span>You account has been locked please contact admin for account activation.</span>'; 
											}*/ ?>
										<script type="text/JavaScript">
										 jkAlert("You account has been locked please contact admin for account activation.");
										</script>
										<?php }
										?>
										<script type="text/JavaScript">
										/*setTimeout(function(){
										document.getElementById('alert_msg').style.display="none";}, 5000);*/
										</script>
										<?php
									} 
									else if($_REQUEST['q']=="suc") 
									{
										/*for($i=0;$i<4;$i++){
											echo '<span>Updated Successfully.</span>';
										}*/
										?>
										<script type="text/JavaScript">
										 jkAlert("Updated Successfully.");
										/*setTimeout(function(){
										document.getElementById('alert_msg').style.display="none";}, 5000);*/
										</script>
										<?php
									} 
									else	
									{
										/*for($i=0;$i<4;$i++){
											echo '<span>Please Provide Valid Credential.</span>'; 
										}*/ 
										?>
										<script type="text/JavaScript">
										jkAlert("Please Provide Valid Credential.");
										/*setTimeout(function(){
										document.getElementById('alert_msg').style.display="none";}, 5000);*/
										</script>
										<?php										
									}
								} 
								if(isset($_REQUEST['res']))
								{ 
									if($_REQUEST['res']=="sus")
										{ 
											/*for($i=0;$i<4;$i++){
												echo '<span>Registration done Successfully, the activation link sent to your email. Please activte before login.</span>';
											}*/ 
											?>
										<script type="text/JavaScript">
										jkAlert("Registration done Successfully, the activation link sent to your email. Please activte before login.");
										/*setTimeout(function(){
										document.getElementById('alert_msg').style.display="none";}, 5000);*/
										</script>
										<?php
										}
								}
								if(isset($_REQUEST['mstatus']))
								{  
									if($_REQUEST['mstatus']=="active")
									{   
										
										$cuserid=$_REQUEST['usrid'];
	   									$queryupd=mysql_query("UPDATE `sm_user_registor` SET user_status=1 WHERE id=$cuserid") or mysql_error();
	
										if($queryupd)
										{ ?>
										<script type="text/JavaScript">
										jkAlert("Account Activate Successfully. Please login by valide Username & password.");
										</script>
										<?php }
										
									}	
								}
								?>
							</div>
						</h2>
					</section>
				<!--/div--> <?php } ?>
			<!--Return Messages End-->	
			
			<!--Leftside bar Strat-->
			<nav>
	  		<h4>Main Menu</h4>
				<div class="">
					<?php if(isset($_SESSION['username'])) { ?>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#" onClick="user_profile();">User Profile</a></li>
						<li><a href="#" onClick="friends_list();">Friends List</a></li>
						<li><a href="#" onClick="list_group();">List Groups</a></li>
						<li><a href="#" onClick="schedule_manager();">Meeting Scheduler</a></li>
						<li><a href="#" onClick="mom_list();">Minutes of Meeting</a></li>
						<li><a class='ajax' href="logout.php"> Logout </a></li>
					</ul>
					<?php } else { ?>
					<ul>
						<li><a class='ajax' href="login.php">Login </a></li>
						<li><a class='ajax' href="registration.php">Register</a></li>
					</ul>
					<?php } ?>
					<h4>What\'s new?</h4>
					<div class="c">
						<script type="text/javascript">
								var delay = 2000; //set delay between message change (in miliseconds)
								var maxsteps=30; // number of steps to take to change from start color to endcolor
								var stepdelay=40; // time in miliseconds of a single step
								//**Note: maxsteps*stepdelay will be total time in miliseconds of fading effect
								var startcolor= new Array(255,255,255); // start color (red, green, blue)
								var endcolor=new Array(0,0,0); // end color (red, green, blue)

								var fcontent=new Array();
								begintag='<div style="font: 12px/22px Verdana, sans-serif; padding: 5px;">'; //set opening tag, such as font declarations
								fcontent[0]="Tata Elxsi Schedule Manager !!<br><br> <a href='#'>Click here to visit</a>";
								fcontent[1]="Tata Elxsi Portal Development !! <br><br> <a href='#'>Click here to visit</a>";
								fcontent[2]="Tata Elxsi Multi-Party WebConference !!<br><br></a> <a href='#'>Click here to visit</a>";
								closetag='</div>';

								var fwidth='150px'; //set scroller width
								var fheight='150px'; //set scroller height

								var fadelinks=1;  //should links inside scroller content also fade like text? 0 for no, 1 for yes.

								///No need to edit below this line/////////////////


								var ie4=document.all&&!document.getElementById;
								var DOM2=document.getElementById;
								var faderdelay=0;
								var index=0;


								/*Rafael Raposo edited function*/
								//function to change content
								function changecontent(){
								if (index>=fcontent.length)
								index=0
								if (DOM2){
									document.getElementById("fscroller").style.color="rgb("+startcolor[0]+", "+startcolor[1]+", "+startcolor[2]+")"
									document.getElementById("fscroller").innerHTML=begintag+fcontent[index]+closetag
									if (fadelinks)
									linkcolorchange(1);
									colorfade(1, 15);
								}
								else if (ie4)
									document.all.fscroller.innerHTML=begintag+fcontent[index]+closetag;
									index++
								}

								// colorfade() partially by Marcio Galli for Netscape Communications.  ////////////
								// Modified by Dynamicdrive.com

								function linkcolorchange(step){
									var obj=document.getElementById("fscroller").getElementsByTagName("A");
									if (obj.length>0){
										for (i=0;i<obj.length;i++)
										obj[i].style.color=getstepcolor(step);
									}
								}

								/*Rafael Raposo edited function*/
								var fadecounter;
								function colorfade(step) {
									if(step<=maxsteps) {	
										document.getElementById("fscroller").style.color=getstepcolor(step);
										if (fadelinks)
										linkcolorchange(step);
										step++;
										fadecounter=setTimeout("colorfade("+step+")",stepdelay);
									}else{
										clearTimeout(fadecounter);
										document.getElementById("fscroller").style.color="rgb("+endcolor[0]+", "+endcolor[1]+", "+endcolor[2]+")";
										setTimeout("changecontent()", delay);
									}   
								}

								/*Rafael Raposo's new function*/
								function getstepcolor(step) {
								var diff
								var newcolor=new Array(3);
									for(var i=0;i<3;i++) {
									diff = (startcolor[i]-endcolor[i]);
									if(diff > 0) {
										newcolor[i] = startcolor[i]-(Math.round((diff/maxsteps))*step);
									} else {
										newcolor[i] = startcolor[i]+(Math.round((Math.abs(diff)/maxsteps))*step);
									}
								}
								return ("rgb(" + newcolor[0] + ", " + newcolor[1] + ", " + newcolor[2] + ")");
								}

								if (ie4||DOM2)
								document.write('<div id="fscroller" style="width:'+fwidth+';height:'+fheight+'"></div>');

								if (window.addEventListener)
									window.addEventListener("load", changecontent, false)
								else if (window.attachEvent)
									window.attachEvent("onload", changecontent)
								else if (document.getElementById)
									window.onload=changecontent
						</script>
					</div>
					<h4>Wheather</h4>
					<div class="c">
						<div id="wx_module_3205" style="padding:10px">
							<a href="http://www.weather.com/weather/local/INXX0012">Bangalore Weather Forecast, India</a>
						</div>

						<script type="text/javascript">
							/* Locations can be edited manually by updating 'wx_locID' below.  Please also update */
							/* the location name and link in the above div (wx_module) to reflect any changes made. */
							var wx_locID = 'INXX0012';
							/* If you are editing locations manually and are adding multiple modules to one page, each */
							/* module must have a unique div id.  Please append a unique # to the div above, as well */
							/* as the one referenced just below.  If you use the builder to create individual modules  */
							/* you will not need to edit these parameters. */
							var wx_targetDiv = 'wx_module_3205';
							/* Please do not change the configuration value [wx_config] manually - your module */
							/* will no longer function if you do.  If at any time you wish to modify this */
							/* configuration please use the graphical configuration tool found at */
							/* https://registration.weather.com/ursa/wow/step2 */
							var wx_config='SZ=160x600*WX=FHW*LNK=SSNL*UNT=F*BGI=fall*MAP=india_|null*DN=test*TIER=0*PID=1330362865*MD5=89e4768dd42ff0602c0c68f6b4c2fdfa';
							document.write('<scr'+'ipt src="'+document.location.protocol+'//wow.weather.com/weather/wow/module/'+wx_locID+'?config='+wx_config+'&proto='+document.location.protocol+'&target='+wx_targetDiv+'"></scr'+'ipt>');  
						</script>
					</div>
					<div id="pulse"></div>
				</nav>
				<!--Leftside Bar Strat-->

    			<!--Middle Part Strat-->
				<div id="middel_part">
					<article >
						<h1>Latest News</h1>
							<!-- start sw-rss-feed code --> 
								<script type="text/javascript"> 
									<!-- 
									rssfeed_url = new Array(); 
									rssfeed_url[0]="http://www.surfing-waves.com/newsrss.xml";  
									rssfeed_frame_width="485"; 
									rssfeed_frame_height="340"; 
									rssfeed_scroll="on"; 
									rssfeed_scroll_step="6"; 
									rssfeed_scroll_bar="off"; 
									rssfeed_target="_blank"; 
									rssfeed_font_size="12"; 
									rssfeed_font_face=""; 
									rssfeed_border="on"; 
									rssfeed_css_url=""; 
									rssfeed_title="on"; 
									rssfeed_title_name=""; 
									rssfeed_title_bgcolor="#99999f"; 
									rssfeed_title_color="#fff"; 
									rssfeed_title_bgimage="http://"; 
									rssfeed_footer="off"; 
									rssfeed_footer_name="rss feed"; 
									rssfeed_footer_bgcolor="#fff"; 
									rssfeed_footer_color="#333"; 
									rssfeed_footer_bgimage="http://"; 
									rssfeed_item_title_length="50"; 
									rssfeed_item_title_color="#666"; 
									rssfeed_item_bgcolor="#fff"; 
									rssfeed_item_bgimage="http://"; 
									rssfeed_item_border_bottom="on"; 
									rssfeed_item_source_icon="off"; 
									rssfeed_item_date="off"; 
									rssfeed_item_description="on"; 
									rssfeed_item_description_length="120"; 
									rssfeed_item_description_color="#666"; 
									rssfeed_item_description_link_color="#333"; 
									rssfeed_item_description_tag="off"; 
									rssfeed_no_items="0"; 
									rssfeed_cache = "b25b7b2f6ddd2f2f794d8ab1ad1e7889"; 
									//--> 
								</script> 
								<script type="text/javascript" src="http://feed.surfing-waves.com/js/rss-feed.js"></script> 
							<div style="height:15px;">&nbsp;</div>
							<!-- End sw-rss-feed code --> 

							<h3>About Tata Elxsi</h3>
							<p>	Seamlessly integrating precision and ingenuity, Tata Elxsi's abilities stem from our creative leadership in hard-core technology and strength in design. Augmenting these capabilities is our expertise across our practice areas to provide point services and end-to-end solutions across the product lifecycle. </p>
							<p>
							From Automotive to Aerospace, Enterprise to Consumer Electronics, Entertainment to FMCG, Media to Storage, Semicon to Telecom, we provide customized design solutions to companies across the globe. We ensure cost-effective, time-to-market solutions through a highly motivated skilled workforce driven by strong design principles, highest levels of quality and ethical business practices.</p>

							<p>Touching people's lives in myriad ways, Tata Elxsi's solutions can impact directly or subtly, leaving a mark of excellence in its wake.</p>
							
							<h3>Value Statement:</h3>

							<p>Engineering creativity with the best of breed technology, Tata Elxsi will strive to deliver solutions high on innovation, all the time conscious of quality, time and cost and most of all designed according to your needs.</p>
                            <img src="images/main_pds.gif"> <br>
                            <br><br><br><p>Designing technology products including hardware / software across the product lifecycle<p>
							<img src="images/main_des.gif"> <br>
                             <br><br><br><p> Providing integrated styling and mechanical design solutions to give shape to products<p>
							<img src="images/main_vcl.gif"> <br>
                             <br><br><br><p>Creating compelling digital content for the entertainment industry</p>
							<img src="images/main_sis.gif"> <br>
                             <br><br><br><p> Enabling the setting up of world class design environments by assimilating resources, implementing complex design solutions and architecting total integrated solutions.</p>
						
					</article>
					<!--Middle Part End-->
					<!--Right SideBar Start-->
					<aside>
							<h4>Search</h4>
								<form action="#" class="s">
									<input name="search" type="text" value="Type term and hit enter...">
								</form>
							<h4>Feature</h4>
								<div class="c">
									<p>Android Smartphone Development</p>
									<p>Taking Connected TV to the next level for Smart TV</p>
								</div>
							<h4>Sample Gallery</h4>
								<ul class="gallery">
									<li><a href="images/in_pictures_1.jpg" class="group1"><img src="images/in_pictures_1.jpg" alt="#" height="50px" width="50px;"/></a></li>
									<li><a href="images/in_pictures_2.jpg" class="group1"><img src="images/in_pictures_2.jpg" alt="#" height="50px" width="50px;"/></a></li>
									<li><a href="images/in_pictures_3.jpg" class="group1"><img src="images/in_pictures_3.jpg" alt="#" height="50px" width="50px;"/></a></li>
								</ul>
								<ul class="gallery">
									<li><a href="images/in_pictures_4.jpg" class="group1"><img src="images/in_pictures_4.jpg" alt="#" height="50px" width="50px;"/></a></li>
									<li><a href="images/in_pictures_5.jpg" class="group1"><img src="images/in_pictures_5.jpg" alt="#" height="50px" width="50px;"/></a></li>
									<li><a href="images/in_pictures_6.jpg" class="group1"><img src="images/in_pictures_6.jpg" alt="#" height="50px" width="50px;"/></a></li>
								</ul>
							<h4>Clients</h4> 
								<!--div style="margin:20px;"> 
									<a href="http://tataelxsi.com/" rel="me"><img src="images/h_Android.gif" alt="Tata Elxsi" title="Android app" height="150px;" width="150px;"/></a> 
								</div-->
								<div class="c">
									<div id="myGallery" class="spacegallery">
										<img src="images/SAE-2012.jpg" alt="gallery" />
										<img src="images/h_Android.gif" alt="gallery" />
										<img src="images/FTF-2012.JPG" alt="gallery" />
										<img src="images/SAE-2012.jpg" alt="gallery" />
										<img src="images/h_smarttv.gif" alt="gallery" />
										<img src="images/h_Android.gif" alt="gallery" />
									</div>
							    </div>
							
						
					</aside>
				<!--Right SideBar End-->
				</div>
			</div>
			<!--Footer Part Strat-->
			<footer style="text-align:center;">
				<p ><a href="http://tataelxsi.com/" title="Tata Elxsi">copyright@tataelxsi.in</p>
			</footer>
			<!--Footer Part End-->
		</div>
	</div>
</body>	
</html>
