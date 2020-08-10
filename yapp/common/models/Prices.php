<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prices".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $name
 * @property string $name_descr
 * @property integer $price
 * @property string $price_descr
 */
class Prices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'price', 'list_order'], 'integer'],
            [['name_descr', 'price_descr'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'list_order' => 'List №',
            'type_id' => 'Type ID',
            'name' => 'Name',
            'name_descr' => 'Name Descr',
            'price' => 'Price',
            'price_descr' => 'Price Descr',
        ];
    }


    public function getCleanType(){
        return $this->hasOne(\common\models\CleanType::class,['id'=>'type_id']);
    }
}
