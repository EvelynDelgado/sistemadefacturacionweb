<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contactos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="contacto-index">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Crear Contacto', ['create'], ['class' => 'btn btn-primary']) ?>
                 <?= Html::a('Quitar filtros', ['index'], ['class' => 'btn btn-default']) ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                  //  'id',
                    'nombre',
                    'numero',
                    'correo',
                    'direccion',
                    // 'observacion:ntext',
                    // 'operadora_id',
                    // ['class' => 'yii\grid\ActionColumn'],
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{enviar} {view}{update}{delete}',
                        'buttons' => [

                            'enviar' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-envelope"> </span>', ['sms/sms-individual?contacto=' . $model->id], [
                                            'title' => 'Enviar sms',
                                ]);
                            }
                                ]
                            ],
                        ],
                    ]);
                    ?>
        </div>


    </div>
</div>