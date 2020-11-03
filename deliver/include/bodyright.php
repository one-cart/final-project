<?php
      if(!isset($_GET['viewall_products'])){
      if(!isset($_GET['view_order'])){
      if(!isset($_GET['add_status'])){
      if(!isset($_GET['view_status'])){
      // if(!isset($_GET['view_deliverstatus'])){
?>

<div id="bodyright">
    <?php
        if(isset($_GET['edit_status'])){
            include("edit_status.php");
        }
     ?>
</div>

<?php
} } } }
//}
?>
