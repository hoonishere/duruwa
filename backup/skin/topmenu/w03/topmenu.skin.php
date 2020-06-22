<link href="<?=$topmenu_skin_path?>/css/helper.css" media="screen" rel="stylesheet" type="text/css" />

<link href="<?=$topmenu_skin_path?>/css/dropdown.linear.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?=$topmenu_skin_path?>/css/default.ultimate.linear.css" media="screen" rel="stylesheet" type="text/css" />

<!--[if lt IE 7]>
<script type="text/javascript" src="<?=$topmenu_skin_path?>/js/jquery.js"></script>
<script type="text/javascript" src="<?=$topmenu_skin_path?>/js/jquery.dropdown.js"></script>
<![endif]-->
<ul id="nav" class="dropdown dropdown-linear">
<? for($i = 0; $i < count($fmenu); $i++){	// 1번째 메뉴?>
	<li><a href="<?=$fmenu[$i][1]?>"><? if(count($fmenu[$i][4]) > 0){ ?><span class="dir"><? } ?><?=$fmenu[$i][0]?><? if(count($fmenu[$i][4]) > 0){ ?></span><? } ?></a>
	<? if(count($fmenu[$i][4]) > 0){ ?>
		<ul>
			<? for($j = 0; $j < count($fmenu[$i][5]); $j++){ ?>
			<li><a href="<?=$fmenu[$i][5][$j][1]?>"><?=$fmenu[$i][5][$j][0]?></a></li>
			<? } ?>
			</ul>
	<? } ?>
	</li>
<? } ?>
</ul>