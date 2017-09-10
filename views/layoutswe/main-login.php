<?php

use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>




    <body class="login-page">

        <?php $this->beginBody() ?>

        <?= $content ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>


<style type="text/css">

    .form-group.has-success label {
        color: #367fa9;
    }
    .form-group.has-success .form-control, .form-group.has-success .input-group-addon {
        border-color: #367fa9;
        box-shadow: none;
    }


.has-success.select2-container--krajee .select2-dropdown, .has-success .select2-container--krajee .select2-selection {
    border-color: #367fa9;
}

.has-success .select2-container--open .select2-selection, .has-success .select2-container--krajee.select2-container--focus .select2-selection {
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #367fa9;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #367fa9;
    border-color: #367fa9;
}


    

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        /* -webkit-user-select: none; */
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 0px;
    }



</style>

