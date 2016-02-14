<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Home</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>
    <body class="main">



        <div class="container-fluid ">
            <div class="row nav">
                <div class="col-md-1">
                </div>
                <div class="col-md-6">
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
                <div class="col-md-12">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 content">

                    <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group">

                            <label for="username" class="col-sm-2 control-label">
                                Username
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="inputEmail3" />
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="password" class="col-sm-2 control-label">
                                Password
                            </label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputPassword3" />
                            </div>
                        </div>


                        <div class="form-group">

                            <label for="age" class="col-sm-2 control-label">
                                Age :
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="age" class="form-control" id="inputPassword3" />
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">

                                <button type="submit" class="btn btn-default">
                                    Sign in
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>


    </body>
</html>


















</body>
</html>