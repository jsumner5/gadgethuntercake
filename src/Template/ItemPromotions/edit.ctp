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
                ['action' => 'delete', $itemPromotion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemPromotion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Item Promotions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="itemPromotions form large-9 medium-8 columns content">
    <?= $this->Form->create($itemPromotion) ?>
    <fieldset>
        <legend><?= __('Edit Item Promotion') ?></legend>
        <?php
            echo $this->Form->input('itemID');

            # build the options for the promotions
            $options =[];
            foreach ($promotions as $promo){
                array_push($options,$promo['type']);
            }
            echo $this->Form->select('promotionID', $options);
            echo $this->Form->input('hoursLeft');
            echo $this->Form->input('priceWithPromotion');
            echo $this->Form->input('promoCode');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
