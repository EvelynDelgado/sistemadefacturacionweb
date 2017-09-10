<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Grupo */

$this->title = 'Crear Grupo';
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="grupo-create">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>

</div>
