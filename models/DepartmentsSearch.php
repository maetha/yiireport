<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departments;

/**
 * DepartmentsSearch represents the model behind the search form about `app\models\Departments`.
 */
class DepartmentsSearch extends Departments {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id',], 'integer'],
            [['department', 'group_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Departments::find();

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
        $dataProvider->query->joinWith('depgroup');
        $query->andFilterWhere([
            'id' => $this->id,
                //'group_id' => $this->group_id,
        ]);

        $query->andFilterWhere(['like', 'department', $this->department])
                ->andFilterWhere(['like', 'groups.namegroup', $this->group_id])
        ;


        return $dataProvider;
    }

}
