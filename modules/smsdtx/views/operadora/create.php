<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Operadora */

$this->title = 'Crear Operadora';
$this->params['breadcrumbs'][] = ['label' => 'Operadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="operadora-create">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>

</div>
