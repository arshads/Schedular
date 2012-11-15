<?php
session_start();
session_destroy();

if(count($_SESSION) != 0)
{
	 $_SESSION=array();
	 
	echo "<div style='width:200px; height:100px;padding-top:50px; padding-left:50px; font-size:15px; font-weight:bold;'>logout Successfully</div>";
	//header("Location:index.php?res=lout");
	?>
	<script type="text/JavaScript">
    setTimeout("location.href = '/scheduler/index.php';", 2000);
    </script>
<?php } 

//else {
 // header("Location:index.php?res=lout");
//}
//header("Location:index.php?res=lout");
?>
