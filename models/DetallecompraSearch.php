<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallecompra;

/**
 * DetallecompraSearch represents the model behind the search form of `app\models\Detallecompra`.
 */
class DetallecompraSearch extends Detallecompra
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_Compra', 'ID_Accesorio', 'Lente_idLente', 'ID_Aro', 'Cantidad'], 'integer'],
            [['Precio_Compra', 'Precio_Venta'], 'number'],
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
        $query = Detallecompra::find();

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
            'ID' => $this->ID,
            'ID_Compra' => $this->ID_Compra,
            'ID_Accesorio' => $this->ID_Accesorio,
            'Lente_idLente' => $this->Lente_idLente,
            'ID_Aro' => $this->ID_Aro,
            'Precio_Compra' => $this->Precio_Compra,
            'Cantidad' => $this->Cantidad,
            'Precio_Venta' => $this->Precio_Venta,
        ]);

        return $dataProvider;
    }
}
