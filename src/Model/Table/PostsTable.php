<?php
/**
 * Created by PhpStorm.
 * User: n
 * Date: 07/03/2018
 * Time: 13:29
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class PostsTable extends Table
{


    public function initialize(array $config)
    {
        $this->setTable('posts');
        $this->belongsToMany('Categories');
        parent::initialize($config);
    }

}