<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $hrurl
 * @property string $seo_insert
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $pagehead
 * @property string $pagedescription
 * @property string $text
 * @property string $imagelink
 * @property string $imagelink_alt
 * @property string $sendtopage
 * @property string $promolink
 * @property string $promoname
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seo_insert', 'description', 'keywords', 'pagedescription', 'text'], 'string'],
            [['title', 'description'], 'required'],
            [['hrurl', 'title', 'pagehead', 'imagelink', 'imagelink_alt', 'sendtopage', 'promolink', 'promoname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hrurl' => 'Hrurl',
            'seo_insert' => 'Seo Insert',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'pagehead' => 'Pagehead',
            'pagedescription' => 'Pagedescription',
            'text' => 'Text',
            'imagelink' => 'Imagelink',
            'imagelink_alt' => 'Imagelink Alt',
            'sendtopage' => 'Sendtopage',
            'promolink' => 'Promolink',
            'promoname' => 'Promoname',
        ];
    }
}
