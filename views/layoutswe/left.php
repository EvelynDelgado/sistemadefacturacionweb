<?php

use yii\helpers\Html;
        use mdm\admin\components\MenuHelper;
        use yii\bootstrap\Nav;

?>


<aside class="main-sidebar">

    <section class="sidebar">

          <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                 <?=  Html::img('@web/imagenes/usuarios/0.png', ['width' => '160', 'height' => '160', 'class' => 'img-circle']);?>
            </div>
            <div class="pull-left info">
              <p><?php echo Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

          
        

        <?php



echo dmstr\widgets\Menu::widget(
                [
                    'options' => [
                        'class' => 'sidebar-menu',
                        'icon' => 'fa fa-user',
                        'label' => '<span class="glyphicon glyphicon-user"></span>',
                    ],
                    'items' =>
                    MenuHelper::getAssignedMenu(Yii::$app->user->id),
        ]);
        ?>

    </section>

</aside>
