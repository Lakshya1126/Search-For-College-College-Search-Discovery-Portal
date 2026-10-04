<!DOCTYPE html> 

<html lang="en"> 

<head> 

<meta charset="UTF-8"> 

<title>Contact Us - CollegeDekho Pro</title> 

<style> 

body { 

margin: 0; 

font-family: Arial, sans-serif; 

background: url('https://images.unsplash.com/photo-1521791136064-7986c2920216') no- 

repeat center center fixed; 

background-size: cover; 

color: #fff; 

} 

.container { 

max-width: 600px; 

margin: 60px auto; 

padding: 30px; 

background: rgba(0,0,0,0.85); 

border-radius: 10px; 

} 

h2 { 

text-align: center; 

color: #00e676; 

margin-bottom: 30px; 

} 

label { 

display: block; 

margin: 15px 0 5px; 

} 

input, textarea { 

width: 100%; 

padding: 10px; 

margin-bottom: 15px; 

border-radius: 5px; 

border: none; 

} 

button { 

width: 100%; 

padding: 12px; 

background: #00e676; 

color: #000; 

font-weight: bold; 

border: none; 

border-radius: 5px; 

cursor: pointer; 

} 

button:hover { 

background: #00c566; 

} 

.success { 

text-align: center; 

padding: 10px; 

background: #2e7d32; 

34color: #fff; 

border-radius: 5px; 

margin-bottom: 15px; 

} 

</style> 

</head> 

<body> 

<div class="container"> 

<h2>Contact Us</h2> 

<?php 

if ($ 

_ 

SERVER['REQUEST 

_ 

METHOD'] === 'POST') { 

$name = htmlspecialchars($ 

_ 

POST['name']); 

$email = htmlspecialchars($ 

_ 

POST['email']); 

$subject = htmlspecialchars($ 

_ 

POST['subject']); 

$message = htmlspecialchars($ 

_ 

POST['message']); 

// You can email it (optional) 

/* 

$to = "your-email@example.com"; 

$headers = "From: $email\r\n"; 

mail($to, $subject, $message, $headers); 

*/ 

35// Or store in DB (optional) 

/* 

require 'db.php'; 

$stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message) VALUES 

(?, ?, ?, ?)"); 

$stmt->execute([$name, $email, $subject, $message]); 

*/ 

echo '<div class="success">Your message has been sent!</div>'; 

} 

?> 

<form method="POST" onsubmit="return validateForm();"> 

<label for="name">Your Name *</label> 

<input type="text" name="name" id="name" required> 

<label for="email">Your Email *</label> 

<input type="email" name="email" id="email" required> 

<label for="subject">Subject *</label> 

<input type="text" name="subject" id="subject" required> 

<label for="message">Message *</label> 

<textarea name="message" id="message" rows="6" required></textarea> 

36<button type="submit">Send Message</button> 

</form> 

</div> 

<script> 

function validateForm() { 

const email = document.getElementById('email').value; 

if (!email.includes('@')) { 

alert('Please enter a valid email. 

'); 

return false; 

} 

return true; 

} 

</script> 

</body> 

</html> 
