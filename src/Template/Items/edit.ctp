<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $item->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Edit Item') ?></legend>
        <?php
            echo $this->Form->input('affiliateItemID');
            echo $this->Form->input('title');
            echo $this->Form->input('small_img_url');
            echo $this->Form->input('medium_img_url');
            echo $this->Form->input('large_img_url');
            echo $this->Form->input('list_price');
            echo $this->Form->input('price');
            echo $this->Form->input('normal_price');
            echo $this->Form->input('item_url');
            echo $this->Form->input('date_added',['disabled'=> 'disabled']);
            echo $this->Form->input('date_price_updated',['disabled'=> 'disabled']);
            echo $this->Form->input('publisherID',['disabled'=> 'disabled']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link('Attach Promotion',['controller' => 'ItemPromotions', 'action' => 'add',$item->id, $item->affiliateID ]) ?>
</div>
