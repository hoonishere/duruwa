<?if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가?>
<?include_once(G5_LIB_PATH.'/thumbnail.lib.php');?>

	<link rel="stylesheet" href="<?=$latest_skin_url?>/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?=$latest_skin_url?>/css/style.css"> <!-- Resource style -->
	<script src="<?=$latest_skin_url?>/js/modernizr.js"></script> <!-- Modernizr -->

<section class="cd-hero">
		<ul class="cd-hero-slider "><!-- autoplay auto 슬라이드 하고 싶다면, 넣으시면 옆에 autoplay 를 클래스로 넣으면 됩니다. -->
			<? for ($i=0; $i<count($list); $i++) {
					$file_name = $list[$i][file][0][file] ; 
					$file_name =	explode(".mp4" , $file_name);
					$file_name=$file_name[0] ;  
					$full_vd_name = G5_URL."/data/file/".$bo_table."/".$file_name ; 
				?>
			<li class="cd-bg-video <?if($i==0){?>selected <?}?>" >
				<div class="cd-full-width">
					<h2><?=$list[$i][wr_subject]?></h2>
					<p> <?=cut_str($list[$i][wr_content] , "100")?> <!----></p>
					<!-- <a href="#0" class="cd-btn">Learn more</a> -->
				</div> <!-- .cd-full-width -->
				<div class="cd-bg-video-wrapper" data-video="<?=$full_vd_name?>">
				</div> <!-- .cd-bg-video-wrapper -->
			</li>
			<?}?>
		</ul> <!-- .cd-hero-slider -->

		<div class="cd-slider-nav">
			<nav>
				<span class="cd-marker item-1"></span>
				
				<ul>
					<? for ($i=0; $i<count($list); $i++) { ?>
					<li <?if($i==0){?>class="selected" <?}?>><a href="#0"  ><?=$i+1?></a></li><!-- $i+1 에는 원하는 텍스트 있다면 넣어주심 되요 -->
					<?}?>
				</ul>
			</nav> 
		</div> <!-- .cd-slider-nav -->
	</section> <!-- .cd-hero -->

<script src="<?=$latest_skin_url?>/js/jquery-2.1.1.js"></script>

<script>
jQuery(document).ready(function($){
	var slidesWrapper = $('.cd-hero-slider');

	//check if a .cd-hero-slider exists in the DOM 
	if ( slidesWrapper.length > 0 ) {
		var primaryNav = $('.cd-primary-nav'),
			sliderNav = $('.cd-slider-nav'),
			navigationMarker = $('.cd-marker'),
			slidesNumber = slidesWrapper.children('li').length,
			visibleSlidePosition = 0,
			autoPlayId,
			autoPlayDelay = 5000;

		//upload videos (if not on mobile devices)
		uploadVideo(slidesWrapper);

		//autoplay slider
		setAutoplay(slidesWrapper, slidesNumber, autoPlayDelay);

		//on mobile - open/close primary navigation clicking/tapping the menu icon
		primaryNav.on('click', function(event){
			if($(event.target).is('.cd-primary-nav')) $(this).children('ul').toggleClass('is-visible');
		});
		
		//change visible slide
		sliderNav.on('click', 'li', function(event){
			event.preventDefault();
			var selectedItem = $(this);
			if(!selectedItem.hasClass('selected')) {
				// if it's not already selected
				var selectedPosition = selectedItem.index(),
					activePosition = slidesWrapper.find('li.selected').index();
				
				if( activePosition < selectedPosition) {
					nextSlide(slidesWrapper.find('.selected'), slidesWrapper, sliderNav, selectedPosition);
				} else {
					prevSlide(slidesWrapper.find('.selected'), slidesWrapper, sliderNav, selectedPosition);
				}

				//this is used for the autoplay
				visibleSlidePosition = selectedPosition;

				updateSliderNavigation(sliderNav, selectedPosition);
				updateNavigationMarker(navigationMarker, selectedPosition+1);
				//reset autoplay
				setAutoplay(slidesWrapper, slidesNumber, autoPlayDelay);
			}
		});
	}

	function nextSlide(visibleSlide, container, pagination, n){
		visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			visibleSlide.removeClass('is-moving');
		});

		container.children('li').eq(n).addClass('selected from-right').prevAll().addClass('move-left');
		checkVideo(visibleSlide, container, n);
	}

	function prevSlide(visibleSlide, container, pagination, n){
		visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			visibleSlide.removeClass('is-moving');
		});

		container.children('li').eq(n).addClass('selected from-left').removeClass('move-left').nextAll().removeClass('move-left');
		checkVideo(visibleSlide, container, n);
	}

	function updateSliderNavigation(pagination, n) {
		var navigationDot = pagination.find('.selected');
		navigationDot.removeClass('selected');
		pagination.find('li').eq(n).addClass('selected');
	}

	function setAutoplay(wrapper, length, delay) {
		if(wrapper.hasClass('autoplay')) {
			clearInterval(autoPlayId);
			autoPlayId = window.setInterval(function(){autoplaySlider(length)}, delay);
		}
	}

	function autoplaySlider(length) {
		if( visibleSlidePosition < length - 1) {
			nextSlide(slidesWrapper.find('.selected'), slidesWrapper, sliderNav, visibleSlidePosition + 1);
			visibleSlidePosition +=1;
		} else {
			prevSlide(slidesWrapper.find('.selected'), slidesWrapper, sliderNav, 0);
			visibleSlidePosition = 0;
		}
		updateNavigationMarker(navigationMarker, visibleSlidePosition+1);
		updateSliderNavigation(sliderNav, visibleSlidePosition);
	}

	function uploadVideo(container) {
		container.find('.cd-bg-video-wrapper').each(function(){
			var videoWrapper = $(this);
			if( videoWrapper.is(':visible') ) {
				// if visible - we are not on a mobile device 
				var	videoUrl = videoWrapper.data('video'),
					video = $('<video loop><source src="'+videoUrl+'.mp4" type="video/mp4" /><source src="'+videoUrl+'.webm" type="video/webm" /></video>');

				video.appendTo(videoWrapper);
				// play video if first slide
				if(videoWrapper.parent('.cd-bg-video.selected').length > 0) video.get(0).play();
			}
		});
	}

	function checkVideo(hiddenSlide, container, n) {
		//check if a video outside the viewport is playing - if yes, pause it
		var hiddenVideo = hiddenSlide.find('video');
		if( hiddenVideo.length > 0 ) hiddenVideo.get(0).pause();

		//check if the select slide contains a video element - if yes, play the video
		var visibleVideo = container.children('li').eq(n).find('video');
		if( visibleVideo.length > 0 ) visibleVideo.get(0).play();
	}

	function updateNavigationMarker(marker, n) {
		marker.removeClassPrefix('item').addClass('item-'+n);
	}

	$.fn.removeClassPrefix = function(prefix) {
		//remove all classes starting with 'prefix'
	    this.each(function(i, el) {
	        var classes = el.className.split(" ").filter(function(c) {
	            return c.lastIndexOf(prefix, 0) !== 0;
	        });
	        el.className = $.trim(classes.join(" "));
	    });
	    return this;
	};
});
</script>





<!-- ///////////////////////////////////////////////////////// -->
