<?php
namespace app\m;

use yii\base\Model;
use yii\web\UploadedFile;

class Uploader extends Model
{
    /**
    * @var UploadedFile
    */
    public $imageFile;

    public function rules()
    {
        return [
        [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        $userid=0;//用户id，默认是0，代表是超级管理员
        $imgName=date('Ymhhis').$userid;
        if ($this->validate()) {
            //不能是原文件名
             $this->imageFile->saveAs('images/vedios/' . $imgName . '.' . $this->imageFile->extension);
             return $imgName;
        } else {
             return false;
        }
    }
}