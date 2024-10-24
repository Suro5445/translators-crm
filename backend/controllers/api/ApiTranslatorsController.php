<?php

namespace backend\controllers\api;

use Yii;
use backend\models\Translator;
use yii\base\Controller;
use yii\web\Response;

class ApiTranslatorsController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['cors'] = [
            'class' => \yii\filters\Cors::class,
        ];
        return $behaviors;
    }

    public function actionIndex()
    {
        $availability = Yii::$app->request->get('availability');
        $query = Translator::find();

        if ($availability) {
            $query->where(['availability' => $availability]);
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $query->all();
    }
}