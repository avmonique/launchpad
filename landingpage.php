<!-- SA FINAL NA PO TO SIR HEHE -->


<?php
require "config.php";

if (!empty($_SESSION["email"])) {
    if ($_SESSION["user_type"] === "teacher") {
        header("Location: teacher-dashboard.php");
    } elseif ($_SESSION["user_type"] === "student") {
        header("Location: index.php");
    }
    exit(); 
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Launchpad</title>
		<link rel="icon" href="/launchpad/images/favicon.svg" />
        <link rel="stylesheet" href="css/login.css">
        <style>
            div, a{
                background-color: #006BB9;
                padding: 10px 20px;
                text-decoration: none;
                color: white;
                border-radius: 30px;
                font-weight: 700;
            }
            .loginnn{
                background-color: transparent;
                border: 2px solid;
                border-color: #006BB9;

            }
            .loginn{
                background-color: transparent;
                color: #006BB9;
                font-weight: 700;

            }
        </style>
</head>
<body>
    <h1>(LANDING PAGE)</h1>
        <a href="login.php" class="loginnn"><div class="loginn">LOGIN</div></a>
        <a href="registration.php"><div>JOIN</div></a>
    
</body>
</html>