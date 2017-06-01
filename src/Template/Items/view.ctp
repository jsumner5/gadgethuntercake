<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Return to Dash'), ['controller' => 'pages', 'action' => 'display', 'dash']) ?></li>
        <li><?= $this->Html->link(__('New Amazon Item'), ['controller' => 'AmazonItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Newegg Item'), ['controller'=> 'NeweggItems','action' => 'search_newegg_items']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->title) ?></h3>
    <div><?= $this->Html->image($item->small_img_url) ?></div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asin') ?></th>
            <td><?= h($item->asin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($item->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($item->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Normal Price') ?></th>
            <td><?= h($item->normal_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price When Listed') ?></th>
            <td><?= h($item->list_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publisher') ?></th>
            <td><?= h($item->publisher) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signed Link') ?></th>
            <td><?= h($item->item_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Added') ?></th>
            <td><?= h($item->date_added) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Price Updated') ?></th>
            <td><?= h($item->date_price_updated) ?></td>
        </tr>

    </table>


</div>
