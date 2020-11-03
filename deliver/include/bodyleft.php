    <div id="bodyleft">
        <h3>Content Management</h3>
        <!-- <img src="images/slider/1.1.jpg" alt=""> -->
        <ul>
            <li><a href="indexdeliver.php">Home</a></li>
            <li><a href="indexdeliver.php?viewall_products">View All Products</a></li>
            <th>.......................................</th>
            <li><a href="indexdeliver.php?view_order">View Orders</a></li>
            <th>.......................................</th>
            <li><a href="indexdeliver.php?add_status">Add Deliver Status</a></li>
            <li><a href="indexdeliver.php?view_status">View Deliver Status</a></li>
        </ul>
    </div>

    <?php
        if(isset($_GET['viewall_products'])){
            include("viewall_products.php");
        }


        if(isset($_GET['view_order'])){
            include("view_order.php");
        }


        if(isset($_GET['add_status'])){
            include("add_status.php");
        }

        if(isset($_GET['view_status'])){
            include("view_status.php");
        }
        // if(isset($_GET['view_deliverstatus'])){
        //     include("view_deliverstatus.php");
        // }
    ?>
