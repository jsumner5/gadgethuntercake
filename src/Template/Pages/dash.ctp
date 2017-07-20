<?php

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
    <h3>Useful Links</h3>
    <?php
     $list = [

                 '<a href="http://www.hootsuite.com/dashboard" target="_blank"> Hoot Suite</a>',
                 '<a href="https://affiliate-program.amazon.com/" target="_blank"> Amazon Associates</a>',
                 '<a href="http://www.instagram.com/gadgethunter.co" target="_blank"> Instagram</a>',

     ];

    echo $this->Html->nestedList($list);





    ?>
</div>
</html>
