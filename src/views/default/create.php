<?php

use yii\helpers\Html;
use ZakharovAndrew\pages\Module;

/* @var $this yii\web\View */
/* @var $searchModel ZakharovAndrew\pages\models\Pages */

$this->title = Module::t('Create page');
$this->params['breadcrumbs'][] = ['label' => Module::t('Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
