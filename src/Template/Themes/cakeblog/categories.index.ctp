<?php echo $this->Html->css('base');?>
<?php include('loop.carousel.php'); ?>
<h1 class="page-header"><?php echo $category->title; ?></h1>
<?php if(!empty($category->body)) { echo $category->body; } ?>
<div class="row">
    <div class="feed-container" style="margin:auto; text-align: center;">
        <?php include('loop.php'); ?>
    </div>
<!--    <div class="col-sm-4">-->
<!--        --><?php //include('loop.sidebar.php'); ?>
<!--    </div>-->
</div>