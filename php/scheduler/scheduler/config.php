<?php

     /**  MySql Database Connection **/
	 
      $host="localhost";
	  $root="root";
	  $password="";
	  $database="scheduler";
	  $con=mysql_connect($host,$root,$password);
	  
	  if(!$con){
	     
	    die("Mysql Not Connect");
	  } 
	  
	  $sel=mysql_select_db("$database",$con);
	  
	  if(!$sel){
	     die("DB Not selected");
	  } 
	  $pagenation=3;
?>
