<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LayananInformasi;

/**
 * LayananInformasiSearch represents the model behind the search form of `\app\models\LayananInformasi`.
 */
class LayananInformasiSearch extends LayananInformasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kd_jenis_permohonan', 'id_user', 'id_ekskalasi', 'id_status', 'id_admin'], 'integer'],
            [['created_date', 'kebutuhan_informasi', 'tujuan_kebutuhan_informasi', 'last_update', 'jawaban', 'tanggal_jawaban'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = LayananInformasi::find();

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
            'created_date' => $this->created_date,
            'kd_jenis_permohonan' => $this->kd_jenis_permohonan,
            'id_user' => $this->id_user,
            'id_status' => $this->id_status,
            'last_update' => $this->last_update,
            'tanggal_jawaban' => $this->tanggal_jawaban,
            'id_admin' => $this->id_admin,
            'id_ekskalasi' => $this->id_ekskalasi,
        ]);

        $query->andFilterWhere(['like', 'kebutuhan_informasi', $this->kebutuhan_informasi])
            ->andFilterWhere(['like', 'tujuan_kebutuhan_informasi', $this->tujuan_kebutuhan_informasi])
            ->andFilterWhere(['like', 'jawaban', $this->jawaban])
            ->andFilterWhere(['like', 'catatan_internal', $this->catatan_internal]);

        return $dataProvider;
    }
}
