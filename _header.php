<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="iconic.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="js/prefix-free.js"></script>
    <script src="js/myscript.js"></script>
</head>
<body>

    <div class="wrap">
        <nav>
            <ul class="menu">
                <li><a href="index.php"><span class="iconic home"></span> Home</a></li>

                <li>
                <?php
               if(!isset($_SESSION['UserID'])){}
                else{echo '<a href="admin.php"><span class="iconic pencil-alt"></span> Admin Panel</a>';
                }
                ?>
                </li>
                <li>
                <?php
               if(!isset($_SESSION['UserID'])){echo '
                <a href="login.php" ><span class="iconic locked"></span> Login</a>';
                }else{echo '
                    <a href="#" onclick="logout()"><span class="iconic unlocked"></span> Logout</a>
                    ';
                }

                ?>
                </li>

            </ul>
            <div class="clearfix"></div>
        </nav>
    </div>
</body>
</html>
