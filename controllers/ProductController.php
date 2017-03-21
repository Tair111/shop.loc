<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 21.03.2017
 * Time: 9:25
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use yii\web\HttpException;
use Yii;


class ProductController extends AppController
{
    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product))
            throw new HttpException('404', 'Такого товара нет');
        /*$product = Product::find()->with('Category')->where(['id' => $id])->limit(1)->one();*/
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | '. $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));
    }

}