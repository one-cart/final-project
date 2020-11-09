<?php include ('authentication.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Cart Shopping</title>
    <link rel="stylesheet" href="user/css/style1.css">
    <link rel="stylesheet" href="user/css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@600&display=swap" rel="stylesheet">


</head>
<body>
<div class="container">
      <div class="header">
      <h2>Registration </h2>
      </div>
      <form action="index.php" method="post">
     <?php include('errors.php')?>
      <div>
      <label for="username">User Name:</label>
      <input type="text" name="username" required></div>
      <div>
      <label for="nic">NIC:</label>
      <input type="text" name="nic" required></div>
      <div>
      <label for="email">E-mail:</label>
      <input type="email" name="email" required></div>
      <div>
      <label for="city">City</label>
      <input type="text" name="city" required></div>
      <div>
      <label for="address">Address:</label>
      <input type="text" name="address" required></div>
      <div>
      <label for="postal">Postal Code:</label>
      <input type="text" name="postal" required></div>
      <div>
      <label for="phonenumber">Phone Number:</label>
      <input type="text" name="phonenumber" required></div>
      <div>
      <label for="password">Password:</label>
      <input type="password" name="password_1" required></div>
      <div>
      <label for="password">Confirm password:</label>
      <input type="password" name="password_2" required></div>
      <button type="submit" name="reg_user">Submit</button>
      
      <p>Already registered?<a href="login.php"><b>Log in</b></a></p>
      <div class="or"><h4>OR</h4></div>
      <p>Visit as a guest?<a href="user/firstpage.php"><b>Visit</b></a></p>
      </form>
      </div>
   
    
</body>
</html>