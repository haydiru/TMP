<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TravelerPosting */

$this->title = 'Create Traveler Posting';
$this->params['breadcrumbs'][] = ['label' => 'Traveler Postings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traveler-posting-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>
