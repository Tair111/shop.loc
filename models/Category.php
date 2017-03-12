<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 12.03.2017
 * Time: 16:56
 */

namespace app\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className, ['category_id' => 'id']);
    }

}