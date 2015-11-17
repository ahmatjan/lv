<select id="province1"></select>
<select id="city1"></select>
<select id="area1"></select>

<script src="<?php echo base_url('public/js/loading/linkage.js')?>" type="text/javascript"></script>
<script>
$(document).ready(function() {
	$(function(){
		$.fn.linkage({ 
			province: "province1",		//雪花的最小尺寸
			city: "#city1", 	//雪花的最大尺寸
			area: "#area1"		//雪花出现的频率 这个数值越小雪花越多
		});
	});
});
</script>