<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Akun1;

/**
 * Akun1Search represents the model behind the search form about `common\models\Akun1`.
 */
class Akun1Search extends Akun1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_akun1'], 'integer'],
            [['akun1'], 'safe'],
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
        $query = Akun1::find();

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
        ]);

        $query->andFilterWhere(['like', 'akun1', $this->akun1]);

        return $dataProvider;
    }
}
