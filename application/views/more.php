<!-- Content Start -->
<section id="content_wrap">
<article>	
    <!-- Portfolio Start -->
	
    <div id="portfolio_4col" class="image_grid">
    <div style="font-size: 20px;margin-bottom:15px;"><?php echo $sname?></div>
    <ul id="list" class="da-thumbs">
    	 <?php for ($i = 0 ; $i < sizeof($travels) ; $i++){?>
        <li data-id="id-($i+1)" class="logo">
            <img src="<?php echo base_url().$travels[$i]->imgurl ?>" alt="img" />
            <div>
            	<a href="<?php echo base_url()."index.php/home/writtings/".$travels[$i]->tid?>">
                <h3><?php echo $travels[$i]->tname ?></h3>
                <p><?php 
                if (strlen($travels[$i]->description)>150) {
                	echo substr($travels[$i]->description, 0,401)."...";
                }
                else
                echo $travels[$i]->description ?></p>
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

<div id="triangle-down">&nbsp;</div>