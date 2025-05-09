<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ZakharovAndrew\pages\models\Pages */

$this->title = $model->title;

//SEO
$this->registerMetaTag(['name' => 'title', 'content' => !empty($model->meta_title) ? $model->meta_title : $model->title]);
?>
<div class="page">


	<h1><?= Html::encode($model->title) ?></h1>

	<p><?= $model->content; ?></p>

</div>
