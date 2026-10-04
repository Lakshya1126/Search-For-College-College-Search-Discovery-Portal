<?php 

session_start(); 

if (!isset($_SESSION['admin_logged_in'])) { 

header("Location: login.html"); 

exit; 

} 

?> 

<!DOCTYPE html> 

<html lang="en"> 

<head> 

<meta charset="UTF-8"> 

<title>Admin Dashboard - College Portal</title> 

<style> 

body { 

margin: 0; 

padding: 0; 

font-family: 'Segoe UI' 

, Tahoma, Geneva, Verdana, sans-serif; 

background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)), 

url('https://duexpress.in/wp-content/uploads/2016/05/1444820497_nz8sIsBoQ9ysUcUQq7jF-1024x683.jpg') no-repeat center center/cover; 

color: #fff; 

} 

.dashboard { 

max-width: 1000px; 

margin: 40px auto; 

padding: 30px; 

background-color: rgba(0, 0, 0, 0.75); 

border-radius: 15px; 

box-shadow: 0 0 20px rgba(255,255,255,0.1); 

} 

h1 { 

text-align: center; 

margin-bottom: 30px; 

} 

.services { 

display: grid; 

grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); 

gap: 20px; 

} 

.card { 

background-color: #1e272e; 

border-radius: 12px; 

padding: 20px; 

text-align: center; 

transition: all 0.3s; 

cursor: pointer; 

} 

.card:hover { 

background-color: #485460; 

} 

.card h3 { 

margin-bottom: 10px; 

color: #00cec9; 

} 

.card p { 

font-size: 14px; 

color: #dcdde1; 

} 

.logout { 

margin-top: 30px; 

text-align: center; 

} 

.logout a { 

color: #ff7675; 

text-decoration: none; 

font-weight: bold; 

} 

.logout a:hover { 

text-decoration: underline; 

} 

</style> 

</head> 

<body> 

<div class="dashboard"> 

<h1>Welcome, Admin!</h1> 

<div class="services"> 

<div class="card" onclick="location.href='add-college.php';"> 

<h3>Add College</h3> 

<p>Insert a new college with full details into the database.</p> 

</div> 

<div class="card" onclick="location.href='delete-college.php';"> 

<h3>Delete College</h3> 

<p>Remove a college permanently from the system.</p> 

</div> 

<div class="card" onclick="location.href='update-college.php';"> 

<h3>Update College</h3> 

<p>Edit existing college information.</p> 

</div> 

</div> 

<div class="logout"> 

<p><a href="logout.php">Logout</a></p> 

</div> 

</div> 

</body> 

</html> 
