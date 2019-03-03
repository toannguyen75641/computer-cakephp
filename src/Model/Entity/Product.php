<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $product_code
 * @property int $category_id
 * @property string $name
 * @property int $quantity
 * @property string $image
 * @property float $price
 * @property string $description
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\OrderProduct[] $order_product
 */
class Product extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_code' => true,
        'category_id' => true,
        'name' => true,
        'quantity' => true,
        'image' => true,
        'price' => true,
        'description' => true,
        'status' => true,
        'created' => true,
        'category' => true,
        'order_product' => true
    ];
}
