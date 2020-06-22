<?/* Family Site 사용 */?>
<div class="total" style="float:right; width:160px;">
			<div class="select_d">Family site<span class="down">▼</span>
			</div>
			<ul class="select_op">
				<li><a href="http://www.naver.com" target="_blank">NAVER</a></li>
				<li><a href="http://www.daum.net/" target="_blank">DAUM</a></li>
				<li><a href="http://www.nate.com/" target="_blank">NATE</a></li>
			</ul>
		</div><!--total end  -->
<script>
	$(document).ready(function(){
			$(".select_d").on('click' , function(){
				if($(".select_d").find("span").attr("class")=="down"){
					$(".select_op").slideDown(180);
					$(".select_d").find("span").html("▲");
					$(".select_d").find("span").removeClass("down");
					$(".select_d").find("span").addClass("up");
				}else if($(".select_d").find("span").attr("class")=="up"){
					$(".select_op").slideUp(90);
					$(".select_d").find("span").html("▼");
					$(".select_d").find("span").removeClass("up");
					$(".select_d").find("span").addClass("down");
				}
			});
	});
</script>



<?/* form 태그에 써는 Select  박스 형태 (주석 달아놓음.) */?>
<?/*?>
<div class="total" style="float:right; width:160px;">
	<div class="select_d">
		[선택]<span class="down">▼</span>
	</div>
	<ul class="select_op">
		<li><a href="#null" data="value1">value1</a></li>
		<li><a href="#null" data="value2">value2</a></li>
		<li><a href="#null" data="value3">value3</a></li>
		<li><a href="#null" data="value4">value4</a></li>
	</ul>
</div>
<script>
<?if($_GET[v]!=""){?>
	$(".select_d").html("<?=$_GET[v]?><span class='down'>▼</span>");
	$(".select_op > li > a[data='<?=$_GET[v]?>']").addClass("a_focus");
<?}?>
function stat_select(){
	if($(".select_d").find("span").attr("class")=="down"){
				$(".select_op").slideDown(180);
				$(".select_d").find("span").html("▲");
				$(".select_d").find("span").removeClass("down");
				$(".select_d").find("span").addClass("up");
			}else if($(".select_d").find("span").attr("class")=="up"){
				$(".select_op").slideUp(90);
				$(".select_d").find("span").html("▼");
				$(".select_d").find("span").removeClass("up");
				$(".select_d").find("span").addClass("down");
			}
}
	$(document).ready(function(){
		$(".select_d").on('click' , function(){ //select
			stat_select();
		});

		$(".select_op > li > a").on("click" , function(){
			//초기화 시작
			$(".select_op > li").each(function(){
				$(".select_op > li > a").removeClass("a_focus");
				$(".select_op > li").css("background" , "#ffffff");
			}); // for
			//초기화 끝
			$(this).addClass("a_focus");
			$(this).parent().css("background" , "#8e8e8e"); // 부모 백그라운드
			stat_select(); // 자동으로 슥~ 하고 올라가게 함.
			$("#wr_1").val($(this).attr("data"));
			$(".select_d").html($(this).attr("data") + "<span class='down'>▼</span>");
		});
	});
</script>

<input type="hidden" name="wr_1" id="wr_1" value="<?=$_GET[v]?>">
<?*/?>