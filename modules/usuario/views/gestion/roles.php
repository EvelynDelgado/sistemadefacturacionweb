<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid;

$this->title = 'Administración de Roles, Rutas, Menu';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="roles-index">
    <iframe src="<?php echo Yii::$app->homeUrl . '/admin' ?>" style="zoom:0.99" width="100%" height="800" frameborder="0"></iframe>
</div>