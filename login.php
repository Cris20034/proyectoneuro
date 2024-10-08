<?php
// login.php

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./neuro/images/favicon-32x32.png" type="image/x-icon">
</head>

<body class="bodylog">
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <img src="./neuro/images/contrasena.png" alt="User Icon" class="user-icon">
            </div>
            <form action="/index.js"POST">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email ID" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="options">
                  
                </div>
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
        </div>
    </div>
    <style>
        /* General Styles */
body {
  margin: 0;
  padding: 0;
  font-family: 'Arial', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(45deg, rgba(139, 49, 190, 0.9), rgba(8, 38, 77, 0.9), rgba(12, 209, 209, 0.9));
}

/* Login Box */
.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.login-box {
  background-color: rgba(255, 255, 255, 0.2);
  padding: 40px;
  border-radius: 15px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
  backdrop-filter: blur(8.5px);
  -webkit-backdrop-filter: blur(8.5px);
  width: 300px;
  text-align: center;
}

/* Header with Icon */
.login-header {
  margin-bottom: 20px;
}

.user-icon {
  width: 80px;
  border-radius: 50%;
  background-color: rgba(255, 255, 255, 0.2);
  padding: 10px;
}

/* Input Styles */
.input-group {
  margin-bottom: 15px;
}

.input-group input {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid rgba(255, 255, 255, 0);
  background: rgba(255, 255, 255, 0.5);
  color: white;
  outline: none;
  font-size: 14px;
}

/* Options */
.options {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.options a {
  color: rgba(10, 5, 5, 0.7);
  font-size: 12px;
  text-decoration: none;
}

.options a:hover {
  text-decoration: underline;
}

/* Button */
.login-btn {
  width: 100%;
  padding: 10px;
  background-color: #d136aa;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
  transition: background-color 0.3s;
}

.login-btn:hover {
  background-color: #13b6d3;
}

    </style>
</html>