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
</html>
