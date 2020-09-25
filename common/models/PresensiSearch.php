<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Presensi;

/**
 * PresensiSearch represents the model behind the search form of `common\models\Presensi`.
 */
class PresensiSearch extends Presensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jadwal_id', 'dosen_id', 'status_verifikasi', 'verifikator_id'], 'integer'],
            [['waktu_mulai', 'waktu_selesai', 'pokok_bahasan'], 'safe'],
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
        $query = Presensi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
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
            'jadwal_id' => $this->jadwal_id,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'dosen_id' => $this->dosen_id,
            'status_verifikasi' => $this->status_verifikasi,
            'verifikator_id' => $this->verifikator_id,
        ]);

        $query->andFilterWhere(['like', 'pokok_bahasan', $this->pokok_bahasan]);

        return $dataProvider;
    }
}
