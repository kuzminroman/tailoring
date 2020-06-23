<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Client;

/**
 * ClientSearch represents the model behind the search form of `common\models\Client`.
 */
class ClientSearch extends Client
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'type', 'approve', 'status'], 'integer'],
            [['name', 'mail', 'desc', 'dateCreate', 'dateUpdate', 'viewCategory', 'typeWork', 'title', 'keywords', 'descriptionSeo'], 'safe'],
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
        $query = Client::find();

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
            'gender' => $this->gender,
            'type' => $this->type,
            'dateCreate' => $this->dateCreate,
            'dateUpdate' => $this->dateUpdate,
            'approve' => $this->approve,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'viewCategory', $this->viewCategory])
            ->andFilterWhere(['like', 'typeWork', $this->typeWork])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'descriptionSeo', $this->descriptionSeo]);

        return $dataProvider;
    }
}
