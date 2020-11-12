<div class="scroll" id="bodyright">
    <h3>View Deliver Information From Here</h3>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Deliver ID</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Deliver Item Image</th>
                <th>Deliver Status</th>
            </tr>

            <?php include("include/function.php"); echo view_deliverstatus();?>

        </table>
    </form>
</div>
