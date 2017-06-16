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
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css(['style.css','/font-awesome/css/font-awesome.min.css', 'newsLetter.css']) ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            });


        function displayModal(){
            debugger;
            var newsLetter = $('#newsLetterModal');
            newsLetter.css('display','block');
        }


    </script>
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
    <nav class="top-bar expanded" data-topbar role="navigation" style="height: 4.5em; background-color:white;">

        <div class="top-bar-section">
            <?= $this->Html->image(
                    'gadgethunterlogo.jpg',
                    [       'alt' => 'Gadget Hunter',
                            'url' => ['controller' => 'Home', 'action' => 'index'],
                            'class' => 'logo'
                    ]

            ) ?>
            <ul class="right menu-container">
                <li><a onclick="displayModal()" class="text-center " style="line-height: 1.5em;padding-top: 1em;"><i class="fa fa-envelope-o fa-3x"></i></a target="_blank" class="text-center " style="line-height: 1.5em;padding-top: 1em;"></li>
                <li><a href="home/setFlash/New blog coming soon!" class="text-center med-text" style="line-height: 1.5em;padding-top: 1.2em;" onclick=""> Blog</a></li>
                <li><a href="home/setFlash/Hey there!" class="text-center med-text" style="line-height: 1.5em;padding-top: 1.2em;">Contests</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content')?>
    </div>
<!--    <footer id="footer">-->
<!--        <span style="-->
<!--                		box-shadow: 0 10px 5px -4px gray;-->
<!--                        width: 90%;-->
<!--                        display: block;-->
<!--                        margin:auto;-->
<!--                        height: 10px;">-->
<!--        </span>-->
<!--        <ul class="footer_ul">-->
<!--            <li>2016 GadgetHunter.co</li>-->
<!--            <li class="footer_li"><a href="https://www.surveymonkey.com/r/W5S88B2">Feedback</a></li>-->
<!--            <li><span><a href="index.php">Home</a></span></li>-->
<!--            <li><span><a href="about.php">About</a></span></li>-->
<!--            <li><span><a href="privacy/privacypolicy.htm">Privacy Policy</a></span></li>-->
<!---->
<!--            <li><a href="https://www.instagram.com/gadgethunter.co/"><img style="width:25px; vertical-align:middle;" src="images/instagram.png"/></a><li>-->
<!---->
<!--        </ul>-->
<!--    </footer>-->
</body>
</html>
