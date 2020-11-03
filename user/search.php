<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>One Cart Shopping</title>
      <link rel="stylesheet" href="css/style1.css">
      <link rel="stylesheet" href="css/style2.css">
  </head>
  <body>

      <?php
          include("include/userfunction.php");
          include("include/header.php");
          include("include/navbar1.php");
          // include("include/bodyleft.php");
          echo search();
          include("include/bodyright.php");
          include("include/footer.php");
       ?>

  </body>
</html>
