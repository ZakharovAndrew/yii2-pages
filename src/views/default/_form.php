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

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'content')->textarea(['rows' => 15]) ?>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <?= Module::t('SEO Settings') ?>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true])
                        ->hint(Module::t('Title for search engines (50-60 characters)')) ?>
                    
                    <?= $form->field($model, 'meta_description')->textarea(['rows' => 3])
                        ->hint(Module::t('Page description for search engines (150-160 characters)')) ?>
                    
                    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true])
                        ->hint(Module::t('Comma-separated keywords')) ?>
                    
                    <hr>
                    
                    <h5><?= Module::t('Social Media (OpenGraph)') ?></h5>
                    
                    <?= $form->field($model, 'og_title')->textInput(['maxlength' => true])
                        ->hint(Module::t('Title for social networks')) ?>
                    
                    <?= $form->field($model, 'og_description')->textarea(['rows' => 3])
                        ->hint(Module::t('Description for social networks')) ?>
                    
                    <?= $form->field($model, 'og_image')->textInput(['maxlength' => true])
                        ->hint(Module::t('URL of image for social networks (1200x630 recommended)')) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ($bootstrapVersion == 5 ? yii\bootstrap5\ActiveForm::end() : yii\widgets\ActiveForm::end()); ?>

</div>
