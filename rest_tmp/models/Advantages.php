<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advantages".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $long_text
 * @property string $image
 */
class Advantages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advantages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'long_text', 'image'], 'string'],
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
            'name' => 'Name',
            'description' => 'Description',
            'long_text' => 'Long Text',
            'image' => 'Image',
        ];
    }
}
