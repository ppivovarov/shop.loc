<?php
declare(strict_types=1);

use app\assets\AuthAsset;
use yii\helpers\Html;

/** @var string $content */

AuthAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <base href="/adminlte/">
    <meta charset="<?php echo Yii::$app->charset ?>">
    <?php $this->head() ?>
    <?php $this->registerCsrfMetaTags() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo Html::encode($this->title) ?></title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--    [if lt IE 9]>-->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!--    <![endif]-->

</head>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>
<!--<div class="login-box">-->
<!--    <div class="login-logo">-->
<!--        <a href="../../index2.html"><b>Admin</b>LTE</a>-->
<!--    </div>-->
    <!-- /.login-logo -->
<!--    <div class="login-box-body">-->
<!--        <p class="login-box-msg">Sign in to start your session</p>-->
<!---->
<!--        <form action="../../index2.html" method="post">-->
<!--            <div class="form-group has-feedback">-->
<!--                <input type="email" class="form-control" placeholder="Email">-->
<!--                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>-->
<!--            </div>-->
<!--            <div class="form-group has-feedback">-->
<!--                <input type="password" class="form-control" placeholder="Password">-->
<!--                <span class="glyphicon glyphicon-lock form-control-feedback"></span>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div class="col-xs-8">-->
<!--                    <div class="checkbox icheck">-->
<!--                        <label>-->
<!--                            <input type="checkbox"> Remember Me-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- /.col -->
<!--                <div class="col-xs-4">-->
<!--                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
<!--                </div>-->
                <!-- /.col -->
<!--            </div>-->
<!--        </form>-->
<!---->
<!--        <div class="social-auth-links text-center">-->
<!--            <p>- OR -</p>-->
<!--            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using-->
<!--                Facebook</a>-->
<!--            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using-->
<!--                Google+</a>-->
<!--        </div>-->
        <!-- /.social-auth-links -->
<!---->
<!--        <a href="#">I forgot my password</a><br>-->
<!--        <a href="register.html" class="text-center">Register a new membership</a>-->
<!---->
<!--    </div>-->
    <!-- /.login-box-body -->
<!--</div>-->

<?php echo $content; ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
