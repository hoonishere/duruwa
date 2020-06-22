
<style>
h3 {
    color: #101010;
    font-family: Helvetica, Arial, sans-serif;
    margin: 20px;
    font-size: 20px;
}

.container {
    position: relative;
		left:80px;
}

.metaplayer {
    width: 600px;
    height: 300px;

}

#transcript {
    margin-top: 10px;
</style>
<div style="margin:25px auto;">
	<div class="container">
			<div class="metaplayer">
					<div id='target'></div>
			</div>
			<div id='searchbar'></div>
			<div id='transcript'></div>
	</div>
</div>


<script src="<?=G5_URL?>/js/jwplayer/jwplayer.js"></script>
<?if(eregi(".mp4",$view[file][1][file])||eregi(".avi",$view[file][1][file])||eregi(".flv",$view[file][1][file])){
		$file_img = G5_PATH."/data/file/".$bo_table."/".$view[file][0][file] ; 
		
		if(file_exists($file_img)){
			$file_image = $view[file][0][path]."/".$view[file][0][file] ; 
		}else{
			$file_image= G5_URL."/img/logo.jpg" ; 
		}
	?>
<script>
 var jwp, video, player;
 $(function () {

     jwp = jwplayer('target').setup({
         controls: true, // v6
         controlbar: "bottom", //v5
         width: "600",
         height: "300",
         autostart: false,
				 image:"<?=$file_image?>",
         icons: false, // disable a big play button on the middle of screen
         plugins: {
             viral: {
                 onpause: false,
                 oncomplete: false,
                 allowmenu: false
             }
         }, // disable all viral features.
         flashplayer: "<?=G5_URL?>/js/jwplayer/player.swf",
         file: "<?=$view[file][1][path]?>/<?=$view[file][1][file]?>"

     });

     jwp.onReady(function () {
         video = MetaPlayer.jwplayer(jwp);
         video.autoplay = true;

         player = MetaPlayer(video)
             .controlbar({
             fullscreen: true
         })
             .captionconfig()
             .transcript("#transcript")
             .searchbar("#searchbar")
             .mrss("//publishing.ramp.com/FileResource/widgets/metaplayer3/examples/data/elephants.mrss.xml")
             .srt()
             .load();
     });
 });
</script>
<?}?>