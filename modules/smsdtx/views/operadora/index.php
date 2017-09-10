<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperadoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operadoras';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="operadora-index">

                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            
            <p>
                <?= Html::a('Crear Operadora', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
                                        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'nombre',

                ['class' => 'yii\grid\ActionColumn'],
                ],
                ]); ?>
                                </div>


    </div>
</div>