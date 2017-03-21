<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 12.03.2017
 * Time: 17:22
 */

namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}