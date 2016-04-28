<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property integer $id
 * @property integer $id_traveler_posting
 * @property integer $id_type_barang
 *
 * @property TravelerPosting $idTravelerPosting
 * @property TypeBarang $idTypeBarang
 * @property TravelerPosting[] $travelerPostings
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_traveler_posting', 'id_type_barang'], 'required'],
            [['id_traveler_posting', 'id_type_barang'], 'integer'],
            [['id_traveler_posting'], 'exist', 'skipOnError' => true, 'targetClass' => TravelerPosting::className(), 'targetAttribute' => ['id_traveler_posting' => 'id']],
            [['id_type_barang'], 'exist', 'skipOnError' => true, 'targetClass' => TypeBarang::className(), 'targetAttribute' => ['id_type_barang' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_traveler_posting' => 'Id Traveler Posting',
            'id_type_barang' => 'Id Type Barang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTravelerPosting()
    {
        return $this->hasOne(TravelerPosting::className(), ['id' => 'id_traveler_posting']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTypeBarang()
    {
        return $this->hasOne(TypeBarang::className(), ['id' => 'id_type_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_barang' => 'id']);
    }
}
