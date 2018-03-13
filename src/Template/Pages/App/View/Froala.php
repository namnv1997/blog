<?php
/**
 * Created by PhpStorm.
 * User: n
 * Date: 13/03/2018
 * Time: 03:01
 */

namespace App\View;


class Froala extends AppView
{

    public function froalaAdd()
    {
        echo $this->element('froalaAdd');
    }

    public function froalaEdit()
    {
        echo $this->element('froalaEdit');
    }

}