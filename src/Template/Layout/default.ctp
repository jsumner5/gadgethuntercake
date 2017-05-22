<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Controller\Component\FlashComponent;

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css(['style.css','/font-awesome/css/font-awesome.min.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<style>
    div > .menu-container > li{
        height: 4.5em;
        width: 33.33%;
    }
    div > ul {

    }
    div > ul > li > a{
        height: 100%;
    }
    .med-text{
        font-size: 13pt !important;
    }
    li > a > i{
        color: #F4F4F4;
    }
    .menu-container{
        width: 25% !important;
    }
    .logo{
        padding-left:1em;
        height: 4.5em;

    }
</style>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation" style="height: 4.5em; background-color:#F4F4F4;">

        <div class="top-bar-section">
            <img src="webroot/img/gh-logo.jpg" class="logo">
            <ul class="right menu-container">
                <li><a target="_blank" href="#" class="text-center " style="line-height: 1.5em;padding-top: 1em;"><i class="fa fa-envelope-o fa-3x"></i></a></li>
                <li><a target="_blank"  class="text-center med-text" style="line-height: 1.5em;padding-top: 1.2em;" onclick=""> Blog</a></li>
                <li><a target="_blank" href="#" class="text-center med-text" style="line-height: 1.5em;padding-top: 1.2em;">Contests</a></li>

            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content')?>
    </div>
    <footer>
    </footer>
</body>
</html>
