<script type="text/javascript">
//<![CDATA[
var gnbDep1 = <?if(strlen($tp[m_menu]) == 0 || !is_numeric($tp[m_menu])){ echo 0;}else{ echo $tp[m_menu]; }?>;
var gnbDep2 = 0;
var gnbDep3 = 0;
//]]>
</script>

<script type="text/javascript">
$(function(){
/* ////////////////////////
  gnb Initialize
//////////////////////// */
    var $gnbWrap = $('#gnb'),
        $gnb = $gnbWrap.find('>ul'),
        $gnb2dep = $gnb.find('> li > ul'),
        $gnb3dep = $gnb2dep.find('> li > ul'),
        $totalMenu = $('#allMenu');

		var idx = 0;

    try{ gnbInit(gnbDep1, gnbDep2, gnbDep3); } catch(err){alert(err);}

    //gnb 1depth
    $gnb.find('>li>a').on({
        'mouseenter focus' : function(){
            init();
            $gnb2dep.hide();
            imgReplace( $(this).find('>img'), 'off');
            if ($(this).next().is('ul')){
                gnbHeightResize(2);
                $(this).next('ul').show();
								$(this).next('ul').children('li:first-child').css({"marginLeft" : $(this).position().left});
								var idx = $gnb.find('>li>a').index($(this));
								idx += 1;
								////////////////////////////////
								////////////////////////////////
								////////////////////////////////
								// 서브메뉴 위치값 수동조정 시작

								if(idx == 1){		// 1번째 메뉴 수동 left 조정
									$(this).next('ul').children('li:first-child').css({"marginLeft" : 45});
								}

								if(idx == 2){		// 2번째 메뉴 수동 left 조정
									$(this).next('ul').children('li:first-child').css({"marginLeft" : 208});
								}

								if(idx == 3){		// 3번째 메뉴 수동 left 조정
									$(this).next('ul').children('li:first-child').css({"marginLeft" : 366});
								}

								if(idx == 4){		// 4번째 메뉴 수동 left 조정
									$(this).next('ul').children('li:first-child').css({"marginLeft" : 530});
								}

								if(idx == 5){		// 5번째 메뉴 수동 left 조정
									$(this).next('ul').children('li:first-child').css({"marginLeft" : 680});
								}

								if(idx == 6){		// 6번째 메뉴 수동 left 조정
									$(this).next('ul').children('li:first-child').css({"marginLeft" : 534});
								}

								// 서브메뉴 위치값 수동조정 끝
								////////////////////////////////
								////////////////////////////////
								////////////////////////////////
								////////////////////////////////
            } else {
                gnbHeightResize(1);
            }
        }
    });

    //gnb 2depth
    $gnb2dep.find('>li>a').on({
        'mouseenter focusin' : function(){
            $(this).parent('li').addClass('on').siblings().removeClass('on');
            $gnb3dep.hide();
            if ($(this).next().is('ul')){
                gnbHeightResize(3);
                $(this).next('ul').show();

								$(this).next('ul').children('li:first-child').css({"marginLeft" : $(this).position().left});
								var idx2 = $gnb.find('>li>a').index($(this));
								var idx = $gnb2dep.find('>li>a').index($(this));
								
								idx += 1;
								////////////////////////////////
								////////////////////////////////
								////////////////////////////////
								// 서브메뉴 위치값 수동조정 시작
								/*
								if(idx == 6){		// 6번째 메뉴 수동 left 조정
									$(this).next('ul').css({left : 300});
								}

								if(idx == 4){		// 4번째 메뉴 수동 left 조정
									$(this).next('ul').css({left : 500});
								}
								*/
								/**/
								// 서브메뉴 위치값 수동조정 끝
								////////////////////////////////
								////////////////////////////////
								////////////////////////////////
								////////////////////////////////

            } else {
                gnbHeightResize(2);
            }
        }
    });

    $('#content').bind('mouseenter focusin',function(){
        try{ gnbInit(gnbDep1, gnbDep2, gnbDep3) } catch(err){alert(err);}
    });

    function init(){ 
        $($gnb2dep , $gnb3dep ,$totalMenu).hide(); 
        gnbHeightResize(1);
        $gnb.find('>li').each(function(){
            imgReplace( $(this).find('>a>img'), 'on');
            $(this).find('ul').hide();
        });
        $gnb.find('li').removeClass('on');
    };

    function gnbHeightResize(state){
        switch (state){
            case 2 :
                $gnbWrap.height('61px');
                break;
            case 3 :
                $gnbWrap.height('87px');
                break;
            default : 
                $gnbWrap.height('33px');
                break;
        }
    };

    function gnbInit(dep1, dep2 , dep3){
        init();
        if (dep1 > 0){
            var sel_1depth = $gnb.find('> li').eq(dep1-1);
            imgReplace( sel_1depth.find('>a>img'), 'off');
            gnbHeightResize(1);
            sel_1depth.addClass('on').find('>ul').show();

						
						////////////////////////////////
						////////////////////////////////
						////////////////////////////////
						// 서브메뉴 위치값 수동조정 시작

						if(dep1 == 1){		// 1번째 메뉴 수동 left 조정
							sel_1depth.addClass('on').find('>ul').children('li:first-child').css({"marginLeft" : 45});
						}

						if(dep1 == 2){		// 2번째 메뉴 수동 left 조정
							sel_1depth.addClass('on').find('>ul').children('li:first-child').css({"marginLeft" : 208});
						}

						if(dep1 == 3){		// 3번째 메뉴 수동 left 조정
							sel_1depth.addClass('on').find('>ul').children('li:first-child').css({"marginLeft" : 366});
						}

						if(dep1 == 4){		// 4번째 메뉴 수동 left 조정
							sel_1depth.addClass('on').find('>ul').children('li:first-child').css({"marginLeft" : 530});
						}

						if(dep1 == 5){		// 5번째 메뉴 수동 left 조정
							sel_1depth.addClass('on').find('>ul').children('li:first-child').css({"marginLeft" : 680});
						}

						if(dep1 == 6){		// 6번째 메뉴 수동 left 조정
							sel_1depth.addClass('on').find('>ul').children('li:first-child').css({"marginLeft" : 534});
						}


            if (dep2 != 0){
                gnbHeightResize(2);
                var sel_2depth = sel_1depth.find('> ul >li').eq(dep2-1);
                    sel_2depth.addClass('on').find('>ul').show();
                if (dep3 != 0){
                    gnbHeightResize(3);
                    sel_2depth.find('>ul>li').eq(dep3-1).addClass('on');
                }
            }
        } else if (dep1 == -1){
            gnbHeightResize(1);
        }
    }    

/* /////////////
 total menu 
//////////////// */
    $totalMenu.hide();

    $totalMenu.find('>div>ul>li> a').on('mouseenter focusin',function(){
        $(this).parent('li').addClass('on').siblings().removeClass('on');
    })
    $totalMenu.find('li li> a').on('mouseenter focusin',function(){
        $(this).parents('ul').parent('li').addClass('on').siblings().removeClass('on');
    });
    
    // open btn
    $gnbWrap.find('>a').on('click',function(){
        $totalMenu.show();
        return false;
    }).keydown(function(event){
        if( event.keyCode == 9 && event.shiftKey){
            $totalMenu.hide();
            $gnb3dep.find('li:eq(-1) > a ').focus();
        }
    });

    // close btn
    $totalMenu.find('>div>a').on('click',function(){
        $totalMenu.hide().find('li').removeClass('on');
        $('#content').focus();
        return false;
    }).keydown(function(event){
        if (event.keyCode == 9 ){
            $(this).click();
        }
    })
     
});
/* ////////////////////////
    image file name change 
//////////////////////// */

function imgReplace(obj,current){
    switch (current){
        case 'on' :
            obj.attr('src',obj.attr('src').replace('_on.','_off.'));
            break;
        case 'off' :
            obj.attr('src',obj.attr('src').replace('_off.','_on.'));
            break;
    }
};
</script>
<style>
img {border:0; vertical-align:top}

/* navi */
.navi {position:relative;}
.gnb {width:100%; z-index:3; *zoom:1}

.gnb ul {position:relative; width:960px; margin:0 auto; *zoom:1;}
.gnb ul:after {display:block; clear:both}
.gnb ul li:first-child {margin:2px 0 0 0px} /*1뎁스 첫번째 메뉴 위치조절*/
.gnb ul li {float:left; margin-top:2px;} /*1뎁스 2번째 메뉴부터 위치조절*/

.gnb ul li ul {position:absolute; height:36px; top:40px; left:0; background:url('<?=$topmenu_skin_path?>/img/subbar.jpg') no-repeat center ;border:1px solid red;} /*2뎁스 전체 위치조절 / 배경있을때만 높이값 입력*/
.gnb ul li ul:after {content:""; display:block; clear:both}
.gnb ul li ul li:first-child {margin:7px 0 0 0px} /*2뎁스 첫번째 메뉴 위치조절*/
.gnb ul li ul li {float:left; margin:7px 0 0 20px; font-family:"malgun gothic", "dotum"; font-size:13px; font-weight:bold} /*2뎁스 2번째 메뉴부터 위치조절*/
.gnb ul li ul li a {color:#ffffff;} /*2뎁스 text color*/
.gnb ul li ul li a:hover {color:#111} /*2뎁스 text color_over*/

.gnb ul li ul li ul {position:absolute; height:36px; top:38px; left:0; *zoom:1} /*3뎁스 전체 위치조절 / 배경있을때만 높이값 입력*/
.gnb ul li ul li ul:after {content:""; display:block; clear:both}
.gnb ul li ul li ul li:first-child {margin:8px 0 0 0px} /*3뎁스 첫번째 메뉴 위치조절*/
.gnb ul li ul li ul li {float:left; margin:8px 0 0 0px font-family:"malgun gothic", "dotum"; font-size:12px; font-weight:bold} /*3뎁스 2번째 메뉴부터 위치조절*/
.gnb ul li ul li ul li a {color:#ffcc00} /*3뎁스 text color*/
.gnb ul li ul li ul li a:hover {color:#fff} /*3뎁스 text color_over*/​
</style>
<script>
	$(document).ready(function(){

		<?if($tp[m_menu] > 0){?>
		$("img.top_m_img").eq(<?=($tp[m_menu]-1)?>).attr("src",$("img.top_m_img").eq(<?=($tp[m_menu]-1)?>).attr("src").replace(".png","_over.png"));
		<?}?>

		$("img.top_m_img").mouseover(function(){

			var idx = $("img.top_m_img").index($(this));

			if((idx) != <?=($tp[m_menu]-1)?>){
				$(this).attr("src",$(this).attr("src").replace(".png","_over.png"));
			}
		});

		$("img.top_m_img").mouseout(function(){
			var idx = $("img.top_m_img").index($(this));

			if((idx) != <?=($tp[m_menu]-1)?>){
				$(this).attr("src",$(this).attr("src").replace("_over.png",".png"));
			}
		});
	});
</script>
<div class="navi">
	<div id="gnb" class="gnb">
		<ul>
		<?//print_r2($fmenu);?>
		<?for($i = 0; $i < count($fmenu);$i++){?>
			<li><a href="<?=$fmenu[$i][1]?>"><img class="top_m_img" src="<?=$topmenu_skin_path?>/img/menu0<?=($i+1)?>.png" alt="<?=$fmenu[$i][0]?>" /></a>
			<?if(count($fmenu[$i][5]) > 0){?>
				<ul>
					<?for($j = 0; $j < count($fmenu[$i][5]);$j++){?>
					<li><a href="<?=$fmenu[$i][5][$j][1]?>"><?=$fmenu[$i][5][$j][0]?></a></li>
					<?}?>
				</ul>
			<?}?>
			</li>
		<?}?>
		</ul>
	</div>
</div>