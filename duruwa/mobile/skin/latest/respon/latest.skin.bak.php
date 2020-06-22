	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
  <!-- Demo CSS -->
	<link rel="stylesheet" href="<?=$latest_skin_url?>/css/flexslider.css" type="text/css" media="screen" />
	<!-- Modernizr -->
  <script src="<?=$latest_skin_url?>/js/modernizr.js"></script>
</head>
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
						<?
						$sql = " select * from g5_shop_item where ca_id = '10' and it_use = '1' order by it_order ";
						$list = getList($sql);
						$width = "436";
						$height = "543";
						?>
						<? for ($j=0; $j<count($list); $j++) { 
						for($i=1;$i<=10; $i++) {
								$file = G5_DATA_PATH.'/item/'.$list[$j]['it_img'.$i];
								
								if(is_file($file) && $list[$j]['it_img'.$i]) {
										$size = @getimagesize($file);
										if($size[2] < 1 || $size[2] > 3)
												continue;

										$filename = basename($file);
										$filepath = dirname($file);
										$img_width = $size[0];
										$img_height = $size[1];

										break;
								}
						}
						if($filename) {
								//thumbnail($filename, $source_path, $target_path, $thumb_width, $thumb_height, $is_create, $is_crop=false, $crop_mode='center', $is_sharpen=true, $um_value='80/0.5/3')
								$thumb = thumbnail($filename, $filepath, $filepath, $width, $height, false, false, 'center', true, $um_value='80/0.5/3');
						}

						if($thumb) {
								$file_url = str_replace(G5_PATH, G5_URL, $filepath.'/'.$thumb);
								$img = '<img src="'.$file_url.'" alt="'.$img_alt.'"';
						} else {
								$img = '<img src="'.G5_SHOP_URL.'/img/no_image.gif" width="'.$width.'"';
								if($height)
										$img .= ' height="'.$height.'"';
								$img .= ' alt="'.$img_alt.'"';
						}
						?>
            <li>
  	    	    <a href="<?=G5_URL?>/shop/item.php?it_id=<?=$list[$j][it_id]?>"><?=$img?></a>
  	    		</li>
						<?}?>
          </ul>
        </div>
      </section>
  <!-- FlexSlider -->
  <script defer src="<?=$latest_skin_url?>/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
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