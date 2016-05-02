<?php
namespace frontend\controllers;
use Yii;
use frontend\models\Signup;

class ServiceController extends \yii\rest\Controller
{
 protected function verbs()
{
   return [
       'signup-service' => ['GET'],
   ];
}
public function actionSignupService($username,$email,$password,$nama_depan,$nama_tengah,$nama_belakang,$id_sex,$tg_lahir,$id_negara,$id_provinsi,$id_kabupaten)
    {
		\Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        $model = new Signup();
		 if (empty($username) || empty($email) || empty($password) || empty($id_negara)|| empty($id_provinsi)|| empty($id_kabupaten)) {
		$response = [
        'status' => 'error',
        'message' => 'username & password tidak boleh kosong!',
        'data' => '',
      ];
        } else {
	$user = \common\models\User::findByUsername($username);
	if(empty($user)){
	$model->username=$username;
    $model->email=$email;
    $model->password=$password;
	$model->nama_depan=$nama_depan;
    $model->nama_tengah=$nama_tengah;
    $model->nama_belakang=$nama_belakang;
    $model->tg_lahir=$tg_lahir;
    $model->id_negara=$id_negara;
    $model->id_provinsi=$id_provinsi;
    $model->id_kabupaten=$id_kabupaten;
    $model->id_sex=$id_sex;
	$model->signups();
	$users = \common\models\User::findByUsername($username);
	if(!empty($users)){
			$response = [
              'status' => 'success',
              'message' => 'login berhasil!',
              'data' => [
                  'id' => $users->id,
                  'username' => $users->username,
                   //token diambil dari field auth_key
                 'token' => $users->auth_key,
              ],
            ];
	}
	else {
		$response = [
        'status' => 'error',
        'message' => 'signup gagal',
        'data' => '',
		];
	}

			}
		else {
		$response = [
        'status' => 'error',
        'message' => 'username sudah ada yang pakai',
        'data' => '',
      ];	
			}	
        }
		return $response;
    }
	
		  public function actionNegara()
    {
		\Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
         $negara=(new \yii\db\Query())
				->select('*')
				->from('negara')
				->orderBy(['nama'=>SORT_DESC])
				->all(\yii::$app->db);
		return	['negara'=>$negara,];	
    } 
    public function actionProv($negara_id)
    {
        $provi = (new \yii\db\Query())
				->select('*')
				->from('provinsi')
				->where(['id_negara'=>$negara_id])
				->orderBy(['nama'=>SORT_DESC,])
				->all(\yii::$app->db);
		\Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
		return ['provinsi'=>$provi,];
				
    }
	public function actionKab($provinsi_id)
    {	
        $kab = (new \yii\db\Query())
				->select('*')
				->from('kabupaten')
				->where(['id_provinsi'=>$provinsi_id])
				->orderBy(['nama'=>SORT_DESC,])
				->all(\yii::$app->db);
		\Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
		return ['kabupaten'=>$kab,];
				
    }    
	   
	public function actionKec()
    {
        return (new \yii\db\Query())
				->select('*')
				->from('kecamatan')
				->orderBy(['nama'=>SORT_DESC])
				->all(\yii::$app->db);
    }

}