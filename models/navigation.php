<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="../index.php">HulkSuplementi</a>
        </div><!-- END .navbar-header -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <li>
                    <a href="../index.php">Home</a>
                </li>
                <li>
                    <a href="../shop.php">Shop</a>
                </li>
                <li>
                    <a href="../contact.php">Contact</a>
                </li>
            </ul>
            <ol class="nav navbar-nav navbar-right">
                <li>
                <?php 
                    if(!isset($_SESSION['gost_id'])){
                        echo "<a href='admin/index.php'>Login</a> ";
                }
                else
                {
                    echo "<li><a href='korpa.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i>
Korpa</a></li> <li><a href='../admin/logout.php'><i class='fa fa-sign-in' aria-hidden='true'></i>
".$_SESSION['gost_username']."(Logout)</a></li>"; 
                }
                ?>         
                </li>
            </ol>
        </div><!-- END .navbar-collapse -->
    </div><!-- END .container -->
</nav><!-- END .nav-->