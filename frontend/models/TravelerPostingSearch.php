<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TravelerPosting;

/**
 * TravelerPostingSearch represents the model behind the search form about `frontend\models\TravelerPosting`.
 */
class TravelerPostingSearch extends TravelerPosting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_travel_frek', 'id_barang', 'harga', 'id_basis_harga', 'weight_price', 'volume_price', 'person_price', 'other_price', 'contact_phone', 'contact_wa', 'id_payment', 'id_status_pos', 'create_at', 'update_at'], 'integer'],
            [['id_negara_asal', 'id_prov_asal', 'id_kab_asal', 'id_kec_asal', 'id_negara_destinasi', 'id_prov_destinasi', 'id_kab_destinasi', 'id_kec_destinasi', 'day_departure', 'day_arrival', 'contact_bb', 'contact_email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TravelerPosting::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_travel_frek' => $this->id_travel_frek,
            'day_departure' => $this->day_departure,
            'day_arrival' => $this->day_arrival,
            'id_barang' => $this->id_barang,
            'harga' => $this->harga,
            'id_basis_harga' => $this->id_basis_harga,
            'weight_price' => $this->weight_price,
            'volume_price' => $this->volume_price,
            'person_price' => $this->person_price,
            'other_price' => $this->other_price,
            'contact_phone' => $this->contact_phone,
            'contact_wa' => $this->contact_wa,
            'id_payment' => $this->id_payment,
            'id_status_pos' => $this->id_status_pos,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'id_negara_asal', $this->id_negara_asal])
            ->andFilterWhere(['like', 'id_prov_asal', $this->id_prov_asal])
            ->andFilterWhere(['like', 'id_kab_asal', $this->id_kab_asal])
            ->andFilterWhere(['like', 'id_kec_asal', $this->id_kec_asal])
            ->andFilterWhere(['like', 'id_negara_destinasi', $this->id_negara_destinasi])
            ->andFilterWhere(['like', 'id_prov_destinasi', $this->id_prov_destinasi])
            ->andFilterWhere(['like', 'id_kab_destinasi', $this->id_kab_destinasi])
            ->andFilterWhere(['like', 'id_kec_destinasi', $this->id_kec_destinasi])
            ->andFilterWhere(['like', 'contact_bb', $this->contact_bb])
            ->andFilterWhere(['like', 'contact_email', $this->contact_email]);

        return $dataProvider;
    }
}
