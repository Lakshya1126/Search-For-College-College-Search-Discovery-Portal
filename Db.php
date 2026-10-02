<?php 

$host = "localhost"; 

$user = "root"; 

$password = ""; 

$database = "college 

db"; 

_ 

$conn = new mysqli($host, $user, $password, $database); 

if ($conn->connect 

_ 

error) { 

die("Connection failed: " 

. $conn->connect 

_ 

error); 

} 

?> 
