<?php

use yii\helpers\Html;
use ZakharovAndrew\pages\Module;

/* @var $this yii\web\View */
/* @var $searchModel ZakharovAndrew\pages\models\Pages */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js');
$script = <<< JS
        
ClassicEditor
    .create( document.querySelector( '#pages-content' ) )
    .catch( error => {
        console.error( error );
    } );

JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>

<div class="pages-form">

    <?php $form = ($bootstrapVersion == 5 ? yii\bootstrap5\ActiveForm::begin() : yii\widgets\ActiveForm::begin()); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <p>
            <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php ($bootstrapVersion == 5 ? yii\bootstrap5\ActiveForm::end() : yii\widgets\ActiveForm::end()); ?>

</div>
