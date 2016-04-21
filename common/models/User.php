<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
			[['tg_lahir'], 'safe'],
            [['id_sex', 'id_status', 'status', 'created_at', 'updated_at'], 'integer'],
            [['id_scan'], 'string'],
            [['email'], 'required'],
            [['username', 'email'], 'string', 'max' => 255],
            [['nama_depan', 'nama_tengah', 'nama_belakang'], 'string', 'max' => 64],
            [['id_negara', 'id_prov', 'id_kab', 'id_kec'], 'string', 'max' => 11],
        ];
    }
	
	    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'nama_depan' => 'Nama Depan',
            'nama_tengah' => 'Nama Tengah',
            'nama_belakang' => 'Nama Belakang',
            'tg_lahir' => 'Tg Lahir',
            'id_sex' => 'Id Sex',
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
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
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