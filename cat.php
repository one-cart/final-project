<div id="bodyright">
    <h3>View All Categories</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            
            <?php include("include/function.php"); echo viewall_category(); ?>
            
        </table>
    </form>

    <h3 id="add_cat">Add New Category From Here</h3>
    <form method="post">
        <table>
            <tr>
                <td>Enter Category Name:</td>
                <td><Input type="text" name="cat_name" /></td>
            </tr>
        </table>
        <center><button name="add_cat">Add Category</button></center>
    </form>
</div>

<?php
    //v 11
    echo add_cat();
    
?>