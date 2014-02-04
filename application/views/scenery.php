<div id="triangle-up"></div>

<!-- Content Start -->
<section id="content_wrap" class="typography">
<article>

	
    <div class="portfolio_top">
    <h3><?php echo urldecode($this->uri->segment(3)) ?></h3>
<!--    <div class="portfolio_nav">
        <a class="pf_page" href="index.html"></a>
        <a class="pf_next" href="portfolio_single_page_2.html"></a>
    </div> -->
    </div>
    
    <div class="clear"></div>
    
    <!-- Portfolio Single Page 1 Start -->
    <div class="two_third">
    <div class="flexslider">
        <ul class="slides">
        <?php 
        	foreach ($turl as $rows1):
        ?>
            <li><a href="<?php echo site_url("home/writtings")."/".$rows1->tid ?>"><img src="<?php echo base_url()."".$rows1->imgurl ?>" alt="img" /></a></li>
            
         <?php 
			endforeach;
         ?>
        </ul>
    </div>
    </div>
    <div class="one_third_last">
        <p><?php echo $detail->info ?>
       </p>
        
        <br />
        
        <br />
        <a href="<?php echo base_url(); ?>index.php/home/more/<?php echo urldecode($this->uri->segment(3)) ?>" class="button">查看更多</a>
        <br /><br />

    </div>
    <!-- Portfolio Single Page 1 End -->
    
</article>
</section>
<!-- Content End -->

<div id="triangle-down">&nbsp;</div>


