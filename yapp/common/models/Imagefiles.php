<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "imagefiles".
 *
 * @property int $id
 * @property int $object_id
 * @property string $name
 * @property string $object_type
 * @property string $alt
 * @property string $title
 * @property string $comment
 */
class Imagefiles extends \yii\db\ActiveRecord
{
    const OBJ_TYPE_APARTMENT = 'apartment';
    const OBJ_TYPE_APARTMENT_IMAGE = 'apartment_image';
    const OBJ_TYPE_APARTMENT_THUMB = 'apartment_thumb';
    const OBJ_TYPE_HOUSE = 'house';
    const OBJ_TYPE_ARTICLE = 'article';
    const OBJ_TYPE_ARTICLE_SECTION = 'article_section';
    const OBJ_TYPE_ARTICLE_SECTION_BLOCK = 'article_section_block';
    const OBJ_TYPE_ARTICLE_SECTION_BLOCK_ITEM = 'article_section_block_item';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imagefiles';
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique',  'message' => 'Файл "{value}" уже существует, измени имя загружаемого файла или назначь существующий'],
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

        ];
    }


    public static function addNew($name, $replace=null)
    {
        $_model = new self;
        if ($replace) {
            if (Imagefiles::find()->where(['name'=>$name])->one()) {
                $_model = Imagefiles::find()->where(['name'=>$name])->one();
            }
        }

        $_model->name = $name;

        if ($_model->validate()) {
            if ($_model->save()) {
                return $_model;
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка сохранения imagefile');
                return false;
            }
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка валидации - '.json_encode($_model->errors));
            return false;
        }
    }

    
    public function beforeDelete()
    {

        if (!parent::beforeDelete()) {
            return false;
        }

        $fullPath = Yii::$app->basePath.'/web/img/'.$this->name;
        if (file_exists($fullPath)) {
            if(!unlink($fullPath)) {
                Yii::$app->session->setFlash('error', 'неполучается удалить файл');
            }
        } else {
            Yii::$app->session->setFlash('error', 'файл не найден');
        }
        return true;

    }




}
