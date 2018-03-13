<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\Validation\Validator;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Comment[] $comments
 */
class User extends Entity
{
    public $name = 'User';

    public $roles = array(
        'admin' => 'Admin',
        'user' => 'User'
    );

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
        'username' => true,
        'password' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
        'comments' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'
            ]);
    }

    function validateUser(){
        $this->validate = array(
            "username"=>array(
                "rule1" =>array(
                    "rule" => "notBlank",
                    "message" => "Username không được rỗng",
                ),
                "rule2" => array(
                    "rule" => "/^[a-z0-9_.]{4,}$/i",
                    "message" => "Username là kí tự hoặc số",
                ),
                "rule3" =>array(
                    "rule" => "checkUsername", // call function check Username
                    "message" => "Username đã có người đăng ký",
                ),
            ),
            "pass"=>array(
                "rule" => "notBlank",
                "message" => "Password không được rỗng",
                "on" => "create"
            ),
            "re_pass"=>array(
                "rule1"=>array(
                    "rule" => "notBlank",
                    "message" => "Password comfirm không được rỗng",
                    "on" => "create"
                ),
                "match" => array(
                    "rule" => "ComparePass", // call function compare password
                    "message" => "Password comfirm không trùng khớp",
                ),
            ),
            "level"=>array(
                "rule" => "notBlank",
                "message" => "Please select level",
            ),
            "email"=>array(
                "rule" => "email",
                "message" => "Email is not avalible",
            ),
            'name' => array(
                'not empty' => array(
                    'rule' => 'notBlank',
                    'message' => 'Name không được rỗng'
                )
            )
        );
        if($this->validates($this->validate))
            return TRUE;
        else
            return FALSE;
    }
    function ComparePass(){
        if($this->data['User']['pass']!=$this->data['User']['re_pass']){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    function checkUsername(){
        if(isset($this->data['User']['id'])){
            $where = array(
                "id !=" => $this->data['User']['id'],
                "username" => $this->data['User']['username'],
            );
        }else{
            $where = array(
                "username" => $this->data['User']['username'],
            );
        }
        $this->find("first", array(
            'conditions' => $where
        ));
        $count = $this->getNumRows();
        if($count!=0){
            return false;
        }else{
            return true;
        }
    }

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
