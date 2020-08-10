<?php

namespace common\models;

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
 * @property integer $created_at
 * @property integer $updated_at
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%review}}';
    }

    public function behaviors()
    {
        return [
            'timestamp'  => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'image', 'icon'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
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
