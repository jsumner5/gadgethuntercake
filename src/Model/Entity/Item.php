<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $asin
 * @property string $title
 * @property string $small_img_url
 * @property string $medium_img_url
 * @property string $large_img_url
 * @property string $list_price
 * @property string $price
 * @property string $normal_price
 * @property string $item_url
 * @property \Cake\I18n\Time $date_added
 * @property \Cake\I18n\Time $date_price_updated
 * @property string $publisher
 */
class Item extends Entity
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
        '*' => true,
        'id' => false
    ];
}
