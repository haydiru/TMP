<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelerPosting */

$this->title = 'Create Traveler Posting';
$this->params['breadcrumbs'][] = ['label' => 'Traveler Postings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$negara = ArrayHelper::map($negara,'id','nama');
?>
<div class="traveler-posting-create">

    <h1><?= Html::encode($this->title) ?></h1>
 
        
    <?= $this->render('_form', [
        'model' => $model,
        'negara' => $negara,
    ]) ?>


</div>
