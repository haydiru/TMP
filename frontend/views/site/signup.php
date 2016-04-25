<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\#signupform */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
$negaras = ArrayHelper::map($negara,'id','nama');


?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
				
				<?= $form->field($model, 'nama_depan') ?>
				<?= $form->field($model, 'nama_tengah') ?>
				<?= $form->field($model, 'nama_belakang') ?>
				<?= $form->field($model, 'id_sex') ?>
				<?= $form->field($model, 'tg_lahir')->widget(
				DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>
	
				<?= $form->field($model, 'id_negara')->dropDownList($negaras,['prompt'=>'-Pilih Negara-'])?>
				<?= $form->field($model, 'id_provinsi')->dropDownList([],['prompt'=>'-Pilih Provinsi-'])?>
				<?= $form->field($model, 'id_kabupaten')->dropDownList([],['prompt'=>'-Pilih Kabupaten-'])?>
				

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
$this->registerJs('
$("#signupform-id_provinsi").attr("disabled",true);
$("#signupform-id_kabupaten").attr("disabled",true);
$("#signupform-id_negara").change(function(){
	$.get("'.Url::to(['get-provinsi','negara_id'=>'']).'"+$(this).val(), function(data)
	{select = $("#signupform-id_provinsi")
	select.empty();
	var options="<option value=\'\'>-Pilih Provinsi-</option>";
	$.each(data.provinsi, function(key,value){
		options += "<option value=\'"+value.id+"\'>"+value.nama+"</option>";
	});
	select.append(options);
	$("#signupform-id_provinsi").attr("disabled",false);
	});
});

$("#signupform-id_provinsi").change(function(){	console.log($(this).val());
	$.get("'.Url::to(['get-kabupaten','provinsi_id'=>'']).'"+$(this).val(), function(data)
	{select = $("#signupform-id_kabupaten")
	select.empty();

	var options="<option value=\'\'>-Pilih Kabupaten-</option>";
	$.each(data.kabupaten, function(key,value){
		options += "<option value=\'"+value.id+"\'>"+value.nama+"</option>";
	});
	select.append(options);
	$("#signupform-id_kabupaten").attr("disabled",false);
	});
});

');
?>
