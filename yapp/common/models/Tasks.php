<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property string $price_description
 * @property string $image
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['parent_id', 'name', 'description', 'price', 'price_description', 'image'], 'required'],
            [['parent_id', 'price'], 'integer'],
            [['description', 'price_description', 'image'], 'string'],
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
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'price_description' => 'Price Description',
            'image' => 'Image',
        ];
    }


    public function getParent(){
        return $this->hasOne(self::class,['id'=>'parent_id']);
    }
}
