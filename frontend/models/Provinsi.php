<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $id
 * @property string $nama
 * @property string $id_negara
 *
 * @property Kabupaten[] $kabupatens
 * @property Negara $idNegara
 * @property TravelerPosting[] $travelerPostings
 * @property TravelerPosting[] $travelerPostings0
 * @property User[] $users
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama', 'id_negara'], 'required'],
            [['id'], 'string', 'max' => 11],
            [['nama', 'id_negara'], 'string', 'max' => 64],
            [['id_negara'], 'exist', 'skipOnError' => true, 'targetClass' => Negara::className(), 'targetAttribute' => ['id_negara' => 'id']],
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
            'id_negara' => 'Id Negara',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['id_provinsi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNegara()
    {
        return $this->hasOne(Negara::className(), ['id' => 'id_negara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_prov_asal' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings0()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_prov_destinasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_prov' => 'id']);
    }
}
