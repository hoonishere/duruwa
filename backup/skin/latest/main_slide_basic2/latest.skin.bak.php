<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
.jcarousel-skin-tango .jcarousel-container {
	position:relative;
	left:20px;
}

.jcarousel-skin-tango .jcarousel-direction-rtl {
	direction: rtl;
}

.jcarousel-skin-tango .jcarousel-container-horizontal {
    width: 436px;
    padding: 5px 15px;
}

.jcarousel-skin-tango .jcarousel-clip {
    overflow: hidden;
}

.jcarousel-skin-tango .jcarousel-clip-horizontal {
    width:  436px;
    height: 543px;
}

.jcarousel-skin-tango .jcarousel-item {
    width: 436px;
    height: 543px;
}

.jcarousel-skin-tango .jcarousel-item-horizontal {
	margin-left: 0;
	margin-right: 5px;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-item-horizontal {
	margin-left: 10px;
    margin-right: 0;
}



.jcarousel-skin-tango .jcarousel-item-placeholder {
    background: #fff;
    color: #000;
}

/**
 *  Horizontal Buttons
 */
.jcarousel-skin-tango .jcarousel-next-horizontal {
    position: absolute;
    top: 228px;
    right: -35px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url("<?=$latest_skin_url?>/img/btn_right.gif") no-repeat 0 0;
}

.jcarousel-skin-tango .jcarousel-prev-horizontal {
    position: absolute;
    top: 228px;
    left: -15px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url("<?=$latest_skin_url?>/img/btn_left.gif") no-repeat 0 0;
}
</style>
<script type="text/javascript" src="<?=$latest_skin_url?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
			auto: 5,
			scroll: 1,
			wrap: 'circular'
    });
});
</script>
<?
$sql = " select * from g5_shop_item where ca_id = '10' and it_use = '1' order by it_order ";
$list = getList($sql);
$width = "436";
$height = "543";

?>
<ul id="mycarousel" class="jcarousel-skin-tango">
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
        $img = '<img src="'.$file_url.'" width="'.$width.'" height="'.$height.'" alt="'.$img_alt.'"';
    } else {
        $img = '<img src="'.G5_SHOP_URL.'/img/no_image.gif" width="'.$width.'"';
        if($height)
            $img .= ' height="'.$height.'"';
        $img .= ' alt="'.$img_alt.'"';
    }
		?>
			<li><a href="<?=G5_URL?>/shop/item.php?it_id=<?=$list[$j][it_id]?>"><?=$img?></a></li>
	<?}?>
</ul>