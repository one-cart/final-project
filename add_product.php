<div id="bodyright"> <!---11--->
    <h3>Add New Product From Here</h3>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Enter Product Name:</td>
                <td><Input type="text" name="pro_name" /></td>
            </tr>
            <tr>
                <td>Select Category Name:</td>
                <td><select name="cat_name"><?php include("include/function.php"); echo viewall_cat(); ?></select></td>
            </tr>
            <tr>
                <td>Select Product Image 1:</td>
                <td><Input type="file" name="pro_img1" /></td>
            </tr>
            <tr>
                <td>Select Product Image 2:</td>
                <td><Input type="file" name="pro_img2" /></td>
            </tr>
            <!-- <tr>
                <td>Select Product Image 3:</td>
                <td><Input type="file" name="pro_img3" /></td>
            </tr>
            <tr>
                <td>Select Product Image 4:</td>
                <td><Input type="file" name="pro_img4" /></td>
            </tr> -->

            <tr>
                <td>Enter Net Weight:</td>
                <td><Input type="text" name="pro_weight" /></td>
            </tr>
            <tr>
                <td>Enter Description :</td>
                <td><Input type="text" name="pro_description" /></td>
            </tr>
            <tr>
                <td>Enter More Description :</td>
                <td><Input type="text" name="pro_moredescription" /></td>
            </tr>

            <tr>
                <td>Enter Price (RS):</td>
                <td><Input type="text" name="pro_price" /></td>
            </tr>
            <!-- <tr>
                <td>Enter Product ID:</td>
                <td><Input type="text" name="pro_key" /></td>
            </tr> -->
            <tr>
                <td>Enter Keyword:</td>
                <td><Input type="text" name="pro_keyword" /></td>
            </tr>

        </table>
        <center><button name="add_product">Add Product</button></center>
    </form>
</div>

<?php
    echo add_pro();
?>
