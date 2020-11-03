<div class="scroll" id="bodyright"> <!---11--->
    <h3>Update Product From Here</h3>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Product Name</th>
                <th>Product Images</th>
                <th>Net Weight</th>
                <th>Description</th>
                <th>More Description</th>
                <th>Price (RS)</th>
                <th>Keyword</th>
                <th>Added Date</th>
            </tr>

            <?php include("include/deliverfunction.php"); echo viewall_products();?>

        </table>
    </form>
</div>
