
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Home</title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">

    </head>


    <body class="main">



        <div class="container-fluid nav">
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


            <?php
            if ($_SESSION['is_authenticated']) {
                $user = $_SESSION['user'];

                if ($user->getUsername() === $list['username']) {
                    ?>




                    <table class="table content">




                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $list['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $list['username'] ?>
                                    </td>
                                    <td>
                                        <?php echo $list['message'] ?>
                                    </td>
                                    <td>
                                        <?php echo $list['date'] ?>
                                    </td>
                                </tr>

                           
                        </tbody>
                    </table>



                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6 content">
                            <form class="form-horizontal" role="form" method="POST">

                                <div class="form-group">


                                    <input type="text" name="id" value ="<?= $list['id'] ?>">

                                </div>
                                <div class="form-group">


                                    <input type="text" name="_method" value="DELETE">

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">

                                        <button type="submit" class="btn btn-default">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>




                    <?php
                }
            } else {
            ?>

        </div>
        </br>
        <div class="col-md-3">
          
                <div class="alert alert-danger">
                    <strong>Attention !</strong> Vous n'êtes pas autorisé à effectuer une action.
                </div>
            
        </div>
            <?php } ?>
    </div>
</div>

</body>
</html>