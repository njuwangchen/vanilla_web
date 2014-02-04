
<!-- Content Start -->

<section id="content_wrap">
<article>
    <div class="page_title">
    </div>
	
    <!-- Portfolio Start -->
	<h2> 发现新的旅程 </h2>
    <div id="portfolio_4col" class="image_grid">
    <ul id="list" class="da-thumbs">
    <?php for ($i = 0 ; $i < sizeof($latest_travel) ; $i++){?>
        <li data-id="id-1" class="logo">
            <img src="<?php echo base_url()."".$latest_travel[$i]->imgurl ?>" alt="img" />
            <div>
            	<a href="<?php echo base_url()."index.php/home/writtings/".$latest_travel[$i]->tid?>">
                <h3><?php echo $latest_travel[$i]->tname ?></h3>

                </a>
            </div>
        </li>
        <?php } ?>
        

    </ul>
    </div>
    <!-- Portfolio End -->
    </article>
</section>
<!-- Content End -->



