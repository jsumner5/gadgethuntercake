<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item Promotion'), ['action' => 'edit', $itemPromotion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Promotion'), ['action' => 'delete', $itemPromotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemPromotion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Promotion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemPromotions view large-9 medium-8 columns content">
    <h3><?= h($itemPromotion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PromoCode') ?></th>
            <td><?= h($itemPromotion->promoCode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemPromotion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ItemID') ?></th>
            <td><?= $this->Number->format($itemPromotion->itemID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PromotionID') ?></th>
            <td><?= $this->Number->format($itemPromotion->promotionID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('HoursLeft') ?></th>
            <td><?= $this->Number->format($itemPromotion->hoursLeft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PriceWithPromotion') ?></th>
            <td><?= $this->Number->format($itemPromotion->priceWithPromotion) ?></td>
        </tr>
    </table>
</div>
