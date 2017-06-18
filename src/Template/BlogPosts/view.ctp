<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blog Post'), ['action' => 'edit', $blogPost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blog Post'), ['action' => 'delete', $blogPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogPost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blog Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Post'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blogPosts view large-9 medium-8 columns content">
    <h3><?= h($blogPost->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date Published') ?></th>
            <td><?= h($blogPost->date_published) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Edited') ?></th>
            <td><?= h($blogPost->last_edited) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blogPost->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $this->Number->format($blogPost->published) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= $this->Text->autoParagraph(h($blogPost->title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Img Url') ?></h4>
        <?= $this->Text->autoParagraph(h($blogPost->img_url)); ?>
    </div>
    <div class="row">
        <h4><?= __('Body Text') ?></h4>
        <?= $this->Text->autoParagraph(h($blogPost->body_text)); ?>
    </div>
</div>
