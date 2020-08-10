<?php

namespace common\models;

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
 * @property string $image
 * @property string $image_alt
 * @property string $image_title
 * @property string $layout
 * @property string $view
 * @property integer $created_at
 * @property integer $updated_at
 */
class Pages extends \yii\db\ActiveRecord
{
    const VIEW_OPTIONS = [
        'default' => 'default',
    ];

    const LAYOUT_OPTIONS = [
        'default' => 'default',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
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
            [['seo_insert', 'description', 'keywords', 'pagedescription', 'text'], 'string'],
            [['title', 'description'], 'required'],
            [['updated_at', 'created_at'], 'integer'],
            [[
                'hrurl',
                'title',
                'pagehead',
                'imagelink',
                'imagelink_alt',
                'sendtopage',
                'promolink',
                'promoname',
                'image',
                'image_alt',
                'image_title',
                'layout',
                'view',
            ], 'string', 'max' => 255],
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
            'title' => 'meta Title',
            'description' => 'meta Description',
            'keywords' => 'Keywords',
            'pagehead' => 'Page Head H1',
            'pagedescription' => 'Page Head description',
            'text' => 'Text',
            'imagelink' => 'Imagelink',
            'imagelink_alt' => 'Imagelink Alt',
            'sendtopage' => 'Sendtopage',
            'promolink' => 'Promolink',
            'promoname' => 'Promoname',
        ];
    }

    static public function excerpt($text, $maxLength)
    {
        $cutDirtyText = substr($text, 0, $maxLength*3);
        $stripTaggedText = strip_tags($cutDirtyText);
        $cleanText = preg_replace("/&#?[a-z0-9]{2,8};/i"," ",$stripTaggedText);
        if (strlen($cleanText) < $maxLength) {
            return $cleanText;
        }
        $endPosition = strpos($cleanText, ' ', $maxLength);
        if ($endPosition !== false) {
            return substr($cleanText, 0, $endPosition);
        } else {
            return $cleanText;
        }
    }

    static public function cyrillicToLatin($text, $maxLength, $toLowCase=true)
    {
        $dictionary = array(
            'й' => 'i',
            'ц' => 'c',
            'у' => 'u',
            'к' => 'k',
            'е' => 'e',
            'н' => 'n',
            'г' => 'g',
            'ш' => 'sh',
            'щ' => 'shch',
            'з' => 'z',
            'х' => 'h',
            'ъ' => '',
            'ф' => 'f',
            'ы' => 'y',
            'в' => 'v',
            'а' => 'a',
            'п' => 'p',
            'р' => 'r',
            'о' => 'o',
            'л' => 'l',
            'д' => 'd',
            'ж' => 'zh',
            'э' => 'e',
            'ё' => 'e',
            'я' => 'ya',
            'ч' => 'ch',
            'с' => 's',
            'м' => 'm',
            'и' => 'i',
            'т' => 't',
            'ь' => '',
            'б' => 'b',
            'ю' => 'yu',

            'Й' => 'I',
            'Ц' => 'C',
            'У' => 'U',
            'К' => 'K',
            'Е' => 'E',
            'Н' => 'N',
            'Г' => 'G',
            'Ш' => 'SH',
            'Щ' => 'SHCH',
            'З' => 'Z',
            'Х' => 'X',
            'Ъ' => '',
            'Ф' => 'F',
            'Ы' => 'Y',
            'В' => 'V',
            'А' => 'A',
            'П' => 'P',
            'Р' => 'R',
            'О' => 'O',
            'Л' => 'L',
            'Д' => 'D',
            'Ж' => 'ZH',
            'Э' => 'E',
            'Ё' => 'E',
            'Я' => 'YA',
            'Ч' => 'CH',
            'С' => 'S',
            'М' => 'M',
            'И' => 'I',
            'Т' => 'T',
            'Ь' => '',
            'Б' => 'B',
            'Ю' => 'YU',

            '\-' => '-',
            '\s' => '-',
            '[^a-zA-Z0-9\-]' => '',
            '[-]{2,}' => '-',
        );
        foreach ($dictionary as $from => $to) {
            $text = mb_ereg_replace($from, $to, $text);
        }
        $text = mb_substr($text, 0, $maxLength, Yii::$app->charset);
        if ($toLowCase) {
            $text = mb_strtolower($text, Yii::$app->charset);
        }
        return trim($text, '-');
    }



    public function getSections()
    {
        return $this->hasMany(PagesSection::class, ['page_id' => 'id'])->orderBy('sort');
    }
}
