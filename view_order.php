<div class="scroll" id="bodyright">
    <h3>View All Orders From Here</h3>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <!-- <th>No.</th> -->
                <th>Order ID</th>     <!--increment---->
                <th>User ID</th>      <!--user---->
                <th>cart ID</th>      <!--cart---->
                <th>Product ID</th>   <!--products---->
                <th>Product Name</th> <!--products---->
                <th>Image</th>        <!--products---->
                <th>Weight</th>       <!--products---->
                <th>Price (RS)</th>    <!--products---->
                <th>Quantity</th>     <!--cart---->
                <th>Urgent Order</th>  <!--cart---->
                <th>Sub Total (RS)</th>
            </tr>

            <?php include("include/function.php");
                  // echo no_order();
                  echo view_order();

            ?>


        </table>
    </form>
</div>
