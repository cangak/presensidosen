<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JadwalDosen;

/**
 * JadwalDosenSearch represents the model behind the search form of `common\models\JadwalDosen`.
 */
class JadwalDosenSearch extends JadwalDosen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jadwal_id', 'dosen_id'], 'integer'],
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
        $query = JadwalDosen::find();

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
            'dosen_id' => $this->dosen_id,
        ]);

        return $dataProvider;
    }
}
