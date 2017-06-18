<?php
/**
 * @var \App\View\AppView $this
 */
?>
<style>
    .post-container{
        max-width: 55%;
    }
    .round-borders{
        border-radius: 4px;
    }
</style>

<div class="blogPosts view large-9 medium-8 columns content">
    <h3 class="text-center"><?= h($blogPost->title) ?></h3>

    <div class="row post-container">
        <?= $this->Html->Image($blogPost['img_url'],['class' => 'round-borders']); ?>
    </div>
    <div class="row">
        <?= $this->Text->autoParagraph(h($blogPost->body_text)); ?>
    </div>
</div>
