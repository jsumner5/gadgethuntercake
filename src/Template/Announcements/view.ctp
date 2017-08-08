<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Announcement'), ['action' => 'edit', $announcement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Announcement'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Announcements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="announcements view large-9 medium-8 columns content">
    <h3><?= h($announcement->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($announcement->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($announcement->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($announcement->body)); ?>
    </div>
</div>
