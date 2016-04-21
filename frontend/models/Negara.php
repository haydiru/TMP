<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "negara".
 *
 * @property string $id
 * @property string $nama
 *
 * @property Provinsi[] $provinsis
 * @property TravelerPosting[] $travelerPostings
 * @property TravelerPosting[] $travelerPostings0
 * @property User[] $users
 */
class Negara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'negara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 11],
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
    public function getProvinsis()
    {
        return $this->hasMany(Provinsi::className(), ['id_negara' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_negara_asal' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings0()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_negara_destinasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_negara' => 'id']);
    }
}
