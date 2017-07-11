<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item Promotion'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemPromotions index large-9 medium-8 columns content">
    <h3><?= __('Item Promotions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promotionID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hoursLeft') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priceWithPromotion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promoCode') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemPromotions as $itemPromotion): ?>
            <tr>
                <td><?= $this->Number->format($itemPromotion->id) ?></td>
                <td><?= $this->Number->format($itemPromotion->itemID) ?></td>
                <td><?= $this->Number->format($itemPromotion->promotionID) ?></td>
                <td><?= $this->Number->format($itemPromotion->hoursLeft) ?></td>
                <td><?= $this->Number->format($itemPromotion->priceWithPromotion) ?></td>
                <td><?= h($itemPromotion->promoCode) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itemPromotion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemPromotion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemPromotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemPromotion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
