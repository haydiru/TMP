<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "traveler_posting".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $id_negara_asal
 * @property string $id_prov_asal
 * @property string $id_kab_asal
 * @property string $id_kec_asal
 * @property string $id_negara_destinasi
 * @property string $id_prov_destinasi
 * @property string $id_kab_destinasi
 * @property string $id_kec_destinasi
 * @property integer $id_travel_frek
 * @property string $day_departure
 * @property string $day_arrival
 * @property integer $id_barang
 * @property integer $harga
 * @property integer $id_basis_harga
 * @property integer $weight_price
 * @property integer $volume_price
 * @property integer $person_price
 * @property integer $other_price
 * @property integer $contact_phone
 * @property string $contact_bb
 * @property integer $contact_wa
 * @property string $contact_email
 * @property integer $id_payment
 * @property integer $id_status_pos
 * @property integer $create_at
 * @property integer $update_at
 *
 * @property Barang[] $barangs
 * @property Testimoni[] $testimonis
 * @property Barang $idBarang
 * @property BasisHarga $idBasisHarga
 * @property Kabupaten $idKabAsal
 * @property Kabupaten $idKabDestinasi
 * @property Kecamatan $idKecAsal
 * @property Kecamatan $idKecDestinasi
 * @property Negara $idNegaraAsal
 * @property Negara $idNegaraDestinasi
 * @property Payment $idPayment
 * @property Provinsi $idProvAsal
 * @property Provinsi $idProvDestinasi
 * @property Status $idStatusPos
 * @property User $idUser
 */
class TravelerPosting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'traveler_posting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_negara_asal', 'id_prov_asal', 'id_kab_asal', 'id_kec_asal', 'id_negara_destinasi', 'id_prov_destinasi', 'id_kab_destinasi', 'id_kec_destinasi', 'id_travel_frek', 'day_departure', 'day_arrival', 'id_basis_harga', 'id_status_pos'], 'required'],
            [['id_user', 'id_travel_frek', 'id_barang', 'harga', 'id_basis_harga', 'weight_price', 'volume_price', 'person_price', 'other_price', 'contact_phone', 'contact_wa', 'id_payment', 'id_status_pos', 'create_at', 'update_at'], 'integer'],
            [['day_departure', 'day_arrival'], 'safe'],
            [['id_negara_asal', 'id_prov_asal', 'id_kab_asal', 'id_kec_asal', 'id_negara_destinasi', 'id_prov_destinasi', 'id_kab_destinasi', 'id_kec_destinasi'], 'string', 'max' => 11],
            [['contact_bb', 'contact_email'], 'string', 'max' => 64],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['id_barang' => 'id']],
            [['id_basis_harga'], 'exist', 'skipOnError' => true, 'targetClass' => BasisHarga::className(), 'targetAttribute' => ['id_basis_harga' => 'id']],
            [['id_kab_asal'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['id_kab_asal' => 'id']],
            [['id_kab_destinasi'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['id_kab_destinasi' => 'id']],
            [['id_kec_asal'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kec_asal' => 'id']],
            [['id_kec_destinasi'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kec_destinasi' => 'id']],
            [['id_negara_asal'], 'exist', 'skipOnError' => true, 'targetClass' => Negara::className(), 'targetAttribute' => ['id_negara_asal' => 'id']],
            [['id_negara_destinasi'], 'exist', 'skipOnError' => true, 'targetClass' => Negara::className(), 'targetAttribute' => ['id_negara_destinasi' => 'id']],
            [['id_payment'], 'exist', 'skipOnError' => true, 'targetClass' => Payment::className(), 'targetAttribute' => ['id_payment' => 'id']],
            [['id_prov_asal'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_prov_asal' => 'id']],
            [['id_prov_destinasi'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_prov_destinasi' => 'id']],
            [['id_status_pos'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['id_status_pos' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_negara_asal' => 'Negara Asal',
            'id_prov_asal' => 'Provinsi Asal',
            'id_kab_asal' => 'Kabupaten Asal',
            'id_kec_asal' => 'Kecamatan Asal',
            'id_negara_destinasi' => 'Negara Destinasi',
            'id_prov_destinasi' => 'Provinsi Destinasi',
            'id_kab_destinasi' => 'Kabupaten Destinasi',
            'id_kec_destinasi' => 'Kecamatan Destinasi',
            'id_travel_frek' => 'Travel Frekuensi',
            'day_departure' => 'Day Departure',
            'day_arrival' => 'Day Arrival',
            'id_barang' => 'Id Barang',
            'harga' => 'Harga',
            'id_basis_harga' => 'Id Basis Harga',
            'weight_price' => 'Weight Price',
            'volume_price' => 'Volume Price',
            'person_price' => 'Person Price',
            'other_price' => 'Other Price',
            'contact_phone' => 'Contact Phone',
            'contact_bb' => 'Contact Bb',
            'contact_wa' => 'Contact Wa',
            'contact_email' => 'Contact Email',
            'id_payment' => 'Id Payment',
            'id_status_pos' => 'Id Status Pos',
            'keterangan' => 'Keterangan',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangs()
    {
        return $this->hasMany(Barang::className(), ['id_traveler_posting' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestimonis()
    {
        return $this->hasMany(Testimoni::className(), ['id_traveler_posting' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'id_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBasisHarga()
    {
        return $this->hasOne(BasisHarga::className(), ['id' => 'id_basis_harga']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKabAsal()
    {
        return $this->hasOne(Kabupaten::className(), ['id' => 'id_kab_asal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKabDestinasi()
    {
        return $this->hasOne(Kabupaten::className(), ['id' => 'id_kab_destinasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKecAsal()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'id_kec_asal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKecDestinasi()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'id_kec_destinasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNegaraAsal()
    {
        return $this->hasOne(Negara::className(), ['id' => 'id_negara_asal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNegaraDestinasi()
    {
        return $this->hasOne(Negara::className(), ['id' => 'id_negara_destinasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPayment()
    {
        return $this->hasOne(Payment::className(), ['id' => 'id_payment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProvAsal()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'id_prov_asal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProvDestinasi()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'id_prov_destinasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStatusPos()
    {
        return $this->hasOne(Status::className(), ['id' => 'id_status_pos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
