<?php
/**
  * @var \App\View\AppView $this
  */
?>
<title>Dash.ctp</title>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Return to Dash'), ['controller' => 'pages', 'action' => 'display', 'dash']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'items','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Amazon Item'), ['action' => 'amazon_item']) ?></li>
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>
<div class="items index large-9 medium-8 columns content">
    <h3><?= $this->Html->link(__('not some'), ['controller'=>'pages','action' => 'display', 'dash'])  ?></h3>
    <?= $this->Form->create(__('Post',['action' => 'searchNeweggItems'])) ?>
    <fieldset>
        <legend><?= __('Search Newegg for Items') ?></legend>
        <?php
        echo $this->Form->input('keywords');

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'))?>
    <?= $this->Form->end() ?>

    <?php if ($this->viewVars['load_data']): ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('image') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('price') ?></th>
            <th scope="col"><?= $this->Paginator->sort('sale price') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Select') ?></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($this->viewVars['items'] as $item):
            ?>
        <?= $this->Form->create('item',['url'=>'/neweggitems/add',
                'type' => 'post']);
        ?>

            <tr>
                <td><?= $this->Html->image(trim($item['image-url']))?></td>
                <td><?= $item['name']?></td>
                <td><?= $item['price']?></td>
                <td><?= $item['sale-price']?></td>
                <td> <?= $this->Form->button(__('Add Item'))?></td>

                <?= $this->Form->hidden('affiliateItemID', ['value' => $item['sku']]) ?>
                <?= $this->Form->hidden('image-url',['value' =>$item['image-url']]) ?>
                <?= $this->Form->hidden('title',['value' =>$item['name']]) ?>
                <?= $this->Form->hidden('price',['value' =>$item['price']]) ?>
                <?= $this->Form->hidden('signed-url',['value' =>$item['buy-url']]) ?>
                <?= $this->Form->hidden('description',['value' =>$item['description']]) ?>

                <?= $this->Form->end() ?>

            </tr>

        <?php endforeach; ?>
        </tbody>

    </table>

    <?php endif ; ?>


</div>
