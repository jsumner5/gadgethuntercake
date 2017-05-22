<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>

    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->input('asin');
            echo $this->Form->submit('autoFill');
            echo $this->Form->input('title',['required'=> false]);
            echo $this->Form->input('small_img_url',['required'=> false]);
            echo $this->Form->input('medium_img_url',['required'=> false]);
            echo $this->Form->input('large_img_url',['required'=> false]);
            echo $this->Form->input('list_price',['required'=> false]);
            echo $this->Form->input('price',['required'=> false]);
            echo $this->Form->input('normal_price',['required'=> false]);
            echo $this->Form->input('item_url',['required'=> false]);
            echo $this->Form->input('date_added',['required'=> false]);
            echo $this->Form->input('date_price_updated',['required'=> false]);
            echo $this->Form->input('publisher',['required'=> false]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
