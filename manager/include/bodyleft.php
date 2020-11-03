    <div id="bodyleft">
        <h3>Content Management</h3>
        <!-- <img src="images/slider/1.1.jpg" alt=""> -->
        <ul>
            <li><a href="indexmanager.php">Home</a></li>
            <li><a href="indexmanager.php?viewall_cat">View All Categories</a></li>
            <li><a href="indexmanager.php?add_product">ADD New Products</a></li>
            <li><a href="indexmanager.php?viewall_products">View All Products</a></li>
            <th>.......................................</th>
            <li><a href="indexmanager.php?view_order">View Orders</a></li>
            <th>.......................................</th>
            <li><a href="indexmanager.php?add_deliver">Add New Delivery Person</a></li>
            <li><a href="indexmanager.php?view_deliver">View Delivery Person</a></li>
            <th>.......................................</th>
            <li><a href="indexmanager.php?view_deliverstatus">View Deliver Information</a></li>
        </ul>
    </div>

    <?php
        if(isset($_GET['viewall_cat'])){
            include("cat.php");
        }
        if(isset($_GET['add_product'])){
            include("add_product.php");
        }
        if(isset($_GET['viewall_products'])){
            include("viewall_products.php");
        }
        if(isset($_GET['view_order'])){
            include("view_order.php");
        }
        if(isset($_GET['add_deliver'])){
            include("add_deliver.php");
        }
        if(isset($_GET['view_deliver'])){
            include("view_deliver.php");
        }
        // if(isset($_GET['view_deliverstatus'])){
        //     include("view_deliverstatus.php");
        // }
    ?>
