<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>products</title>
    <!--    <link href="../../../assets/css/products.css" rel="stylesheet" type="text/css">-->
    <link href="/shop/assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="/shop/assets/bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="/shop/assets/bootstrap/js/bootstrap.js"></script>
    <link href="/shop/assets/css/<?= $css ?>.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <script type="text/javascript" src="/shop/assets/slider.js"></script>-->
    <!--    <script type="text/javascript" src="/shop/assets/capcha.js"></script>-->
    <!--    <script src='https://www.google.com/recaptcha/api.js'></script>-->
</head>

<body>
<div class="body">
    <div class="header">
        <div class="top">

            <!--            <object type="image/svg+xml" data="../../../assets/images/logo_1.svg" class="logo"></object>-->
            <object type="image/svg+xml" data="/shop/assets/images/logo_1.svg" class="logo"></object>
            <h1>photonics (Admin page)</h1>

            <div class="inform">
                <form method="get">
                    <input type="text" name="search" value="Quick Search">
                </form>
                <p>Call Free: <b>+123456789</b></p>
                <ul>
                    <?php if(isset($_SESSION["user"]) && $_SESSION['user'] == "admin") {
                        echo "<li><a href=\"/shop/admin\">Adminpanel</a></li>";
                    }  ?>
                    <?php if(isset($_SESSION["user"])) {
                        echo "<li><a href=\"/shop/exit\">Exit</a></li>";
                    } else {
                        echo "<li><a href=\"/shop/login\">Login</a></li>";} ?>

                </ul>
            </div>

        </div>
        <div class="menu">
            <div class="item_of_menu">
                <a href="/shop/main">Main page</a>
            </div>
            <div class="item_of_menu">
                <a href="/shop/products">Products</a>
            </div>
            <div class="item_of_menu">
                <a>News</a>
            </div>
            <div class="item_of_menu">
                <a>Another</a>
            </div>
            <div class="item_of_menu">
                <a>Contact us</a>
            </div>
            <div class="item_of_menu">
                <a>Partners</a>
            </div>
        </div>
        <!--        <div class="slider">-->
        <!---->
        <!--        </div>-->
    </div>


    <div class="main">
        <?= $content ?>
    </div>

    <div class="footer">

        <div class="another">
            <p class="copyright">Copyright C 2014. All rights reserved</p>
            <div class="links">
                <div class="p">
                    <p class=""><a>Home</a></p>
                    <p class=""><a>Store Polices</a></p>
                    <p class=""><a>Driving Directions</a></p>
                    <p class=""><a>Privacy Policy</a></p>
                    <p class=""><a>Contact us</a></p>
                </div>

                <div class="social-media">
                    <div class="image"><img src="/shop/assets/images/twitter.jpg"></div>
                    <div class="image"><img src="/shop/assets/images/fb.jpg"></div>
                    <div class="image"><img src="/shop/assets/images/u.jpg"></div>
                </div>
            </div>


        </div>
    </div>
</div>
</body>
</html>