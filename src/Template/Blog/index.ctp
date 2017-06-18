<?php

?>

<div class="blogPosts index large-9 medium-8 columns content">
    <h3><?= __('Blog Posts') ?></h3>

    <!--display table of items-->
    <div class="tableWrapper">
        <table id="item_table" >
            <?php
            $itemCount =0;
            foreach ($blogPosts as $blogPost):

                if(($itemCount %4 == 0) || ($itemCount == 0)){
                    echo '<tr style="border-bottom: none;">';
                }
                ?>

                <td class="item-container">

                    <?= $this->Html->Image(
                        $blogPost['img_url'],
                        [
                            'alt' => $blogPost['title'],
                            'url' => [
                                'action' => 'view', $blogPost['title']
                            ]
                        ]
                    )?>
                </td>


                <?php
                $itemCount++;
                if(($itemCount % 4 == 0 && $itemCount !== 0)){
                    echo '</tr>';
                }
            endforeach;
            ?>


        </table>

</div>
