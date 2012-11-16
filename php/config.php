<?php

     /**  MySql Database Connection **/
	 
      $host="https://myappschedular-elxsicloud.rhcloud.com/phpmyadmin/";
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
