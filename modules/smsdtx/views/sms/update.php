<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sms */

$this->title = 'Modificar Sms: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>

    <div class="sms-update">   
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>


</div>
