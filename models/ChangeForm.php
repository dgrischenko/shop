<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 22.08.2018
 * Time: 13:36
 */

namespace app\models;

use Yii;
use yii\base\Model;


class ChangeForm extends Model{

    public $str;


    public function rules(){
        return [
            [['str'], 'trim'],
        ];
    }

}