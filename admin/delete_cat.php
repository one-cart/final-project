<?php
    include("include/adminfunction.php");

    if(isset($_GET['delete_cat'])){
        echo delete_cat();
    }

    if(isset($_GET['delete_pro'])){  //v21
        echo delete_product();
    }

    if(isset($_GET['delete_manager'])){
        echo delete_manager();
    }

    if(isset($_GET['delete_deliver'])){
        echo delete_deliver();
    }
?>
