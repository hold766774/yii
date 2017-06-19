<?php
/**
 * Created by PhpStorm.
 * User: 覃雪平
 * Date: 2017/6/15
 * Time: 18:02
 */
namespace app\m;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return 'users';
    }

    //定义新增数据时添加的字段
    function scenarios()
    {
        return [
            "default"=>["user_name","user_pass"]
        ];
    }
}