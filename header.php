<body>
<nav class="navbar navbar-light navbar-expand-lg  bg-white clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="#">Thumps Up</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
            id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html">Home</a></li>
                <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="features.html">Features</a></li> -->
                <?php
                    if(isset($_SESSION['loggedin']) && isset($_SESSION['utype']) && ($_SESSION['utype'] == 1 || $_SESSION['utype'] == 2 || $_SESSION['utype'] == 3))
                    { 
                        echo "<li class='nav-item'>";
                        
                        echo "<a class='nav-link' href='dashboard.php'>User Dashboard</a>";
                        
                        echo "</li>";
                    }
                ?>
                <?php
                    if(isset($_SESSION['loggedin']) && isset($_SESSION['utype']) && ($_SESSION['utype'] == 2|| $_SESSION['utype'] == 3))
                    { 
                        echo "<li class='nav-item'>";
                        
                        echo "<a class='nav-link' href='employeedash.php'>Employee Dashboard</a>";
                        
                        echo "</li>";
                    }
                ?>
                <?php
                    if(isset($_SESSION['loggedin']) && isset($_SESSION['utype']) && $_SESSION['utype'] == 3)
                    { 
                        echo "<li class='nav-item'>";
                        
                        echo "<a class='nav-link' href='admindashboard.php'>Admin</a>";
                        
                        echo "</li>";
                    }
                ?>
                <li class="nav-item" role="presentation">
                <?php
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
                    {
                    echo "<a class='nav-link' href='logout.php'>Logout</a>";
        
                    }
                    else
                    {
                    echo "<a class='nav-link' href='login.php'><i class='fas fa-user-circle fa-1x'></i> Login/Register</a>";

                    }
                ?>
                </li>
            </ul>
        </div>
    </div>
</nav>