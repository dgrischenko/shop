<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "options".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property double $api
 * @property string $new
 * @property string $sale
 * @property string $title
 * @property int $value
 */
class Options extends ActiveRecord{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'name', 'value'], 'required'],
            [['value', 'api'], 'double'],
            [['title', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Алиас',
            'name' => 'Название валюты',
         //   'value' => 'Используемый курс',
            'api' => 'Сохраненный курс валют по API'
        ];
    }
}
