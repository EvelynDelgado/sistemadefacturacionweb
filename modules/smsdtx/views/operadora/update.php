<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operadora */

$this->title = 'Modificar Operadora: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Operadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>

    <div class="operadora-update">   
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>


</div>
