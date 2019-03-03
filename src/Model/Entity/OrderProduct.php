<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderProduct Entity
 *
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property float $price
 * @property float $amount
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Product $product
 */
class OrderProduct extends Entity
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
        'quantity' => true,
        'price' => true,
        'amount' => true,
        'order' => true,
        'product' => true
    ];
}
