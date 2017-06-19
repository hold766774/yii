<?php
namespace app\controllers;
use app\m\News;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;


class TokenController extends ActiveController//继承
{

    public $modelClass = 'app\m\clients';//关联模型
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }
    function actions()
    {
        return [
            'index' => [
                'class' => 'app\myactions\TokenAction',
                'modelClass' => $this->modelClass,
            ]
        ];

    }
}