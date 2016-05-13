<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "type_barang".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Barang[] $barangs
 */
class TypeBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_barang';
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
    public function getBarangs()
    {
        return $this->hasMany(Barang::className(), ['id_type_barang' => 'id']);
    }
}
