<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Working Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $check_in
 * @property \Cake\I18n\FrozenTime|null $check_out
 * @property int $member_id
 * @property \Cake\I18n\FrozenDate $created
 *
 * @property \App\Model\Entity\Member $member
 */
class Working extends Entity
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
        'check_in' => true,
        'check_out' => true,
        'member_id' => true,
        'created' => true,
        'member' => true,
    ];
}
