
<?php include ('authentication.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>One Cart Shopping</title>
    
  </head>
  <body>
      <div class="container">
      <div class="header">
      <h2>Log In </h2>
      </div>
      <form action="login.php" method="post">
      <div>
      <label for="Email">Email:</label>
      <input type="text" name="email" required></div>
     
      <div>
      <label for="password">Password:</label>
      <input type="password" name="password_1" required></div>
     
      <button type="submit" name="login_user">Log in</button>
      
      <p>Not Registered?<a href="index.php"><b>Register Here </b></a></p>
      
      <p>forgot password?<a href="forgetpassword.php"><b>Forget password</b></a></p>
      </form>
      </div>
  </body>

  </html>