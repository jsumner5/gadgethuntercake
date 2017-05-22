<?php
/**
 * @var \App\View\AppView $this
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Return to Dash'), ['controller' => 'pages', 'action' => 'display', 'dash']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'items', 'action' => 'index']) ?></li>


    </ul>
</nav>

<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
        echo $this->Form->input('asin');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
