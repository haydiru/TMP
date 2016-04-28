<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelerPosting */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Traveler Postings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traveler-posting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_user',
            'id_negara_asal',
            'id_prov_asal',
            'id_kab_asal',
            'id_kec_asal',
            'id_negara_destinasi',
            'id_prov_destinasi',
            'id_kab_destinasi',
            'id_kec_destinasi',
            'id_travel_frek',
            'day_departure',
            'day_arrival',
            'id_barang',
            'harga',
            'id_basis_harga',
            'weight_price',
            'volume_price',
            'person_price',
            'other_price',
            'contact_phone',
            'contact_bb',
            'contact_wa',
            'contact_email:email',
            'id_payment',
            'id_status_pos',
            'create_at',
            'update_at',
        ],
    ]) ?>

</div>
