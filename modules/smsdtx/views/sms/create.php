<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sms */

$this->title = 'Crear Sms';
$this->params['breadcrumbs'][] = ['label' => 'Sms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="sms-create">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>

</div>
