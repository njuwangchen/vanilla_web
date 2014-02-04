
<div class="usercentertitle"><img src="<?php echo base_url()."".$user->headportrait ?>" alt="headimage"  width=100 height=100 style="padding-top:20px;">
<br><br><br>
<h2 style="padding-left:150px;"> <?php echo $user->username ?> </h2>

		<div class="threebuttons" style="float:right;  padding-bottom:20px;" >
        <ul >
		<li ><a class="titleright" href="#travel">旅程</a></li>
		<li ><a class="titleright" href="#like">喜欢</a></li>
		<li ><a class="titleright" href="#collect">收藏</a></li>
        </ul>
    	</div>
        
<!--        <div 	><a href="#"  style="font-size:2em;bakcground-color:black; float:right">添加旅程</a> </div>
 --></div>


<section id="content_wrap" >
<article>
    <div class="page_title">
    </div>
    
    <div >
    <br>
    <a name="travel"></a>
    <div">
    <h2 style="">我的旅程：</h2>
	<br />
    <?php 
		if(count($travel)==0){
			echo "<h5 style=' text-align:center;padding-top:30px;'> 我还没有旅程哦 </h5>";
		}else{
	?>
    <br>
    <?php 
    	foreach ($travel as $row):
    ?>
    <a href="<?php echo site_url("home/writtings")."/".$row->tid ?>" ><h3><?php echo $row->tname ?></h3> </a>
	<br>
	<?php endforeach; }?>
	<br>
    <!-- Portfolio Start -->
    </div>
    <div style="border-top-style: solid; border-top-color:#CCCCCC; padding-top:50px; ">
    <a name="like"></a>
	<h2> 喜欢的图片：</h2>
	<?php 
		if(count($like)==0){
			echo "<h5 style=' text-align:center;padding-top:30px;border-bottom-style: solid; border-bottom-color:#CCCCCC;'> 还没有喜欢的图片哦 </h5>";
		}else{
	?>
    <div id="portfolio_4col" class="image_grid" style="padding-bottom: 50px; margin-bottom: 50px; border-bottom-color:#CCCCCC; border-bottom-style:solid;" >
    <ul id="list" class="da-thumbs">
    	<?php 	
    		
    		$count=1;
    		
    		foreach ($like as $row1):
    		$count+=1;
    	?>
    	<li data-id="id-<?php echo $count ?>" class="logo">
            <img src="<?php echo base_url()."".$row1->img ?>" alt="img" />
            
       </li>
    	
    	<?php endforeach;} ?>
        

    </ul>
    </div>
    <!-- Portfolio End -->
    </div>
    <br>
	
    <a name="collect"></a>
    <h2 > 收藏的旅程：  </h2>
	<br />
    <?php 
		if(count($collect)==0){
			echo "<h5 style=' text-align:center;padding-top:30px;'> 还没有收藏的旅程哦 </h5>";
		}else{
	?>
    <div class="lovejounery">  
    <br>
    	<?php 
    		foreach ($collect as $row2):
    	?>
    		<a href="<?php echo site_url("home/writtings")."/".$row2->tid ?>" ><h3><?php echo $row2->tname ?></h3> </a>
			
	<br>
    	<?php 
    		endforeach;}
    	?>
    </div>
    <br>
    
</article>
</section>
<!-- Content End -->



<br>
<div id="triangle-down">&nbsp;</div>
