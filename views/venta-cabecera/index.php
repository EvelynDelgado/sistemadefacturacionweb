<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VentaCabeceraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="venta-cabecera-index">

            <?php // echo $this->render('_buscar', ['model' => $searchModel]);  ?>

            <p>
                <?= Html::a('Crear Factura <span class=\'glyphicon glyphicon-plus\'></span>', ['crear'], ['class' => 'btn btn-primary']) ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                    'numero_factura',
                        [
                        // 'label' => 'Categoría',
                        'attribute' => 'cliente_id',
                        'value' => 'cliente.cedulaNombre',
                        //'format' => 'raw',
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'cliente_id',
                            'pluginLoading' => false,
                            'data' => \yii\helpers\ArrayHelper::map(app\models\Cliente::find()->all(), 'id', 'cedulaNombre'),
                            'options' => ['placeholder' => 'Seleccione...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]),
                    ],
                    'fecha',
                    //  'total',
                    //'subtotal',
                    //'iva',
                    // 'cliente_id',
                    [
                       // 'class' => 'kartik\grid\ActionColumn',
                        'class' => app\helpers\vistas\botonesPersonalizados::className(),
                        'header' => 'Actiones',
                        'headerOptions' => ['width' => '150'],
                        'template' => '{imrprimir}{view}{update}',
                        'buttons' => [
                            'imrprimir' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-print"></span>', ['imprimir', 'id' => $model->id], [
                                            'class' => 'btn btn-info', 'target' => ' _blank'
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