<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fa fa-shopping-basket"></i>
                Shopping Cart
            </h3>
        </a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarResponsive">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item active nav-link">
                    <h5 class="px-5">
                        <i class="fa fa-shopping-cart"></i> Cart
                        <?php 
                        if(isset($_SESSION["cart"])) {
                            $count = count($_SESSION["cart"]);
                            echo '<span id="cart_count" class="text-warning bg-light">'.$count.'</span>';
                        } else{
                            echo '<span id="cart_count" class="text-warning bg-light">0</span>';

                        }
                        ?>
                    </h5>
                </a>

            </div>

        </div>

    </nav>
</header>