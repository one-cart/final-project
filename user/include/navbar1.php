    <div id="navbar1">
        <ul>
            <li>
                <a href="#">CATEGORIES</a>
                <ul>
                    <?php echo all_cat(); ?>
                </ul>
            </li>

            <li><a href="#">VEGETABLES</a></li>
            <li><a href="#">MEAT</a></li>  
            <li><a href="#">RICE</a></li>
            <li><a href="#">GAS</a></li>
            <li><a href="#">FRUITS</a></li>
            <li><a href="#">BRANDS</a></li>
        </ul>
    </div> <!---End of navbar--->
    <center>
    <div id="search">
            <form action="search.php" method="get" enctype="multipart/form-data">
                <input type="text" name='user_input' placeholder="Search From Here....!">
                <button name='search' id="search_btn">Search</button>
                <button id="cart_btn"><a href='cart.php'>Cart <?php echo cart_count();?> </a></button>
            </form>
        </div> <!----End of search---->
        </center>
</div>