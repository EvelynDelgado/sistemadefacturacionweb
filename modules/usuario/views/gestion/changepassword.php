<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>

<div class="site-changepassword">
    
    
    <?php $form = ActiveForm::begin([
        'id'=>'changepassword-form',
        'action'=>'changepassword',
        'options'=>['class'=>'form-horizontal'],
       /* 'fieldConfig'=>[
            'template'=>"{label}\n<div class=\"col-lg-3\">
                        {input}</div>\n<div class=\"col-lg-5\">
                        {error}</div>",
            'labelOptions'=>['class'=>'col-lg-2 control-label'],
        ],*/
    ]); ?>
        <?= $form->field($model,'oldpass',['inputOptions'=>[
            'placeholder'=>''
        ]])->passwordInput() ?>
        
        <?= $form->field($model,'newpass',['inputOptions'=>[
            'placeholder'=>''
        ]])->passwordInput() ?>
        
        <?= $form->field($model,'repeatnewpass',['inputOptions'=>[
            'placeholder'=>''
        ]])->passwordInput() ?>
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
                <?= Html::submitButton('Cambiar Clave',[
                    'class'=>'btn btn-primary'
                ]) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>