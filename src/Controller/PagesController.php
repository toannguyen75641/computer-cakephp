<?php
namespace App\Controller;

use App\Controller\AppController;
use App\View\Helper\ImageHelper;

class PagesController extends AppController
{
    public function index()
    {   
        $this->category();
    	$this->loadModel('Product');
        $product = $this->paginate($this->Product);
        $this->set(compact('product'));
        $this->cookie_cart();
    }

    public function view($id = null) {
        $this->category();
    	$this->loadModel('Product');
    	$product = $this->Product->get($id, ['contain' => ['Category', 'OrderProduct']]);
        $this->set(compact('product'));
        $this->cookie_cart();
    }

    public function view2($id = null) {
        $this->category();
        $this->loadModel('Product');
        $product = $this->Product->find()->where(['category_id' => $id]);
        $this->set('product', $this->paginate($product));
        $this->cookie_cart();
    }

    public function search() {
        $this->category();
        $this->loadModel('Product');
        $keyword = $this->request->query('keyword');

        if(!empty($keyword)) {
            $product = $this->Product
               ->find()
               ->where([
                    'OR' => [['name LIKE' => '%'.$keyword.'%'], ['description LIKE' => '%'.$keyword.'%']]
                ]);
            $count = $product->count();
        }

        $this->set('product', $this->paginate($product));
        $this->set('count', $count);
        $this->cookie_cart();
    }

    public function ajax() {
        $this->loadModel('Product');
        $keyword = $this->request->query('keyword');
        $product = $this->Product
            ->find()
            ->where([
                'OR' => [['name LIKE' => '%'.$keyword.'%'], ['description LIKE' => '%'.$keyword.'%']]
            ]);

        if(isset($_POST['checkPriceStart']) && $_POST['checkPriceEnd']) {
            $var1 = $_POST['checkPriceStart'];
            $var2 = $_POST['checkPriceEnd'];
            if($var1 != null && $var2 != null) {
                if($var2 > $var1) {
                    $product->where(['Price BETWEEN '.$var1.' AND '.$var2]);
                }
            }
            $count = $product->count();
        }

        if(isset($_POST['sort'])) {
            $var3 = $_POST['sort'];
            if($var3 != null) {
                $product->order(['Price' => $var3]);
            }
            $count = $product->count();
        }

        $this->set('product', $this->paginate($product));
        $this->set('count', $count);
        $this->cookie_cart();
    }

    // public function cart() {
    //     if(isset($_COOKIE['shopping_cart'])) {
    //         $cookie_data = stripcslashes($_COOKIE['shopping_cart']);
    //         $cart_data = json_decode($cookie_data, true);
    //     }
    //     else 
    //     {
    //         $cart_data = array();
    //     }

    //     $item_id_list = array_column($cart_data, 'item_id');

    //     if(in_array($_POST['product_id'], $item_id_list)) {
    //         foreach ($cart_data as $key => $values) {
    //             if($cart_data[$key]['item_id'] == $_POST['product_id']) {
    //                 $cart_data[$key]['item_quantity'] = $cart_data[$key]['item_quantity'] + $_POST['product_quantity'];
    //             }
    //         }
    //     }
    //     else
    //     {
    //         $item_array = array(
    //             'item_id'          => $_POST['product_id'],
    //             'item_name'        => $_POST['product_name'],
    //             'item_price'       => $_POST['product_price'],
    //             'item_quantity'    => $_POST['product_quantity']
    //         );
    //         $cart_data[] = $item_array;
    //     }
    //     $item_data = json_encode($cart_data);
    //     setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    //     // $this->set('count_cart', $count_cart);
    // }

    public function shoppingCart() {
        if(isset($_COOKIE['cart'])) {
            $cookie_data = stripcslashes($_COOKIE['cart']);
            $cart_data = json_decode($cookie_data, true);
            $count_cart = count($cart_data);
        }
        $this->set('cart_data', $cart_data);
        $this->set('count_cart', $count_cart);
    }
}