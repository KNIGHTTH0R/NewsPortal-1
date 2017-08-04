<?php

$host="localhost";
$user="root";
$pass="";
$database="news_portal";
$link=mysqli_connect($host,$user,$pass);
if(!$link)
	die("connection failed");
$db=mysqli_select_db($link,$database);
if(!$db)
	die("invalid database");

