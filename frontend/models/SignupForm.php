<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
	public $nama_depan;
    public $nama_tengah;
    public $nama_belakang;
    public $tg_lahir;
    public $id_negara;
    public $id_provinsi;
    public $id_kabupaten;
    public $id_sex;
    public $term;
	public $verifyCode;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
			['term', 'required','requiredValue' =>1, 'message' => 'Read Term and Condition'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			[['tg_lahir'], 'safe'],
            //[['id_scan'], 'string'],
            [['nama_depan', 'nama_tengah', 'nama_belakang'], 'string', 'max' => 64],
           [['id_negara', 'id_provinsi', 'id_kabupaten'], 'string', 'max' => 11],
           [['id_negara', 'id_provinsi', 'id_kabupaten'],  'required'],
		   ['verifyCode', 'captcha'],

          
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
            'tg_lahir' => 'Tanggal Lahir',
            'id_sex' => 'Jenis Kelamin',
            'id_negara' => 'Negara',
            'id_provinsi' => 'Provinsi',
            'id_kabupaten' => 'Kabupaten',
            'id_kecamatan' => 'Kecamatan',
            'id_scan' => 'Id Scan',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'id_status' => 'Id Status',
            'term' => 'Term and Condition',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
			'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->nama_depan = $this->nama_depan;
        $user->nama_tengah = $this->nama_tengah;
        $user->nama_belakang = $this->nama_belakang;
        $user->tg_lahir = $this->tg_lahir;
        $user->id_sex = $this->id_sex;
        $user->id_negara = $this->id_negara;
        $user->id_prov = $this->id_provinsi;
        $user->id_kab = $this->id_kabupaten;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
