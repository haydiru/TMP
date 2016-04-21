<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property string $id
 * @property string $nama
 * @property string $id_kabupaten
 *
 * @property Kabupaten $idKabupaten
 * @property TravelerPosting[] $travelerPostings
 * @property TravelerPosting[] $travelerPostings0
 * @property User[] $users
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama', 'id_kabupaten'], 'required'],
            [['id'], 'string', 'max' => 11],
            [['nama', 'id_kabupaten'], 'string', 'max' => 64],
            [['id_kabupaten'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['id_kabupaten' => 'id']],
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
            'id_kabupaten' => 'Id Kabupaten',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['id' => 'id_kabupaten']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_kec_asal' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings0()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_kec_destinasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_kec' => 'id']);
    }
}
