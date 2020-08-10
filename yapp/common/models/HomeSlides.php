<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "home_slides".
 *
 * @property int $id
 * @property string $title
 * @property string $lead
 * @property string $lead2
 * @property string $text
 * @property string $image
 * @property string $promolink
 * @property string $promoname
 */
class HomeSlides extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'home_slides';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lead'], 'required'],
            [['text'], 'string'],
            [['title', 'lead', 'lead2', 'image', 'promolink', 'promoname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'lead' => 'Lead',
            'lead2' => 'Lead2',
            'text' => 'Text',
            'image' => 'Image',
            'promolink' => 'Promolink',
            'promoname' => 'Promoname',
        ];
    }
}
