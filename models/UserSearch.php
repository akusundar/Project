<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'RFID_NUMBER'], 'integer'],
            [['username', 'email', 'collegeid', 'password'], 'safe'],
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
	    if(Yii::$app->user->identity->username == "superadmin"){
			$query = User::find();
		}else{
			$query = User::find()->where(['iduser'=>Yii::$app->user->identity->id]);
		}	

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'iduser' => $this->iduser,
            'RFID_NUMBER' => $this->RFID_NUMBER,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'collegeid', $this->collegeid])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
