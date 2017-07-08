<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Item Promotions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="itemPromotions form large-9 medium-8 columns content">
    <?= $this->Form->create($itemPromotion) ?>
    <fieldset>
        <legend><?= __('Add Item Promotion') ?></legend>
        <?php
            echo $this->Form->input('itemID');
            echo $this->Form->input('promotionID');
            echo $this->Form->input('hoursLeft');
            echo $this->Form->input('priceWithPromotion');
            echo $this->Form->input('promoCode');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
