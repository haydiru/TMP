<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $nama_depan
 * @property string $nama_tengah
 * @property string $nama_belakang
 * @property string $tg_lahir
 * @property integer $id_sex
 * @property string $id_negara
 * @property string $id_prov
 * @property string $id_kab
 * @property string $id_kec
 * @property string $id_scan
 * @property string $auth_key
 * @property string $email
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $id_status
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Message[] $messages
 * @property Message[] $messages0
 * @property Testimoni[] $testimonis
 * @property TravelerPosting[] $travelerPostings
 * @property Kabupaten $idKab
 * @property Kecamatan $idKec
 * @property Negara $idNegara
 * @property Provinsi $idProv
 * @property Status $idStatus
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tg_lahir'], 'safe'],
            [['id_sex', 'id_status', 'status', 'created_at', 'updated_at'], 'integer'],
            [['id_scan'], 'string'],
            [['auth_key', 'email', 'password_hash'], 'required'],
            [['username', 'email'], 'string', 'max' => 255],
            [['nama_depan', 'nama_tengah', 'nama_belakang'], 'string', 'max' => 64],
            [['id_negara', 'id_prov', 'id_kab', 'id_kec'], 'string', 'max' => 11],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 225],
            [['id_kab'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['id_kab' => 'id']],
            [['id_kec'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kec' => 'id']],
            [['id_negara'], 'exist', 'skipOnError' => true, 'targetClass' => Negara::className(), 'targetAttribute' => ['id_negara' => 'id']],
            [['id_prov'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_prov' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['id_status' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'nama_depan' => 'Nama Depan',
            'nama_tengah' => 'Nama Tengah',
            'nama_belakang' => 'Nama Belakang',
            'tg_lahir' => 'Tanggal Lahir',
            'id_sex' => 'Jenis Kelamin',
            'id_negara' => 'Id Negara',
            'id_prov' => 'Id Prov',
            'id_kab' => 'Id Kab',
            'id_kec' => 'Id Kec',
            'id_scan' => 'Id Scan',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'id_status' => 'Id Status',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['iduserreceiver' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages0()
    {
        return $this->hasMany(Message::className(), ['idusersender' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestimonis()
    {
        return $this->hasMany(Testimoni::className(), ['id_consumer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelerPostings()
    {
        return $this->hasMany(TravelerPosting::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKab()
    {
        return $this->hasOne(Kabupaten::className(), ['id' => 'id_kab']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKec()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'id_kec']);
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
    public function getIdProv()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'id_prov']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'id_status']);
    }
}
