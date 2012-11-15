<?php session_start(); 
 include("config.php");
 $username=$_SESSION['username'];
	/* if(count($_SESSION) == 0)
	 {
	   header("Location:index.php");
	 }*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link media="screen" rel="stylesheet" href="css/style.css">
		<link href="css/mobiscroll-2.0.3.custom.min.css" rel="stylesheet" type="text/css" />
		<link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
		<script src="js/mobiscroll-2.0.3.custom.min.js" type="text/javascript"></script>
		<script src="js/jquery.alerts.js" type="text/javascript"></script>
		<!-- Validation Start here-->
		<script type="text/javascript">
		function validate_from()
		{
		  var toad=document.getElementById('sch_toadd').value;
		  var grp=document.getElementById('sch_group_list').value;
		  var subj=document.getElementById('sch_subject').value;
		  var loca=document.getElementById('sch_location').value;
		  var metdate=document.getElementById('sch_meet_date').value;
		  var curdate=new Date(document.getElementById('sch_cur_date').value);
		  var sttime=document.getElementById('start_time').value;
		  var edtime=document.getElementById('end_time').value;
		  var exsttime= sttime.slice(0, -3);
		  var exedtime= edtime.slice(0, -3);
		  var editorcontent = CKEDITOR.instances['sch_message'].getData().replace(/<[^>]*>/gi, '');
		
		  if((toad=="") && (grp==0))
		  {
			 jkAlert('Please Provide Email Id or Select User Group', 'Alert Dialog');
			 document.getElementById('sch_toadd').focus();
			 return false;
		  }
		  if(subj=="")
		  {
		     jkAlert('Please Provide the Subject', 'Alert Dialog');
			 document.getElementById('sch_subject').focus();
			 return false;
		  }
		  if(loca=="")
		  {
		     jkAlert('Please Provide the Location', 'Alert Dialog');
			 document.getElementById('sch_location').focus();
			 return false;
		  }
		  if(metdate=="")
		  {
		     jkAlert('Please Provide the Meeting date', 'Alert Dialog');
			 return false;
			
		  }
		  if(sttime=="")
		  {
		     jkAlert('Please Provide the Meeting Start Time', 'Alert Dialog');
			 return false;
		  }
		  if(edtime=="")
		  {
		     jkAlert('Please Provide the Meeting End Time', 'Alert Dialog');
			 return false;
		  }
		  var meetdate=new Date(metdate);
		  if(curdate > meetdate) {
		     jkAlert('Can not able to schedule previous day', 'Alert Dialog');
			 return false;
		  }
          if(exsttime > exedtime) 
		  {
		     jkAlert("Meeting end time should be greater then strat time");
			 return false;
		  }
		  /*var mschdule;
		  $.ajax({
			type: "POST",
			url: "schedule_process.php",
    		data: { task:mschdule, sch_subject: subj, sch_location: loca }
			}).done(function( msg ) {
			alert("ok");
			alert(msg);
			//document.getElementById("middel_part").innerHTML =msg;
			});*/
			
			document.getElementById('loding').style.display="block";
		}
		
		</script>
	</head>
	<body>
		<div style="position:absolute; top:250px; left:380px; display:none;" id="loding"><img src="images/loading.gif" ></div>
		<form name="schedule" action="process.php?task=mschdule" method="post" onSubmit="return validate_from()" >
			<div class="process_box">
				<div class="reg_head" > Schedule Manager </div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">To</div>
					<div style="width:450px; float:left;"><input type="text" name="sch_toadd" id="sch_toadd" size="80"  ></div> 
				</div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">Group List</div>
					<div style="width:450px; float:left;">
					<select name="sch_group_list" id="sch_group_list" >
						<option value="0">No Groups Selected</option>
						<?php 
						$querygrp=mysql_query("SELECT `user_email`,`group_name` FROM `sm_user_group` WHERE created_by='$username' AND group_status=1");
						while($selectgrp= mysql_fetch_array($querygrp)) 
						{ ?>
						<option value="<?php echo $selectgrp['user_email']; ?>"><?php echo $selectgrp['group_name']; ?></option>
						<?php  } ?>
					</select>
					</div> 
				</div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">Subject</div>
					<div style="width:450px; float:left;"><input type="text" name="sch_subject" id="sch_subject" size="80"  ></div> 
				</div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">Location</div>
					<div style="width:450px; float:left;"><input type="text" name="sch_location" id="sch_location" size="50"  ></div> 
				</div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">Meeting Date</div>
					<div style="width:450px; float:left;">
						<script type="text/javascript">
							$(function(){
								$('#sch_meet_date').scroller({
								preset: 'date',
								/*invalid: { daysOfWeek: [0, 6], daysOfMonth: ['5/1', '12/24', '12/25'] },*/
								theme: 'sense-ui',
								display: 'modal',
								mode: 'mixed',
								dateOrder: 'mmD ddyy',
								
								});    
							}); 
						</script>
						<input type="date" name="sch_meet_date" id="sch_meet_date"   >
						<input type="text" name="sch_cur_date" id="sch_cur_date"  value="<?php echo date("m/d/Y"); ?>" style="display:none;" >
					</div> 
				</div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">Start Time</div>
					<div style="width:50px; float:left;">                         
						<script type="text/javascript">
							$(function(){
								$('#start_time').scroller({
								preset: 'time',
								theme: 'sense-ui',
								display: 'modal',
								mode: 'mixed',
								timeFormat:'HH:ii:ss A'
								});    
							});
						</script>
						<input type="text" id="start_time" name="start_time"  />
					</div> 
				</div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">End Time</div>
					<div style="width:50px; float:left;">                         
						<script type="text/javascript">
							$(function(){
								$('#end_time').scroller({
								preset: 'time',
								theme: 'sense-ui',
								display: 'modal',
								mode: 'mixed',
								timeFormat:'HH:ii:ss A'
								});    
							});
						</script>
						<input type="text" id="end_time" name="end_time"   />
					</div> 
				</div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">Reminder</div>
					<div style="width:200px; float:left;">  <!--select name="mail_reminder">
															<option value="0">No Reminder</option>
															<option value="1">One Day Before</option>
															<option value="2">Two Day Before</option>
															<option value="3">Three Day Before</option>
															<option value="4">Four Day Before</option>
															<option value="5">Five Day Before</option>
															</select--> 
															 <select name="mail_reminder">
															<option value="0">No Reminder</option>
															<option value="30">30 Minutes Before</option>
															<option value="60">1 Hour Before</option>
															<option value="120">2 Hour Before</option>
															<option value="180">3 Hour Before</option>
															<option value="240">4 Hour Before</option>
															<option value="300">5 Hour Before</option>
															</select> 
				   	</div> 
				</div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">Message</div>
						<div style="width:450px; float:left;">
						<!--textarea cols="61" id="sch_message" name="sch_message" rows="5"></textarea-->
							<?php
							// Include the CKEditor class.
							include_once "ckeditor/ckeditor.php";
							// The initial value to be displayed in the editor.
							$initialValue = '<p>This is some <strong>sample text</strong>.</p>';
							// Create a class instance.
							$CKEditor = new CKEditor();
							// Path to the CKEditor directory, ideally use an absolute path instead of a relative dir.
							//$CKEditor->basePath = '/ckeditor/'
							// If not set, CKEditor will try to detect the correct path.
							$CKEditor->basePath = '';
							// Set global configuration (will be used by all instances of CKEditor).
							$CKEditor->config['width'] = 570;
							// Configuration that will only be used by the second editor.
							$config['toolbar'] = array(
							array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ,'Subscript','Superscript','-','RemoveFormat'),
							array( 'Link', 'Unlink', 'Anchor' )
							/*array( 'Styles','Format','Font','FontSize' )*/
							);
							// Create a textarea element and attach CKEditor to it.
							$CKEditor->editor("sch_message", $initialValue, $config);
							?>  
						</div>
				</div>
				<div style="width:600px; float:left; padding-bottom:10px;">
					<div style="width:120px; float:left; padding-left:30px;">&nbsp;</div>
					<div style="width:450px; float:left;"><input type="submit" value="send" ><input type="reset" value="cancel"></div>
				</div>
			</div>
		</form>
	</body>
</html>
