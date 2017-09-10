<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="producto-index">

                                <?php // echo $this->render('_buscar', ['model' => $searchModel]); ?>
            
            <p>
                <?= Html::a('Crear Producto <span class=\'glyphicon glyphicon-plus\'></span>', ['crear'], ['class' => 'btn btn-success']) ?>
            </p>
                                        <div class="table-responsive">
                    <?php // echo $this->render('_buscar', ['model' => $searchModel]); ?>

                  
                    <?=
                    GridView::widget([
                        'tableOptions' => ['class' => ' table-bordered table table-hover'],
                        // 'showFooter' => true,
                        'showHeader' => true,
                        // 'hover' => true,
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [

                            ['class' => 'yii\grid\SerialColumn'],
                            //'id',
                            //'descripcion:ntext',
                            // 'imagen',
                            [
                                'label' => 'imagen',
                                'format' => 'raw',
                                'value' => function($data) {
                                    $url = $data->imagen;

                                    if ($url == "") {
                                        return Html::img('@web/imgenes/productos/0.png', ['width' => '80', 'height' => '80', 'class' => 'user-image']);
                                    } else {

                                        return Html::img('@web/' . $url, ['width' => '80', 'height' => '80', 'class' => 'user-image']);
                                    }
                                }
                                    ],
                                    'nombre',
                                    'precio',
                                    [
                                        //'label'=>'Servicio/Producto',
                                        'attribute' => 'categoria_id',
                                        'value' => 'categoria.nombre',
                                        //'format' => 'raw',
                                        'filter' => Select2::widget([
                                            'model' => $searchModel,
                                            'attribute' => 'categoria_id',
                                            'pluginLoading' => false,
                                            'data' => \yii\helpers\ArrayHelper::map(app\models\Categoria::find()->all(), 'id', 'nombre'),
                                            'options' => ['placeholder' => 'Seleccione...'],
                                            'pluginOptions' => [

                                                'allowClear' => true
                                            ],
                                        ]),
                                    ],
                                    // 'seo_slug',
                                    // 'categoria_id',
                                    [
                                        'class' => app\helpers\vistas\botonesPersonalizados::className(),
                                    ],
                                ],
                            ]);
                            ?>
                </div>

                                </div>


    </div>
</div>