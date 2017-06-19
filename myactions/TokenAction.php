<?php
namespace app\myactions;
use yii\rest\Action;

class TokenAction extends Action
{
    public function run()
    {
        $client_appid=\Yii::$app->request->get('client_appid',false);
        $client_appkey=\Yii::$app->request->get('client_appkey',false);
        $model = $this->modelClass;
       if(!$client_appid||!$client_appkey){
           return (new $model())->emptyToken();
       }else{
           $model=$model::findOne(["client_appid"=>$client_appid,"client_appkey"=>$client_appkey]);
           if($model){
               //生成随机数
               $model->client_token=\Yii::$app->security->generateRandomString();
               if($model->save())
               {
                   return $model->toToken();
               }
           }
           return (new $model())->emptyToken();
       }
    }
}