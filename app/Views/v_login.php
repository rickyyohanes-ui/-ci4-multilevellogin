<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/template/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        .is-invalid {
            border-color: red;
        }

        .invalid-feedback {
            color: red;
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="login"><b>Login</b> CodeIgniter 4</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Login Membership</p>

            <?php if (session()->getFlashdata('gagal')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
            <?php endif ?>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>

            <form action="cek_login" method="post">
                <?= csrf_field(); ?>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control  " placeholder="Email User" value="<?= old('email'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control " placeholder="Password" value="<?= old('password'); ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>

                </div>
            </form>

            <div class="row" style="margin-top: 15px;">
                <div class="col-xs-12 text-center ">
                    <a href="register" class="">Daftar</a>
                </div>

            </div>

        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="/template/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="/template/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>