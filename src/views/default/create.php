<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = 'Создать страницу';
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="alert alert-info">Можно использовать текст <b>[category_list]12[/category_list]</b> для вставки 6 товаров заданной картегории. Категория задается цифрой</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
