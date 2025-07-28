<?php

use yii\helpers\Html;
use ZakharovAndrew\pages\Module;

/* @var $this yii\web\View */
/* @var $model ZakharovAndrew\pages\models\Pages */

$this->title = !empty($model->meta_title) ? $model->meta_title : $model->title;

//SEO
if (!empty($model->meta_description)) {
    $this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
}
if (!empty($model->meta_keywords)) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => $model->meta_keywords]);
}
$this->registerMetaTag(['name' => 'og:title', 'content' => $this->title]);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'article']);

Yii::$app->view->registerLinkTag([
    'rel' => 'canonical', 
    'href' => Yii::$app->urlManager->createAbsoluteUrl(['/pages/default/view', 'url' => $model->url])
]);
?>
<div class="page">
    <?php if (Yii::$app->getModule('pages')->showTitle) {?><h1><?= Html::encode($this->title) ?></h1><?php } ?>

    <p><?= $model->content; ?></p>
</div>
<?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->hasRole('admin')) { ?>
<p>
    <?= Html::a(Module::t('Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
</p>
<?php } ?>
