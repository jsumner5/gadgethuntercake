<?php
/**
 * Routes file for CakePHP Blog Plugin
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */
use Cake\Routing\Router;
//Router::parseExtensions('rss');

Router::connect(
    '/Blog/:year/:month/*',
    array(
        'plugin' => 'Blog',
        'controller' => 'blog_posts',
        'action' => 'index'
    ),
    array(
        'pass' => array('year', 'month'),
        'year' => '2[0-9]{3}',
        'month' => '0[1-9]|1[012]',
    )
);
Router::connect(
    '/Blog/category/:category/*',
    array(
        'plugin' => 'Blog',
        'controller' => 'blog_posts',
        'action' => 'index'
    ),
    array(
        'pass' => array('category'),
        'category' => '[a-zA-Z0-9\-\_]+',
    )
);
Router::connect(
    '/Blog/tag/:tag/*',
    array(
        'plugin' => 'Blog',
        'controller' => 'blog_posts',
        'action' => 'index'
    ),
    array(
        'pass' => array('tag'),
        'category' => '[a-zA-Z0-9\-\_]+',
    )
);
Router::connect(
    '/Blog/:slug',
    array(
        'plugin' => 'Blog',
        'controller' => 'blog_posts',
        'action' => 'view'
    ),
    array(
        'slug' => '[a-zA-Z0-9\-\_]+',
    )
);
Router::connect('/Blog/*', array(
    'plugin' => 'Blog',
    'controller' => 'blog_posts',
    'action' => 'index',
));
Router::connect('/admin/blog_posts', array(
    'plugin' => 'Blog',
    'controller' => 'Blog_posts',
    'action' => 'index', 'admin' => true
));