<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
$provs = ArrayHelper::map($prov,'id','nama');
$kabs = ArrayHelper::map($kab,'id','nama');
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
				<?= $form->field($model, 'tg_lahir')->widget(
				DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'd-m-yyyy'
            ]
        ]
    ) ?>
	
				<?= $form->field($model, 'negara')->dropDownList($negaras,['prompt'=>'-Pilih Negara-'])?>
				<?= $form->field($model, 'provinsi')->dropDownList($provs,['prompt'=>'-Pilih Negara-'])?>
				<?= $form->field($model, 'kabupaten')->dropDownList($kabs,['prompt'=>'-Pilih Negara-'])?>
				<?= $form->field($model, 'nama_belakang') ?>
				<?= $form->field($model, 'nama_belakang') ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
