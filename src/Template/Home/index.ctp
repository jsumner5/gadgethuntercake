<?php
$this->Html->meta('keywords', 'amazon, newegg, deals, tech, gadgethunter', ['block' => true]);
$this->assign('title','Gadget Hunter Deals');

echo $this->Html->script(['googleAnalytics', 'onLoad']);

?>





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
                <form class="modal-content animate" action="./home/onSubscribe" method="POST">
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

            <!--title/slogan/header-->
<!--            <h2>Top Tech Deals Out Right Now</h2>-->

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

                            <td class="item-container">
                                <?php
                                $image = $this->Html->image(
                                    $item['large_img_url'],
                                    [
                                        'alt' => $item['title']
                                    ]);
                                ?>

                                <?= $this->Html->link(
                                    $image,
                                    $item['item_url'],
                                    [
                                        'target' => '_blank',
                                        'escape' => false
                                    ]
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
                        <?= $this->Paginator->prev('<i class="fa fa-arrow-left fa-2x" style="color:black;"> </i>', ['escape' => false]); ?>
                        <?= $this->Paginator->numbers(['modulus' => 4]); ?>
                        <?= $this->Paginator->next('<i class="fa fa-arrow-right fa-2x" style="color:black;"> </i>', ['escape' => false]); ?>

                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} items(s) of {{count}}')]) ?></p>
                </div>
            <!-- table wrapper-->
        </div>
            <footer id="footer">
        <span style="
                		box-shadow: 0 10px 5px -4px gray;
                        width: 90%;
                        display: block;
                        margin:auto;
                        height: 10px;">
        </span>
                <ul class="footer_ul">
<!--                    <li>2016 GadgetHunter.co</li>-->
                </ul>
            </footer>
            <!-- container -->
    </section>
</div>
<!-- main-->





</body>




</html>

