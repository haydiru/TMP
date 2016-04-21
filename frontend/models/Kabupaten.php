<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property string $id
 * @property string $nama
 * @property string $id_provinsi
 *
 * @property Provinsi $idProvinsi
 * @property Kecamatan[] $kecamatans
 * @property TravelerPosting[] $travelerPostings
 * @property TravelerPosting[] $travelerPostings0
 * @property User[] $users
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama', 'id_provinsi'], 'required'],
            [['id'], 'string', 'max' => 11],
            [['nama', 'id_provinsi'], 'string', 'max' => 64],
            [['id_provinsi'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_provinsi' => 'id']],
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
            'id_provinsi' => 'Id Provinsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'id_provinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatans()
    {
        return $this->hasMany(Kecamatan::className(), ['id_kabupaten' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_kab_asal' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings0()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_kab_destinasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_kab' => 'id']);
    }
}
