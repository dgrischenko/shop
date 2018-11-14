<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $image
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{

    public $image;
    public $gallery;



    public function behaviors()    {
        return ['image' => ['class' => 'rico\yii2images\behaviors\ImageBehave']];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(){
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'price'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'isset', 'new','abr','sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['img'], 'file', 'extensions' => 'png, jpg'],
            //[['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'category_id' => 'Категория',
            'image' => 'Фото',
            'img' => 'Фото',
            //'gallery' => 'Галерея',
            'content' => 'Основной конент',
            'price' => 'Цена',
            'abr' => '',
            'description' => 'Описание',
            'keywords' => 'Примечание',
            'new' => 'Новинка',
            'hit' => 'Хит',
            'sale' => 'Распродажа',
            'isset' => 'Наличие',
            ];
    }

    public function upload(){
        if ($this->validate()) {
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        } else {
            return false;
        }

    }

    /*public function uploadGallery(){
        if ($this->validate()) {
            foreach ($this->gallery as $file){
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }*/

}
