<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property TravelerPosting[] $travelerPostings
 * @property User[] $users
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
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
        return $this->hasMany(TravelerPosting::className(), ['id_status_pos' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_status' => 'id']);
    }
}
