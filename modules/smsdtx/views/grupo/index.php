<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GrupoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grupos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="grupo-index">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Crear Grupo', ['create'], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Quitar filtros', ['index'], ['class' => 'btn btn-default']) ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                   // 'id',
                    'nombre',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>


    </div>
</div>