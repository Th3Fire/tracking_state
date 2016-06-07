​<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login</title>
    <meta charset="UTF-8"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/layout_login.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="iconic.css" media="screen" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    
    <link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">


    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>-->

    </head>
    <body>
        <header>

            <?php
            session_start();
            require_once("connect_db.php"); 
            if(isset($_SESSION['UserID']))
            {
                header ("Location: admin.php");
                exit();
            }
            ?>
        </header>
        <div id='main'>
            <article><!-- Content -->
                <div id="login">

                    <h2><span class="fontawesome-lock"></span>Admin Sign IN</h2>

                    <form action="javascript:void(0);" method="POST">

                        <fieldset>

                            <p><label for="username">Username</label></p>
                            <p><input type="text" id="username" value="John" onBlur="if(this.value=='')this.value='John'" onFocus="if(this.value=='John')this.value=''" ></p> <!-- JS because of IE support; better: placeholder="mail@address.com" -->

                            <p><label for="password">Password</label></p>
                            <p><input type="password" id="password" value="password" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> <!-- JS because of IE support; better: placeholder="password" -->

                            <p><input type="submit" value="Sign In" onclick="validate()"></p>

                        </fieldset>

                    </form>

                </div> <!-- end login -->


            </article><!-- Content -->
            <div class="navside"></div><!-- Left side -->
            <aside><!-- Right side -->
            </aside><!-- Right side -->
            <footer></footer>
        </div>


    </body>
    </html>
