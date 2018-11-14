<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 22.08.2018
 * Time: 13:36
 */

namespace app\models;

use yii\db\ActiveRecord;


class Product extends ActiveRecord{

   public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName(){
        return'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

/*    public function getImage()
    {
        return $this->hasMany(Image::className(), ['filePath' => 'img']);
    }*/

}