<?php

    function getIp() {                           //get user ids
        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $ip;
    }

   

    function addcart(){
        include("include/db.php");

        if(isset($_POST['cart_btn'])){
            $pro_id=$_POST['pro_id'];
            $id=getIP();

            $check_cart=$con->prepare("SELECT * FROM cart WHERE pro_id='$pro_id' AND userid='$id'");
            $check_cart->execute();

            $row_check=$check_cart->rowCount();

            if($row_check==1){
                echo "<script>alert('This Product Already Added To Your Cart !!!');</script>";
            }
            else{
                $add_cart=$con->prepare("INSERT INTO cart(userid, pro_id, qnty, urgent) VALUES('$id', '$pro_id', '1', ' ')");   //edited

                if($add_cart->execute()){
                    echo "<script>window.open('indexuser.php', '_self');</script>";
                }
                else{
                    echo "<script>alert('Try Again !!!');</script>";
                }
            }
        }
    }

    function cart_count(){   //v36
        include("include/db.php");

        $id=getIP();
        $get_cart_item=$con->prepare("SELECT * FROM cart WHERE userid='$id'");
        $get_cart_item->execute();

        $count_cart=$get_cart_item->rowCount();

        echo $count_cart;
    }

    function cart_dis(){
        include("include/db.php");

        $id=getIP();
        $get_cart_item=$con->prepare("SELECT * FROM cart WHERE userid='$id'");
        $get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cart_item->execute();

        $cart_empty=$get_cart_item->rowCount();
        if($cart_empty==0){
            include("emptycart.php");
            // echo "<left><h2>No Item To Display In Your Cart.</h2></left>";
            // echo "<left><h3>Continue Shopping And Add Foods To Your Cart.</h3></left>";
            // echo "<left><h4><a href='indexuser.php'>Continue Shopping</a></h4></left>";
        }
        else{

            if(isset($_POST['up_qnty'])){
                $qnty=$_POST['qnty'];

                foreach($qnty AS $key=>$value){
                    $update_qnty=$con->prepare("UPDATE cart SET qnty='$value' WHERE cart_id='$key'");

                    if($update_qnty->execute()){
                        echo "<script>window.open('cart.php', '_self');</script>";
                    }
                }
            }

            if(isset($_POST['up_urgent'])){
                $urgent=$_POST['urgent'];

                foreach($urgent AS $key=>$value){
                    $update_urgent=$con->prepare("UPDATE cart SET urgent='$value' WHERE cart_id='$key'");

                    if($update_urgent->execute()){
                        echo "<script>window.open('cart.php', '_self');</script>";
                    }
                }
            }

            echo "<table cellpadding='0' cellspacing='0'>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Urgent Order</th>
                        <th>Remove</th>
                        <th>Sub Total</th>
                    </tr>";

            $net_total=0;
            while($row=$get_cart_item->fetch()):
                $pro_id=$row['pro_id'];

                $get_pro=$con->prepare("SELECT * FROM products WHERE pro_id='$pro_id'");
                $get_pro->setFetchMode(PDO:: FETCH_ASSOC);
                $get_pro->execute();

                $row_pro=$get_pro->fetch();

                echo "<tr>
                        <td><img src='../images/pro_img/".$row_pro['pro_img1']."' /></td>
                        <td>".$row_pro['pro_name']."</td>
                        <td>".$row_pro['pro_weight']."</td>
                        <td><input type='number' name='qnty[".$row['cart_id']."]' value='".$row['qnty']."' /><input type='submit' name='up_qnty' value='Save' /></td>
                        <td>RS ".$row_pro['pro_price']."/=</td>
                        <td><input type='number' name='urgent[".$row['cart_id']."]' value='".$row['urgent']."' /><input type='submit' name='up_urgent' value='Save' /></td>
                        <td><button id='pro_btn1'><a href='delete.php?delete_id=".$row_pro['pro_id']."'>Delete</a></button></td>
                        <td>";
                            // $qnty=$row['qnty'];
                            // $pro_price=$row_pro['pro_price'];
                            $sub_total=$row_pro['pro_price'] * $row['qnty'];
                        echo "Rs ".$sub_total."/=";

                        $net_total=$net_total+$sub_total;
                        echo "</td>
                    </tr>";

            endwhile;

            echo "<tr>
                    <td></td>
                    <td><button id='pro_btn1'><a href='indexuser.php'>Continue Shopping</a></button></td>
                    <td><button id='pro_btn2'>Check Out</button></td>
                    <td></td><td></td><td></td><td><b>Net Total =</b></td>
                    <td><b>RS $net_total /= </b></td>
                </tr>";
        }

        // echo $net_total;
    }

    function delete_cart_items(){
        include("include/db.php");

        if(isset($_GET['delete_id'])){
            $pro_id=$_GET['delete_id'];

            $delete_pro=$con->prepare("DELETE FROM cart WHERE pro_id='$pro_id'");

            if($delete_pro->execute()){
                echo "<script>alert('This Product Deleted From Your Cart Successfully !');</script>";
                echo "<script>window.open('cart.php', '_self');</script>";
            }
        }
    }

    // function urgent_order(){
    //     include("include/db.php");

    //     if(isset($_GET['urgent_id'])){
    //         $urgent=$_GET['urgent_id'];

    //         $urgent_view=$con->prepare("SELECT FROM cart WHERE pro_id='$urgent'");

    //         if($urgent_view->execute()){
    //             echo "<script>alert('This Product Deleted From Your Cart Successfully !');</script>";
    //             echo "<script>window.open('cart.php', '_self');</script>";
    //         }
    //     }
    // }

    function vegetables(){
        include("include/db.php");

        $fetch_cat=$con->prepare("SELECT * FROM main_category WHERE cat_id='1'");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $row_cat=$fetch_cat->fetch();
        $cat_id=$row_cat['cat_id'];
        echo "<h3>".$row_cat['cat_name']."</h3>";

        $fetch_pro=$con->prepare("SELECT * FROM products WHERE cat_id='$cat_id' LIMIT 0, 9");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        while($row_pro=$fetch_pro->fetch()):
        // $pro_id=$row_pro['pro_id'];
            echo "<li>
                    <form method='post' enctype='multipart/form-data'>
                        <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                            <h4>".$row_pro['pro_name']."</h4>
                            <img src='../images/pro_img/".$row_pro['pro_img1']."' />
                            <h4>".$row_pro['pro_weight']."</h4>
                            <h4>RS ".$row_pro['pro_price']."/=</h4>
                            <center>
                                <button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                                <input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
                                <button id='pro_btn' name='cart_btn'>Cart</button>
                                <button id='pro_btn'><a href='#'>Whist List</a></button>
                            </center>
                        </a>
                    </form>
                 </li>";

            // echo "<h4>".$row_pro['pro_name']."</h4>";
        endwhile;
    }

    function meat(){
        include("include/db.php");

        $fetch_cat=$con->prepare("SELECT * FROM main_category WHERE cat_id='3'");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $row_cat=$fetch_cat->fetch();
        $cat_id=$row_cat['cat_id'];
        echo "<h3>".$row_cat['cat_name']."</h3>";

        $fetch_pro=$con->prepare("SELECT * FROM products WHERE cat_id='$cat_id' LIMIT 0, 6");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        while($row_pro=$fetch_pro->fetch()):
        // $pro_id=$row_pro['pro_id'];
            echo "<li>
                        <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                            <h4>".$row_pro['pro_name']."</h4>
                            <img src='../images/pro_img/".$row_pro['pro_img1']."' />
                            <h4>".$row_pro['pro_weight']."</h4>
                            <h4>RS ".$row_pro['pro_price']."/=</h4>
                            <center>
                                <button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                                <input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
                                <button id='pro_btn' name='cart_btn'>Cart</button>
                                <button id='pro_btn'><a href='#'>Whist List</a></button>
                            </center>
                        </a>
                 </li>";

            // echo "<h4>".$row_pro['pro_name']."</h4>";
        endwhile;
    }

    function fish(){
        include("include/db.php");

        $fetch_cat=$con->prepare("SELECT * FROM main_category WHERE cat_id='4'");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $row_cat=$fetch_cat->fetch();
        $cat_id=$row_cat['cat_id'];
        echo "<h3>".$row_cat['cat_name']."</h3>";

        $fetch_pro=$con->prepare("SELECT * FROM products WHERE cat_id='$cat_id' LIMIT 0, 6");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        while($row_pro=$fetch_pro->fetch()):
        // $pro_id=$row_pro['pro_id'];
            echo "<li>
                        <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                            <h4>".$row_pro['pro_name']."</h4>
                            <img src='../images/pro_img/".$row_pro['pro_img1']."' />
                            <h4>".$row_pro['pro_weight']."</h4>
                            <h4>RS ".$row_pro['pro_price']."/=</h4>
                            <center>
                                <button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                                <input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
                                <button id='pro_btn' name='cart_btn'>Cart</button>
                                <button id='pro_btn'><a href='#'>Whist List</a></button>
                            </center>
                        </a>
                 </li>";

            // echo "<h4>".$row_pro['pro_name']."</h4>";
        endwhile;
    }

    function rice(){
        include("include/db.php");

        $fetch_cat=$con->prepare("SELECT * FROM main_category WHERE cat_id='2'");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $row_cat=$fetch_cat->fetch();
        $cat_id=$row_cat['cat_id'];
        echo "<h3>".$row_cat['cat_name']."</h3>";

        $fetch_pro=$con->prepare("SELECT * FROM products WHERE cat_id='$cat_id' LIMIT 0, 6");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        while($row_pro=$fetch_pro->fetch()):
        // $pro_id=$row_pro['pro_id'];
            echo "<li>
                        <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                            <h4>".$row_pro['pro_name']."</h4>
                            <img src='../images/pro_img/".$row_pro['pro_img1']."' />
                            <h4>".$row_pro['pro_weight']."</h4>
                            <h4>RS ".$row_pro['pro_price']."/=</h4>
                            <center>
                                <button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Whist List</a></button>
                            </center>
                        </a>
                 </li>";

            // echo "<h4>".$row_pro['pro_name']."</h4>";
        endwhile;
    }

    function gas(){
        include("include/db.php");

        $fetch_cat=$con->prepare("SELECT * FROM main_category WHERE cat_id='5'");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $row_cat=$fetch_cat->fetch();
        $cat_id=$row_cat['cat_id'];
        echo "<h3>".$row_cat['cat_name']."</h3>";

        $fetch_pro=$con->prepare("SELECT * FROM products WHERE cat_id='$cat_id' LIMIT 0, 3");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        while($row_pro=$fetch_pro->fetch()):
        // $pro_id=$row_pro['pro_id'];
            echo "<li>
                        <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                            <h4>".$row_pro['pro_name']."</h4>
                            <img src='../images/pro_img/".$row_pro['pro_img1']."' />
                            <h4>".$row_pro['pro_weight']."</h4>
                            <h4>RS ".$row_pro['pro_price']."/=</h4>
                            <center>
                                <button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Whist List</a></button>
                            </center>
                        </a>
                 </li>";

            // echo "<h4>".$row_pro['pro_name']."</h4>";
        endwhile;
    }

    function pro_details(){  //v25
        include("include/db.php");

        if(isset($_GET['pro_id'])){
            $pro_id=$_GET['pro_id'];

            $pro_fetch=$con->prepare("SELECT * FROM products WHERE pro_id='$pro_id'");
            $pro_fetch->setFetchMode(PDO:: FETCH_ASSOC);
            $pro_fetch->execute();

            $row_pro=$pro_fetch->fetch();

            $cat_id=$row_pro['cat_id'];

            echo "<div id='pro_img'>
                    <img src='../images/pro_img/".$row_pro['pro_img1']."' />
                    <ul>
                        <li><img src='../images/pro_img/".$row_pro['pro_img2']."' /></li>
                        <li><img src='../images/pro_img/".$row_pro['pro_img1']."' /></li>
                    </ul>
                </div>
                <div id='pro_features'>
                    <h3>".$row_pro['pro_name']."</h3>
                    <ul>
                        <li>Net Weight - ".$row_pro['pro_weight']."</li>
                        <li>".$row_pro['pro_moredescription']."</li>
                        <li>".$row_pro['pro_description']." Foods From One Cart</li>

                    </ul>

                    <ul>
                        <li>Added date of the Item : ".$row_pro['pro_added_date']."</li>
                    </ul><br clear='all' />
                    <center>
                        <h4>Retail Price : RS ".$row_pro['pro_price']."/=</h4>
                        <form method='post'>
                            <input type='hidden' value='".$row_pro['pro_id']."' name='pro_id' />
                            <button name='buy_now'>Buy Now</button>
                            <button name='cart_btn'>Add to Cart</button>
                        </form>
                    </center>
                </div><br clear='all' />

                <div id='similar'>
                    <h3>Related Foods</h3>
                    <ul>";

                        echo addcart();

                        $sim_pro=$con->prepare("SELECT * FROM products WHERE pro_id!=$pro_id AND cat_id='$cat_id' LIMIT 0, 6");
                        $sim_pro->setFetchMode(PDO:: FETCH_ASSOC);
                        $sim_pro->execute();

                        while($row=$sim_pro->fetch()):
                            echo "<li>
                                    <a href='pro_detail.php?pro_id=".$row['pro_id']."'>
                                        <p>".$row['pro_name']."</p>
                                        <img src='../images/pro_img/".$row['pro_img1']."' />
                                        <p>".$row['pro_weight']."</p>
                                        <p>RS ".$row['pro_price']."/=</p>
                                    </a>
                                </li>";
                        endwhile;

                    echo"</ul>

                </div>";
        }
    }

    function all_cat(){
        include("include/db.php");
        //echo "Hello";

        $all_cat=$con->prepare("SELECT * FROM main_category");
        $all_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $all_cat->execute();

        while($row=$all_cat->fetch()):
            echo "<li><a href='cat_detail.php?cat_id=".$row['cat_id']."'>".$row['cat_name']."</a></li>";
        endwhile;
    }

    function cat_detail(){
        include("include/db.php");

        if(isset($_GET['cat_id'])){
            $cat_id=$_GET['cat_id'];
            $cat_pro=$con->prepare("SELECT * FROM products WHERE cat_id='$cat_id'");
            $cat_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $cat_pro->execute();

            $cat_name=$con->prepare("SELECT * FROM main_category WHERE cat_id='$cat_id'");
            $cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $cat_name->execute();

            $row=$cat_name->fetch();
            $row_main_cat=$row['cat_name'];
            echo "<h3>$row_main_cat</h3>";

            while($row_cat=$cat_pro->fetch()):
                // $pro_id=$row_pro['pro_id'];
                    echo "<li>
                                <a href='pro_detail.php?pro_id=".$row_cat['pro_id']."'>
                                    <h4>".$row_cat['pro_name']."</h4>
                                    <img src='../images/pro_img/".$row_cat['pro_img1']."' />
                                    <h4>".$row_cat['pro_weight']."</h4>
                                    <h4>RS ".$row_cat['pro_price']."/=</h4>
                                    <center>
                                        <button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_cat['pro_id']."'>View</a></button>
                                        <button id='pro_btn'><a href='#'>Cart</a></button>
                                        <button id='pro_btn'><a href='#'>Whist List</a></button>
                                    </center>
                                </a>
                         </li>";

                    // echo "<h4>".$row_pro['pro_name']."</h4>";
                endwhile;
        }
    }

    function search(){
        include("include/db.php");

        if(isset($_GET['search'])){
        $user_input=$_GET['user_input'];

        $search=$con->prepare("SELECT * FROM products WHERE pro_name LIKE '%user_input%' OR pro_keyword LIKE '%$user_input%'");
        $search->setFetchMode(PDO::FETCH_ASSOC);
        $search->execute();

        echo "<div id='bodyleft'><ul>";

        if($search->rowCount()==0){
             echo "<h2>Product Not Found</h2>";
        }
        else{

        while($row_pro=$search->fetch()):
            echo "<li>
                        <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                            <h4>".$row_pro['pro_name']."</h4>
                            <img src='../images/pro_img/".$row_pro['pro_img1']."' />
                            <h4>".$row_pro['pro_weight']."</h4>
                            <h4>RS ".$row_pro['pro_price']."/=</h4>
                            <center>
                                <button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Whist List</a></button>
                            </center>
                        </a>
                 </li>";
        endwhile;
        }
        echo "</ul></div>";
        }
    }
?>
