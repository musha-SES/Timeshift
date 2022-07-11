<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Member Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $gender
 * @property \Cake\I18n\FrozenDate|null $birth
 * @property string $address
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Works[] $works
 */
class Member extends Entity
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
        'name' => true,
        'email' => true,
        'password' => true,
        'gender' => true,
        'birth' => true,
        'address' => true,
        'created' => true,
        'works' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];


    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }

    }
}
