<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $amout
 * @property bool $state
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\OrderProduct[] $order_product
 */
class Order extends Entity
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
        'customer_id' => true,
        'amout' => true,
        'state' => true,
        'created' => true,
        'customer' => true,
        'order_product' => true
    ];
}
