<?php

namespace common\models;

use yii\base\Action;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class UploadForm  extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $jsonFile;
    public $toModelId;
    public $toModelProperty;

    public function rules()
    {
        return [
            [['imageFile'], 'required',],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, svg'],
            [['jsonFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'json'],

        ];
    }

    public function upload($fileName=null,  $replace=null)
    {

        if ($fileName) {
            $fileName = $fileName .'.' . $this->imageFile->extension;
        } else {
            $fileName = $this->imageFile->baseName .'.' . $this->imageFile->extension;
        }
        if ($this->validate()) {
            if ($this->imageFile->saveAs('img/' . $fileName)) {
                return Imagefiles::addNew($fileName,$replace);
            } else {
                Yii::error([
                    'action'=> 'uploadForm  $this->imageFile->saveAs',
                    '$this->errors'=>$this->errors,
                ]);
                Yii::$app->session->setFlash('error', 'Ошибка валидации upload form $this->imageFile->saveAs()- '.json_encode($this->errors));
                return false;
            }
        } else {
            Yii::error([
                'action'=> 'uploadForm  $this->validate()',
                '$this->errors'=>$this->errors,
            ]);
            Yii::$app->session->setFlash('error', 'Ошибка валидации uploadForm  $this->validate() - '.json_encode($this->errors));
            return false;
        }
    }

    public function change($filename)
    {
        if ($this->validate()) {
            if ($this->imageFile->saveAs(Yii::$app->basePath . '/web/img/' . $filename)) {
                return true;
            } else {
                return false;
            }
        }
    }





}