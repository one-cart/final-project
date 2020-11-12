<?php
    include("include/function.php");

    if(isset($_GET['delete_cat'])){
        echo delete_cat();
    }

    if(isset($_GET['delete_pro'])){  //v21
        echo delete_product();
    }

    if(isset($_GET['delete_deliver'])){ 
        echo delete_deliver();
    }
?>
