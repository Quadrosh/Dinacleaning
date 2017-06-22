<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "callme".
 *
 * @property integer $id
 * @property string $phone
 * @property string $comment
 * @property string $date
 */
class Callme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'callme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['date'], 'safe'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'comment' => 'Comment',
            'date' => 'Date',
        ];
    }
}
