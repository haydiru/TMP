<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "basis_harga".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property TravelerPosting[] $travelerPostings
 */
class BasisHarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'basis_harga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_basis_harga' => 'id']);
    }
}
