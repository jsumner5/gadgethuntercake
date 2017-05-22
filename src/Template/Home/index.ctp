<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    .button{
        display: block;
        border-radius: 3px;
    }
    .center{
        margin-left: auto;
        margin-right: auto;
    }
    .header{
        height: 4.5em;
        background-color: #2a6496;
    }
    .text-center{
        text-align: center;
    }
    .text-black{
        color: black !important;
    }
    /*slider*/
    .slider{
        height: 250px;
        width: 500px;
        background-color: #1C37F9;
    }

    /*side bar*/
    .side-block{
        background-color: #4d4d4d;
        /*height: 200px;*/
        width: 100%;
        padding: .5em;
        margin-bottom: 1em;
    }
    .side-block > a {
        padding: 0 !important;
        /*width: 100%;*/
        height: 100%;
    }
    .side-block > a > img{
        width: 100%;
        /*height: 100%;*/
    }
    .menu-container > li > a{
        background-color: #1C37F9 !important;
        padding-left: 0 !important;
    }
    .menu-container > li > a:hover{
        background-color: #324BF7 !important;
    }



    @media only screen and (max-width: 700px) {
        #actions-sidebar{
            display:none;
        }
        #item_table td{
            display:block !important;
            width:100% !important;
        }
        .top-bar{
            /*overflow: visible;*/
            height: auto !important;
        }
        .top-bar-section ul {
            display:inline-flex !important;
            margin-right: 0 !important;
            width:100% !important;
        }
        div > ul > li {
            width: 33.33% !important;

        }
    }




</style>





<title>Gadget Hunter.co</title>


<nav class="large-3 medium-4 columns" id="actions-sidebar" style="float: right;">
    <ul class="side-nav">
        <li class="heading text-center text-black">Our Affiliates</li>
        <li>
            <div class="side-block">
                <a target="_blank" href="dfhjdhttps://www.amazon.com/gp/student/signup/info/?ref_=assoc_tag_ph_1402130811706&_encoding=UTF8&camp=1789&creative=9325&linkCode=pf4&tag=gadgethunter2-20&linkId=22006f1de95e8e175eee975730108172">
                    <img src="webroot/img/amazonlogo.png"/>
                </a>
            </div>
        </li>
        <li>

            <div class="side-block">
                <a target="_blank" href="dfhjdhttps://www.amazon.com/gp/student/signup/info/?ref_=assoc_tag_ph_1402130811706&_encoding=UTF8&camp=1789&creative=9325&linkCode=pf4&tag=gadgethunter2-20&linkId=22006f1de95e8e175eee975730108172">
                    <img src="webroot/img/newegg.jpg"/>
                </a>
            </div>
        </li>

    </ul>
</nav>


<div id="main">
    <section>
        <div class="container">






            <!--    <button class="button center" style="margin-top: 2em;" onclick="document.getElementById('id01').style.display='block'">Exclusive Deals<br><i class="fa fa-envelope-o"></i></button>-->

            <!-- deal alert module popup -->
            <div id="id01" class="modal" style="display: none;">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                <form class="modal-content animate" action="index.php" method="POST">
                    <div class="container">
                        <h2>Get up to 73% off items featured in our weekly deals letter</h2>
                        <label><b>Name</b></label>
                        <input type="text" placeholder="Your Name" name="name" required>

                        <label><b>Email</b></label>
                        <input type="text" placeholder="Your Email" name="email" required>
                        <br><br>

                        <p>By joining our deals list you agree to our <a href="privacy/privacypolicy.htm">Terms & Privacy</a>.</p>

                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">I don't like deals</button>
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

                            <td class="item-container"><?= $this->Html->image($item['large_img_url'])?>
                                <table class="priceBar">

                                    <?php
                                    if($item['price'] < ($item['normal_price'] -1 )):
                                        echo('<tr><td class="">'.'From $'.$item['normal_price'].' to $'.$item['price'].'</td></tr>');
                                    else:
                                       echo('<tr><td class="">$'.$item['price'].'</td></tr>');
                                       // debug($item);

                                    endif ?>
                                    <tr><td class="">CODE:</td></tr>

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
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            <!-- table wrapper-->
        </div>
            <!-- container -->
    </section>
</div>
<!-- main-->





</body>


</html>

