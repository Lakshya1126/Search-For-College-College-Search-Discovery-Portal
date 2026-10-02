<?php 

session 

_ 

start(); 

// Hardcoded admin credentials (for demo only) 

$admin 

username = "admin"; 

_ 

$admin 

_password = "admin123"; 

// Collect input 

$username = $ 

_ 

$password = $ 

_ 

POST['username'] ?? ''; 

POST['password'] ?? ''; 

if ($username === $admin 

_ 

username && $password === $admin 

_password) { 

$ 

_ 

SESSION['admin 

_ 

logged 

_ 

in'] = true; 

header("Location: dashboard.php"); // redirect to admin dashboard 

exit; 

} else { 

echo "<script>alert('Invalid admin credentials!'); 

window.location.href='login.html';</script>"; 

} 

?> 
