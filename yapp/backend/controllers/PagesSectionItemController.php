<?php

namespace backend\controllers;

use common\models\UploadForm;
use Yii;
use common\models\PagesSectionItem;
use common\models\PagesSectionItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;


/**
 * PagesSectionItemController implements the CRUD actions for PagesSectionItem model.
 */
class PagesSectionItemController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PagesSectionItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $searchModel = new PagesSectionItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PagesSectionItem model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Url::remember();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PagesSectionItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PagesSectionItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PagesSectionItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PagesSectionItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Url::previous());
    }

    /**
     * Finds the PagesSectionItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PagesSectionItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PagesSectionItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Upload images for  model with autofill corresponding model property
     */
    public function actionImageUpload()
    {
        $uploadmodel = new UploadForm();
        if (Yii::$app->request->isPost) {
            $uploadmodel->imageFile = UploadedFile::getInstance($uploadmodel, 'imageFile');
            $data=Yii::$app->request->post('UploadForm');
            $toModelProperty = $data['toModelProperty'];
            $model = PagesSectionItem::find()->where(['id'=>$data['toModelId']])->one();
            $fileName = 'pagesectionitem'.$model->id.$toModelProperty;
            if ($uploadmodel->upload($fileName,true)) {

                $model->$toModelProperty = $fileName . '.' . $uploadmodel->imageFile->extension;
                $model->save();
                Yii::$app->session->setFlash('success', 'Файл загружен успешно');
            } else {
                Yii::$app->session->setFlash('error', 'не получается');
            }
            return $this->redirect(Url::previous());
        }
    }



    public function actionDeleteImage($id,$propertyName)
    {
        $this->findModel($id)->deleteImage($propertyName);
        return $this->redirect(Url::previous());
    }

    public function actionMoveUp($id)
    {
        PagesSectionItem::moveUpBySort($id);
        return $this->redirect(Url::previous());
    }

    public function actionMoveDown($id)
    {
        PagesSectionItem::moveDownBySort($id);
        return $this->redirect(Url::previous());
    }
}
