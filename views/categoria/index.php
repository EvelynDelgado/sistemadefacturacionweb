<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="table-responsive">
                    <?php // echo $this->render('_buscar', ['model' => $searchModel]); ?>

                    <p>
                        <?= Html::a('Crear Categoria <span class=\'glyphicon glyphicon-plus\'></span>', ['crear'], ['class' => 'btn btn-success']) ?>
                    </p>

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
                            //                     'id',
                            
                            // 'seo_slug',
                            [
                                'label' => 'imagen',
                                'format' => 'raw',
                                'value' => function($data) {
                                    $url = $data->imagen;

                                    if ($url == "") {
                                        return Html::img('@web/imgenes/categorias/0.png', ['width' => '80', 'height' => '80', 'class' => 'user-image']);
                                    } else {

                                        return Html::img('@web/' . $url, ['width' => '80', 'height' => '80', 'class' => 'user-image']);
                                    }
                                }
                                    ],
                                 'nombre',
                                    [
                                        'class' => app\helpers\vistas\botonesPersonalizados::className(),
                                    ],
                                ],
                            ]);
                            ?>
                </div>

    </div>
</div>