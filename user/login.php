<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Cart Shopping</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@600&display=swap" rel="stylesheet">


</head>
<body>
<?php
        include("include/userfunction.php");
        include("include/header1.php");
        ?>
        <div class="signin">
         <form align=center method="post" action="">
        
        
            <h2 align="center"> Log In</h2>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="pass" placeholder="Password" required><br><br>
            <button class="submit" name="save">Send </button><br><br>

            <div id="container">
            <a href="reset.php" style="margin-right:0px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;"> Reset password </a>
            <a href="forget.php" style="margin-left:30px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;"> Forgot password </a>
            </div><br><br><br><br>
            Don't have an account? <a href="signup.php" style="font-family:'Play, sans-serif;">&nbsp;Sign Up</a>
            </form>
        </div>
   
                <?php
        include("include/footer.php")
        ?>
</body>