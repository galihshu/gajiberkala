<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Akun2;

/**
 * Akun2Search represents the model behind the search form about `common\models\Akun2`.
 */
class Akun2Search extends Akun2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_akun1', 'kd_akun2'], 'integer'],
            [['akun2'], 'safe'],
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
        $query = Akun2::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'kd_akun1' => $this->kd_akun1,
            'kd_akun2' => $this->kd_akun2,
        ]);

        $query->andFilterWhere(['like', 'akun2', $this->akun2]);

        return $dataProvider;
    }
}
