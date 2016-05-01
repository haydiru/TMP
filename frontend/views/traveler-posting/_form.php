<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datepicker\DateRangePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\TravelerPosting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="traveler-posting-form">

    <?php $form = ActiveForm::begin(); ?>
	   <div class="row">
<div class="col-lg-3">
<?= $form->field($model, 'id_negara_asal')->dropDownList($negara,['prompt'=>'-Pilih Negara-'])?>
</div>
<div class="col-lg-3">
				<?= $form->field($model, 'id_prov_asal')->dropDownList([],['prompt'=>'-Pilih Provinsi-'])?>
</div>
<div class="col-lg-3">
				<?= $form->field($model, 'id_kab_asal')->dropDownList([],['prompt'=>'-Pilih Kabupaten-'])?>
</div>
<div class="col-lg-3">
    <?= $form->field($model, 'id_kec_asal')->textInput(['maxlength' => true]) ?>
</div>
   </div>
   
	   <div class="row">
<div class="col-lg-3">
<?= $form->field($model, 'id_negara_destinasi')->dropDownList($negara,['prompt'=>'-Pilih Negara-'])?>
</div>
<div class="col-lg-3">
				<?= $form->field($model, 'id_prov_destinasi')->dropDownList([],['prompt'=>'-Pilih Provinsi-'])?>
</div>
<div class="col-lg-3">
				<?= $form->field($model, 'id_kab_destinasi')->dropDownList([],['prompt'=>'-Pilih Kabupaten-'])?>
</div>
<div class="col-lg-3">
    <?= $form->field($model, 'id_kec_destinasi')->textInput(['maxlength' => true]) ?>
</div>
   </div>

    <?= $form->field($model, 'id_travel_frek')->dropDownList([1=>'Harian',2=>'Mingguan',3=>'Bulanan',],['prompt'=>'-Frekuensi travel-'])?>
	   <div class="row">
<div class="col-lg-6">
<?= $form->field($model, 'day_departure')->widget(DateRangePicker::className(), [
    'attributeTo' => 'day_arrival', 
    'form' => $form, // best for correct client validation
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'dd-M-yyyy'
    ]
])->label('Tanggal Perjalanan');?>
</div></div>
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
