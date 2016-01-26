<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Samochod;

/**
 * SamochodSearch represents the model behind the search form about `app\models\Samochod`.
 */
class SamochodSearch extends Samochod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pojemnosc'], 'integer'],
            [['model', 'opis', 'zdjecie1', 'zdjecie2', 'zdjecie3', 'zdjecie4', 'miniatura'], 'safe'],
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
        $query = Samochod::find();

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
            'id' => $this->id,
            'pojemnosc' => $this->pojemnosc,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'opis', $this->opis])
            ->andFilterWhere(['like', 'zdjecie1', $this->zdjecie1])
            ->andFilterWhere(['like', 'zdjecie2', $this->zdjecie2])
            ->andFilterWhere(['like', 'zdjecie3', $this->zdjecie3])
            ->andFilterWhere(['like', 'zdjecie4', $this->zdjecie4])
            ->andFilterWhere(['like', 'miniatura', $this->miniatura]);

        return $dataProvider;
    }
}
