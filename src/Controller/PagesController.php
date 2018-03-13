<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use App\Model\Entity\Category;
use App\Model\Entity\Comment;
use App\Model\Entity\Post;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{

    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function index()
    {
        $this->set('title', 'Blog');
        $this->viewBuilder()->setLayout('template');

        $post = new Post();
        $category = new Category();
        $data_post = $post->getPostLimit(5, 0);
        $data_category = $category->getPopularCategories();

        $this->set(compact('data_post'));
        $this->set(compact('data_category'));
    }

    public function details()
    {
        $this->set('title', 'Details');
        $this->viewBuilder()->setLayout('template');
        $post = new Post();
        $category = new Category();
        $data_post = $post->getPostById($_REQUEST['id_post']);
        foreach ($data_post->categories as $cate) {
            $data_category = $category->getCategoryPostSame($cate['id']);
        };
        $this->set(compact('data_post'));
        $this->set(compact('data_category'));
    }

    public function getMorePost()
    {
        $post = new Post();
        $response = array();
        $resultSet = $post->getPostLimit(5, $_REQUEST['offset']);
        foreach ($resultSet as $row) {
            array_push($response, array("id" => $row['id'], "title" => $row['title'], "content" => $row['content'], "date" => $row['create_date'],
                "image" => $row['image_post'], "summary" => $row['summary']));
        }
        echo json_encode($response);
        exit();
    }

    public function categoryInfo()
    {
        $this->set('title', 'Category Information');
        $this->viewBuilder()->setLayout('template');

        $category = new Category();
        $data = $category->getCategory($_REQUEST['category_id']);
        $this->set(compact('data'));
    }

    public function admin()
    {
        $this->set('title', 'admin');
        $this->viewBuilder()->setLayout('admin_template');
    }

    public function adminCategories()
    {
        $this->set('title', 'admin');
        $this->viewBuilder()->setLayout('admin_template');


        $category = new Category();
        $info = $category->createFirstInformation();
        $count = $category->getCount();
        $number_of_pagination = ceil($count / 10);

        $this->set(compact('info'));
        $this->set(compact('number_of_pagination'));
    }

    public function adminPosts()
    {
        $this->set('title', 'admin');
        $this->viewBuilder()->setLayout('admin_template');

        $post = new Post();
        $info = $post->getInfoPosts(5, 0);
        $count = $post->countPost();
        $number_of_pagination = ceil($count / 5);

        $this->set(compact('info'));
        $this->set(compact('number_of_pagination'));
    }

    public function adminComments()
    {
        $this->set('title', 'admin');
        $this->viewBuilder()->setLayout('admin_template');

        $comment = new Comment();
        $info = $comment->getFirstInfo();
        $count = $comment->getCount();
        $number_of_pagination = ceil($count / 5);

        $this->set(compact('info'));
        $this->set(compact('number_of_pagination'));

    }
}
