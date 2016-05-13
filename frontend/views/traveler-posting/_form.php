<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use dosamigos\datepicker\DatePicker;
use dosamigos\datepicker\DateRangePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\TravelerPosting */
/* @var $form yii\widgets\ActiveForm */
$negara = \frontend\models\Negara::find()->all();
$negara = ArrayHelper::map($negara,'id','nama');
$payment = \frontend\models\Payment::find()->all();
$payment = ArrayHelper::map($payment,'id','nama');
$basisharga = \frontend\models\BasisHarga::find()->all();
$basisharga = ArrayHelper::map($basisharga,'id','nama');
$namaBarang = \frontend\models\TypeBarang::find()->orderBy('nama')->all();
$namaBarang = ArrayHelper::map($namaBarang,'id','nama');


?>

<div class="traveler-posting-form">

    <?php $form = ActiveForm::begin(); ?>
	   <div class="row">
<div class="col-md-3">
<?= $form->field($model, 'id_negara_asal')->dropDownList($negara,['prompt'=>'-Pilih Negara-'])?>
</div>
<div class="col-md-3">
				<?= $form->field($model, 'id_prov_asal')->dropDownList([],['prompt'=>'-Pilih Provinsi-'])?>
</div>
<div class="col-md-3">
				<?= $form->field($model, 'id_kab_asal')->dropDownList([],['prompt'=>'-Pilih Kabupaten-'])?>
</div>
<div class="col-md-3">
</div>
   </div>
   
	   <div class="row">
<div class="col-md-3">
<?= $form->field($model, 'id_negara_destinasi')->dropDownList($negara,['prompt'=>'-Pilih Negara-'])?>
</div>
<div class="col-md-3">
				<?= $form->field($model, 'id_prov_destinasi')->dropDownList([],['prompt'=>'-Pilih Provinsi-'])?>
</div>
<div class="col-md-3">
				<?= $form->field($model, 'id_kab_destinasi')->dropDownList([],['prompt'=>'-Pilih Kabupaten-'])?>
</div>
<div class="col-md-3">
</div>
   </div>

    <?= $form->field($model, 'id_travel_frek')->dropDownList([1=>'Harian',2=>'Mingguan',3=>'Bulanan',],['prompt'=>'-Frekuensi travel-'])?>
	   <div class="row">
<div class="col-md-6">
<?= $form->field($model, 'day_departure')->widget(DateRangePicker::className(), [
    'attributeTo' => 'day_arrival', 
    'form' => $form, // best for correct client validation
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-m-d'
    ]
])->label('Tanggal Perjalanan');?>
</div></div>
	   <div class="row">
<div class="col-md-3">
    <?= $form->field($model, 'barang')->widget(\kartik\typeahead\TypeaheadBasic::classname(), [
    'data' => $namaBarang,
    'pluginOptions' => ['highlight' => true],
    'options' => ['placeholder' => 'Filter as you type ...'],
]) ?>
</div><div class="col-md-3">
<?= $form->field($model, 'id_basis_harga')->dropDownList($basisharga,['prompt'=>'-Pilih Basis Harga-'])?>
</div><div class="col-md-3">
   <?= $form->field($model, 'harga')->textInput() ?>
	</div></div>
<?= $form->field($model, 'keterangan')->textArea(['rows' => '6']) ?>
	   <div class="row">
<div class="col-md-3">
    <?= $form->field($model, 'contact_phone')->textInput() ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'contact_bb')->textInput(['maxlength' => true]) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'contact_wa')->textInput() ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'contact_email')->textInput(['maxlength' => true]) ?>
</div></div>
<?= $form->field($model, 'id_payment')->dropDownList($payment,['prompt'=>'-Pilih Cara Pembayaran-'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs('
$("#travelerposting-id_prov_asal").attr("disabled",true);
$("#travelerposting-id_prov_destinasi").attr("disabled",true);
$("#travelerposting-id_kab_asal").attr("disabled",true);
$("#travelerposting-id_kab_destinasi").attr("disabled",true);
$("#travelerposting-id_negara_asal").change(function(){
	$.get("'.Url::to(['site/get-provinsi','negara_id'=>'']).'"+$(this).val(), function(data)
	{select = $("#travelerposting-id_prov_asal")
	select.empty();
	var options="<option value=\'\'>-Pilih Provinsi-</option>";
	$.each(data.provinsi, function(key,value){
		options += "<option value=\'"+value.id+"\'>"+value.nama+"</option>";
	});
	select.append(options);
	$("#travelerposting-id_prov_asal").attr("disabled",false);
	});
});

$("#travelerposting-id_negara_destinasi").change(function(){
	$.get("'.Url::to(['site/get-provinsi','negara_id'=>'']).'"+$(this).val(), function(data)
	{select = $("#travelerposting-id_prov_destinasi")
	select.empty();
	var options="<option value=\'\'>-Pilih Provinsi-</option>";
	$.each(data.provinsi, function(key,value){
		options += "<option value=\'"+value.id+"\'>"+value.nama+"</option>";
	});
	select.append(options);
	$("#travelerposting-id_prov_destinasi").attr("disabled",false);
	});
});


$("#travelerposting-id_prov_asal").change(function(){
	$.get("'.Url::to(['site/get-kabupaten','provinsi_id'=>'']).'"+$(this).val(), function(data)
	{select = $("#travelerposting-id_kab_asal")
	select.empty();
	var options="<option value=\'\'>-Pilih Kabupaten-</option>";
	$.each(data.kabupaten, function(key,value){
		options += "<option value=\'"+value.id+"\'>"+value.nama+"</option>";
	});
	select.append(options);
	$("#travelerposting-id_kab_asal").attr("disabled",false);
	});
});

$("#travelerposting-id_prov_destinasi").change(function(){
	$.get("'.Url::to(['site/get-kabupaten','provinsi_id'=>'']).'"+$(this).val(), function(data)
	{select = $("#travelerposting-id_kab_destinasi")
	select.empty();
	var options="<option value=\'\'>-Pilih Kabupaten-</option>";
	$.each(data.kabupaten, function(key,value){
		options += "<option value=\'"+value.id+"\'>"+value.nama+"</option>";
	});
	select.append(options);
	$("#travelerposting-id_kab_destinasi").attr("disabled",false);
	});
});
');
?>
