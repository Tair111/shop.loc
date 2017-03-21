<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 21.03.2017
 * Time: 12:34
 */

namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $qty = 1){
        if ($_SESSION['cart'][$product->id]){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price'=> $product->price,
                'img' => $product->img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty'])? $_SESSION['cart.qty'] + $qty: $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum'])? $_SESSION['cart.sum'] + $qty * $product->price: $qty * $product->price;

    }

    public function recalc($id){
        if(!$_SESSION['cart'][$id]) return false;
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }

}