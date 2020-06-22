<style>
/*
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
*/
body{
	color: #222;
	font-size: 13px;
	font-family:Arial, Helvetica, sans-serif;
}
/***** End Header ****/
/**
 * Grid container
 */
#tiles {
  list-style-type: none;
  position: relative; /** Needed to ensure items are laid out relative to this container **/
  margin: 0;
}

/**
 * Grid items
 */
#tiles li {
  background-color: #ffffff;
  border: 1px solid #DDDDDD;
  display: none; /** Hide items initially to avoid a flicker effect **/
  padding: 4px;
  -webkit-transition: all 0.3s ease-out;
     -moz-transition: all 0.3s ease-out;
       -o-transition: all 0.3s ease-out;
          transition: all 0.3s ease-out;
}

#tiles li.inactive {
  visibility: hidden;
  opacity: 0;
}

#tiles li img {
  display: block;
}
/**
 * Grid item text
 */
#tiles li p {
  color: #666;
  font-size: 12px;
}
#tiles li p img{
	float:left;
	padding:8px 8px 3px 10px;
	cursor:pointer;
}
#tiles li p span{
	float:right;
	padding-top:8px;
	padding-right:5px;
}
#tiles li p span{
	color: #666;
}
/**
 * Some extra styles to randomize heights of grid items.
 */
#tiles ali:nth-child(3n) {
  height: 175px;
}

#tiles ali:nth-child(4n-3) {
  padding-bottom: 30px;
}

#tiles ali:nth-child(5n) {
  height: 250px;
}

/** General page styling **/
#main {
  padding: 30px 0 30px 0;
}

header h1 {
  text-align: center;
  font-size: 24px;
  font-weight: normal;
  margin: 30px 0 3px 0;
}

header p {
  text-align: center;
  font-size: 13px;
  color: #777;
  margin: 0;
}


</style>
<div class="main_bbs6">
<ul id="tiles">
	<!--
		These are our grid items. Notice how each one has classes assigned that
		are used for filtering. The classes match the "data-filter" properties above.
		-->
 <a href="details.html">  <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img1.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
 </li></a>
<a href="details.html">    <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img2.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
</li></a>
	 <a href="details.html"> <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img3.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
	</li></a>
 <a href="details.html">   <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img4.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
 </li></a>
 <a href="details.html">   <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img5.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
 </li></a>
 <a href="details.html">    <li data-filter-class='["music", "video"]'>
		<img src="<?=$board_skin_path?>/images/video2.jpg" height="188" width="300" alt="" />
			 <p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
 </li></a>
	<a href="details.html"> <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img6.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
	</li></a>
	 <a href="details.html">   <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img7.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
	</li></a>
 <a href="details.html">   <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img8.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
	</li></a>
<a href="details.html">     <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img9.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
</li></a>
	 <a href="details.html">   <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img10.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
	</li></a>
	 <a href="details.html">  <li data-filter-class='["music", "video"]'>
		<img src="<?=$board_skin_path?>/images/video3.jpg" height="188" width="300" alt="" />
			 <p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
	</li></a>
<a href="details.html">   <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img11.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
 </li></a>
 <a href="details.html">  <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img12.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
	</li></a>
	<a href="details.html"> <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img13.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
	</li></a>
	<a href="details.html"> <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img14.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
</li></a>
 <a href="details.html"> <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img15.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
 </li></a>
	 <a href="details.html"> <li data-filter-class='["music", "video"]'>
		<img src="<?=$board_skin_path?>/images/video4.jpg" height="188" width="300" alt="" />
			 <p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
	</li></a>
 <a href="details.html"> <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img16.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
 </li></a>
<a href="details.html">   <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img17.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
</li></a>
 <a href="details.html">  <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img18.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
 </li></a>
<a href="details.html">  <li data-filter-class='["photos", "blog"]'>
		<img src="<?=$board_skin_path?>/images/img19.jpg" alt="" />
		<p><a href="details.html"><img src="<?=$board_skin_path?>/images/blog-icon1.png" title="posted date" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon2.png" title="views" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon3.png" title="comments" alt="" />
				<img src="<?=$board_skin_path?>/images/blog-icon5.png" title="link" alt="" />
				<span>Sample Text</span>
				<div class="clear"></div>
			 </a></p>
</li></a>
	
	<!-- End of grid blocks -->
</ul>
</div>

<!-- Include the imagesLoaded plug-in -->
<script src="<?=$board_skin_path?>/js/jquery.imagesloaded.js"></script>
<script src="<?=$board_skin_path?>/js/jquery.wookmark.js"></script>
<!-- Once the page is loaded, initalize the plug-in. -->
<script type="text/javascript">
	(function ($){
		$('#tiles').imagesLoaded(function() {
			// Prepare layout options.
			var options = {
				autoResize: true, // This will auto-update the layout when the browser window is resized.
				container: $('#main_bbs6'), // Optional, used for some extra CSS styling
				offset: 2, // Optional, the distance between grid items
				itemWidth:310 // Optional, the width of a grid item
			};

			// Get a reference to your grid items.
			var handler = $('#tiles li'),
					filters = $('#filters li');

			// Call the layout function.
			handler.wookmark(options);

			/**
			 * When a filter is clicked, toggle it's active state and refresh.
			 */
			var onClickFilter = function(event) {
				var item = $(event.currentTarget),
						activeFilters = [];
				item.toggleClass('active');

				// Collect active filter strings
				filters.filter('.active').each(function() {
					activeFilters.push($(this).data('filter'));
				});

				handler.wookmarkInstance.filter(activeFilters, 'or');
			}

			// Capture filter click events.
			filters.click(onClickFilter);
		});
	})(jQuery);
 </script>