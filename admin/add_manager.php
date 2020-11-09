<div id="bodyright">
    <h3>Add New Manager From Here</h3>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Enter Name Of The Manager:</td>
                <td><Input type="text" name="m_name" /></td>
            </tr>
            <tr>
                <td>Enter NIC No:</td>
                <td><Input type="text" name="m_nic" placeholder="*********V"/></td>
            </tr>
            <tr>
                <td>Add Image:</td>
                <td><Input type="file" name="m_img" /></td>
            </tr>
            <tr>
                <td>Enter Email:</td>
                <td><Input type="text" name="m_email" /></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><textarea type="text" name="m_add" id="" cols="" rows="4" placeholder="Address Here ...."></textarea></td>
            </tr>
            <tr>
                <td>Contact No:</td>
                <td><Input type="text" name="m_phone" placeholder="+94*********"/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><Input type="text" name="m_pass_1" placeholder="*********"/></td>
            </tr>
            <tr>
                <td>Cofirm password:</td>
                <td><Input type="text" name="m_pass_2" placeholder="*********"/></td>
            </tr>


        </table>
        <center><button name="add_manager">Add Manager</button></center>
    </form>
</div>

<?php
    include("include/adminfunction.php");
    echo add_manager();
?>
