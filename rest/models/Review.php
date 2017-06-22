<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $text
 * @property string $image
 * @property string $icon
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'image', 'icon'], 'string'],
            [['name', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя Фамилия',
            'type' => 'Тип уборки',
            'text' => 'Текст',
            'image' => 'Image',
            'icon' => 'Профессия',
        ];
    }
}
