<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PagesSection;

/**
 * PagesSectionSearch represents the model behind the search form of `common\models\PagesSection`.
 */
class PagesSectionSearch extends PagesSection
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'page_id', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['head', 'description', 'text', 'conclusion', 'image', 'image_alt', 'image_title', 'call2action_description', 'call2action_name', 'call2action_link', 'call2action_class', 'call2action_comment', 'structure', 'custom_class', 'color_key', 'view'], 'safe'],
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
        $query = PagesSection::find();

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
            'page_id' => $this->page_id,
            'sort' => $this->sort,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'head', $this->head])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'conclusion', $this->conclusion])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'image_alt', $this->image_alt])
            ->andFilterWhere(['like', 'image_title', $this->image_title])
            ->andFilterWhere(['like', 'call2action_description', $this->call2action_description])
            ->andFilterWhere(['like', 'call2action_name', $this->call2action_name])
            ->andFilterWhere(['like', 'call2action_link', $this->call2action_link])
            ->andFilterWhere(['like', 'call2action_class', $this->call2action_class])
            ->andFilterWhere(['like', 'call2action_comment', $this->call2action_comment])
            ->andFilterWhere(['like', 'structure', $this->structure])
            ->andFilterWhere(['like', 'custom_class', $this->custom_class])
            ->andFilterWhere(['like', 'color_key', $this->color_key])
            ->andFilterWhere(['like', 'view', $this->view]);

        return $dataProvider;
    }
}
