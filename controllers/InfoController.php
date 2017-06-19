<?php

namespace app\controllers;
use app\m\News;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;


class InfoController extends ActiveController//继承
{
    public $modelClass = 'app\m\News';//关联新闻表
    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),//根据参数获取相关值
        ];
        return $behaviors;
    }
}