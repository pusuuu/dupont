<?php
    session_start();

    $error = "";
    if(isset($_POST['login'])){
        include "koneksi.php";

        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "" || $password == ""){
            $error = "Harap lengkapi username/password anda";
        }else{
            $qry = "SELECT * FROM user WHERE nm_user = '$username' AND pass_user = '$password'";
            $sql = mysqli_query($con, $qry) or die (mysqli_error($con));
            $isi = mysqli_fetch_array($sql);

            if(count($isi) <= 0) {
                $error = "Username / password yang anda masukkan salah";
            } else {
                $_SESSION['auth_id'] = $isi['kd_user'];
                $_SESSION['auth_name'] = $isi['nm_user'];
                $_SESSION['auth_akses'] = $isi['akses'];

                header('Location: index.php');
            }
            header('Location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dupont Agricultural Products Indonesia</title>

        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <?php if($error <> ""){ ?>
                                    <div class="form-group">
                                        <label><?php echo $error; ?></label>
                                    </div>
                                    <?php } ?>

                                    <input type="submit" class="btn btn-lg btn-success btn-block" name="login" value="Login" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <script src="../dist/js/sb-admin-2.js"></script>
    </body>
</html>