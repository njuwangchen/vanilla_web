
<!-- Content Start -->
<section id="content_wrap">
<article>
    <div class="page_title">
        <h2>用<span>最简单</span> 的方式撰写<span>游记</span>&nbsp &nbsp 领略旅行别样的乐趣</h2>
    </div>
	
    <!-- Portfolio Start -->
    <ul class="splitter" id="filter">
        <li>
            <ul>
                <li class="segment-1 selected-1"><a	 href="#" data-value="关键词">热门目的地</a></li>
<!--                <li class="segment-0"><a href="index_place.html" data-value="地点">地点</a></li>
 -->            <!--    <li class="segment-2"><a href="#" data-value="logo">Logos</a></li>   
                <li class="segment-3"><a href="#" data-value="photgraphy">Photgraphy</a></li>  --> 
            </ul>
        </li>
    </ul>
	
    <div id="portfolio_4col" class="image_grid">
    <ul id="list" class="da-thumbs">
    <?php for ($i = 0 ; $i < sizeof($city) ; $i++){?>
        <li data-id="id-<?php echo $i+1 ?>" class="logo">
            <img src="<?php echo base_url()."".$city[$i]->simageurl ?>" alt="img" />
            <div>
            	<a href="<?php echo base_url()."index.php/home/scenery/".$city[$i]->sname?>">
                <h3><?php echo $city[$i]->sname ?></h3>
                <p><?php 
                if (strlen($city[$i]->info)>150) {
                	echo substr($city[$i]->info, 0,401)."...";
                }
                else
                echo $city[$i]->info ?></p>
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



