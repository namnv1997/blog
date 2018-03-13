<?php
/**
 * Created by PhpStorm.
 * User: n
 * Date: 07/03/2018
 * Time: 13:33
 */

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Category extends Entity
{
    public function getPopularCategories()
    {
        return TableRegistry::get('categories')->find('all', [
            'limit' => 15,
            'order' => 'create_date DESC'
        ]);
    }

    public function getCategoryByPost()
    {
        return TableRegistry::get('categories')->find('all', [
            'id' => 'create_date DESC'
        ]);
    }

    public function getCategory($id)
    {
        return TableRegistry::get('categories')->find('all', [
            'id' => $id,
        ])->contain('posts')->first();
    }

    public function getCategoryPostSame($id)
    {
        return TableRegistry::get('categories')->find('all', [
            'id' => $id,
        ])->contain('posts', function ($q) {
            return $q
                ->limit(6);
        }
        )->first();
    }

    public function createFirstInformation()
    {
        $categories = TableRegistry::get('categories');
        $query = $categories
            ->find()
            ->from('categories')
            ->limit(10)
            ->offset(0);
        return $query;
    }

    public function getCount()
    {
        $categories = TableRegistry::get('categories');
        $count = $categories
            ->find()
            ->from('categories')
            ->count();
        return $count;
    }

    public function getName(){
        $array_name = array();

        $categories = TableRegistry::get('categories');
        $resultSet = $categories
            ->find()
            ->from('categories');

        foreach ($resultSet as $row) {
            array_push($array_name, $row['name']);
        }
        array_push($array_name, null);
        return $array_name;
    }

    public function add()
    {
        $categories = TableRegistry::get('categories');

        $category = $categories-> newEntity();
        $category->name = $_REQUEST['category_name'];
        $categories->save($category);
        return 1;
    }

    public function edit()
    {
        $categories = TableRegistry::get('categories');

        $categories->query()
            ->update()
            ->set(['name' => $_REQUEST['category_name_edit']])
            ->where(['id' => $_REQUEST['category_id_edit']])
            ->execute();
        return 1;
    }

    public function delete()
    {
        $categories = TableRegistry::get('categories');

        $categories->query()
            ->delete()
            ->where(['id' => $_REQUEST['category_id_delete']])
            ->execute();
        return 1;
    }

    public function paginationCallData(){
        $page = ($_REQUEST['category_pagination'] - 1) * 10;
        $categories = TableRegistry::get('Categories');

        $query = $categories
            ->find()
            ->from('categories')
            ->limit(10)
            ->offset($page);
        return $query;
    }



    public function getCategoryById($id){

        $categories = TableRegistry::get('Categories');

        $query = $categories
            ->find()
            ->from('categories')
            ->where(['id' => $id]);

        return $query;
    }

}