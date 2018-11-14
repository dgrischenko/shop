<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 22.08.2018
 * Time: 13:36
 */

namespace app\models;

use yii\db\ActiveRecord;


class Image extends ActiveRecord
{


    public static function tableName()
    {
        return 'image';
    }

}