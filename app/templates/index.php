<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Home</title>

        <!-- Bootstrap -->

        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">

    </head>
    <body class="main">


        <div class="container-fluid ">
            <div class="row nav">
                <div class="col-md-1">
                </div>
                <div class="col-md-6" >
                    <h2>

                        Twoot
                    </h2>
                </div>
                <?php if ($_SESSION['is_authenticated']) { ?>
                    <div class="col-md-4">
                        <ul class="nav nav-tabs">
                            <li >
                                <a href="/">Home</a>
                            </li>
                            <li >
                                <a href="/status">Status</a>
                            </li>
                            <li >
                                <a href="/logout">Log out</a>
                            </li>

                        </ul>
                    </div>
                <?php } else { ?>
                    <div class="col-md-4">
                        <ul class="nav nav-tabs">
                            <li >
                                <a href="/">Home</a>
                            </li>
                            <li class="active">
                                <a href="/register">Register</a>
                            </li>
                            <li >
                                <a href="/login">Login</a>
                            </li>
                            <li >
                                <a href="/status">Status (in anon)</a>
                            </li>


                        </ul>
                    </div>
                <?php } ?>
                <div class="col-md-1">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 content">

                    <h2>
                        Welcome!
                    </h2>
                    <p>
                        Hello and welcome again, the Twoot's features are :
                    <ul>
                        <li>Register/Login in Twoot</li>
                        <li>Add/Delete Twoot</li>
                    </ul>
                    </p>
                    <p>
                        <a class="btn" href="/login">Log in»</a>
                    </p>




                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </body>
</html>