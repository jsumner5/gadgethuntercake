<?php
$pagesC = new \App\Controller\PagesController();
$pagesC->setAnnouncements();
$this->assign('title','Dashboard');
?>
<html>
<div class="items index large-9 medium-8 columns content">
    <h3>Dashboard</h3>
    <?= $this->Html->link('Manage Items','/items',['class' => 'button']) ?>
    <?= $this->Html->link('Manage Users','/users',['class' => 'button']) ?>
    <?= $this->Html->link('Metrics','/metrics',['class' => 'button']) ?>
    <?= $this->Html->link('Logout',['controller' => 'app','action' => 'logout'], ['class' => 'button']) ?>
</div>

<div class="items index large-9 medium-8 columns content">
    <?php
    $list = [

            '<a href="'.BASE_URL.'/admin" target="_blank">Post on Blog</a>',
            '<a href="https://buffer.com/app/" target="_blank">Buffer</a>',
            '<a href="https://affiliate-program.amazon.com/" target="_blank"> Amazon Associates</a>',
            '<a href="http://www.instagram.com/gadgethunter.co" target="_blank"> Instagram</a>',

            ];?>

    <!--announcements-->
    <div style="margin-bottom: 3em;">
        <h3>Announcements</h3>
        <?php foreach($announcements as $announcement){
            echo '<li>'.$announcement['body'].'</li>';
        }
        ?>

        <?= $this->Html->link('New Announcement',['controller' => 'announcements', 'action' => 'add']) ?>
    </div>

<!--    useful links-->
    <div>
    <h3>Useful Links</h3>

    <?= $this->Html->nestedList($list);?>
    </div>


</div>
</html>
