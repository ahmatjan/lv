<!--下雪-->
<script src="<?php echo base_url('public/modules/holidays/jq.snow/jq.snow.js')?>"></script>
<!--下面是调用方法和参数说明-->

<script>
$(function(){
	$.fn.snow({ 
		minSize: 5,		//雪花的最小尺寸
		maxSize: 50, 	//雪花的最大尺寸
		newOn: 100		//雪花出现的频率 这个数值越小雪花越多
	});
});
$("body").css({"background-image":"url(../../../public/image/bg/3.jpg)","background-position-y":"3%",
"background-repeat":"repeat-y"});
</script>

<!--落叶-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/modules/holidays/leaves/css/jquery.classyleaves.css')?>">
<!--[if IE]>
	<script src="../../../public/modules/holidays/leaves/js/html5shiv.min.js"></script>
<![endif]-->
<script src="<?php echo base_url('public/modules/holidays/leaves/js/jquery.rotate.js')?>"></script>
<script src="<?php echo base_url('public/modules/holidays/leaves/js/jquery.classyleaves.js')?>"></script>

<script>
    $(document).ready(function() {
        var tree = new ClassyLeaves({
            leaves: 30,
            maxY: -10,
            multiplyOnClick: true,
            multiply: 2,
            infinite: true,
            speed: 4000
        });
        /*
        $('body').on('click', '.addLeaf', function() {
            console.log('8');
            tree.add(8);
            return false;
        });
        */
    });
</script>