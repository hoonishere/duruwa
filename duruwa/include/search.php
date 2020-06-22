
<form name="fsearchbox" method="get" onsubmit="return fsearchbox_submit(this);">
	<input type="hidden" name="sfl" value="concat(wr_subject,wr_content)">
	<input type="hidden" name="sfl" value="wr_subject||wr_content">
	<input type="hidden" name="sop" value="and">
	<input name="stx" type="text" maxlength="20">
	<input type="submit" border="0" value="검색">
</form>

<!-- 검색 시작 -->

<script type="text/javascript">
function fsearchbox_submit(f)
{
    if (f.stx.value.length < 2) {
        alert("검색어는 두글자 이상 입력하십시오.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
    var cnt = 0;
    for (var i=0; i<f.stx.value.length; i++) {
        if (f.stx.value.charAt(i) == ' ')
            cnt++;
    }

    if (cnt > 1) {
        alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    f.action = "<?=$g4['bbs_path']?>/search.php";
    return true;
}
</script>
<!-- 검색 끝 -->