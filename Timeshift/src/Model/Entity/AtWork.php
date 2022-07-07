<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AtWork Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $time
 * @property int $member_id
 *
 * @property \App\Model\Entity\Member $member
 */
class AtWork extends Entity
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
        'time' => true,
        'member_id' => true,
        'member' => true,
    ];
}
