<?php
namespace App\Controller\Blog;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\DataSource\ConnectionManager;


class PagesController extends AppController
{


    public function home()
    {


        $this->loadModel('Articles');
        $this->paginate = [
            'contain' => ['users', 'categories'],
            'limit' => ARTICLES_PER_PAGE,
            'order' => [
                'Articles.id' => 'desc'
            ]
        ];
        $articles = $this->paginate($this->Articles);
        $this->set(compact('articles'));

        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');
        $this->set(compact('categories'));

        $slider_articles = $this->Articles->find('all')->where(['status' => 1, 'slider' => 1])->order(['id' => 'DESC'])->limit(SLIDER_ARTICLES_PER_PAGE);
        $this->set(compact('slider_articles'));

        //Load theme

        $this->viewBuilder()->templatePath('Themes/' . CAKEBLOG_THEME);
        $this->render('pages.home');
    }

    public function display()
    {
       //$this->viewBuilder()->layout('base');

        $path = func_get_args();

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
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();


        }
    }
}
