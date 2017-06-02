<?php $this->Html->meta('keywords', 'keywords, are, sweet', ['block' => true]); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<title>Gadget Hunter.co</title>

<!-- Side Bar -->
<nav class="large-3 medium-4 columns" id="actions-sidebar" style="float: right;">
    <ul class="side-nav">
        <li class="heading text-center text-black">Our Affiliates</li>
        <li>
            <div class="side-block">
                <a target="_blank" href="https://www.amazon.com/gp/student/signup/info/?ref_=assoc_tag_ph_1402130811706&_encoding=UTF8&camp=1789&creative=9325&linkCode=pf4&tag=gadgethunter2-20&linkId=22006f1de95e8e175eee975730108172">
                    <img src="webroot/img/amazonlogo.png"/>
                </a>
            </div>
        </li>
        <li>

            <div class="side-block">
                <a href="http://www.jdoqocy.com/click-8307307-11495095" target="_blank">
                    <img src="webroot/img/egg.png"/>
                </a>
            </div>
        </li>

    </ul>
</nav>


<div id="main">
    <section>
        <div class="container">

            <!-- deal alert module popup -->
            <div id="newsLetterModal" class="modal" style="display: none;">
                <span onclick="document.getElementById('newsLetterModal').style.display='none'" class="close" title="Close Deals Letter">
                    <i class="fa fa-times-circle fa-2x close" aria-hidden="true"></i>
                </span>
                <form class="modal-content animate" action="index.php" method="POST">
                    <div class="container">
                        <h2>Get up to 73% off items featured in our weekly deals letter</h2>
                        <label ><b>Name</b></label>
                        <input type="text" style="max-width:200px; margin: auto" placeholder="Your Name" name="name" required>

                        <label><b>Email</b></label>
                        <input type="text" style="max-width:200px; margin: auto" placeholder="Your Email" name="email" required>
                        <br><br>

                        <p>By joining our deals list you agree to our <a href="privacy/privacypolicy.htm">Terms & Privacy</a>.</p>

                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('newsLetterModal').style.display='none'" class="cancelbtn">I don't like deals</button>
                            <button type="submit" class="signupbtn">Count me in!</button>
                        </div>
                    </div>
                </form>
            </div>

            <!--display table of items-->
            <div class="tableWrapper">
                <table id="item_table" >
                    <?php
                    $itemCount =0;
                    foreach ($this->viewVars['items'] as $item):

                    if(($itemCount %4 == 0) || ($itemCount == 0)){
                        echo '<tr style="border-bottom: none;">';
                    }

                    ?>

                            <td class="item-container"><?= $this->Html->image(
                                    $item['large_img_url'],
                                    ['alt' => $item['title'],
                                    'url' => $item['item_url']]
                                )?>
                                <table class="priceBar">

                                    <?php
                                    $itemC = new \App\Controller\ItemsController();
                                    #item title
                                    echo('<tr style="border-bottom: none;"><td class="">'.$itemC->trimTitle($item['title']).'</td></tr>');

                                    # price options
                                    if($item['price'] < ($item['normal_price'] -1 )):
                                        echo('<tr style="border-bottom: none;"><td class="">'.'From $<s>'.$item['normal_price'].'</s> to $'.$item['price'].'</td></tr>');
                                    else:
                                       echo('<tr style="border-bottom: none;"><td class="">$'.$item['price'].'</td></tr>');
                                    endif ?>

                                    <?php
                                    #discount code
                                    if ($item['code'] != null):
                                    echo ('<tr style="border-bottom: none;"><td class="">CODE:</td></tr>');
                                    endif;
                                    ?>


                                </table>
                            </td>


                    <?php
                        $itemCount++;
                    if(($itemCount % 4 == 0 && $itemCount !== 0)){
                        echo '</tr>';
                    }
                    endforeach;
                    ?>


                </table>

                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('<i class="fa fa-arrow-left fa-2x" style="color:black;"> </i>', ['escape' => false]) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('<i class="fa fa-arrow-right fa-2x" style="color:black;"> </i>', ['escape' => false]) ?>

                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} items(s) of {{count}}')]) ?></p>
                </div>
            <!-- table wrapper-->
        </div>
            <!-- container -->
    </section>
</div>
<!-- main-->





</body>


</html>

