<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelerPosting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="traveler-posting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_negara_asal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_prov_asal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kab_asal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kec_asal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_negara_destinasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_prov_destinasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kab_destinasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kec_destinasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_travel_frek')->textInput() ?>

    <?= $form->field($model, 'day_departure')->textInput() ?>

    <?= $form->field($model, 'day_arrival')->textInput() ?>

    <?= $form->field($model, 'id_barang')->textInput() ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'id_basis_harga')->textInput() ?>

    <?= $form->field($model, 'weight_price')->textInput() ?>

    <?= $form->field($model, 'volume_price')->textInput() ?>

    <?= $form->field($model, 'person_price')->textInput() ?>

    <?= $form->field($model, 'other_price')->textInput() ?>

    <?= $form->field($model, 'contact_phone')->textInput() ?>

    <?= $form->field($model, 'contact_bb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_wa')->textInput() ?>

    <?= $form->field($model, 'contact_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_payment')->textInput() ?>

    <?= $form->field($model, 'id_status_pos')->textInput() ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <?= $form->field($model, 'update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
