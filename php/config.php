<?php

     /**  MySql Database Connection **/
	 
      $host="127.11.30.1:3306";
	  $user="admin";
	  $password="XctxxRN33L3R";
	  $database="myappsschedular";
	  $con=mysql_connect($host,$user,$password);
	  
	  if(!$con){
	     
	    die("Mysql Not Connected");
	  } 
	  
	  $sel=mysql_select_db("$database",$con);
	  
	  if(!$sel){
	     die("DB Not selected");
	  } 
	  $pagenation=3;
?>
