<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelerPostingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="traveler-posting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_negara_asal') ?>

    <?= $form->field($model, 'id_prov_asal') ?>

    <?= $form->field($model, 'id_kab_asal') ?>

    <?php // echo $form->field($model, 'id_kec_asal') ?>

    <?php // echo $form->field($model, 'id_negara_destinasi') ?>

    <?php // echo $form->field($model, 'id_prov_destinasi') ?>

    <?php // echo $form->field($model, 'id_kab_destinasi') ?>

    <?php // echo $form->field($model, 'id_kec_destinasi') ?>

    <?php // echo $form->field($model, 'id_travel_frek') ?>

    <?php // echo $form->field($model, 'day_departure') ?>

    <?php // echo $form->field($model, 'day_arrival') ?>

    <?php // echo $form->field($model, 'id_barang') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'id_basis_harga') ?>

    <?php // echo $form->field($model, 'weight_price') ?>

    <?php // echo $form->field($model, 'volume_price') ?>

    <?php // echo $form->field($model, 'person_price') ?>

    <?php // echo $form->field($model, 'other_price') ?>

    <?php // echo $form->field($model, 'contact_phone') ?>

    <?php // echo $form->field($model, 'contact_bb') ?>

    <?php // echo $form->field($model, 'contact_wa') ?>

    <?php // echo $form->field($model, 'contact_email') ?>

    <?php // echo $form->field($model, 'id_payment') ?>

    <?php // echo $form->field($model, 'id_status_pos') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
