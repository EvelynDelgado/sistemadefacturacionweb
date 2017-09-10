<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

<?= Html::a('<span class="logo-mini">Dtx</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl . 'gestion', ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">



                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?= Html::img('@web/imagenes/usuarios/0.png', ['width' => '25', 'height' => '25', 'class' => 'img-circle']); ?>
                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                                <?= Html::img('@web/imagenes/usuarios/0.png', ['width' => '160', 'height' => '160',]); ?>
                            <p>
<?php echo Yii::$app->user->identity->username ?>

                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">


                                <?=
                                Html::a(
                                        'Perfil', ['/usuario/gestion/perfil'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>
                            <div class="pull-right">
                                <?=
                                Html::a(
                                        'Salir', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </nav>
</header>
