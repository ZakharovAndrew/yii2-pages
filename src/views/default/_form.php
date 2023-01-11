<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ZakharovAndrew\pages\Module;

/* @var $this yii\web\View */
/* @var $searchModel ZakharovAndrew\pages\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ($bootstrapVersion == 5 ? yii\bootstrap5\ActiveForm::begin() : yii\widgets\ActiveForm::begin()); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <p>
            <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php ($bootstrapVersion == 5 ? yii\bootstrap5\ActiveForm::end() : yii\widgets\ActiveForm::end()); ?>

</div>
