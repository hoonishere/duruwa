	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
  <!-- Demo CSS -->
	<link rel="stylesheet" href="<?=$latest_skin_url?>/css/flexslider.css" type="text/css" media="screen" />
	<style>
	
/* FlexSlider Necessary Styles
*********************************/
.flexslider<?=$bo_table?> {margin: 0; padding: 0;}
.flexslider<?=$bo_table?> .slides > li {display: none; -webkit-backface-visibility: hidden;} /* Hide the slides before the JS is loaded. Avoids image jumping */
.flexslider<?=$bo_table?> .slides img {width: 100%; display: block;}
.flex-pauseplay span {text-transform: capitalize;}

/* Clearfix for the .slides element */
.slides:after {content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0;}
html[xmlns] .slides {display: block;}
* html .slides {height: 1%;}

/* No JavaScript Fallback */
/* If you are not using another script, such as Modernizr, make sure you
 * include js that eliminates this class on page load */
.no-js .slides > li:first-child {display: block;}

/* FlexSlider<?=$bo_table?> Default Theme
*********************************/
.flexslider<?=$bo_table?> { margin: 0 0 0px; background: #fff; position: relative;  }
.flex-viewport { max-height: 2000px; -webkit-transition: all 1s ease; -moz-transition: all 1s ease; -o-transition: all 1s ease; transition: all 1s ease; }
.loading .flex-viewport { max-height: 300px; }
.flexslider<?=$bo_table?> .slides { zoom: 1; }
.carousel li { margin-right: 5px; }

/* Direction Nav */
.flex-direction-nav {*height: 0;}
.flex-direction-nav a  { text-decoration:none; display: block; width: 40px; height: 40px; margin: -20px 0 0; position: absolute; top: 50%; z-index: 10; overflow: hidden; opacity: 0; cursor: pointer; color: rgba(0,0,0,0.8);}
.flex-direction-nav .flex-prev { left: -50px; }
.flex-direction-nav .flex-next { right: -50px; text-align: right; }
.flexslider<?=$bo_table?>:hover .flex-prev { opacity: 0.7; left: 10px; }
.flexslider<?=$bo_table?>:hover .flex-next { opacity: 0.7; right: 10px; }
.flexslider<?=$bo_table?>:hover .flex-next:hover, .flexslider<?=$bo_table?>:hover .flex-prev:hover { opacity: 1; }
.flex-direction-nav .flex-disabled { opacity: 0!important; filter:alpha(opacity=0); cursor: default; }
.flex-direction-nav a:before  { font-family: "flexslider-icon"; font-size: 40px; line-height:1; display: inline-block; content: '\f001'; }
.flex-direction-nav a.flex-next:before  { content: '\f002'; }

/* Pause/Play */
.flex-pauseplay a { display: block; width: 20px; height: 20px; position: absolute; bottom: 5px; left: 10px; opacity: 0.8; z-index: 10; overflow: hidden; cursor: pointer; color: #000; }
.flex-pauseplay a:before  { font-family: "flexslider-icon"; font-size: 20px; display: inline-block; content: '\f004'; }
.flex-pauseplay a:hover  { opacity: 1; }
.flex-pauseplay a.flex-play:before { content: '\f003'; }

/* Control Nav */
.flex-control-nav {width: 100%; position: absolute; bottom: 10px; text-align: center;}
.flex-control-nav li {margin: 0 6px; display: inline-block; zoom: 1; *display: inline;}
.flex-control-paging li a {width: 11px; height: 11px; display: block; background: #666; background: rgba(0,0,0,0.5); cursor: pointer; text-indent: -9999px; -webkit-border-radius: 20px; -moz-border-radius: 20px; -o-border-radius: 20px; border-radius: 20px; -webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.3); -moz-box-shadow: inset 0 0 3px rgba(0,0,0,0.3); -o-box-shadow: inset 0 0 3px rgba(0,0,0,0.3); box-shadow: inset 0 0 3px rgba(0,0,0,0.3); }
.flex-control-paging li a:hover { background: #333; background: rgba(0,0,0,0.7); }
.flex-control-paging li a.flex-active { background: #000; background: rgba(0,0,0,0.9); cursor: default; }

.flex-control-thumbs {margin: 5px 0 0; position: static; overflow: hidden;}
.flex-control-thumbs li {width: 25%; float: left; margin: 0;}
.flex-control-thumbs img {width: 100%; display: block; opacity: .7; cursor: pointer;}
.flex-control-thumbs img:hover {opacity: 1;}
.flex-control-thumbs .flex-active {opacity: 1; cursor: default;}

@media screen and (max-width: 860px) {
  .flex-direction-nav .flex-prev { opacity: 1; left: 10px;}
  .flex-direction-nav .flex-next { opacity: 1; right: 10px;}
}

	</style>
	<!-- Modernizr -->
  <script src="<?=$latest_skin_url?>/js/modernizr.js"></script>
</head>
      <section class="slider">
        <div class="flexslider<?=$bo_table?>">
          <ul class="slides">
						<?
						$width = "1000";
						//$height = "543";
						include_once(G5_LIB_PATH.'/thumbnail.lib.php');
						$board['bo_table'] = $bo_table;
						$board['bo_gallery_width'] = $width;
						$board['bo_gallery_height'] = $height;
						?>
						<? for ($j=0; $j<count($list); $j++) { 
						$noimage = "$latest_skin_url/img/no-image.gif";
						$list[$j][file] =get_file($bo_table, $list[$j][wr_id]);
						$imagepath = $list[$j][file][0][path]."/".$list[$j][file][0][file];

						$thumb = get_list_thumbnail($board['bo_table'], $list[$j]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
						if($thumb['src']) {
								$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
						} else {
								$img_content = '<span style="width:'.$board['bo_gallery_width'].'px;height:'.$board['bo_gallery_height'].'px">no image</span>';
						}
						?>
            <li>
  	    	    <a href="<?=set_http($list[$j][wr_link1])?>"><?=$img_content?></a>
  	    		</li>
						<?}?>
          </ul>
        </div>
      </section>
  <!-- FlexSlider -->
  <script defer src="<?=$latest_skin_url?>/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(window).load(function(){
      $('.flexslider<?=$bo_table?>').flexslider({
        animation: "slide"
      });
    });
  </script>
  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="<?=$latest_skin_url?>/js/shCore.js"></script>
  <script type="text/javascript" src="<?=$latest_skin_url?>/js/shBrushXml.js"></script>
  <script type="text/javascript" src="<?=$latest_skin_url?>/js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="<?=$latest_skin_url?>/js/jquery.easing.js"></script>
  <script src="<?=$latest_skin_url?>/js/jquery.mousewheel.js"></script>