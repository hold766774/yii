<?php
/**
 * Created by PhpStorm.
 * User: 覃雪平
 * Date: 2017/6/16
 * Time: 10:28
 */
namespace app\m;

use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return 'news';
    }
    public function getNewsClass(){
        return $this->hasOne(NewsClass::className(), ['class_id' => 'news_classid']);
    }
}