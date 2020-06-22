<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
//메인 비쥬얼 높이 지정

$str_height = 750;

$cnct_width = count($list) * 10;
?>
<!-- core css 이 순서들이 중요합니다. -->
<link rel="stylesheet" href="<?=$latest_skin_url?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=$latest_skin_url?>/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=$latest_skin_url?>/css/animate.min.css">
<link rel="stylesheet" href="<?=$latest_skin_url?>/css/seowoo.complexive.css">
<link rel="stylesheet" href="<?=$latest_skin_url?>/css/responsive.css">


<section id="main-slider" class="no-margin">
<!-- 슬라이드가 오토로 돌아가게 하고 싶다면 data-ride="carousel" data-interval="2000" data-pause="false" 이것을 넣으세요 -->
        <div class="carousel slide"  >
            <ol class="carousel-indicators" style="display:none;">
						<?for($i = 0; $i < count($list); $i++){?>
                <li data-target="#main-slider" data-slide-to="<?=$i?>" <?if($i == 0){?>class="active"<?}?>></li>
						<?}?>
            </ol>
            <div class="carousel-inner">
								<?for($i = 0; $i < count($list); $i++){
									$img = $list[$i][file][0][path]."/".$list[$i][file][0][file] ;
									?>
                <div class="item <?if($i == 0){?>active<?}?>" style="background-image: url(<?=$img?>); " >
                    <div class="container">
                        <div class="row slide-margin">

                            <div class="col-sm-12">
                                <div class="carousel-content">
																	 <div class="animation animated-item-1 text-center">
																		<img src="<?=G5_URL?>/img/m_logo.png" class="img-responsive" style="margin:0 auto;">
																	</div> 
                                    <h1 class="animation animated-item-2 text-center" style="font-size:38px;text-shadow: 0px 0px 0px #555;"><?=nl2br($list[$i][wr_content])?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
								<?}?>
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
<a class="prev hidden-xs" id="xs_prev" href="#main-slider" data-slide="prev" >
<i class="fa fa-chevron-left"></i>
</a>
<a class="next hidden-xs" id="xs_next" href="#main-slider" data-slide="next" >
<i class="fa fa-chevron-right"></i>
</a> 
    </section><!--/#main-slider-->


<!-- Core Js 이 순서들이 중요합니다. -->

<script src="<?=$latest_skin_url?>/js/bootstrap.min.js"></script>
<script src="<?=$latest_skin_url?>/js/jquery.prettyPhoto.js"></script>
<script src="<?=$latest_skin_url?>/js/jquery.isotope.min.js"></script>
<script src="<?=$latest_skin_url?>/js/main.js"></script>
<script src="<?=$latest_skin_url?>/js/wow.min.js"></script>
<!-- <script>
	$(document).ready(function(){
		//alert("^^");
		$("#xs_next").trigger('click');

		//$("#xs_next").on("click", function(){ alert("12345");});
	});
</script> -->


