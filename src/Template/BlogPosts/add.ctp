<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blog Posts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="blogPosts form large-9 medium-8 columns content">
    <?= $this->Form->create($blogPost) ?>
    <fieldset>
        <legend><?= __('Add Blog Post') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('img_url');
            echo $this->Form->input('body_text');
            echo $this->Form->input('date_published');
            echo $this->Form->input('last_edited');
            echo $this->Form->input('published');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
