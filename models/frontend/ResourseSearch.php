<?php

namespace app\models\frontend;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\frontend\Resourse;

/**
 * ResourseSearch represents the model behind the search form of `app\models\frontend\Resourse`.
 */
class ResourseSearch extends Resourse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count', 'user_id'], 'integer'],
            [['name', 'icon'], 'safe'],
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
        $query = Resourse::find();

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
            //'id' => $this->id,
            //'count' => $this->count,
            //'user_id' => $this->user_id,
            'like','count' , $this->count,
        ]);

        /*$query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'icon', $this->icon]);*/

        return $dataProvider;
    }
}
