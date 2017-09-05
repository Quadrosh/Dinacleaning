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
            [['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
            ['utm_source', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_medium', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_campaign', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_term', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_content', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
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
            'utm_source' => 'UTM Source',
            'utm_medium' => 'UTM Medium',
            'utm_campaign' => 'UTM Campaign',
            'utm_term' => 'UTM Term',
            'utm_content' => 'UTM Content',
        ];
    }
}
