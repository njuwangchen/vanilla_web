
<style>

*{
	margin:0;
	padding:0;
}



ul{
	list-style:none;
}

.container{
	background:#FF9;
	width:420px;
	height:300px;
	margin:170px auto 0;
	cursor:pointer;
	overflow:hidden;
	box-shadow:6px 4px 5px #969696;
}

.container img{
	background:#FFF;
	display:block;
	width:400px;
	height:280px;
	padding:10px;
	float:left;	
	-webkit-transition:0.7s;
	-moz-transition:0.7s;
	-o-transition:0.7s;
}

.zoom{
	position:absolute;
	-moz-transform:translate(-150px,-120px);
	-webkit-transform:scale(1.1) translate(-150px,-120px) skew(15deg,-30deg);
	-ms-transform:scale(1.1) translate(-150px,-120px) skew(15deg,-30deg);
	-o-transform:scale(1.1) translate(-150px,-120px) skew(15deg,-30deg);
}



.name{
	background:#FFF;
	width:220px;
	height:30px;
	margin:15px auto;
	cursor:pointer;
	box-shadow:2px 2px 5px #969696;/*opera或ie9*/ 
	-webkit-border-radius:20px;
	-moz-border-radius:20px;
	border-radius:20px;
}

.name p{
	font:bold 24px Verdana, Geneva, sans-serif;
	text-align:center;
	line-height:30px;
	color:#FFF;
	background:#333;
	-webkit-border-radius:20px;
	-moz-border-radius:20px;
	border-radius:20px;
}

</style>
<script src="js/jquery-1.6.1.min.js"></script>
<script>
$(function(){   
		  
		  var interval;
		   $(".container img").click(function cover(){
					$(this).addClass("zoom").fadeOut(700,append);		
					function append(){
					$(this).removeClass("zoom").appendTo(".container").show();
					var name = $(".container").children("img").first().attr("alt");
					// $(".name p").text("No "+name);
					}	
			  
			})
		   
		   function auto(){
			        var play = $(".container").children("img").first();
					play.addClass("zoom").fadeOut(700,append);		
					function append(){
					$(this).removeClass("zoom").appendTo(".container").show();
					var name = $(this).parent().children("img").first().attr("alt");
					// $(".name p").text("No "+name);
					}
					interval = setTimeout(auto,5000);
		   }
		   
		   $(".container img").hover(function(){
					stopPlay();
			},function(){
				    interval = setTimeout(auto,5000);
			})
		   
		   function stopPlay()
				  {
				  clearTimeout(interval)
				  }
		   auto();
					
})


function likeit(img){
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	
	xmlhttp.onreadystatechange=function()
	  {
		//  alert("xmlhttp.readyState:"+xmlhttp.readyState);
		//  alert("xmlhttp.status:"+xmlhttp.status);
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	   		 var isHave = xmlhttp.responseText;
		   	alert(isHave);
	   		 if(isHave==1){
				alert("已经喜欢过这张图片了，再看看别的吧~");
		    }else{
		    	alert("已经加入喜欢的图片");
			}
				
	    }
//	    else{		
//	    	alert("??");
//		    }
	    
	  }

	
	xmlhttp.open("get","<?php echo base_url()?>index.php/home/likeit/"+img,true);

	xmlhttp.send();

}
function collect(tid){
	//alert(tid);
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	xmlhttp.onreadystatechange=function()
	  {
//		  alert("xmlhttp.readyState:"+xmlhttp.readyState);
//		  alert("xmlhttp.status:"+xmlhttp.status);
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	   		 var isHave = xmlhttp.responseText;
//		   	alert(isHave);
	   		 if(isHave==1){
				alert("已经收藏过这个游记了~，再看看别的吧~");
		    }else{
		    	alert("收藏成功");
			}
				
	    }
	  }
	xmlhttp.open("get","<?php echo base_url()?>index.php/home/collect/"+tid,true);
	xmlhttp.send();
		
}

//function share(){
//	window.open ("<?php echo base_url()?>page.html", "newwindow", "height=200, width=400, top=200, left=200, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no");
//}




</script>


	<section id="content_wrap"> <article>


	<div class="page_title">
		
	
		<div class="threebuttons2">
			<ul>
				<li><a id = "choice0" class="mytitleright" href="#" onclick="setTab('writting',0,3)">版式1</a></li>
				<li><a id = "choice1" class="titleright" href="#" onclick="setTab('writting',1,3)">版式2</a></li>
				<li><a id = "choice2" class="titleright" href="#" onclick="setTab('writting',2,3)">版式3</a></li>
			</ul>
		</div>
				
		<a href="<?php echo base_url()."index.php/home/user_center/".$top->row()->uid;?>"><img src="<?php echo base_url()."images/".$top->row()->headportrait?>"
			style="float: left" alt="img" width=10% /> </a> <br>
		
		<h2 style="text-align: left">&nbsp&nbsp&nbsp<?=$top->row()->tname?>     	</h2>


		<div class="threebuttons">
			<ul>
				<li><a class="titleright" href="#" onclick="collect(<?=$tid?>);">收藏</a></li>
				<li><a class="titleright"
					href="#comment">评论</a></li>
				<!-- <li><a class="titleright" href="#" onclick="share();">分享</a></li> -->
			</ul>
		</div>
		
		

	</div>
	<div class="page_title" id="panel">
		<h3>旅行地点：<?=$top->row()->sceneryname?></h3>
		<h3>旅行人数： <?=$top->row()->persons?>人 </h3>
		<h3>旅行天数： <?=$days?>天 </h3>
	</div>
	<p class="flip">点击查看详情</p>


	</article> </section>
	
	
	
	<!-- Usertitle End -->
	<div id="triangle-down">&nbsp;</div>
	
	
	
	<div id="writting">
		<div class="innerbox" id="w0"></div>
   
   <?
	
			$i = 1;
			foreach ( $pieces as $row ) {

				?>
				<script>
				var newNode = document.createElement("div");
				newNode.setAttribute("id", "w"+"<?=$i?>");
				newNode.className = "innerbox";
				var n = "<?=$i?>"-1;
				document.getElementById("w"+n).innerHTML='<p><?php echo $row->description?></p>';
				</script>

	<?
				foreach($images[$row->pid] as $image_row ){
				
				?>
    <script>
    		var imgurl = '<?=$image_row->imgurl?>';
    		imgurl = imgurl.split("/");
    		var img = imgurl[1];
			document.getElementById("w"+n).innerHTML += '<img src="<?php echo base_url().$image_row->imgurl?>"><a class="titleright" href="#" onclick="likeit(img);"> 喜欢 </a>';
			
	</script>
    <?
				
				}
				?>
				<script>
				document.getElementById("writting").insertBefore(newNode,
				document.getElementById("w"+n));
				</script>
			<?
			$i ++;
			}
			?>
   
</div>

<div id="writting1">

           <div id="wrapper"> 
            <ul id="index_cards">
            		
            		<?php $i2=1; foreach ($pieces as $row2):  ?>
            		
                	<li id="card-<?php echo ($i2%4); $i2++; ?>"><h3><?php echo $row2->description; ?></h3>
                		<?php foreach ($images[$row2->pid] as $image_row2): ?>
                        <img src="<?php echo base_url()."".$image_row2->imgurl; ?>" height="300" width="300" />
                        <a class="titleright" href="#" onclick="likeit(img);"> 喜欢 </a>
                        <?php endforeach; ?>
                    </li>
                    
                    <?php endforeach; ?>
                    
                   
                </ul>
               
                </div>   
              


</div>
<div id="writting2" style="display:none">
<p>版本3</p>


</div>

	<div id="comment" style="float:left;">

		<div class="commentbox" id="c0" ></div>

<?

$i = 1;
foreach ( $comment as $row ) {
	?>
    <script>
			var newNode = document.createElement("div");
			newNode.setAttribute("id", "c"+"<?=$i?>");
			newNode.className = "commentbox";
			var n = "<?=$i?>"-1;
			document.getElementById("c"+n).innerHTML = '<div class="floatleft" style="float:left;text-align:center; "><a href="<?php echo base_url()."index.php/home/user_center/".$row->uid;?>" ><img src="<?php echo base_url().$row->headportrait;?>" alt="img"  width=50px > </a>'
			    +'</div> <div class="comment" ><a href="<?php echo base_url()."index.php/home/user_center/".$row->uid;?>" class="author"><?=$row->username?>:</a>'
		    +'<span class="text"> <?=$row->comment?></span> </div><div class="time" > <?=$row->date?> </div>'
		     +'  <hr class="commenthr"/>';
			document.getElementById("comment").insertBefore(newNode,
					document.getElementById("c"+n));
	</script>
    <?
	$i ++;
}
?>


 </div>
	<!--评论部分结束 -->

	<section id="content_wrap"> <a name="comment"></a> <article> <!-- Contact Form Start -->
	<div class="two_third">
		<div class="contact_form">
			<form action="<?=site_url('home/submit_travel_comment/'.$tid)?>" method="post" name="contact-form" id="contact-form">
			<div id="main">
				<div id="response"></div>

				<label>评论:</label>
				<p>
					<textarea name="message" id="message" cols="30" rows="10"></textarea>
				</p>
				<p>
					<input class="contact_button button" type="submit" name="submit"
						id="submit" value="提交评论" />
				</p>
			</div>
			</form>
		</div>
	</div>
	<!-- Contact Form End --> </article> </section>

	<br>
	<div id="triangle-down">&nbsp;</div>

	<?php $i2=1; foreach ($pieces as $row2):  ?>
<div><?php echo $row2->description; ?></div>
<div class="container">
<?php foreach ($images[$row2->pid] as $image_row2): ?>
        <img src="<?php echo base_url()."".$image_row2->imgurl; ?>" alt="1" />
<?php endforeach; ?>
</div>
		<div class="name"><p>喜欢</p></div>
<?php endforeach; ?>




