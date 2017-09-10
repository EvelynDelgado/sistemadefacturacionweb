<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use yii\helpers\Html;

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                            \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                }
                ?>
            </h1>
        <?php } ?>

        <?=
        Breadcrumbs::widget(
                [
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]
        )
        ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <?php Html::img('@web/img/logo/facci.png', ['width' => '120', 'height' => '100', 'class' => 'img-responsive']); ?>
    </div>
    <strong>Copyright © 2015 - <?php echo date("Y"); ?> <a target="_blank" href="#">  </a>.</strong>
</footer>



<style>
    /*.skin-blue .main-header .logo {
        background-color: #1976D2;
    
    }
    
         .skin-blue .main-header .navbar {
        background-color: #1976D2
    }
    */
    .form-group.has-success label {
        color: #367fa9;
    }
    .form-group.has-success .form-control, .form-group.has-success .input-group-addon {
        border-color: #367fa9;
        box-shadow: none;
    }

    .btn {

        border: 1px solid transparent;
        border-radius: 0px;
    }

    .has-success.select2-container--krajee .select2-dropdown, .has-success .select2-container--krajee .select2-selection {
        border-color: #367fa9;
    }

    .has-success .select2-container--open .select2-selection, .has-success .select2-container--krajee.select2-container--focus .select2-selection {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #367fa9;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #367fa9;
        border-color: #367fa9;
    }



</style>
