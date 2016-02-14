

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
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <h3 class="text-center">
                        <a href="/"> Twoot </a>
                    </h3>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 content">
                    <form class="form-horizontal" role="form" method="POST">

                        <div class="form-group">

                            <label for="username" class="col-sm-2 control-label">
                                Username
                            </label>
                            <div class="col-sm-10">

                                <?php
                                if ($_SESSION['is_authenticated']) {
                                    $user = $_SESSION['user'];
                                    ?>
                                    <input type="text" name="username" class="form-control" id="inputEmail3" value="<?php echo $user->getUsername() ?>" readonly/>
                                <?php } else { ?>
                                    <input type="text" name="username" value="Anonymous" readonly/>
<?php } ?>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="message" class="col-sm-2 control-label">
                                Message
                            </label>
                            <div class="col-sm-10">
                                <textarea name="message" class="form-control"></textarea>	
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">

                                <button type="submit" class="btn btn-default">
                                    Twoot it !
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 content">





                    <table class="table">
<?php foreach ($list as $key => $val) { ?>



                            <tbody>
                                <tr>
                                    <td>
    <?php echo $val['id'] ?>
                                    </td>
                                    <td>
    <?php echo $val['username'] ?>
                                    </td>
                                    <td>
    <?php echo $val['message'] ?>
                                    </td>
                                    <td>
    <?php echo $val['date'] ?>
                                    </td>
                                </tr>

<?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>

    </body>
</html>